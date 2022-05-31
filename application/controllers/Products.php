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
        $this->load->model('Langs');
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
        

        $lang = $this->Langs->lang();
			switch($this->session->userdata('lang')){
				case "es":
					$this->parser->parse('header', $lang[0]); 
					$this->parser->parse('navbar', $lang[0]); 
					$this->parser->parse('products/details', $data+ $lang[0]); 
					$this->parser->parse('footer', $lang[0]); 
					break;
				case "en":
					$this->parser->parse('header', $lang[1]); 
					$this->parser->parse('navbar', $lang[1]); 
					$this->parser->parse('products/details', $data+ $lang[1]); 
					$this->parser->parse('footer', $lang[1]); 
					break;
				case "tr":
					$this->parser->parse('header', $lang[2]); 
					$this->parser->parse('navbar', $lang[2]); 
					$this->parser->parse('products/details', $data+ $lang[2]); 
					$this->parser->parse('footer', $lang[2]); 
					break;
				case "jp":
					$this->parser->parse('header', $lang[3]); 
					$this->parser->parse('navbar', $lang[3]); 
					$this->parser->parse('products/details', $data+ $lang[3]); 
					$this->parser->parse('footer', $lang[3]); 
					break;	
				default:
					$this->parser->parse('header', $lang[0]); 
					$this->parser->parse('navbar', $lang[0]); 
					$this->parser->parse('products/detailsome', $data+ $lang[0]); 
					$this->parser->parse('footer', $lang[0]); 
					break;

			}
    }
    

}