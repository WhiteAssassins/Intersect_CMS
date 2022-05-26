<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require FCPATH.'vendor/autoload.php';
use GuzzleHttp\Client;
class Logs extends CI_Controller {
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
		if($this->session->userdata('login') == true AND $this->session->userdata('rol') == 1){
			$this->load->view('header');
			$this->load->view('sidebar');  
			$this->load->view('logs');
			$this->load->view('footer');	
		}else{
			$base_url = base_url();
			header("Location: $base_url");
		}

	}
	















}
