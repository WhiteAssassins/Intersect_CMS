<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require FCPATH.'vendor/autoload.php';
use GuzzleHttp\Client;
class Apigettoken extends CI_Model{
    public function apitoken(){
    $apiip = $this->config->item('apiip');;
    $apiuser = [
        'grant_type' => "password",
       'username' => "WhiteAssassins",
        'password' => "079DC5B862FE910FBEF8602265613A84AF5A5E5A2DA0D912EECEF637CF8957D1"
          ];
        $client = new Client([
      'base_uri' => 'http://'.$apiip.'/api/oauth/token',
      'timeout'  => 5.0,
      ]);
      $res = $client->request('POST', '', ['form_params' => $apiuser]);
      $accesstoken = json_decode($res->getBody(), true);
      return $accesstoken;

    }
}