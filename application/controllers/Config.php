<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require FCPATH.'vendor/autoload.php';
use GuzzleHttp\Client;
class Config extends CI_Controller {
	function __construct() {
        parent::__construct();
        $this->load->model('Apigettoken');
		$this->load->model('Apiserverinfo');
		$this->load->model('Apiregister');
		$this->load->model('Apiserverstats');
		$this->load->model('Apiusers');
		$this->load->model('Apiplayers');
    }
	
	public function index()
	{	
		if($this->session->userdata('login') == true AND $this->session->userdata('rol') == 1){
			$this->load->view('header');
			$this->load->view('sidebar');  
			$this->load->view('admin/config');
			$this->load->view('footer');	
		}else{
			$base_url = base_url();
			header("Location: $base_url");
		}

	}

	public function editcolors(){
		if($this->session->userdata('login') == true AND $this->session->userdata('rol') == 1){
		$id = 1;
		$color1 = $this->input->post('color1');
		$color2 = $this->input->post('color2');
		$where = [
			'id'=>$id,

		];
		$this->db->where($where);
		$resultado = $this->db->get('config');
		$datos = [
			'color1'=>$color1,
			'color2'=>$color2,

		];
		$this->db->where('id', $id);
        $this->db->update('config', $datos); 
		$base_url = base_url();
		header("Location: $base_url/config");
	}else{
		$base_url = base_url();
		header("Location: $base_url");
	}
	}
	


	public function mantact(){
        $conf = $this->db->get('config');
		$conf1 = $conf->result_array();
        $datos = array (
            'mant' => 1,
           );
          $this->db->update('config', $datos);
          $base_url = base_url();
        header("Location: $base_url/config");
    }


	public function mantdes(){
        $conf = $this->db->get('config');
		$conf1 = $conf->result_array();
        $datos = array (
            'mant' => 0,
           );
          $this->db->update('config', $datos);
          $base_url = base_url();
        header("Location: $base_url/config");
    }




	public function analitycs(){
		if($this->session->userdata('login') == true AND $this->session->userdata('rol') == 1){
		$id = 1;
		$google = $this->input->post('google');
		$where = [
			'id'=>$id,

		];
		$this->db->where($where);
		$resultado = $this->db->get('config');
		$datos = [
			'analytics'=>$google

		];
		$this->db->where('id', $id);
        $this->db->update('config', $datos); 
		$base_url = base_url();
		header("Location: $base_url/config");
	}else{
		$base_url = base_url();
		header("Location: $base_url");
	}
	}

	public function download(){
		if($this->session->userdata('login') == true AND $this->session->userdata('rol') == 1){
		$id = 1;
		$link = $this->input->post('link');
		$where = [
			'id'=>$id,

		];
		$this->db->where($where);
		$resultado = $this->db->get('config');
		$datos = [
			'download'=>$link

		];
		$this->db->where('id', $id);
        $this->db->update('config', $datos); 
		$base_url = base_url();
		header("Location: $base_url/config");
	}else{
		$base_url = base_url();
		header("Location: $base_url");
	}
	}










}
