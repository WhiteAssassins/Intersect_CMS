<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require FCPATH.'vendor/autoload.php';
use GuzzleHttp\Client;
class Apimap extends CI_Model{
    public function map(){
      
        $this->load->model('Apigettoken');
        $accesstoken = $this->Apigettoken->apitoken();
        $apiip = $this->config->item('apiip');;
        $client = new Client([
          'base_uri' => 'http://'.$apiip.'/api/v1/gameobjects/map',
          'timeout'  => 5.0,
        ]);
        $res = $client->request('POST','',[
          'headers' => [
            "authorization" => "Bearer ".$accesstoken['access_token'],
          ]
        ]);
          
        
        $maps = json_decode($res->getBody(), true); 
       return $maps; 
    }
}