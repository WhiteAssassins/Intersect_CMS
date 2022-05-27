<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require FCPATH.'vendor/autoload.php';
use GuzzleHttp\Client;
class News extends CI_Controller {
	function __construct() {
        parent::__construct();
		$this->load->model('newss');
        $this->load->helper('common');
        $this->load->library('form_validation');
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
       if($conf1['0']['mant'] == 1 AND $this->session->userdata('login') == false){
            $this->load->view('header');
            $this->load->view('mant');
        }else{
		$this->load->view('header');
		$this->load->view('navbar');  
		$this->load->view('news');
		$this->load->view('footer');
		}
	} 
	
	public function details($url_slug){
        $data = array();
        
        $data['newss'] = $this->newss->getRows(array('url_slug'=>$url_slug));
        
        $this->load->view('header');
		$this->load->view('navbar');  
        $this->load->view('news/details', $data);
        $this->load->view('footer');
    }
}
