<?php 
require FCPATH.'vendor/autoload.php';
use GuzzleHttp\Client;
class Apiserverstats extends CI_Model{
  public function serverinfo(){
    $apiip = $this->config->item('apiip');;
  $this->load->model('Apigettoken');
  $accesstoken = $this->Apigettoken->apitoken();
  $client = new Client([
    'base_uri' => 'http://'.$apiip.'/api/v1/info/stats',
    'timeout'  => 5.0,
  ]);
  $res = $client->request('GET','',[
    'headers' => [
      "authorization" => "Bearer ".$accesstoken['access_token'],
    ]
  ]);
    
  
  $serverstats = json_decode($res->getBody(), true); 
 return $serverstats; 
  }
    }
