<?php 
require FCPATH.'vendor/autoload.php';
use GuzzleHttp\Client;
class Apigettoken extends CI_Model{
    public function apitoken(){
    try{ 
    $apiip = $this->config->item('apiip');
    $apiuser = [
        'grant_type' => "password",
       'username' => $this->config->item('apiuser'),
        'password' => $this->config->item('apipass'),
          ];
        $client = new Client([
      'base_uri' => 'http://'.$apiip.'/api/oauth/token',
      'timeout'  => 10.0,
      'http_errors' => false,

      ]);
      $res = $client->request('POST', '', ['form_params' => $apiuser]);
      $accesstoken = json_decode($res->getBody(), true);
      return $accesstoken;


    }catch(\GuzzleHttp\Exception\ServerException $se){
      return $se->getMessage();
   }catch(Exception $e){
   }

    }
}