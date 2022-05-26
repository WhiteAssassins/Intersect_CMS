<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require FCPATH.'vendor/autoload.php';
use GuzzleHttp\Client;
class Apiserverinfo extends CI_Model{
  public function serverinfo(){
    $apiip = $this->config->item('apiip');;
  $this->load->model('Apigettoken');
  $accesstoken = $this->Apigettoken->apitoken();
  $client = new Client([
    'base_uri' => 'http://'.$apiip.'/api/v1/info/config',
    'timeout'  => 5.0,
  ]);
  $res = $client->request('GET','',[
    'headers' => [
      "authorization" => "Bearer ".$accesstoken['access_token'],
    ]
  ]);
    
  
  $serverinfo = json_decode($res->getBody(), true); 
 return $serverinfo; 
  }
    }
