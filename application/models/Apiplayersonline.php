<?php 
require FCPATH.'vendor/autoload.php';
use GuzzleHttp\Client;
class Apiplayersonline extends CI_Model{
    public function playeronline(){
      try{
        $this->load->model('Apigettoken');
        $accesstoken = $this->Apigettoken->apitoken();
        $apiip = $this->config->item('apiip');;
        $client = new Client([
          'base_uri' => 'http://'.$apiip.'/api/v1/players/online?pageSize=5000',
          'timeout'  => 10.0,
          'http_errors' => false,
        ]);
        $res = $client->request('GET','',[
          'headers' => [
            "authorization" => "Bearer ".$accesstoken['access_token'],
          ]
        ]);
          
        
        $playersonline = json_decode($res->getBody(), true); 
       return $playersonline; 
      }catch(\GuzzleHttp\Exception\ServerException $se){
        return $se->getMessage();
      }catch(Exception $e){
      }
    }
}