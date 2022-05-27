<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require FCPATH.'vendor/autoload.php';
use GuzzleHttp\Client;
class Playersonline extends CI_Controller {
	function __construct() {
        parent::__construct();
        $this->load->model('Apigettoken');
		$this->load->model('Apiserverinfo');
		$this->load->model('Apiregister');
		$this->load->model('Apiserverstats');
		$this->load->model('Apiusers');
		$this->load->model('Apiplayers');
        $this->load->model('Apiplayersonline');
    }
	
	public function index()
	{	
		$conf = $this->db->get('config');
		$conf1 = $conf->result_array(); 
       if($conf1['0']['mant'] == 1 AND $this->session->userdata('login') == false){
            $this->load->view('header');
            $this->load->view('mant');
        }else{
		$this->load->view('header');
		$this->load->view('navbar');  
		$this->load->view('playersonline');
		$this->load->view('footer');
		}
	}
	
	
}
