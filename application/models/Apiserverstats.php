<?php 
require FCPATH.'vendor/autoload.php';
use GuzzleHttp\Client;
class Apiserverstats extends CI_Model{
  public function serverinfo(){
    $fallback = array(
      'uptime' => 0,
      'onlineCount' => 0,
      'cps' => 0,
    );
    try{ 
    $apiip = $this->config->item('apiip');;
  $this->load->model('Apigettoken');
  $accesstoken = $this->Apigettoken->apitoken();
  if (empty($accesstoken['access_token'])) {
    return $fallback;
  }
  $client = new Client([
    'base_uri' => 'http://'.$apiip.'/api/v1/info/stats',
    'timeout'  => 10.0,
    'http_errors' => false,
  ]);
  $res = $client->request('GET','',[
    'headers' => [
      "authorization" => "Bearer ".$accesstoken['access_token'],
    ]
  ]);
    
  
  $serverstats = json_decode($res->getBody(), true); 
 if ($res->getStatusCode() !== 200 || ! is_array($serverstats)) {
  return $fallback;
 }
 return array_merge($fallback, $serverstats); 
}catch(\GuzzleHttp\Exception\ServerException $se){
  return $fallback;
}catch(Exception $e){
}

return $fallback;


  }
    }
