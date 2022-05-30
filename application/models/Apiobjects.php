<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require FCPATH.'vendor/autoload.php';
use GuzzleHttp\Client;
class Apiobjects extends CI_Model{
    public function object(){
      
        $this->load->model('Apigettoken');
        $accesstoken = $this->Apigettoken->apitoken();
        $apiip = $this->config->item('apiip');;
        $client = new Client([
          'base_uri' => 'http://'.$apiip.'/api/v1/gameobjects/item?pageSize=5000',
          'timeout'  => 5.0,
        ]);
        $res = $client->request('POST','',[
          'headers' => [
            "authorization" => "Bearer ".$accesstoken['access_token'],
          ]
        ]);
          
        
        $objects = json_decode($res->getBody(), true); 
       return $objects; 
    }
}