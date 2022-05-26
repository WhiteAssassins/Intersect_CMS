<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Products extends CI_Controller {
    
    function __construct() {
        parent::__construct();
        $this->load->model('product');
        $this->load->helper('common');
        $this->load->library('form_validation');
        $this->load->model('Apigettoken');
		$this->load->model('Apiserverinfo');
		$this->load->model('Apiregister');
		$this->load->model('Apiserverstats');
		$this->load->model('Apiusers');
		$this->load->model('Apiplayers');
    }
    
    public function index(){
        $data = array();
        
        $data['products'] = $this->product->getRows(array('limit'=>10));
        
        $this->load->view('header');
		$this->load->view('navbar');
        $this->load->view('shop', $data);
        $this->load->view('footer');
    }
    
    public function details($url_slug){
        $data = array();
        
        $data['products'] = $this->product->getRows(array('url_slug'=>$url_slug));
        
        $this->load->view('header');
		$this->load->view('navbar');  
        $this->load->view('products/details', $data);
        $this->load->view('footer');
    }
    

}