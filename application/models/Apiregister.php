<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require FCPATH.'vendor/autoload.php';
use GuzzleHttp\Client;
class Apiregister extends CI_Model{
    public function register(){
        $apiip = $this->config->item('apiip');
        

    }
}