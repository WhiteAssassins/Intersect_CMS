<?php 
require FCPATH.'vendor/autoload.php';
use GuzzleHttp\Client;
class Apiserverinfo extends CI_Model{
  public function serverinfo(){
    try{ 
    $apiip = $this->config->item('apiip');;
  $this->load->model('Apigettoken');
  $accesstoken = $this->Apigettoken->apitoken();
  $client = new Client([
    'base_uri' => 'http://'.$apiip.'/api/v1/info/config',
    'timeout'  => 10.0,
    'http_errors' => false,
  ]);
  $res = $client->request('GET','',[
    'headers' => [
      "authorization" => "Bearer ".$accesstoken['access_token'],
    ]
  ]);
    
  
  $serverinfo = json_decode($res->getBody(), true); 
 return $serverinfo; 


}catch(\GuzzleHttp\Exception\ServerException $se){
  return $se->getMessage();
}catch(Exception $e){
}



  }
    }
