<?php 
require FCPATH.'vendor/autoload.php';
use GuzzleHttp\Client;
class Apiobjects extends CI_Model{
    public function object(){
      try{
        $this->load->model('Apigettoken');
        $accesstoken = $this->Apigettoken->apitoken();
        $apiip = $this->config->item('apiip');;
        $client = new Client([
          'base_uri' => 'http://'.$apiip.'/api/v1/gameobjects/item?pageSize=5000',
          'timeout'  => 10.0,
          'http_errors' => false,
        ]);
        $res = $client->request('POST','',[
          'headers' => [
            "authorization" => "Bearer ".$accesstoken['access_token'],
          ]
        ]);
          
        
        $objects = json_decode($res->getBody(), true); 
       return $objects; 
      }catch(\GuzzleHttp\Exception\ServerException $se){
        return $se->getMessage();
      }catch(Exception $e){
      }
    }
}