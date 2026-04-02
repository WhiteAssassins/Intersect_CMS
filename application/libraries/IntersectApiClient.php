<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require FCPATH . 'vendor/autoload.php';

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class IntersectApiClient
{
    protected $CI;
    protected $cacheDirectory;
    protected $lastMeta = array();
    protected $accessTokenCache;

    public function __construct()
    {
        $this->CI =& get_instance();
        $this->cacheDirectory = APPPATH . 'cache/api/';
        $this->ensureCacheDirectory();
        $this->lastMeta = $this->buildMeta(false, 0, 'API not queried yet.');
    }

    public function isConfigured()
    {
        return $this->getApiRoot() !== null;
    }

    public function getLastMeta()
    {
        return $this->lastMeta;
    }

    public function getHealthSummary()
    {
        $stats = $this->getCachedJson('info/stats', array(
            'uptime' => 0,
            'onlineCount' => 0,
            'cps' => 0,
        ), array(
            'cache_key' => 'health_stats',
            'ttl' => $this->getIntConfig('api_cache_ttl', 120),
        ));

        $meta = $this->getLastMeta();

        return array(
            'configured' => $this->isConfigured(),
            'online' => !empty($meta['ok']),
            'using_cache' => !empty($meta['cached']),
            'using_stale_cache' => !empty($meta['stale']),
            'status_code' => (int) ($meta['status'] ?? 0),
            'message' => (string) ($meta['message'] ?? ''),
            'last_sync_label' => $this->formatTimestamp($meta['fetched_at'] ?? null),
            'stats' => $stats,
        );
    }

    public function getCachedJson($path, array $fallback = array(), array $options = array())
    {
        return $this->requestCachedJson('GET', $path, $fallback, $options);
    }

    public function requestCachedJson($method, $path, array $fallback = array(), array $options = array())
    {
        $method = strtoupper((string) $method);
        $cacheTtl = isset($options['ttl']) ? max(1, (int) $options['ttl']) : $this->getIntConfig('api_cache_ttl', 120);
        $cachePayload = array();
        if (!empty($options['query']) && is_array($options['query'])) {
            $cachePayload['query'] = $options['query'];
        }

        if (!empty($options['json']) && is_array($options['json'])) {
            $cachePayload['json'] = $options['json'];
        }

        $cacheKey = $options['cache_key'] ?? $this->buildCacheKey(strtolower($method), $path, $cachePayload);
        $cached = $this->readCache($cacheKey);

        if ($cached !== null && !$this->isExpired($cached, $cacheTtl)) {
            $this->lastMeta = $this->buildMeta(true, 200, 'Fresh cache hit.', true, false, $cached['stored_at'] ?? null);
            return $this->mergeFallback($fallback, $cached['payload'] ?? array());
        }

        $requestOptions = $options;
        unset($requestOptions['ttl'], $requestOptions['cache_key']);
        $result = $this->requestJson($method, $path, $requestOptions);

        if (!empty($result['ok']) && is_array($result['body'])) {
            $storedAt = date(DATE_ATOM);
            $this->writeCache($cacheKey, array(
                'payload' => $result['body'],
                'stored_at' => $storedAt,
            ));
            $this->lastMeta = $this->buildMeta(true, $result['status'], 'Live API response.', false, false, $storedAt);
            return $this->mergeFallback($fallback, $result['body']);
        }

        if ($cached !== null) {
            $storedAt = $cached['stored_at'] ?? null;
            $this->lastMeta = $this->buildMeta(false, $result['status'] ?? 0, $result['message'] ?? 'Using stale cache.', true, true, $storedAt);
            return $this->mergeFallback($fallback, $cached['payload'] ?? array());
        }

        $this->lastMeta = $this->buildMeta(false, $result['status'] ?? 0, $result['message'] ?? 'API unavailable.');
        return $fallback;
    }

    public function requestJson($method, $path, array $options = array())
    {
        $method = strtoupper((string) $method);
        $requestRequiresAuth = array_key_exists('require_auth', $options) ? (bool) $options['require_auth'] : true;
        unset($options['require_auth']);
        $timeout = isset($options['timeout']) && is_numeric($options['timeout']) ? (float) $options['timeout'] : $this->getFloatConfig('api_timeout', 0.6);
        $connectTimeout = isset($options['connect_timeout']) && is_numeric($options['connect_timeout']) ? (float) $options['connect_timeout'] : $this->getFloatConfig('api_connect_timeout', 0.2);
        unset($options['timeout'], $options['connect_timeout']);

        $root = $this->getApiRoot();
        if ($root === null) {
            return $this->errorResult('La API de Intersect no esta configurada.');
        }

        $headers = (array) ($options['headers'] ?? array());
        if ($requestRequiresAuth) {
            $accessToken = $this->getAccessToken();
            if ($accessToken === '') {
                return $this->errorResult('No fue posible autenticar con la API de Intersect.');
            }

            $headers['authorization'] = 'Bearer ' . $accessToken;
        }

        $requestOptions = $options;
        if (!isset($headers['accept'])) {
            $headers['accept'] = 'application/json';
        }

        $requestOptions['headers'] = $headers;
        $requestOptions['http_errors'] = false;

        try {
            $client = new Client(array(
                'base_uri' => $root . '/api/v1/',
                'timeout' => $timeout,
                'connect_timeout' => $connectTimeout,
                'http_errors' => false,
                'verify' => $this->shouldVerifySsl($root),
            ));

            $response = $client->request($method, ltrim($path, '/'), $requestOptions);
            $status = (int) $response->getStatusCode();
            $decodedBody = json_decode((string) $response->getBody(), true);
            $body = is_array($decodedBody) ? $decodedBody : array();
            $message = (string) ($body['Message'] ?? $body['message'] ?? '');

            return array(
                'ok' => $status >= 200 && $status < 300,
                'status' => $status,
                'body' => $body,
                'message' => $message,
            );
        } catch (GuzzleException $exception) {
            log_message('error', 'Intersect API request failed: ' . $exception->getMessage());
            return $this->errorResult('La API de Intersect no respondio a tiempo.');
        } catch (Throwable $exception) {
            log_message('error', 'Intersect API request crashed: ' . $exception->getMessage());
            return $this->errorResult('No fue posible contactar la API de Intersect.');
        }
    }

    public function requestPasswordReset($username)
    {
        $username = trim((string) $username);
        if ($username === '') {
            return $this->errorResult('Debe indicar un usuario.');
        }

        return $this->requestJson('GET', 'users/' . rawurlencode($username) . '/password/reset');
    }

    public function getAccessToken($forceRefresh = false)
    {
        $cacheKey = 'oauth_token';
        if (!$forceRefresh && $this->accessTokenCache !== null) {
            return (string) $this->accessTokenCache;
        }

        $cached = $forceRefresh ? null : $this->readCache($cacheKey);
        if ($cached !== null) {
            $expiresAt = strtotime((string) ($cached['expires_at'] ?? ''));
            $cachedToken = (string) ($cached['payload']['access_token'] ?? '');
            $isFailureCache = $cachedToken === '';
            $threshold = $isFailureCache ? time() : (time() + 30);
            if ($expiresAt !== false && $expiresAt > $threshold) {
                $this->accessTokenCache = $cachedToken;
                return (string) $this->accessTokenCache;
            }
        }

        $credentials = $this->getTokenCredentials();
        if ($credentials === null) {
            return '';
        }

        try {
            $client = new Client(array(
                'base_uri' => $this->getApiRoot() . '/api/',
                'timeout' => max(0.6, $this->getFloatConfig('api_timeout', 0.6)),
                'connect_timeout' => max(0.2, $this->getFloatConfig('api_connect_timeout', 0.2)),
                'http_errors' => false,
                'verify' => $this->shouldVerifySsl($this->getApiRoot()),
            ));

            $response = $client->request('POST', 'oauth/token', array(
                'json' => $credentials,
                'http_errors' => false,
            ));

            $status = (int) $response->getStatusCode();
            $decodedBody = json_decode((string) $response->getBody(), true);
            if ($status !== 200 || !is_array($decodedBody) || empty($decodedBody['access_token'])) {
                $this->cacheFailedTokenAttempt($cacheKey);
                return '';
            }

            $ttl = max(60, (int) ($decodedBody['expires_in'] ?? $this->getIntConfig('api_token_cache_ttl', 300)));
            $expiresAt = date(DATE_ATOM, time() + $ttl);
            $this->writeCache($cacheKey, array(
                'payload' => $decodedBody,
                'expires_at' => $expiresAt,
                'stored_at' => date(DATE_ATOM),
            ));
            $this->accessTokenCache = (string) $decodedBody['access_token'];

            return (string) $this->accessTokenCache;
        } catch (GuzzleException $exception) {
            log_message('error', 'Intersect API token request failed: ' . $exception->getMessage());
        } catch (Throwable $exception) {
            log_message('error', 'Intersect API token crashed: ' . $exception->getMessage());
        }

        $this->cacheFailedTokenAttempt($cacheKey);
        return '';
    }

    protected function getTokenCredentials()
    {
        $apiUser = trim((string) $this->CI->config->item('apiuser'));
        $apiPass = trim((string) $this->CI->config->item('apipass'));

        if ($this->getApiRoot() === null || $apiUser === '' || $apiUser === 'apiuser' || $apiPass === '' || $apiPass === 'apipass') {
            return null;
        }

        return array(
            'grant_type' => 'password',
            'username' => $apiUser,
            'password' => $this->hashPassword($apiPass),
        );
    }

    public function hashPassword($password)
    {
        $password = trim((string) $password);
        if ($password === '') {
            return '';
        }

        if ($this->looksLikeSha256($password)) {
            return strtoupper($password);
        }

        return strtoupper(hash('sha256', $password));
    }

    protected function getApiRoot()
    {
        $configured = trim((string) $this->CI->config->item('api_base_url'));
        if ($configured !== '') {
            return $this->normalizeBaseUrl($configured);
        }

        $apiHost = trim((string) $this->CI->config->item('apiip'));
        if ($apiHost === '' || $apiHost === 'apipip') {
            return null;
        }

        if (stripos($apiHost, 'http://') === 0 || stripos($apiHost, 'https://') === 0) {
            return $this->normalizeBaseUrl($apiHost);
        }

        $scheme = trim((string) $this->CI->config->item('api_scheme'));
        if ($scheme !== 'https') {
            $scheme = 'http';
        }

        return $this->normalizeBaseUrl($scheme . '://' . $apiHost);
    }

    protected function normalizeBaseUrl($url)
    {
        $url = rtrim(trim((string) $url), '/');
        if ($url === '') {
            return null;
        }

        $parts = parse_url($url);
        if (!is_array($parts) || empty($parts['scheme']) || empty($parts['host'])) {
            return null;
        }

        if (!in_array(strtolower((string) $parts['scheme']), array('http', 'https'), true)) {
            return null;
        }

        return $url;
    }

    protected function shouldVerifySsl($url)
    {
        $parts = parse_url((string) $url);
        $scheme = strtolower((string) ($parts['scheme'] ?? 'http'));

        if ($scheme !== 'https') {
            return false;
        }

        return $this->getBoolConfig('api_verify_ssl', true);
    }

    protected function buildCacheKey($prefix, $path, array $query = array())
    {
        return $prefix . '_' . sha1($path . '|' . json_encode($query));
    }

    protected function looksLikeSha256($value)
    {
        return (bool) preg_match('/\A[a-f0-9]{64}\z/i', trim((string) $value));
    }

    protected function readCache($cacheKey)
    {
        $path = $this->cacheDirectory . $cacheKey . '.json';
        if (!is_file($path)) {
            return null;
        }

        $contents = @file_get_contents($path);
        if ($contents === false || $contents === '') {
            return null;
        }

        $decoded = json_decode($contents, true);
        return is_array($decoded) ? $decoded : null;
    }

    protected function writeCache($cacheKey, array $payload)
    {
        $path = $this->cacheDirectory . $cacheKey . '.json';
        @file_put_contents($path, json_encode($payload, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));
    }

    protected function ensureCacheDirectory()
    {
        if (!is_dir($this->cacheDirectory)) {
            @mkdir($this->cacheDirectory, 0775, true);
        }
    }

    protected function isExpired(array $cached, $ttl)
    {
        $storedAt = strtotime((string) ($cached['stored_at'] ?? ''));
        if ($storedAt === false) {
            return true;
        }

        return (time() - $storedAt) > (int) $ttl;
    }

    protected function mergeFallback(array $fallback, array $payload)
    {
        return array_merge($fallback, $payload);
    }

    protected function errorResult($message)
    {
        return array(
            'ok' => false,
            'status' => 0,
            'body' => array(),
            'message' => $message,
        );
    }

    protected function cacheFailedTokenAttempt($cacheKey)
    {
        $this->accessTokenCache = '';
        $this->writeCache($cacheKey, array(
            'payload' => array(
                'access_token' => '',
            ),
            'expires_at' => date(DATE_ATOM, time() + 30),
            'stored_at' => date(DATE_ATOM),
        ));
    }

    protected function buildMeta($ok, $status, $message, $cached = false, $stale = false, $fetchedAt = null)
    {
        return array(
            'ok' => (bool) $ok,
            'status' => (int) $status,
            'message' => (string) $message,
            'cached' => (bool) $cached,
            'stale' => (bool) $stale,
            'fetched_at' => $fetchedAt,
        );
    }

    protected function formatTimestamp($timestamp)
    {
        $time = strtotime((string) $timestamp);
        if ($time === false) {
            return 'N/A';
        }

        return date('Y-m-d H:i:s', $time);
    }

    protected function getBoolConfig($key, $default)
    {
        $value = $this->CI->config->item($key);
        if ($value === null || $value === '') {
            return (bool) $default;
        }

        if (is_bool($value)) {
            return $value;
        }

        return filter_var($value, FILTER_VALIDATE_BOOLEAN);
    }

    protected function getIntConfig($key, $default)
    {
        $value = $this->CI->config->item($key);
        return is_numeric($value) ? (int) $value : (int) $default;
    }

    protected function getFloatConfig($key, $default)
    {
        $value = $this->CI->config->item($key);
        return is_numeric($value) ? (float) $value : (float) $default;
    }
}
