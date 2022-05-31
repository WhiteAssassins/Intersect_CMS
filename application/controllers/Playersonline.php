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
		$this->load->model('Langs');
    }
	
	public function index()
	{	
		$conf = $this->db->get('config');
		$conf1 = $conf->result_array(); 
       if($conf1['0']['mant'] == 1 AND $this->session->userdata('login') == false){
		$base_url = base_url();
		header("Location: $base_url/mant");
        }else{
			$lang = $this->Langs->lang();
			switch($this->session->userdata('lang')){
				case "es":
					$this->parser->parse('header', $lang[0]); 
					$this->parser->parse('navbar', $lang[0]); 
					$this->parser->parse('playersonline', $lang[0]); 
					$this->parser->parse('footer', $lang[0]); 
					break;
				case "en":
					$this->parser->parse('header', $lang[1]); 
					$this->parser->parse('navbar', $lang[1]); 
					$this->parser->parse('playersonline', $lang[1]); 
					$this->parser->parse('footer', $lang[1]); 
					break;
				case "tr":
					$this->parser->parse('header', $lang[2]); 
					$this->parser->parse('navbar', $lang[2]); 
					$this->parser->parse('playersonline', $lang[2]); 
					$this->parser->parse('footer', $lang[2]); 
					break;
				case "jp":
					$this->parser->parse('header', $lang[3]); 
					$this->parser->parse('navbar', $lang[3]); 
					$this->parser->parse('playersonline', $lang[3]); 
					$this->parser->parse('footer', $lang[3]); 
					break;	
				default:
					$this->parser->parse('header', $lang[0]); 
					$this->parser->parse('navbar', $lang[0]); 
					$this->parser->parse('playersonline', $lang[0]); 
					$this->parser->parse('footer', $lang[0]); 
					break;

			}
		}
	}
	
	
}
