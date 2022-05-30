<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require FCPATH.'vendor/autoload.php';
use GuzzleHttp\Client;
class Recover extends CI_Controller {
	function __construct() {
        parent::__construct();
        $this->load->model('Apigettoken');
		$this->load->model('Apiserverinfo');
		$this->load->model('Apiregister');
		$this->load->model('Apiserverstats');
		$this->load->model('Apiusers');
		$this->load->model('Apiplayers');
    }
	
	public function index()
	{	
		$conf = $this->db->get('config');
		$conf1 = $conf->result_array(); 
		if($conf1['0']['mant'] == 1){
			$lang = $this->Langs->lang();
			$this->parser->parse('header', $lang[0]);
			$this->parser->parse('mant', $lang[0]);
		}else{
			$this->load->view('header');
			$this->load->view('recover');
			$this->load->view('footer');
		}

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
        $res = $client->request('GET','',[
          'headers' => [
            "authorization" => "Bearer ".$accesstoken['access_token'],
          ]
        ]);
	}















}
