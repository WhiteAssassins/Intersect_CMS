<?php 
require FCPATH.'vendor/autoload.php';
use GuzzleHttp\Client;
class Apiserverinfo extends CI_Model{
  public function serverinfo(){
    $fallback = array(
      'GameName' => 'Intersect CMS',
    );
    try{ 
    $apiip = $this->config->item('apiip');;
  $this->load->model('Apigettoken');
  $accesstoken = $this->Apigettoken->apitoken();
  if (empty($accesstoken['access_token'])) {
    return $fallback;
  }
  $client = new Client([
    'base_uri' => 'http://'.$apiip.'/api/v1/info/config',
    'timeout'  => 10.0,
    'http_errors' => false,
  ]);
  $res = $client->request('GET','',[
    'headers' => [
      "authorization" => "Bearer ".$accesstoken['access_token'],
    ]
  ]);
    
  
  $serverinfo = json_decode($res->getBody(), true); 
 if ($res->getStatusCode() !== 200 || ! is_array($serverinfo)) {
  return $fallback;
 }
 return array_merge($fallback, $serverinfo); 


}catch(\GuzzleHttp\Exception\ServerException $se){
  return $fallback;
}catch(Exception $e){
}

return $fallback;


  }
    }
