<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Products extends CI_Controller {
    
    function __construct() {
        parent::__construct();
        $this->load->model('product');
        $this->load->helper('common');
        $this->load->library('form_validation');
        $this->load->model('Apigettoken');
		$this->load->model('Apiserverinfo');
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
					case "de":
						$this->parser->parse('header', $lang[4]); 
						$this->parser->parse('navbar', $lang[4]); 
						$this->parser->parse('products/details', $data+ $lang[4]); 
						$this->parser->parse('footer', $lang[4]); 
						break;	
					case "ru":
						$this->parser->parse('header', $lang[5]); 
						$this->parser->parse('navbar', $lang[5]); 
						$this->parser->parse('products/details', $data+ $lang[5]); 
						$this->parser->parse('footer', $lang[5]); 
						break;
					case "zh":
						$this->parser->parse('header', $lang[6]); 
						$this->parser->parse('navbar', $lang[6]); 
						$this->parser->parse('products/details', $data+ $lang[6]); 
						$this->parser->parse('footer', $lang[6]); 
						break;	
					case "fr":
						$this->parser->parse('header', $lang[7]); 
						$this->parser->parse('navbar', $lang[7]); 
						$this->parser->parse('products/details', $data+ $lang[7]); 
						$this->parser->parse('footer', $lang[7]); 
						break;	
					case "pt":
						$this->parser->parse('header', $lang[8]); 
						$this->parser->parse('navbar', $lang[8]); 
						$this->parser->parse('products/details', $data+ $lang[8]); 
						$this->parser->parse('footer', $lang[8]); 
						break;
					case "hi":
						$this->parser->parse('header', $lang[9]); 
						$this->parser->parse('navbar', $lang[9]); 
						$this->parser->parse('products/details', $data+ $lang[9]); 
						$this->parser->parse('footer', $lang[9]); 
						break;	
					case "ar":
						$this->parser->parse('header', $lang[10]); 
						$this->parser->parse('navbar', $lang[10]); 
						$this->parser->parse('products/details', $data+ $lang[10]); 
						$this->parser->parse('footer', $lang[10]); 
						break;	
				default:
					$this->parser->parse('header', $lang[0]); 
					$this->parser->parse('navbar', $lang[0]); 
					$this->parser->parse('products/details', $data+ $lang[0]); 
					$this->parser->parse('footer', $lang[0]); 
					break;

			}
    }
    

}