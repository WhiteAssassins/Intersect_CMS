<?php 
require FCPATH.'vendor/autoload.php';
use GuzzleHttp\Client;
class Apievent extends CI_Model{
    public function event(){
      
        $this->load->model('Apigettoken');
        $accesstoken = $this->Apigettoken->apitoken();
        $apiip = $this->config->item('apiip');;
        $client = new Client([
          'base_uri' => 'http://'.$apiip.'/api/v1/gameobjects/event?pageSize=5000',
          'timeout'  => 5.0,
        ]);
        $res = $client->request('POST','',[
          'headers' => [
            "authorization" => "Bearer ".$accesstoken['access_token'],
          ]
        ]);
          
        
        $events = json_decode($res->getBody(), true); 
       return $events; 
    }
}