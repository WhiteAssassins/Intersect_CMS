<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require FCPATH.'vendor/autoload.php';
use GuzzleHttp\Client;
class Langs extends CI_Controller {
	function __construct() {
        parent::__construct();
        $this->load->model('Apigettoken');
		$this->load->model('Apiserverinfo');
		$this->load->model('Apiserverstats');
		$this->load->model('Apiusers');
		$this->load->model('Apiplayers');
    }
	
	public function es(){
		$data = [
			'lang'=> 'es',
		];
		$this->session->set_userdata($data);
		$base_url = base_url();
		header("Location: $base_url");
	}
	public function en(){
		$data = [
			'lang'=> 'en',
		];
		$this->session->set_userdata($data);
		$base_url = base_url();
		header("Location: $base_url");
	}
	public function tr(){
		$data = [
			'lang'=> 'tr',
		];
		$this->session->set_userdata($data);
		$base_url = base_url();
		header("Location: $base_url");
	}
	public function jp(){
		$data = [
			'lang'=> 'jp',
		];
		$this->session->set_userdata($data);
		$base_url = base_url();
		header("Location: $base_url");
	}
	public function de(){
		$data = [
			'lang'=> 'de',
		];
		$this->session->set_userdata($data);
		$base_url = base_url();
		header("Location: $base_url");
	}
	public function ru(){
		$data = [
			'lang'=> 'ru',
		];
		$this->session->set_userdata($data);
		$base_url = base_url();
		header("Location: $base_url");
	}
	public function zh(){
		$data = [
			'lang'=> 'zh',
		];
		$this->session->set_userdata($data);
		$base_url = base_url();
		header("Location: $base_url");
	}
	public function fr(){
		$data = [
			'lang'=> 'fr',
		];
		$this->session->set_userdata($data);
		$base_url = base_url();
		header("Location: $base_url");
	}
	public function pt(){
		$data = [
			'lang'=> 'pt',
		];
		$this->session->set_userdata($data);
		$base_url = base_url();
		header("Location: $base_url");
	}
	public function hi(){
		$data = [
			'lang'=> 'hi',
		];
		$this->session->set_userdata($data);
		$base_url = base_url();
		header("Location: $base_url");
	}
	public function ar(){
		$data = [
			'lang'=> 'ar',
		];
		$this->session->set_userdata($data);
		$base_url = base_url();
		header("Location: $base_url");
	}
	


}













