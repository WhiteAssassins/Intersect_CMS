<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require FCPATH . 'vendor/autoload.php';

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class IntersectAuthService
{
    protected $CI;

    public function __construct()
    {
        $this->CI =& get_instance();
        $this->CI->load->model('Apigettoken');
    }

    public function registerRemoteUser($username, $password, $email)
    {
        return $this->request('POST', 'users/register', array(
            'form_params' => array(
                'username' => $username,
                'password' => hash('sha256', $password),
                'email' => $email,
            ),
        ));
    }

    public function fetchRemoteUser($username)
    {
        $response = $this->request('GET', 'users/' . rawurlencode($username));
        if ($response === null || $response->getStatusCode() !== 200) {
            return null;
        }

        $payload = json_decode((string) $response->getBody(), true);
        return is_array($payload) ? $payload : null;
    }

    public function validateRemotePassword($username, $password)
    {
        $response = $this->request('POST', 'users/' . rawurlencode($username) . '/password/validate', array(
            'form_params' => array(
                'password' => hash('sha256', $password),
            ),
        ));

        return $response !== null && $response->getStatusCode() === 200;
    }

    private function request($method, $path, array $options = array())
    {
        $token = (array) $this->CI->Apigettoken->apitoken();
        if (empty($token['access_token'])) {
            return null;
        }

        $baseUri = 'http://' . $this->CI->config->item('apiip') . '/api/v1/' . ltrim($path, '/');
        $requestOptions = $options;
        $requestOptions['headers']['authorization'] = 'Bearer ' . $token['access_token'];

        try {
            $client = new Client(array(
                'base_uri' => $baseUri,
                'timeout' => 5.0,
                'http_errors' => false,
            ));

            return $client->request($method, '', $requestOptions);
        } catch (GuzzleException $exception) {
            log_message('error', 'IntersectAuthService request failed: ' . $exception->getMessage());
            return null;
        }
    }
}
