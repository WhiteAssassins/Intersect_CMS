<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require FCPATH.'vendor/autoload.php';
use GuzzleHttp\Client;
class Recover extends MY_Controller {
	function __construct() {
        parent::__construct();
        $this->load->model('Apigettoken');
    }
	
	public function index()
	{
        if ($this->isMaintenanceEnabled()) {
            $this->redirectTo('mant');
            return;
        }

        $this->renderMinimalPage('recover');
	}
	

	public function rec(){
		$user = $this->input->post('user');
		$this->load->model('Apigettoken');
        $accesstoken = $this->Apigettoken->apitoken();
        $apiip = $this->config->item('apiip');;
        $client = new Client([
          'base_uri' => 'http://'.$apiip.'/api/v1/users/'.$user.'/password/reset',
          'timeout'  => 5.0,
        ]);
        $client->request('GET','',[
          'headers' => [
            "authorization" => "Bearer ".$accesstoken['access_token'],
          ]
        ]);
	}















}
