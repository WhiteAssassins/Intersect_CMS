<?php

namespace App\Models;

use CodeIgniter\Model;
use GuzzleHttp\Client;

class Apigettoken extends Model
{
    public function apitoken()
    {
        try {
            $config = config('App');

            $apiip = $config->apiip;
            $apiuser = [
                'grant_type' => 'password',
                'username' => $config->apiuser,
                'password' => $config->apipass,
            ];

            $client = new Client([
                'base_uri' => "http://{$apiip}/api/oauth/token",
                'timeout'  => 10.0,
                'http_errors' => false,
            ]);

            $res = $client->post('', [
                'form_params' => $apiuser
            ]);

            $accesstoken = json_decode($res->getBody(), true);
            return $accesstoken;
        } catch (\GuzzleHttp\Exception\ServerException $se) {
            return ['error' => $se->getMessage()];
        } catch (\Exception $e) {
            return ['error' => $e->getMessage()];
        }
    }
}
