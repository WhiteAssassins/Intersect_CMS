<?php 
require FCPATH.'vendor/autoload.php';
use GuzzleHttp\Client;
class Apigettoken extends CI_Model{
    public function apitoken(){
    $apiip = $this->config->item('apiip');
    $apiuser = [
        'grant_type' => "password",
       'username' => $this->config->item('apiuser'),
        'password' => $this->config->item('apipass'),
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