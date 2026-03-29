<?php 
require FCPATH.'vendor/autoload.php';
use GuzzleHttp\Client;
class Apiusers extends CI_Model{
    public function user(){
      $fallback = array(
        'Total' => 0,
        'Entries' => array(),
      );
      try{
      $apiip = $this->config->item('apiip');;
        $this->load->model('Apigettoken');
        $accesstoken = $this->Apigettoken->apitoken();
        if (empty($accesstoken['access_token'])) {
          return $fallback;
        }
        $client = new Client([
          'base_uri' => 'http://'.$apiip.'/api/v1/users?pageSize=5000',
          'timeout'  => 10.0,
          'http_errors' => false,
        ]);
        $res = $client->request('GET','',[
          'headers' => [
            "authorization" => "Bearer ".$accesstoken['access_token'],
          ]
        ]);
          
        
        $users = json_decode($res->getBody(), true); 
        if ($res->getStatusCode() !== 200 || ! is_array($users)) {
          return $fallback;
        }
       return array_merge($fallback, $users); 
      }catch(\GuzzleHttp\Exception\ServerException $se){
        return $fallback;
      }catch(Exception $e){
      }
      return $fallback;
    }
}
