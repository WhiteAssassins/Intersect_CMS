<?php 
require FCPATH.'vendor/autoload.php';
use GuzzleHttp\Client;
class Apiplayers extends CI_Model{
    public function player(){
      $fallback = array(
        'Total' => 0,
        'Entries' => array(),
      );
      try{
        $this->load->model('Apigettoken');
        $accesstoken = $this->Apigettoken->apitoken();
        if (empty($accesstoken['access_token'])) {
          return $fallback;
        }
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
        if ($res->getStatusCode() !== 200 || ! is_array($players)) {
          return $fallback;
        }
       return array_merge($fallback, $players); 
      }catch(\GuzzleHttp\Exception\ServerException $se){
        return $fallback;
      }catch(Exception $e){
      }
      return $fallback;
    }
}
