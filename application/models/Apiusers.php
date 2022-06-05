<?php 
require FCPATH.'vendor/autoload.php';
use GuzzleHttp\Client;
class Apiusers extends CI_Model{
    public function user(){
      $apiip = $this->config->item('apiip');;
        $this->load->model('Apigettoken');
        $accesstoken = $this->Apigettoken->apitoken();
        $client = new Client([
          'base_uri' => 'http://'.$apiip.'/api/v1/users?pageSize=5000',
          'timeout'  => 5.0,
        ]);
        $res = $client->request('GET','',[
          'headers' => [
            "authorization" => "Bearer ".$accesstoken['access_token'],
          ]
        ]);
          
        
        $users = json_decode($res->getBody(), true); 
       return $users; 
    }
}