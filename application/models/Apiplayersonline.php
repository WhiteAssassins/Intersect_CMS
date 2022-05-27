<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require FCPATH.'vendor/autoload.php';
use GuzzleHttp\Client;
class Apiplayersonline extends CI_Model{
    public function playeronline(){
      
        $this->load->model('Apigettoken');
        $accesstoken = $this->Apigettoken->apitoken();
        $apiip = $this->config->item('apiip');;
        $client = new Client([
          'base_uri' => 'http://'.$apiip.'/api/v1/players/online',
          'timeout'  => 5.0,
          'pageSize'  => 50,
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