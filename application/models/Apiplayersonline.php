<?php 
require FCPATH.'vendor/autoload.php';
use GuzzleHttp\Client;
class Apiplayersonline extends CI_Model{
    public function playeronline(){
      
        $this->load->model('Apigettoken');
        $accesstoken = $this->Apigettoken->apitoken();
        $apiip = $this->config->item('apiip');;
        $client = new Client([
          'base_uri' => 'http://'.$apiip.'/api/v1/players/online?pageSize=5000',
          'timeout'  => 5.0,
        ]);
        $res = $client->request('GET','',[
          'headers' => [
            "authorization" => "Bearer ".$accesstoken['access_token'],
          ]
        ]);
          
        
        $playersonline = json_decode($res->getBody(), true); 
       return $playersonline; 
    }
}