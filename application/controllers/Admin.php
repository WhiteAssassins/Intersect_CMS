<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require FCPATH.'vendor/autoload.php';
use GuzzleHttp\Client;
class Admin extends CI_Controller {
	function __construct() {
        parent::__construct();
        $this->load->model('Apigettoken');
		$this->load->model('Apiserverinfo');
		$this->load->model('Apiserverstats');
		$this->load->model('Apiusers');
		$this->load->model('Apiobjects');
		$this->load->model('Apiplayers');
		$this->load->model('Apimap');
		$this->load->model('Apievent');
		$this->load->model('Apiquest');
		$this->load->model('Apiplayersonline');
		$this->load->model('newss');
		$this->load->model('shops');
        $this->load->helper('common');
        $this->load->library('form_validation');
		$this->load->model('Langs');
    }
	

	/*
	////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	////////////////////////////////////////////////////////////Start Load Views///////////////////////////////////////////////////////////////////////////////////
	//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	*/
	public function index(){	
		if($this->session->userdata('login') == true AND $this->session->userdata('rol') == 1){
			$lang = $this->Langs->lang();
			switch($this->session->userdata('lang')){
				case "es":
					$this->parser->parse('header', $lang[0]); 
					$this->parser->parse('sidebar', $lang[0]); 
					$this->parser->parse('admin', $lang[0]); 
					$this->parser->parse('footer', $lang[0]); 
					break;
				case "en":
					$this->parser->parse('header', $lang[1]); 
					$this->parser->parse('sidebar', $lang[1]); 
					$this->parser->parse('admin', $lang[1]); 
					$this->parser->parse('footer', $lang[1]); 
					break;
				case "tr":
					$this->parser->parse('header', $lang[2]); 
					$this->parser->parse('sidebar', $lang[2]); 
					$this->parser->parse('admin', $lang[2]); 
					$this->parser->parse('footer', $lang[2]); 
					break;
				case "jp":
					$this->parser->parse('header', $lang[3]); 
					$this->parser->parse('sidebar', $lang[3]); 
					$this->parser->parse('admin', $lang[3]); 
					$this->parser->parse('footer', $lang[3]); 
					break;
					case "de":
						$this->parser->parse('header', $lang[4]); 
						$this->parser->parse('sidebar', $lang[4]); 
						$this->parser->parse('admin', $lang[4]); 
						$this->parser->parse('footer', $lang[4]); 
						break;	
					case "ru":
						$this->parser->parse('header', $lang[5]); 
						$this->parser->parse('sidebar', $lang[5]); 
						$this->parser->parse('admin', $lang[5]); 
						$this->parser->parse('footer', $lang[5]); 
						break;
					case "zh":
						$this->parser->parse('header', $lang[6]); 
						$this->parser->parse('sidebar', $lang[6]); 
						$this->parser->parse('admin', $lang[6]); 
						$this->parser->parse('footer', $lang[6]); 
						break;	
					case "fr":
						$this->parser->parse('header', $lang[7]); 
						$this->parser->parse('sidebar', $lang[7]); 
						$this->parser->parse('admin', $lang[7]); 
						$this->parser->parse('footer', $lang[7]); 
						break;	
					case "pt":
						$this->parser->parse('header', $lang[8]); 
						$this->parser->parse('sidebar', $lang[8]); 
						$this->parser->parse('admin', $lang[8]); 
						$this->parser->parse('footer', $lang[8]); 
						break;
					case "hi":
						$this->parser->parse('header', $lang[9]); 
						$this->parser->parse('sidebar', $lang[9]); 
						$this->parser->parse('admin', $lang[9]); 
						$this->parser->parse('footer', $lang[9]); 
						break;	
					case "ar":
						$this->parser->parse('header', $lang[10]); 
						$this->parser->parse('sidebar', $lang[10]); 
						$this->parser->parse('admin', $lang[10]); 
						$this->parser->parse('footer', $lang[10]); 
						break;		
				default:
					$this->parser->parse('header', $lang[0]); 
					$this->parser->parse('sidebar', $lang[0]); 
					$this->parser->parse('admin', $lang[0]); 
					$this->parser->parse('footer', $lang[0]); 
					break;

			}
	}else{
		$base_url = base_url();
		header("Location: $base_url");
	}
	}
	public function news(){
		if($this->session->userdata('login') == true AND $this->session->userdata('rol') == 1){
			$lang = $this->Langs->lang();
			switch($this->session->userdata('lang')){
				case "es":
					$this->parser->parse('header', $lang[0]); 
					$this->parser->parse('sidebar', $lang[0]); 
					$this->parser->parse('admin/news', $lang[0]); 
					$this->parser->parse('footer', $lang[0]); 
					break;
				case "en":
					$this->parser->parse('header', $lang[1]); 
					$this->parser->parse('sidebar', $lang[1]); 
					$this->parser->parse('admin/news', $lang[1]); 
					$this->parser->parse('footer', $lang[1]); 
					break;
				case "tr":
					$this->parser->parse('header', $lang[2]); 
					$this->parser->parse('sidebar', $lang[2]); 
					$this->parser->parse('admin/news', $lang[2]); 
					$this->parser->parse('footer', $lang[2]); 
					break;
				case "jp":
					$this->parser->parse('header', $lang[3]); 
					$this->parser->parse('sidebar', $lang[3]); 
					$this->parser->parse('admin/news', $lang[3]); 
					$this->parser->parse('footer', $lang[3]); 
					break;
					case "de":
						$this->parser->parse('header', $lang[4]); 
						$this->parser->parse('sidebar', $lang[4]); 
						$this->parser->parse('admin/news', $lang[4]); 
						$this->parser->parse('footer', $lang[4]); 
						break;	
					case "ru":
						$this->parser->parse('header', $lang[5]); 
						$this->parser->parse('sidebar', $lang[5]); 
						$this->parser->parse('admin/news', $lang[5]); 
						$this->parser->parse('footer', $lang[5]); 
						break;
					case "zh":
						$this->parser->parse('header', $lang[6]); 
						$this->parser->parse('sidebar', $lang[6]); 
						$this->parser->parse('admin/news', $lang[6]); 
						$this->parser->parse('footer', $lang[6]); 
						break;	
					case "fr":
						$this->parser->parse('header', $lang[7]); 
						$this->parser->parse('sidebar', $lang[7]); 
						$this->parser->parse('admin/news', $lang[7]); 
						$this->parser->parse('footer', $lang[7]); 
						break;	
					case "pt":
						$this->parser->parse('header', $lang[8]); 
						$this->parser->parse('sidebar', $lang[8]); 
						$this->parser->parse('admin/news', $lang[8]); 
						$this->parser->parse('footer', $lang[8]); 
						break;
					case "hi":
						$this->parser->parse('header', $lang[9]); 
						$this->parser->parse('sidebar', $lang[9]); 
						$this->parser->parse('admin/news', $lang[9]); 
						$this->parser->parse('footer', $lang[9]); 
						break;	
					case "ar":
						$this->parser->parse('header', $lang[10]); 
						$this->parser->parse('sidebar', $lang[10]); 
						$this->parser->parse('admin/news', $lang[10]); 
						$this->parser->parse('footer', $lang[10]); 
						break;							
				default:
					$this->parser->parse('header', $lang[0]); 
					$this->parser->parse('sidebar', $lang[0]); 
					$this->parser->parse('admin/news', $lang[0]); 
					$this->parser->parse('footer', $lang[0]); 
					break;

			}
	}else{
		$base_url = base_url();
		header("Location: $base_url");
	}
	}
	public function shop(){
		if($this->session->userdata('login') == true AND $this->session->userdata('rol') == 1){
			$lang = $this->Langs->lang();
			switch($this->session->userdata('lang')){
				case "es":
					$this->parser->parse('header', $lang[0]); 
					$this->parser->parse('sidebar', $lang[0]); 
					$this->parser->parse('admin/shop', $lang[0]); 
					$this->parser->parse('footer', $lang[0]); 
					break;
				case "en":
					$this->parser->parse('header', $lang[1]); 
					$this->parser->parse('sidebar', $lang[1]); 
					$this->parser->parse('admin/shop', $lang[1]); 
					$this->parser->parse('footer', $lang[1]); 
					break;
				case "tr":
					$this->parser->parse('header', $lang[2]); 
					$this->parser->parse('sidebar', $lang[2]); 
					$this->parser->parse('admin/shop', $lang[2]); 
					$this->parser->parse('footer', $lang[2]); 
					break;
				case "jp":
					$this->parser->parse('header', $lang[3]); 
					$this->parser->parse('sidebar', $lang[3]); 
					$this->parser->parse('admin/shop', $lang[3]); 
					$this->parser->parse('footer', $lang[3]); 
					break;	
					case "de":
						$this->parser->parse('header', $lang[4]); 
						$this->parser->parse('sidebar', $lang[4]); 
						$this->parser->parse('admin/shop', $lang[4]); 
						$this->parser->parse('footer', $lang[4]); 
						break;	
					case "ru":
						$this->parser->parse('header', $lang[5]); 
						$this->parser->parse('sidebar', $lang[5]); 
						$this->parser->parse('admin/shop', $lang[5]); 
						$this->parser->parse('footer', $lang[5]); 
						break;
					case "zh":
						$this->parser->parse('header', $lang[6]); 
						$this->parser->parse('sidebar', $lang[6]); 
						$this->parser->parse('admin/shop', $lang[6]); 
						$this->parser->parse('footer', $lang[6]); 
						break;	
					case "fr":
						$this->parser->parse('header', $lang[7]); 
						$this->parser->parse('sidebar', $lang[7]); 
						$this->parser->parse('admin/shop', $lang[7]); 
						$this->parser->parse('footer', $lang[7]); 
						break;	
					case "pt":
						$this->parser->parse('header', $lang[8]); 
						$this->parser->parse('sidebar', $lang[8]); 
						$this->parser->parse('admin/shop', $lang[8]); 
						$this->parser->parse('footer', $lang[8]); 
						break;
					case "hi":
						$this->parser->parse('header', $lang[9]); 
						$this->parser->parse('sidebar', $lang[9]); 
						$this->parser->parse('admin/shop', $lang[9]); 
						$this->parser->parse('footer', $lang[9]); 
						break;	
					case "ar":
						$this->parser->parse('header', $lang[10]); 
						$this->parser->parse('sidebar', $lang[10]); 
						$this->parser->parse('admin/shop', $lang[10]); 
						$this->parser->parse('footer', $lang[10]); 
						break;					
				default:
					$this->parser->parse('header', $lang[0]); 
					$this->parser->parse('sidebar', $lang[0]); 
					$this->parser->parse('admin/shop', $lang[0]); 
					$this->parser->parse('footer', $lang[0]); 
					break;

			}
	}else{
		$base_url = base_url();
		header("Location: $base_url");
	}
	}
	public function adminaccounts(){
		if($this->session->userdata('login') == true AND $this->session->userdata('rol') == 1){
			$lang = $this->Langs->lang();
			switch($this->session->userdata('lang')){
				case "es":
					$this->parser->parse('header', $lang[0]); 
					$this->parser->parse('sidebar', $lang[0]); 
					$this->parser->parse('admin/adminaccounts', $lang[0]); 
					$this->parser->parse('footer', $lang[0]); 
					break;
				case "en":
					$this->parser->parse('header', $lang[1]); 
					$this->parser->parse('sidebar', $lang[1]); 
					$this->parser->parse('admin/adminaccounts', $lang[1]); 
					$this->parser->parse('footer', $lang[1]); 
					break;
				case "tr":
					$this->parser->parse('header', $lang[2]); 
					$this->parser->parse('sidebar', $lang[2]); 
					$this->parser->parse('admin/adminaccounts', $lang[2]); 
					$this->parser->parse('footer', $lang[2]); 
					break;
				case "jp":
					$this->parser->parse('header', $lang[3]); 
					$this->parser->parse('sidebar', $lang[3]); 
					$this->parser->parse('admin/adminaccounts', $lang[3]); 
					$this->parser->parse('footer', $lang[3]); 
					break;
					case "de":
						$this->parser->parse('header', $lang[4]); 
						$this->parser->parse('sidebar', $lang[4]); 
						$this->parser->parse('admin/adminaccounts', $lang[4]); 
						$this->parser->parse('footer', $lang[4]); 
						break;	
					case "ru":
						$this->parser->parse('header', $lang[5]); 
						$this->parser->parse('sidebar', $lang[5]); 
						$this->parser->parse('admin/adminaccounts', $lang[5]); 
						$this->parser->parse('footer', $lang[5]); 
						break;
					case "zh":
						$this->parser->parse('header', $lang[6]); 
						$this->parser->parse('sidebar', $lang[6]); 
						$this->parser->parse('admin/adminaccounts', $lang[6]); 
						$this->parser->parse('footer', $lang[6]); 
						break;	
					case "fr":
						$this->parser->parse('header', $lang[7]); 
						$this->parser->parse('sidebar', $lang[7]); 
						$this->parser->parse('admin/adminaccounts', $lang[7]); 
						$this->parser->parse('footer', $lang[7]); 
						break;	
					case "pt":
						$this->parser->parse('header', $lang[8]); 
						$this->parser->parse('sidebar', $lang[8]); 
						$this->parser->parse('admin/adminaccounts', $lang[8]); 
						$this->parser->parse('footer', $lang[8]); 
						break;
					case "hi":
						$this->parser->parse('header', $lang[9]); 
						$this->parser->parse('sidebar', $lang[9]); 
						$this->parser->parse('admin/adminaccounts', $lang[9]); 
						$this->parser->parse('footer', $lang[9]); 
						break;	
					case "ar":
						$this->parser->parse('header', $lang[10]); 
						$this->parser->parse('sidebar', $lang[10]); 
						$this->parser->parse('admin/adminaccounts', $lang[10]); 
						$this->parser->parse('footer', $lang[10]); 
						break;				
				default:
					$this->parser->parse('header', $lang[0]); 
					$this->parser->parse('sidebar', $lang[0]); 
					$this->parser->parse('admin/adminaccounts', $lang[0]); 
					$this->parser->parse('footer', $lang[0]); 
					break;

			}
	}else{
		$base_url = base_url();
		header("Location: $base_url");
	}
	}
	public function objects(){
		if($this->session->userdata('login') == true AND $this->session->userdata('rol') == 1){
			$lang = $this->Langs->lang();
			switch($this->session->userdata('lang')){
				case "es":
					$this->parser->parse('header', $lang[0]); 
					$this->parser->parse('sidebar', $lang[0]); 
					$this->parser->parse('admin/objects', $lang[0]); 
					$this->parser->parse('footer', $lang[0]); 
					break;
				case "en":
					$this->parser->parse('header', $lang[1]); 
					$this->parser->parse('sidebar', $lang[1]); 
					$this->parser->parse('admin/objects', $lang[1]); 
					$this->parser->parse('footer', $lang[1]); 
					break;
				case "tr":
					$this->parser->parse('header', $lang[2]); 
					$this->parser->parse('sidebar', $lang[2]); 
					$this->parser->parse('admin/objects', $lang[2]); 
					$this->parser->parse('footer', $lang[2]); 
					break;
				case "jp":
					$this->parser->parse('header', $lang[3]); 
					$this->parser->parse('sidebar', $lang[3]); 
					$this->parser->parse('admin/object', $lang[3]); 
					$this->parser->parse('footer', $lang[3]); 
					break;	
					case "de":
						$this->parser->parse('header', $lang[4]); 
						$this->parser->parse('sidebar', $lang[4]); 
						$this->parser->parse('admin/object', $lang[4]); 
						$this->parser->parse('footer', $lang[4]); 
						break;	
					case "ru":
						$this->parser->parse('header', $lang[5]); 
						$this->parser->parse('sidebar', $lang[5]); 
						$this->parser->parse('admin/object', $lang[5]); 
						$this->parser->parse('footer', $lang[5]); 
						break;
					case "zh":
						$this->parser->parse('header', $lang[6]); 
						$this->parser->parse('sidebar', $lang[6]); 
						$this->parser->parse('admin/object', $lang[6]); 
						$this->parser->parse('footer', $lang[6]); 
						break;	
					case "fr":
						$this->parser->parse('header', $lang[7]); 
						$this->parser->parse('sidebar', $lang[7]); 
						$this->parser->parse('admin/object', $lang[7]); 
						$this->parser->parse('footer', $lang[7]); 
						break;	
					case "pt":
						$this->parser->parse('header', $lang[8]); 
						$this->parser->parse('sidebar', $lang[8]); 
						$this->parser->parse('admin/object', $lang[8]); 
						$this->parser->parse('footer', $lang[8]); 
						break;
					case "hi":
						$this->parser->parse('header', $lang[9]); 
						$this->parser->parse('sidebar', $lang[9]); 
						$this->parser->parse('admin/object', $lang[9]); 
						$this->parser->parse('footer', $lang[9]); 
						break;	
					case "ar":
						$this->parser->parse('header', $lang[10]); 
						$this->parser->parse('sidebar', $lang[10]); 
						$this->parser->parse('admin/object', $lang[10]); 
						$this->parser->parse('footer', $lang[10]); 
						break;	
				default:
					$this->parser->parse('header', $lang[0]); 
					$this->parser->parse('sidebar', $lang[0]); 
					$this->parser->parse('admin/objects', $lang[0]); 
					$this->parser->parse('footer', $lang[0]); 
					break;

			}
	}else{
		$base_url = base_url();
		header("Location: $base_url");
	}
	}
	public function maps(){
		if($this->session->userdata('login') == true AND $this->session->userdata('rol') == 1){
			$lang = $this->Langs->lang();
			switch($this->session->userdata('lang')){
				case "es":
					$this->parser->parse('header', $lang[0]); 
					$this->parser->parse('sidebar', $lang[0]); 
					$this->parser->parse('admin/maps', $lang[0]); 
					$this->parser->parse('footer', $lang[0]); 
					break;
				case "en":
					$this->parser->parse('header', $lang[1]); 
					$this->parser->parse('sidebar', $lang[1]); 
					$this->parser->parse('admin/maps', $lang[1]); 
					$this->parser->parse('footer', $lang[1]); 
					break;
				case "tr":
					$this->parser->parse('header', $lang[2]); 
					$this->parser->parse('sidebar', $lang[2]); 
					$this->parser->parse('admin/maps', $lang[2]); 
					$this->parser->parse('footer', $lang[2]); 
					break;
				case "jp":
					$this->parser->parse('header', $lang[3]); 
					$this->parser->parse('sidebar', $lang[3]); 
					$this->parser->parse('admin/maps', $lang[3]); 
					$this->parser->parse('footer', $lang[3]); 
					break;	
					case "de":
						$this->parser->parse('header', $lang[4]); 
						$this->parser->parse('sidebar', $lang[4]); 
						$this->parser->parse('admin/maps', $lang[4]); 
						$this->parser->parse('footer', $lang[4]); 
						break;	
					case "ru":
						$this->parser->parse('header', $lang[5]); 
						$this->parser->parse('sidebar', $lang[5]); 
						$this->parser->parse('admin/maps', $lang[5]); 
						$this->parser->parse('footer', $lang[5]); 
						break;
					case "zh":
						$this->parser->parse('header', $lang[6]); 
						$this->parser->parse('sidebar', $lang[6]); 
						$this->parser->parse('admin/maps', $lang[6]); 
						$this->parser->parse('footer', $lang[6]); 
						break;	
					case "fr":
						$this->parser->parse('header', $lang[7]); 
						$this->parser->parse('sidebar', $lang[7]); 
						$this->parser->parse('admin/maps', $lang[7]); 
						$this->parser->parse('footer', $lang[7]); 
						break;	
					case "pt":
						$this->parser->parse('header', $lang[8]); 
						$this->parser->parse('sidebar', $lang[8]); 
						$this->parser->parse('admin/maps', $lang[8]); 
						$this->parser->parse('footer', $lang[8]); 
						break;
					case "hi":
						$this->parser->parse('header', $lang[9]); 
						$this->parser->parse('sidebar', $lang[9]); 
						$this->parser->parse('admin/maps', $lang[9]); 
						$this->parser->parse('footer', $lang[9]); 
						break;	
					case "ar":
						$this->parser->parse('header', $lang[10]); 
						$this->parser->parse('sidebar', $lang[10]); 
						$this->parser->parse('admin/maps', $lang[10]); 
						$this->parser->parse('footer', $lang[10]); 
						break;	
				default:
					$this->parser->parse('header', $lang[0]); 
					$this->parser->parse('sidebar', $lang[0]); 
					$this->parser->parse('admin/maps', $lang[0]); 
					$this->parser->parse('footer', $lang[0]); 
					break;

			}
	}else{
		$base_url = base_url();
		header("Location: $base_url");
	}
	}
	public function events(){
		if($this->session->userdata('login') == true AND $this->session->userdata('rol') == 1){
			$lang = $this->Langs->lang();
			switch($this->session->userdata('lang')){
				case "es":
					$this->parser->parse('header', $lang[0]); 
					$this->parser->parse('sidebar', $lang[0]); 
					$this->parser->parse('admin/events', $lang[0]); 
					$this->parser->parse('footer', $lang[0]); 
					break;
				case "en":
					$this->parser->parse('header', $lang[1]); 
					$this->parser->parse('sidebar', $lang[1]); 
					$this->parser->parse('admin/events', $lang[1]); 
					$this->parser->parse('footer', $lang[1]); 
					break;
				case "tr":
					$this->parser->parse('header', $lang[2]); 
					$this->parser->parse('sidebar', $lang[2]); 
					$this->parser->parse('admin/events', $lang[2]); 
					$this->parser->parse('footer', $lang[2]); 
					break;
				case "jp":
					$this->parser->parse('header', $lang[3]); 
					$this->parser->parse('sidebar', $lang[3]); 
					$this->parser->parse('admin/events', $lang[3]); 
					$this->parser->parse('footer', $lang[3]); 
					break;
					case "de":
						$this->parser->parse('header', $lang[4]); 
						$this->parser->parse('sidebar', $lang[4]); 
						$this->parser->parse('admin/events', $lang[4]); 
						$this->parser->parse('footer', $lang[4]); 
						break;	
					case "ru":
						$this->parser->parse('header', $lang[5]); 
						$this->parser->parse('sidebar', $lang[5]); 
						$this->parser->parse('admin/events', $lang[5]); 
						$this->parser->parse('footer', $lang[5]); 
						break;
					case "zh":
						$this->parser->parse('header', $lang[6]); 
						$this->parser->parse('sidebar', $lang[6]); 
						$this->parser->parse('admin/events', $lang[6]); 
						$this->parser->parse('footer', $lang[6]); 
						break;	
					case "fr":
						$this->parser->parse('header', $lang[7]); 
						$this->parser->parse('sidebar', $lang[7]); 
						$this->parser->parse('admin/events', $lang[7]); 
						$this->parser->parse('footer', $lang[7]); 
						break;	
					case "pt":
						$this->parser->parse('header', $lang[8]); 
						$this->parser->parse('sidebar', $lang[8]); 
						$this->parser->parse('admin/events', $lang[8]); 
						$this->parser->parse('footer', $lang[8]); 
						break;
					case "hi":
						$this->parser->parse('header', $lang[9]); 
						$this->parser->parse('sidebar', $lang[9]); 
						$this->parser->parse('admin/events', $lang[9]); 
						$this->parser->parse('footer', $lang[9]); 
						break;	
					case "ar":
						$this->parser->parse('header', $lang[10]); 
						$this->parser->parse('sidebar', $lang[10]); 
						$this->parser->parse('admin/events', $lang[10]); 
						$this->parser->parse('footer', $lang[10]); 
						break;	
				default:
					$this->parser->parse('header', $lang[0]); 
					$this->parser->parse('sidebar', $lang[0]); 
					$this->parser->parse('admin/events', $lang[0]); 
					$this->parser->parse('footer', $lang[0]); 
					break;

			}
	}else{
		$base_url = base_url();
		header("Location: $base_url");
	}
	}
	public function quests(){
		if($this->session->userdata('login') == true AND $this->session->userdata('rol') == 1){
			$lang = $this->Langs->lang();
			switch($this->session->userdata('lang')){
				case "es":
					$this->parser->parse('header', $lang[0]); 
					$this->parser->parse('sidebar', $lang[0]); 
					$this->parser->parse('admin/quests', $lang[0]); 
					$this->parser->parse('footer', $lang[0]); 
					break;
				case "en":
					$this->parser->parse('header', $lang[1]); 
					$this->parser->parse('sidebar', $lang[1]); 
					$this->parser->parse('admin/quests', $lang[1]); 
					$this->parser->parse('footer', $lang[1]); 
					break;
				case "tr":
					$this->parser->parse('header', $lang[2]); 
					$this->parser->parse('sidebar', $lang[2]); 
					$this->parser->parse('admin/quests', $lang[2]); 
					$this->parser->parse('footer', $lang[2]); 
					break;
				case "jp":
					$this->parser->parse('header', $lang[3]); 
					$this->parser->parse('sidebar', $lang[3]); 
					$this->parser->parse('admin/quests', $lang[3]); 
					$this->parser->parse('footer', $lang[3]); 
					break;	
					case "de":
						$this->parser->parse('header', $lang[4]); 
						$this->parser->parse('sidebar', $lang[4]); 
						$this->parser->parse('admin/quests', $lang[4]); 
						$this->parser->parse('footer', $lang[4]); 
						break;	
					case "ru":
						$this->parser->parse('header', $lang[5]); 
						$this->parser->parse('sidebar', $lang[5]); 
						$this->parser->parse('admin/quests', $lang[5]); 
						$this->parser->parse('footer', $lang[5]); 
						break;
					case "zh":
						$this->parser->parse('header', $lang[6]); 
						$this->parser->parse('sidebar', $lang[6]); 
						$this->parser->parse('admin/quests', $lang[6]); 
						$this->parser->parse('footer', $lang[6]); 
						break;	
					case "fr":
						$this->parser->parse('header', $lang[7]); 
						$this->parser->parse('sidebar', $lang[7]); 
						$this->parser->parse('admin/quests', $lang[7]); 
						$this->parser->parse('footer', $lang[7]); 
						break;	
					case "pt":
						$this->parser->parse('header', $lang[8]); 
						$this->parser->parse('sidebar', $lang[8]); 
						$this->parser->parse('admin/quests', $lang[8]); 
						$this->parser->parse('footer', $lang[8]); 
						break;
					case "hi":
						$this->parser->parse('header', $lang[9]); 
						$this->parser->parse('sidebar', $lang[9]); 
						$this->parser->parse('admin/quests', $lang[9]); 
						$this->parser->parse('footer', $lang[9]); 
						break;	
					case "ar":
						$this->parser->parse('header', $lang[10]); 
						$this->parser->parse('sidebar', $lang[10]); 
						$this->parser->parse('admin/quests', $lang[10]); 
						$this->parser->parse('footer', $lang[10]); 
						break;	
				default:
					$this->parser->parse('header', $lang[0]); 
					$this->parser->parse('sidebar', $lang[0]); 
					$this->parser->parse('admin/quests', $lang[0]); 
					$this->parser->parse('footer', $lang[0]); 
					break;

			}
	}else{
		$base_url = base_url();
		header("Location: $base_url");
	}
	}

	public function commands(){
		if($this->session->userdata('login') == true AND $this->session->userdata('rol') == 1){
			$lang = $this->Langs->lang();
			switch($this->session->userdata('lang')){
				case "es":
					$this->parser->parse('header', $lang[0]); 
					$this->parser->parse('sidebar', $lang[0]); 
					$this->parser->parse('admin/commands', $lang[0]); 
					$this->parser->parse('footer', $lang[0]); 
					break;
				case "en":
					$this->parser->parse('header', $lang[1]); 
					$this->parser->parse('sidebar', $lang[1]); 
					$this->parser->parse('admin/commands', $lang[1]); 
					$this->parser->parse('footer', $lang[1]); 
					break;
				case "tr":
					$this->parser->parse('header', $lang[2]); 
					$this->parser->parse('sidebar', $lang[2]); 
					$this->parser->parse('admin/commands', $lang[2]); 
					$this->parser->parse('footer', $lang[2]); 
					break;
				case "jp":
					$this->parser->parse('header', $lang[3]); 
					$this->parser->parse('sidebar', $lang[3]); 
					$this->parser->parse('admin/commands', $lang[3]); 
					$this->parser->parse('footer', $lang[3]); 
					break;	
					case "de":
						$this->parser->parse('header', $lang[4]); 
						$this->parser->parse('sidebar', $lang[4]); 
						$this->parser->parse('admin/commands', $lang[4]); 
						$this->parser->parse('footer', $lang[4]); 
						break;	
					case "ru":
						$this->parser->parse('header', $lang[5]); 
						$this->parser->parse('sidebar', $lang[5]); 
						$this->parser->parse('admin/commands', $lang[5]); 
						$this->parser->parse('footer', $lang[5]); 
						break;
					case "zh":
						$this->parser->parse('header', $lang[6]); 
						$this->parser->parse('sidebar', $lang[6]); 
						$this->parser->parse('admin/commands', $lang[6]); 
						$this->parser->parse('footer', $lang[6]); 
						break;	
					case "fr":
						$this->parser->parse('header', $lang[7]); 
						$this->parser->parse('sidebar', $lang[7]); 
						$this->parser->parse('admin/commands', $lang[7]); 
						$this->parser->parse('footer', $lang[7]); 
						break;	
					case "pt":
						$this->parser->parse('header', $lang[8]); 
						$this->parser->parse('sidebar', $lang[8]); 
						$this->parser->parse('admin/commands', $lang[8]); 
						$this->parser->parse('footer', $lang[8]); 
						break;
					case "hi":
						$this->parser->parse('header', $lang[9]); 
						$this->parser->parse('sidebar', $lang[9]); 
						$this->parser->parse('admin/commands', $lang[9]); 
						$this->parser->parse('footer', $lang[9]); 
						break;	
					case "ar":
						$this->parser->parse('header', $lang[10]); 
						$this->parser->parse('sidebar', $lang[10]); 
						$this->parser->parse('admin/commands', $lang[10]); 
						$this->parser->parse('footer', $lang[10]); 
						break;	
				default:
					$this->parser->parse('header', $lang[0]); 
					$this->parser->parse('sidebar', $lang[0]); 
					$this->parser->parse('admin/commands', $lang[0]); 
					$this->parser->parse('footer', $lang[0]); 
					break;

			}
	}else{
		$base_url = base_url();
		header("Location: $base_url");
	}
	}






	public function changelog(){
		if($this->session->userdata('login') == true AND $this->session->userdata('rol') == 1){
			$lang = $this->Langs->lang();
			switch($this->session->userdata('lang')){
				case "es":
					$this->parser->parse('header', $lang[0]); 
					$this->parser->parse('sidebar', $lang[0]); 
					$this->parser->parse('admin/changelog', $lang[0]); 
					$this->parser->parse('footer', $lang[0]); 
					break;
				case "en":
					$this->parser->parse('header', $lang[1]); 
					$this->parser->parse('sidebar', $lang[1]); 
					$this->parser->parse('admin/changelog', $lang[1]); 
					$this->parser->parse('footer', $lang[1]); 
					break;
				case "tr":
					$this->parser->parse('header', $lang[2]); 
					$this->parser->parse('sidebar', $lang[2]); 
					$this->parser->parse('admin/changelog', $lang[2]); 
					$this->parser->parse('footer', $lang[2]); 
					break;
				case "jp":
					$this->parser->parse('header', $lang[3]); 
					$this->parser->parse('sidebar', $lang[3]); 
					$this->parser->parse('admin/changelog', $lang[3]); 
					$this->parser->parse('footer', $lang[3]); 
					break;	
					case "de":
						$this->parser->parse('header', $lang[4]); 
						$this->parser->parse('sidebar', $lang[4]); 
						$this->parser->parse('admin/changelog', $lang[4]); 
						$this->parser->parse('footer', $lang[4]); 
						break;	
					case "ru":
						$this->parser->parse('header', $lang[5]); 
						$this->parser->parse('sidebar', $lang[5]); 
						$this->parser->parse('admin/changelog', $lang[5]); 
						$this->parser->parse('footer', $lang[5]); 
						break;
					case "zh":
						$this->parser->parse('header', $lang[6]); 
						$this->parser->parse('sidebar', $lang[6]); 
						$this->parser->parse('admin/changelog', $lang[6]); 
						$this->parser->parse('footer', $lang[6]); 
						break;	
					case "fr":
						$this->parser->parse('header', $lang[7]); 
						$this->parser->parse('sidebar', $lang[7]); 
						$this->parser->parse('admin/changelog', $lang[7]); 
						$this->parser->parse('footer', $lang[7]); 
						break;	
					case "pt":
						$this->parser->parse('header', $lang[8]); 
						$this->parser->parse('sidebar', $lang[8]); 
						$this->parser->parse('admin/changelog', $lang[8]); 
						$this->parser->parse('footer', $lang[8]); 
						break;
					case "hi":
						$this->parser->parse('header', $lang[9]); 
						$this->parser->parse('sidebar', $lang[9]); 
						$this->parser->parse('admin/changelog', $lang[9]); 
						$this->parser->parse('footer', $lang[9]); 
						break;	
					case "ar":
						$this->parser->parse('header', $lang[10]); 
						$this->parser->parse('sidebar', $lang[10]); 
						$this->parser->parse('admin/changelog', $lang[10]); 
						$this->parser->parse('footer', $lang[10]); 
						break;	
				default:
					$this->parser->parse('header', $lang[0]); 
					$this->parser->parse('sidebar', $lang[0]); 
					$this->parser->parse('admin/changelog', $lang[0]); 
					$this->parser->parse('footer', $lang[0]); 
					break;

			}
	}else{
		$base_url = base_url();
		header("Location: $base_url");
	}
	}




	/*
	//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	////////////////////////////////////////////////////////////End Load Views///////////////////////////////////////////////////////////////////////////////////
	////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	*/




	/*
	///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	////////////////////////////////////////////////////////////Start Dashboard///////////////////////////////////////////////////////////////////////////////////
	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	*/
	public function global(){
		if($this->session->userdata('login') == true AND $this->session->userdata('rol') == 1){
		$pedido['status'] = 0;
		$txt = $this->input->post('txt');
		if($txt == ''){
			$pedido['sms'] = 'Complete todos los campos';
			echo json_encode($pedido);
		}else{
		$this->load->model('Apigettoken');
				$accesstoken = $this->Apigettoken->apitoken();
				$global = [
					'Message' => 'Server: '.$txt,
					"Color" => [
						"A"=> 255,
						"R"=> 255,
						"G"=> 0,
						"B"=> 0
					],
					  ];
					  $apiip = $this->config->item('apiip');
					  $client = new Client([						  
						'base_uri' => 'http://'.$apiip.'/api/v1/chat/global',
						'timeout'  => 5.0,
						'http_errors' => false
						]);
						$res = $client->request('POST','',[
							'headers' => [
								"authorization" => "Bearer ".$accesstoken['access_token'],
							],
							'form_params' => $global,							
						  ]);
						  $estado = json_decode($res->getBody(), true);
						  if ($res->getStatusCode() == '200')
							{
								$time = date("F j, Y, g:i a");
								$datos = array (
									'admin' => $this->session->userdata('user'),
									'user' => 'N/A',
									'action' =>  'Mensaje Global',
									'time' =>  $time,
								   );
								
								   $this->db->insert('logs', $datos);
								$pedido['status'] = 200;
								echo json_encode($pedido);
								
							}else{
								$pedido['sms'] = $estado['Message'];
								echo json_encode($pedido);
								
							}
		}
	}else{
		$pedido['sms'] = 'Su sesión a Expirado por favor vuelva a reconectarse';
		echo json_encode($pedido);
		$base_url = base_url();
		header("Location: $base_url");
	}
	}

	public function direct(){
		if($this->session->userdata('login') == true AND $this->session->userdata('rol') == 1){
		$pedido['status'] = 0;
		$txt = $this->input->post('txt');
		$user = $this->input->post('user');
		if($txt == '' || $user == ''){
			$pedido['sms'] = 'Complete todos los campos';
			echo json_encode($pedido);
		}else{
		$this->load->model('Apigettoken');
				$accesstoken = $this->Apigettoken->apitoken();
				$global = [
					'Message' => 'Server: '.$txt,
					"Color" => [
						"A"=> 255,
						"R"=> 255,
						"G"=> 0,
						"B"=> 0
					],
					];
					$apiip = $this->config->item('apiip');
					$client = new Client([
						
						'base_uri' => 'http://'.$apiip.'/api/v1/chat/direct/'.$user,
						'timeout'  => 5.0,
						'http_errors' => false
						]);
						$res = $client->request('POST','',[
							'headers' => [
								"authorization" => "Bearer ".$accesstoken['access_token'],
							],
							'form_params' => $global,
							
						]);
						$estado = json_decode($res->getBody(), true);
						if ($res->getStatusCode() == '200') 
							{
								$time = date("F j, Y, g:i a");
								$datos = array (
									'admin' => $this->session->userdata('user'),
									'user' => 'N/A',
									'action' =>  'Mensaje Directo',
									'time' =>  $time,
								);
								
								$this->db->insert('logs', $datos);
								$pedido['status'] = 200;
								echo json_encode($pedido);
							}else{
								$pedido['sms'] = $estado['Message'];
								echo json_encode($pedido);
								
							}
		}
	}else{
		$base_url = base_url();
		header("Location: $base_url");
	}
	}

	public function proximity(){
		if($this->session->userdata('login') == true AND $this->session->userdata('rol') == 1){
		$pedido['status'] = 0;
		$txt = $this->input->post('txt');
		$map = $this->input->post('map');
		if($txt == '' || $map == ''){
			$pedido['sms'] = 'Complete todos los campos';
			echo json_encode($pedido);
		}else{
		$this->load->model('Apigettoken');
				$accesstoken = $this->Apigettoken->apitoken();
				$global = [
					'Message' => 'Server: '.$txt,
					"Color" => [
						"A"=> 255,
						"R"=> 255,
						"G"=> 0,
						"B"=> 0
					],
					];
					$apiip = $this->config->item('apiip');
					$client = new Client([
						
						'base_uri' => 'http://'.$apiip.'/api/v1/chat/proximity/'.$map,
						'timeout'  => 5.0,
						'http_errors' => false
						]);
						$res = $client->request('POST','',[
							'headers' => [
								"authorization" => "Bearer ".$accesstoken['access_token'],
							],
							'form_params' => $global,
							
						]);
						$estado = json_decode($res->getBody(), true);
						if ($res->getStatusCode() == '200') 
							{
								$time = date("F j, Y, g:i a");
								$datos = array (
									'admin' => $this->session->userdata('user'),
									'user' => 'N/A',
									'action' =>  'Mensaje de Proximidad',
									'time' =>  $time,
								);
								
								$this->db->insert('logs', $datos);
								$pedido['status'] = 200;
								echo json_encode($pedido);
							}else{
								$pedido['sms'] = $estado['Message'];
								echo json_encode($pedido);
								
							}
		}
	}else{
		$base_url = base_url();
		header("Location: $base_url");
	}
	}

	public function ban(){
		if($this->session->userdata('login') == true AND $this->session->userdata('rol') == 1){
		$pedido['status'] = 0;
		$reason = $this->input->post('reason');
		$user = $this->input->post('user');
		$time = $this->input->post('time');
		if($reason == '' || $user == '' || $time == ''){
			$pedido['sms'] = 'Complete todos los campos';
			echo json_encode($pedido);
		}else{
		$this->load->model('Apigettoken');
				$accesstoken = $this->Apigettoken->apitoken();
				$global = [
					'duration' => $time,
					'reason' => $reason,
					'moderator' => $this->session->userdata('user'),
					];
					$apiip = $this->config->item('apiip');
					$client = new Client([
						
						'base_uri' => 'http://'.$apiip.'/api/v1/users/'.$user.'/admin/ban',
						'timeout'  => 5.0,
						'http_errors' => false
						]);
						$res = $client->request('POST','',[
							'headers' => [
								"authorization" => "Bearer ".$accesstoken['access_token'],
							],
							'form_params' => $global,
							
						]);
						$estado = json_decode($res->getBody(), true);
						if ($res->getStatusCode() == '200') 
							{
								$time = date("F j, Y, g:i a");
								$datos = array (
									'admin' => $this->session->userdata('user'),
									'user' => $user,
									'action' =>  'Ban',
									'time' =>  $time,
								);
								
								$this->db->insert('logs', $datos);
								$pedido['status'] = 200;
								echo json_encode($pedido);
							}else{
								$pedido['sms'] = $estado['Message'];
								echo json_encode($pedido);
								
							}
		}
	}else{
		$base_url = base_url();
		header("Location: $base_url");
	}
	}

	public function unban(){
		if($this->session->userdata('login') == true AND $this->session->userdata('rol') == 1){
		$pedido['status'] = 0;
		$user = $this->input->post('user');
		if($user == '' ){
			$pedido['sms'] = 'Complete todos los campos';
			echo json_encode($pedido);
		}else{
		$this->load->model('Apigettoken');
				$accesstoken = $this->Apigettoken->apitoken();
			
					$apiip = $this->config->item('apiip');
					$client = new Client([
						'base_uri' => 'http://'.$apiip.'/api/v1/users/'.$user.'/admin/unban',
						'timeout'  => 5.0,
						'http_errors' => false
						]);
						$res = $client->request('POST','',[
							'headers' => [
								"authorization" => "Bearer ".$accesstoken['access_token'],
							],
							
							
						]);
						$estado = json_decode($res->getBody(), true);
						if ($res->getStatusCode() == '200') 
							{
								$time = date("F j, Y, g:i a");
								$datos = array (
									'admin' => $this->session->userdata('user'),
									'user' => $user,
									'action' =>  'Desbaneado',
									'time' =>  $time,
								);
								
								$this->db->insert('logs', $datos);
								$pedido['status'] = 200;
								echo json_encode($pedido);
							}else{
								$pedido['sms'] = $estado['Message'];
								echo json_encode($pedido);
								
							}
		}
	}else{
		$base_url = base_url();
		header("Location: $base_url");
	}
	}

	public function mute(){
		if($this->session->userdata('login') == true AND $this->session->userdata('rol') == 1){
		$pedido['status'] = 0;
		$reason = $this->input->post('reason');
		$user = $this->input->post('user');
		$time = $this->input->post('time');
		if($reason == '' || $user == '' || $time == ''){
			$pedido['sms'] = 'Complete todos los campos';
			echo json_encode($pedido);
		}else{
		$this->load->model('Apigettoken');
				$accesstoken = $this->Apigettoken->apitoken();
				$global = [
					'duration' => $time,
					'reason' => $reason,
					'moderator' => $this->session->userdata('user'),
					];
					$apiip = $this->config->item('apiip');
					$client = new Client([
						
						'base_uri' => 'http://'.$apiip.'/api/v1/users/'.$user.'/admin/mute',
						'timeout'  => 5.0,
						'http_errors' => false
						]);
						$res = $client->request('POST','',[
							'headers' => [
								"authorization" => "Bearer ".$accesstoken['access_token'],
							],
							'form_params' => $global,
							
						]);
						$estado = json_decode($res->getBody(), true);
						if ($res->getStatusCode() == '200') 
							{
								$time = date("F j, Y, g:i a");
								$datos = array (
									'admin' => $this->session->userdata('user'),
									'user' => $user,
									'action' =>  'Muteado',
									'time' =>  $time,
								);
								
								$this->db->insert('logs', $datos);
								$pedido['status'] = 200;
								echo json_encode($pedido);
							}else{
								$pedido['sms'] = $estado['Message'];
								echo json_encode($pedido);
								
							}
		}	
	}else{
		$base_url = base_url();
		header("Location: $base_url");
	}
	}

	public function unmute(){
		if($this->session->userdata('login') == true AND $this->session->userdata('rol') == 1){
		$pedido['status'] = 0;
		$user = $this->input->post('user');
		if($user == '' ){
			$pedido['sms'] = 'Complete todos los campos';
			echo json_encode($pedido);
		}else{
		$this->load->model('Apigettoken');
				$accesstoken = $this->Apigettoken->apitoken();
			
					$apiip = $this->config->item('apiip');
					$client = new Client([
						'base_uri' => 'http://'.$apiip.'/api/v1/users/'.$user.'/admin/unmute',
						'timeout'  => 5.0,
						'http_errors' => false
						]);
						$res = $client->request('POST','',[
							'headers' => [
								"authorization" => "Bearer ".$accesstoken['access_token'],
							],
							
							
						]);
						$estado = json_decode($res->getBody(), true);
						if ($res->getStatusCode() == '200') 
							{
								$time = date("F j, Y, g:i a");
								$datos = array (
									'admin' => $this->session->userdata('user'),
									'user' => $user,
									'action' =>  'Desmuteado',
									'time' =>  $time,
								);
								
								$this->db->insert('logs', $datos);
								$pedido['status'] = 200;
								echo json_encode($pedido);
							}else{
								$pedido['sms'] = $estado['Message'];
								echo json_encode($pedido);
								
							}
		}
	}else{
		$base_url = base_url();
		header("Location: $base_url");
	}
	}

	public function kick(){
		if($this->session->userdata('login') == true AND $this->session->userdata('rol') == 1){
		$pedido['status'] = 0;
		$user = $this->input->post('user');
		if($user == '' ){
			$pedido['sms'] = 'Complete todos los campos';
			echo json_encode($pedido);
		}else{
		$this->load->model('Apigettoken');
				$accesstoken = $this->Apigettoken->apitoken();
			
					$apiip = $this->config->item('apiip');
					$client = new Client([
						'base_uri' => 'http://'.$apiip.'/api/v1/users/'.$user.'/admin/kick',
						'timeout'  => 5.0,
						'http_errors' => false
						]);
						$res = $client->request('POST','',[
							'headers' => [
								"authorization" => "Bearer ".$accesstoken['access_token'],
							],
							
							
						]);
						$estado = json_decode($res->getBody(), true);
						if ($res->getStatusCode() == '200') 
							{
								$time = date("F j, Y, g:i a");
								$datos = array (
									'admin' => $this->session->userdata('user'),
									'user' => $user,
									'action' =>  'Expulsado',
									'time' =>  $time,
								);
								
								$this->db->insert('logs', $datos);
								$pedido['status'] = 200;
								echo json_encode($pedido);
							}else{
								$pedido['sms'] = $estado['Message'];
								echo json_encode($pedido);
								
							}
		}
	}else{
		$base_url = base_url();
		header("Location: $base_url");
	}
	}

	public function kill(){
		if($this->session->userdata('login') == true AND $this->session->userdata('rol') == 1){
		$pedido['status'] = 0;
		$user = $this->input->post('user');
		if($user == '' ){
			$pedido['sms'] = 'Complete todos los campos';
			echo json_encode($pedido);
		}else{
		$this->load->model('Apigettoken');
				$accesstoken = $this->Apigettoken->apitoken();
			
					$apiip = $this->config->item('apiip');
					$client = new Client([
						'base_uri' => 'http://'.$apiip.'/api/v1/users/'.$user.'/admin/kill',
						'timeout'  => 5.0,
						'http_errors' => false
						]);
						$res = $client->request('POST','',[
							'headers' => [
								"authorization" => "Bearer ".$accesstoken['access_token'],
							],
							
							
						]);
						$estado = json_decode($res->getBody(), true);
						if ($res->getStatusCode() == '200') 
							{
								$time = date("F j, Y, g:i a");
								$datos = array (
									'admin' => $this->session->userdata('user'),
									'user' => $user,
									'action' =>  'Asesinado',
									'time' =>  $time,
								);
								
								$this->db->insert('logs', $datos);
								$pedido['status'] = 200;
								echo json_encode($pedido);
							}else{
								$pedido['sms'] = $estado['Message'];
								echo json_encode($pedido);
								
							}
		}
	}else{
		$base_url = base_url();
		header("Location: $base_url");
	}
	}

	public function tp(){
		if($this->session->userdata('login') == true AND $this->session->userdata('rol') == 1){
		$pedido['status'] = 0;
		$user = $this->input->post('user');
		$map = $this->input->post('map');
		if($user == '' || $map == ''){
			$pedido['sms'] = 'Complete todos los campos';
			echo json_encode($pedido);
		}else{
		$this->load->model('Apigettoken');
				$accesstoken = $this->Apigettoken->apitoken();
				$global = [
					'MapId' => $map,
					
					];
					$apiip = $this->config->item('apiip');
					$client = new Client([
						
						'base_uri' => 'http://'.$apiip.'/api/v1/users/'.$user.'/admin/warpto',
						'timeout'  => 5.0,
						]);
						$res = $client->request('POST','',[
							'headers' => [
								"authorization" => "Bearer ".$accesstoken['access_token'],
							],
							'form_params' => $global,
							
						]);
						$estado = json_decode($res->getBody(), true);
						if ($res->getStatusCode() == '200') 
							{
								$time = date("F j, Y, g:i a");
								$datos = array (
									'admin' => $this->session->userdata('user'),
									'user' => $user,
									'action' =>  'Teletransportado',
									'time' =>  $time,
								);
								
								$this->db->insert('logs', $datos);
								$pedido['status'] = 200;
								echo json_encode($pedido);
							}else{
								$pedido['sms'] = $estado['Message'];
								echo json_encode($pedido);
								
							}
		}
	}else{
		$base_url = base_url();
		header("Location: $base_url");
	}
	}
	/*
	///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	////////////////////////////////////////////////////////////End Dashboard/////////////////////////////////////////////////////////////////////////////////////
	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	*/
	




	/*
	//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	////////////////////////////////////////////////////////////Start News///////////////////////////////////////////////////////////////////////////////////////
	////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	*/

	public function addnews(){
		if($this->session->userdata('login') == true AND $this->session->userdata('rol') == 1){
		$data = array();
        $txtData = array();         
        setlocale(LC_TIME, "spanish");
        $date = strftime("%A, %d de %B de %Y");
        $user = $this->session->userdata('user');
            $filename=$_FILES['archivo']['name'];


            $txtData = array(
                'title' => strip_tags($this->input->post('title')),
				'descrip' => strip_tags($this->input->post('descrip')),
                'txt' => strip_tags($this->input->post('txt')),
                'img' => ($filename),
                'date' => ($date),
				'status' => 1,
                'admin' => ($user)
            );

                /*
                 * Genera la URL Amigable
                 */
                $title = strip_tags($this->input->post('title'));
                $titleURL = strtolower(url_title($title));
                if(isUrlExists('news',$titleURL)){
                   $titleURL = $titleURL.'-'.time(); 
                }
                $txtData['url_slug'] = $titleURL;
                
                //Inserta los datos del TXT a la base de datos
                $insert = $this->newss->insert($txtData);

              

                $archivo = "archivo";
                $config['upload_path'] = "img/news";
                $config['file_name'] = $filename;
                $config['allowed_types'] = "*";
                $config['max_size'] = "50000";
                $config['max_width'] = "2000";
                $config['max_height'] = "2000";
        
                $this->load->library('upload', $config);

                if (!$this->upload->do_upload($archivo)) {
                    //*** ocurrio un error
                    $data['uploadError'] = $this->upload->display_errors();
                    echo $this->upload->display_errors();
                    return;
                }
        
                $data['uploadSuccess'] = $this->upload->data();

            
        
        
        $data['txt'] = $txtData;
        
        //Carga la vista
		$this->load->view('header');
		$this->load->view('sidebar');
        $this->load->view('admin/news', $data, false);
		$this->load->view('footer');
	}else{
		$base_url = base_url();
		header("Location: $base_url");
	}
        
        
    }

	public function delnews(){
		if($this->session->userdata('login') == true AND $this->session->userdata('rol') == 1){
		$id = $this->input->post('id');
        $this->db->delete('news', array ('id' => $id)); 
        $base_url = base_url();
        header("Location: $base_url/admin/news");
	}else{
		$base_url = base_url();
		header("Location: $base_url");
	}
        
    }

	public function editnews(){
		if($this->session->userdata('login') == true AND $this->session->userdata('rol') == 1){
		$id = $this->input->post('id');
		$lang = $this->Langs->lang();
		switch($this->session->userdata('lang')){
			case "es":
				$this->parser->parse('header', $lang[0]); 
				$this->parser->parse('admin/editnews', array('id' => $id)+ $lang[0]); 
				$this->parser->parse('footer', $lang[0]); 
				break;
			case "en":
				$this->parser->parse('header', $lang[1]); 
				$this->parser->parse('admin/editnews', array('id' => $id)+ $lang[1]); 
				$this->parser->parse('footer', $lang[1]); 
				break;
			case "tr":
				$this->parser->parse('header', $lang[2]); 
				$this->parser->parse('admin/editnews', array('id' => $id)+ $lang[2]);
				$this->parser->parse('footer', $lang[2]);  
				break;
			case "jp":
				$this->parser->parse('header', $lang[3]); 
				$this->parser->parse('admin/editnews', array('id' => $id)+ $lang[3]);
				$this->parser->parse('footer', $lang[3]); 
				break;	
				case "de":
					$this->parser->parse('header', $lang[4]); 
					$this->parser->parse('admin/editnews', array('id' => $id)+ $lang[4]); 
					$this->parser->parse('footer', $lang[4]); 
					break;	
				case "ru":
					$this->parser->parse('header', $lang[5]); 
					$this->parser->parse('admin/editnews', array('id' => $id)+ $lang[5]); 
					$this->parser->parse('footer', $lang[5]); 
					break;
				case "zh":
					$this->parser->parse('header', $lang[6]); 
					$this->parser->parse('admin/editnews', array('id' => $id)+ $lang[6]); 
					$this->parser->parse('footer', $lang[6]); 
					break;	
				case "fr":
					$this->parser->parse('header', $lang[7]); 
					$this->parser->parse('admin/editnews', array('id' => $id)+ $lang[7]); 
					$this->parser->parse('footer', $lang[7]); 
					break;	
				case "pt":
					$this->parser->parse('header', $lang[8]); 
					$this->parser->parse('admin/editnews', array('id' => $id)+ $lang[8]); 
					$this->parser->parse('footer', $lang[8]); 
					break;
				case "hi":
					$this->parser->parse('header', $lang[9]); 
					$this->parser->parse('admin/editnews', array('id' => $id)+ $lang[9]); 
					$this->parser->parse('footer', $lang[9]); 
					break;	
				case "ar":
					$this->parser->parse('header', $lang[10]); 
					$this->parser->parse('admin/editnews', array('id' => $id)+ $lang[10]); 
					$this->parser->parse('footer', $lang[10]); 
					break;	
			default:
				$this->parser->parse('header', $lang[0]); 
				$this->parser->parse('admin/editnews', array('id' => $id)+ $lang[0]); 
				$this->parser->parse('footer', $lang[0]); 
				break;

		}
	}else{
		$base_url = base_url();
		header("Location: $base_url");
	}
	}
	
	public function editnewss(){
		if($this->session->userdata('login') == true AND $this->session->userdata('rol') == 1){
		$id = $this->input->post('id');
		$title = $this->input->post('title');
		$descrip = $this->input->post('descrip');
		$txt = $this->input->post('txt');
		$where = [
			'id'=>$id,

		];
		$this->db->where($where);
		$datos = [
			'title'=>$title,
			'descrip'=>$descrip,
			'txt'=>$txt

		];
		$this->db->where('id', $id);
        $this->db->update('news', $datos); 
		$base_url = base_url();
		header("Location: $base_url/admin/news");
	}else{
		$base_url = base_url();
		header("Location: $base_url");
	}
	}


	public function statusnews(){
		
		$id = $this->input->post('id');
		$where = [
			'id'=>$id,

		];
		$this->db->where($where);
		$resultado = $this->db->get('news');
		$rest = $resultado->result_array();
		if($rest[0]['status'] == 1){
			$datos = [
				'status'=>0,
	
			];
			$this->db->where('id', $id);
			$this->db->update('news', $datos); 
			$base_url = base_url();
			header("Location: $base_url/admin/news");
		}else{
			$datos = [
				'status'=>1,
	
			];
			$this->db->where('id', $id);
			$this->db->update('news', $datos); 
			$base_url = base_url();
			header("Location: $base_url/admin/news");
		}
		
	}


	/*
	///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	////////////////////////////////////////////////////////////End News//////////////////////////////////////////////////////////////////////////////////////////
	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	*/





	/*
	//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	////////////////////////////////////////////////////////////Start Shop///////////////////////////////////////////////////////////////////////////////////////
	////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	*/

	public function delproduct(){
		if($this->session->userdata('login') == true AND $this->session->userdata('rol') == 1){
		$id = $this->input->post('id');
        $this->db->delete('products', array ('id' => $id)); 
        $base_url = base_url();
        header("Location: $base_url/admin/shop");
	}else{
		$base_url = base_url();
		header("Location: $base_url");
	}
        
    }

	public function addproduct(){
		if($this->session->userdata('login') == true AND $this->session->userdata('rol') == 1){
		$data = array();
        $txtData = array();         
        $user = $this->session->userdata('user');
            $filename=$_FILES['archivo']['name'];


            $txtData = array(
                'name' => strip_tags($this->input->post('name')),
				'descrip' => strip_tags($this->input->post('descrip')),
				'price' => strip_tags($this->input->post('price')),
                'aatk' => strip_tags($this->input->post('aatk')),
				'ainterac' => strip_tags($this->input->post('ainterac')),
				'ingameid' => strip_tags($this->input->post('ingameid')),
				'status' => 1,
                'image' => ($filename),
            );

                /*
                 * Genera la URL Amigable
                 */
                $title = strip_tags($this->input->post('name'));
                $titleURL = strtolower(url_title($title));
                if(isUrlExists('products',$titleURL)){
                   $titleURL = $titleURL.'-'.time(); 
                }
                $txtData['url_slug'] = $titleURL;
                
                //Inserta los datos del TXT a la base de datos
                $this->shops->insert($txtData);

              

                $archivo = "archivo";
                $config['upload_path'] = "img/products";
                $config['file_name'] = $filename;
                $config['allowed_types'] = "*";
                $config['max_size'] = "50000";
                $config['max_width'] = "2000";
                $config['max_height'] = "2000";
        
                $this->load->library('upload', $config);

                if (!$this->upload->do_upload($archivo)) {
                    //*** ocurrio un error
                    $data['uploadError'] = $this->upload->display_errors();
                    echo $this->upload->display_errors();
                    return;
                }
        
                $data['uploadSuccess'] = $this->upload->data();

            
        
        
        $data['txt'] = $txtData;
        
        //Carga la vista
		$this->load->view('header');
		$this->load->view('sidebar');
        $this->load->view('admin/shop', $data, false);
		$this->load->view('footer');
	}else{
		$base_url = base_url();
		header("Location: $base_url");
	}

	}

	public function editproduct(){
		if($this->session->userdata('login') == true AND $this->session->userdata('rol') == 1){
		$id = $this->input->post('id');
		$lang = $this->Langs->lang();
			switch($this->session->userdata('lang')){
				case "es":
					$this->parser->parse('header', $lang[0]); 
					$this->parser->parse('admin/editproduct', array('id' => $id)+ $lang[0]); 
					break;
				case "en":
					$this->parser->parse('header', $lang[1]); 
					$this->parser->parse('admin/editproduct', array('id' => $id)+ $lang[1]); 
					break;
				case "tr":
					$this->parser->parse('header', $lang[2]); 
					$this->parser->parse('admin/editproduct', array('id' => $id)+ $lang[2]); 
					break;
				case "jp":
					$this->parser->parse('header', $lang[3]); 
					$this->parser->parse('admin/editproduct', array('id' => $id)+ $lang[3]);
					break;	
					case "de":
						$this->parser->parse('header', $lang[4]); 
						$this->parser->parse('admin/editproduct', array('id' => $id)+ $lang[4]); 
						break;	
					case "ru":
						$this->parser->parse('header', $lang[5]); 
						$this->parser->parse('admin/editproduct', array('id' => $id)+ $lang[5]); 
						break;
					case "zh":
						$this->parser->parse('header', $lang[6]); 
						$this->parser->parse('admin/editproduct', array('id' => $id)+ $lang[6]); 
						break;	
					case "fr":
						$this->parser->parse('header', $lang[7]); 
						$this->parser->parse('admin/editproduct', array('id' => $id)+ $lang[7]); 
						break;	
					case "pt":
						$this->parser->parse('header', $lang[8]); 
						$this->parser->parse('admin/editproduct', array('id' => $id)+ $lang[8]); 
						break;
					case "hi":
						$this->parser->parse('header', $lang[9]); 
						$this->parser->parse('admin/editproduct', array('id' => $id)+ $lang[9]); 
						break;	
					case "ar":
						$this->parser->parse('header', $lang[10]); 
						$this->parser->parse('admin/editproduct', array('id' => $id)+ $lang[10]); 
						break;	
				default:
					$this->parser->parse('header', $lang[0]); 
					$this->parser->parse('admin/editproduct', array('id' => $id)+ $lang[0]); 
					break;

			}
	}else{
		$base_url = base_url();
		header("Location: $base_url");
	}
	}

	public function editproducts(){
		if($this->session->userdata('login') == true AND $this->session->userdata('rol') == 1){
		$id = $this->input->post('id');
		$name = $this->input->post('name');
		$descrip = $this->input->post('descrip');
		$price = $this->input->post('price');
		$aatk = $this->input->post('aatk');
		$ainterac = $this->input->post('ainterac');
		$ingameid = $this->input->post('ingameid');
		$where = [
			'id'=>$id,

		];
		$this->db->where($where);
		$this->db->get('products');
		$datos = [
			'name'=>$name,
			'descrip'=>$descrip,
			'price'=>$price,
			'aatk'=>$aatk,
			'ainterac'=>$ainterac,
			'ingameid'=>$ingameid,

		];
		$this->db->where('id', $id);
        $this->db->update('products', $datos); 
		$base_url = base_url();
		header("Location: $base_url/admin/shop");
	}else{
		$base_url = base_url();
		header("Location: $base_url");
	}
	}



	public function statusproduct(){
		
		$id = $this->input->post('id');
		$where = [
			'id'=>$id,

		];
		$this->db->where($where);
		$resultado = $this->db->get('products');
		$rest = $resultado->result_array();
		if($rest[0]['status'] == 1){
			$datos = [
				'status'=>0,
	
			];
			$this->db->where('id', $id);
			$this->db->update('products', $datos); 
			$base_url = base_url();
			header("Location: $base_url/admin/shop");
		}else{
			$datos = [
				'status'=>1,
	
			];
			$this->db->where('id', $id);
			$this->db->update('products', $datos); 
			$base_url = base_url();
			header("Location: $base_url/admin/shop");
		}
		
	}

	/*
	///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	////////////////////////////////////////////////////////////End Shop//////////////////////////////////////////////////////////////////////////////////////////
	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	*/


	/*
	////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	////////////////////////////////////////////////////////////Start Admin Accounts///////////////////////////////////////////////////////////////////////////////
	//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	*/

	public function	adminadd(){
		$user = $this->input->post('user');
        $pass = $this->input->post('pass');
        $pass1 = $this->input->post('pass1');
		$email = $this->input->post('email');
        if ($pass==$pass1) {
            $users = array(
                'user' => $user,
                'pass' => md5($pass),
				'email' => $email,
			);

            $this->db->insert('users', $users);
            $base_url = base_url();
            header("Location: $base_url/admin/adminaccounts");
        }else{
            
            $base_url = base_url();
            header("Location: $base_url/admin/adminaccounts");
        }
	}

	public function deladminaccount(){
		if($this->session->userdata('login') == true AND $this->session->userdata('rol') == 1){
			$id = $this->input->post('id');
			$this->db->delete('users', array ('id' => $id)); 
			$base_url = base_url();
			header("Location: $base_url/admin/adminaccounts");
		}else{
			$base_url = base_url();
			header("Location: $base_url");
		}
	}

	/*
	////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	////////////////////////////////////////////////////////////End Admin Accounts/////////////////////////////////////////////////////////////////////////////////
	//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	*/


	/*
	////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	////////////////////////////////////////////////////////////Start Changelog/////////////////////////////////////////////////////////////////////////////////
	//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	*/

	public function delchangelog(){
		if($this->session->userdata('login') == true AND $this->session->userdata('rol') == 1){
			$id = $this->input->post('id');
			$this->db->delete('changelog', array ('id' => $id)); 
			$base_url = base_url();
			header("Location: $base_url/admin/changelog");
		}else{
			$base_url = base_url();
			header("Location: $base_url");
		}
	}


	public function addchangelog(){
		$title = $this->input->post('title');
		$txt = $this->input->post('text');
		$cantidad = $this->db->get('changelog');
		$array = $cantidad->result_array();
		$cant = $cantidad->num_rows();
		switch($array[$cant-1]['type']){
			case 0:
				$data = [
					'title'=>$title,
					'txt'=>$txt,
					'type'=>1,
				];
				$this->db->insert('changelog', $data);
				$base_url = base_url();
				header("Location: $base_url/admin/changelog");
				break;
			case 1:
				$data = [
					'title'=>$title,
					'txt'=>$txt,
					'type'=>0,
				];
				$this->db->insert('changelog', $data);
				$base_url = base_url();
				header("Location: $base_url/admin/changelog");
				break;

		} 

	}

	
	/*
	////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	////////////////////////////////////////////////////////////End Changelog/////////////////////////////////////////////////////////////////////////////////
	//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	*/


	

}
