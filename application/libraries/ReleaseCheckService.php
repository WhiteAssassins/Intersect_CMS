<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require FCPATH . 'vendor/autoload.php';

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class ReleaseCheckService
{
    protected $cacheDirectory;

    public function __construct()
    {
        $this->cacheDirectory = APPPATH . 'cache/releases/';
        if (!is_dir($this->cacheDirectory)) {
            @mkdir($this->cacheDirectory, 0775, true);
        }
    }

    public function getProjectUpdateState($currentVersion)
    {
        $cacheKey = 'project_release';
        $cached = $this->readCache($cacheKey);
        $ttl = 21600;

        if ($cached !== null && !$this->isExpired($cached, $ttl)) {
            return $this->toResult($currentVersion, $cached['payload'] ?? array(), true);
        }

        $payload = $this->fetchReleasePayload();
        if (!empty($payload)) {
            $this->writeCache($cacheKey, array(
                'payload' => $payload,
                'stored_at' => date(DATE_ATOM),
            ));
            return $this->toResult($currentVersion, $payload, false);
        }

        if ($cached !== null) {
            return $this->toResult($currentVersion, $cached['payload'] ?? array(), true);
        }

        return array(
            'has_update' => false,
            'available_version' => '',
            'checked_from_cache' => false,
        );
    }

    protected function fetchReleasePayload()
    {
        try {
            $client = new Client(array(
                'timeout' => 0.6,
                'connect_timeout' => 0.25,
                'http_errors' => false,
            ));

            $response = $client->request('GET', 'http://novo.aewhitedevs.com/api/cms');
            $decoded = json_decode((string) $response->getBody(), true);

            return is_array($decoded) ? $decoded : array();
        } catch (GuzzleException $exception) {
            return array();
        } catch (Throwable $exception) {
            return array();
        }
    }

    protected function toResult($currentVersion, array $payload, $checkedFromCache)
    {
        $latestVersion = trim((string) ($payload['version'] ?? ''));

        return array(
            'has_update' => $latestVersion !== '' && version_compare($latestVersion, (string) $currentVersion, '>'),
            'available_version' => $latestVersion,
            'checked_from_cache' => (bool) $checkedFromCache,
        );
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

    protected function isExpired(array $cached, $ttl)
    {
        $storedAt = strtotime((string) ($cached['stored_at'] ?? ''));
        if ($storedAt === false) {
            return true;
        }

        return (time() - $storedAt) > (int) $ttl;
    }
}
