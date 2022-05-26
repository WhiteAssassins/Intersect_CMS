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
		$this->load->view('header');
		$this->load->view('navbar');  
		$this->load->view('news');
		$this->load->view('footer');
	} 
	
	public function details($url_slug){
        $data = array();
        
        //tome los datos del txt
        $data['newss'] = $this->newss->getRows(array('url_slug'=>$url_slug));
        
        //carga la vista
        $this->load->view('header');
		$this->load->view('navbar');  
        $this->load->view('news/details', $data);
        $this->load->view('footer');
    }
}
