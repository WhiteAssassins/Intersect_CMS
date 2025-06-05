<?php

namespace App\Models;

use CodeIgniter\Model;
use App\Models\Apigettoken;
use GuzzleHttp\Client;

class Apiplayers extends Model
{
    public function player()
    {
        try {
            $apiip = env('API_IP');

            $tokenModel = new Apigettoken();
            $accesstoken = $tokenModel->apitoken();

            $client = new Client([
                'base_uri' => "http://{$apiip}/api/v1/players?pageSize=5000",
                'timeout'  => 10.0,
                'http_errors' => false,
            ]);

            $res = $client->request('GET', '', [
                'headers' => [
                    'authorization' => "Bearer " . $accesstoken['access_token'],
                ]
            ]);

            return json_decode($res->getBody(), true);
        } catch (\GuzzleHttp\Exception\ServerException $se) {
            return ['error' => $se->getMessage()];
        } catch (\Exception $e) {
            return ['error' => $e->getMessage()];
        }
    }
}
