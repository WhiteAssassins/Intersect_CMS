<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require FCPATH . 'vendor/autoload.php';

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class QvaPayService
{
    protected $CI;

    public function __construct()
    {
        $this->CI =& get_instance();
    }

    public function createInvoice($username, $amount)
    {
        if ($username === '' || $amount <= 0 || !$this->isConfigured()) {
            return null;
        }

        $payload = array(
            'app_id' => $this->CI->config->item('apiqvapayid'),
            'app_secret' => $this->CI->config->item('apiqvapaysecret'),
            'amount' => $amount,
            'description' => 'Recarga de Cuenta',
            'remote_id' => $username,
            'signed' => 1,
        );

        try {
            $response = $this->createClient('https://qvapay.com/api/v1/create_invoice')
                ->request('POST', '', array(
                'form_params' => $payload,
            ));

            $data = json_decode((string) $response->getBody(), true);
            if (!is_array($data) || empty($data['signedUrl'])) {
                return null;
            }

            return $data['signedUrl'];
        } catch (GuzzleException $exception) {
            log_message('error', 'QvaPay invoice creation failed: ' . $exception->getMessage());
            return null;
        }
    }

    public function fetchTransaction($uuid)
    {
        $uuid = trim((string) $uuid);
        if ($uuid === '' || !$this->isConfigured()) {
            return array();
        }

        $payload = array(
            'app_id' => $this->CI->config->item('apiqvapayid'),
            'app_secret' => $this->CI->config->item('apiqvapaysecret'),
        );

        try {
            $response = $this->createClient('https://qvapay.com/api/v1/transactions/' . rawurlencode($uuid))
                ->request('POST', '', array(
                    'form_params' => $payload,
                ));

            $data = json_decode((string) $response->getBody(), true);
            return is_array($data) ? $data : array();
        } catch (GuzzleException $exception) {
            log_message('error', 'QvaPay transaction fetch failed: ' . $exception->getMessage());
            return array();
        }
    }

    private function isConfigured()
    {
        $appId = $this->CI->config->item('apiqvapayid');
        $appSecret = $this->CI->config->item('apiqvapaysecret');

        return !empty($appId)
            && $appId !== 'apiqvapayid'
            && !empty($appSecret)
            && $appSecret !== 'apiqvapaysecret';
    }

    private function createClient($baseUri)
    {
        return new Client(array(
            'base_uri' => $baseUri,
            'timeout' => 5.0,
            'http_errors' => false,
        ));
    }
}
