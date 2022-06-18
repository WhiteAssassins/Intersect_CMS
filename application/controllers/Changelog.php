<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require FCPATH.'vendor/autoload.php';
use GuzzleHttp\Client;
class Changelog extends CI_Controller {
	function __construct() {
        parent::__construct();
        $this->load->model('Apigettoken');
		$this->load->model('Apiserverinfo');
		$this->load->model('Apiserverstats');
		$this->load->model('Apiusers');
		$this->load->model('Apiplayers');
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
					$this->parser->parse('changelog', $lang[0]); 
					$this->parser->parse('footer', $lang[0]); 
					break;
				case "en":
					$this->parser->parse('header', $lang[1]); 
					$this->parser->parse('navbar', $lang[1]); 
					$this->parser->parse('changelog', $lang[1]); 
					$this->parser->parse('footer', $lang[1]); 
					break;
				case "tr":
					$this->parser->parse('header', $lang[2]); 
					$this->parser->parse('navbar', $lang[2]); 
					$this->parser->parse('changelog', $lang[2]); 
					$this->parser->parse('footer', $lang[2]); 
					break;
				case "jp":
					$this->parser->parse('header', $lang[3]); 
					$this->parser->parse('navbar', $lang[3]); 
					$this->parser->parse('changelog', $lang[3]); 
					$this->parser->parse('footer', $lang[3]); 
					break;
					case "de":
						$this->parser->parse('header', $lang[4]); 
						$this->parser->parse('navbar', $lang[4]); 
						$this->parser->parse('changelog', $lang[4]); 
						$this->parser->parse('footer', $lang[4]); 
						break;	
					case "ru":
						$this->parser->parse('header', $lang[5]); 
						$this->parser->parse('navbar', $lang[5]); 
						$this->parser->parse('changelog', $lang[5]); 
						$this->parser->parse('footer', $lang[5]); 
						break;
					case "zh":
						$this->parser->parse('header', $lang[6]); 
						$this->parser->parse('navbar', $lang[6]); 
						$this->parser->parse('changelog', $lang[6]); 
						$this->parser->parse('footer', $lang[6]); 
						break;	
					case "fr":
						$this->parser->parse('header', $lang[7]); 
						$this->parser->parse('navbar', $lang[7]); 
						$this->parser->parse('changelog', $lang[7]); 
						$this->parser->parse('footer', $lang[7]); 
						break;	
					case "pt":
						$this->parser->parse('header', $lang[8]); 
						$this->parser->parse('navbar', $lang[8]); 
						$this->parser->parse('changelog', $lang[8]); 
						$this->parser->parse('footer', $lang[8]); 
						break;
					case "hi":
						$this->parser->parse('header', $lang[9]); 
						$this->parser->parse('navbar', $lang[9]); 
						$this->parser->parse('changelog', $lang[9]); 
						$this->parser->parse('footer', $lang[9]); 
						break;	
					case "ar":
						$this->parser->parse('header', $lang[10]); 
						$this->parser->parse('navbar', $lang[10]); 
						$this->parser->parse('changelog', $lang[10]); 
						$this->parser->parse('footer', $lang[10]); 
						break;						
				default:
					$this->parser->parse('header', $lang[0]); 
					$this->parser->parse('navbar', $lang[0]); 
					$this->parser->parse('changelog', $lang[0]); 
					$this->parser->parse('footer', $lang[0]); 
					break;
                    }
        } 
       
	}
	
}
