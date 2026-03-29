<?php 
require FCPATH.'vendor/autoload.php';
use GuzzleHttp\Client;
class Apigettoken extends CI_Model{
    public function apitoken(){
    try{ 
    $apiip = $this->config->item('apiip');
    $apiuser = $this->config->item('apiuser');
    $apipass = $this->config->item('apipass');

    if (empty($apiip) || $apiip === 'apipip' || empty($apiuser) || $apiuser === 'apiuser' || empty($apipass) || $apipass === 'apipass') {
      return array('access_token' => null);
    }

    $credentials = [
        'grant_type' => "password",
       'username' => $apiuser,
        'password' => $apipass,
          ];
        $client = new Client([
      'base_uri' => 'http://'.$apiip.'/api/oauth/token',
      'timeout'  => 10.0,
      'http_errors' => false,

      ]);
      $res = $client->request('POST', '', ['form_params' => $credentials]);
      $accesstoken = json_decode($res->getBody(), true);
      if ($res->getStatusCode() !== 200 || ! is_array($accesstoken) || empty($accesstoken['access_token'])) {
        return array('access_token' => null);
      }
      return $accesstoken;


    }catch(\GuzzleHttp\Exception\ServerException $se){
      return array('access_token' => null);
   }catch(Exception $e){
   }

   return array('access_token' => null);
    }
}
