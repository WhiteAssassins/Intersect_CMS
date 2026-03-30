<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use GuzzleHttp\Client;

class IntersectAdminApi
{
    protected $CI;

    public function __construct()
    {
        $this->CI =& get_instance();
        $this->CI->load->model('Apigettoken');
    }

    public function sendGlobalMessage($message)
    {
        return $this->request('POST', 'chat/global', array(
            'form_params' => $this->buildChatPayload($message),
        ));
    }

    public function sendDirectMessage($username, $message)
    {
        return $this->request('POST', 'chat/direct/' . rawurlencode($username), array(
            'form_params' => $this->buildChatPayload($message),
        ));
    }

    public function sendProximityMessage($mapId, $message)
    {
        return $this->request('POST', 'chat/proximity/' . rawurlencode($mapId), array(
            'form_params' => $this->buildChatPayload($message),
        ));
    }

    public function moderateUser($username, $action, array $payload = array())
    {
        return $this->request('POST', 'users/' . rawurlencode($username) . '/admin/' . $action, array(
            'form_params' => $payload,
        ));
    }

    public function warpUserToMap($username, $mapId)
    {
        return $this->moderateUser($username, 'warpto', array(
            'MapId' => $mapId,
        ));
    }

    public function giveItemToPlayer($playerName, $itemId, $quantity = 1)
    {
        return $this->request('POST', 'players/' . rawurlencode($playerName) . '/items/give', array(
            'form_params' => array(
                'itemid' => $itemId,
                'quantity' => (int) $quantity,
            ),
        ));
    }

    protected function buildChatPayload($message)
    {
        return array(
            'Message' => $message,
            'Color' => array(
                'A' => 255,
                'R' => 255,
                'G' => 0,
                'B' => 0,
            ),
        );
    }

    protected function request($method, $path, array $options = array())
    {
        $baseUri = $this->getBaseUri($path);
        if ($baseUri === null) {
            return $this->errorResult('La API de Intersect no esta configurada.');
        }

        $tokenData = (array) $this->CI->Apigettoken->apitoken();
        $accessToken = $tokenData['access_token'] ?? '';
        if ($accessToken === '') {
            return $this->errorResult('No fue posible obtener el token de acceso de Intersect.');
        }

        $clientOptions = array(
            'base_uri' => $baseUri,
            'timeout' => 5.0,
            'http_errors' => false,
            'headers' => array(
                'authorization' => 'Bearer ' . $accessToken,
            ),
        );

        $requestOptions = array_merge($clientOptions, $options);

        try {
            $client = new Client(array(
                'base_uri' => $baseUri,
                'timeout' => 5.0,
                'http_errors' => false,
            ));

            $response = $client->request($method, '', array(
                'headers' => $requestOptions['headers'],
                'form_params' => $requestOptions['form_params'] ?? array(),
            ));

            $body = json_decode((string) $response->getBody(), true);
            $statusCode = (int) $response->getStatusCode();

            return array(
                'ok' => $statusCode >= 200 && $statusCode < 300,
                'status' => $statusCode,
                'body' => is_array($body) ? $body : array(),
                'message' => is_array($body) ? ($body['Message'] ?? '') : '',
            );
        } catch (Throwable $exception) {
            return $this->errorResult($exception->getMessage());
        }
    }

    protected function getBaseUri($path)
    {
        $apiIp = trim((string) $this->CI->config->item('apiip'));
        if ($apiIp === '' || $apiIp === 'apipip') {
            return null;
        }

        return 'http://' . trim($apiIp, '/') . '/api/v1/' . ltrim($path, '/');
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
}
