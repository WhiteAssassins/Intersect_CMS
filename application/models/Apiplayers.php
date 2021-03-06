<?php 
require FCPATH.'vendor/autoload.php';
use GuzzleHttp\Client;
class Apiplayers extends CI_Model{
    public function player(){
      try{
        $this->load->model('Apigettoken');
        $accesstoken = $this->Apigettoken->apitoken();
        $apiip = $this->config->item('apiip');;
        $client = new Client([
          'base_uri' => 'http://'.$apiip.'/api/v1/players?pageSize=5000',
          'timeout'  => 10.0,
          'http_errors' => false,
        ]);
        $res = $client->request('GET','',[
          'headers' => [
            "authorization" => "Bearer ".$accesstoken['access_token'],
          ]
        ]);
          
        
        $players = json_decode($res->getBody(), true); 
       return $players; 
      }catch(\GuzzleHttp\Exception\ServerException $se){
        return $se->getMessage();
      }catch(Exception $e){
      }
    }
}