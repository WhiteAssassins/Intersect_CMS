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
		$this->load->model('Langs');
    }
	
	public function index()
	{	
		if($this->session->userdata('login') == true AND $this->session->userdata('rol') == 1){
			$lang = $this->Langs->lang();
			switch($this->session->userdata('lang')){
				case "es":
					$this->parser->parse('header', $lang[0]); 
					$this->parser->parse('sidebar', $lang[0]); 
					$this->parser->parse('admin/config', $lang[0]); 
					$this->parser->parse('footer', $lang[0]); 
					break;
				case "en":
					$this->parser->parse('header', $lang[1]); 
					$this->parser->parse('sidebar', $lang[1]); 
					$this->parser->parse('admin/config', $lang[1]); 
					$this->parser->parse('footer', $lang[1]); 
					break;
				case "tr":
					$this->parser->parse('header', $lang[2]); 
					$this->parser->parse('sidebar', $lang[2]); 
					$this->parser->parse('admin/config', $lang[2]); 
					$this->parser->parse('footer', $lang[2]); 
					break;
				default:
					$this->parser->parse('header', $lang[0]); 
					$this->parser->parse('sidebar', $lang[0]); 
					$this->parser->parse('admin/config', $lang[0]); 
					$this->parser->parse('footer', $lang[0]); 
					break;

			}
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



	public function legal(){
		if($this->session->userdata('login') == true AND $this->session->userdata('rol') == 1){
			$lang = $this->Langs->lang();
			switch($this->session->userdata('lang')){
				case "es":
					$this->parser->parse('header', $lang[0]); 
					$this->parser->parse('admin/legal', $lang[0]); 
					$this->parser->parse('footer', $lang[0]); 
					break;
				case "en":
					$this->parser->parse('header', $lang[1]); 
					$this->parser->parse('admin/legal', $lang[1]); 
					$this->parser->parse('footer', $lang[1]); 
					break;
				case "tr":
					$this->parser->parse('header', $lang[2]); 
					$this->parser->parse('admin/legal', $lang[2]); 
					$this->parser->parse('footer', $lang[2]); 
					break;
				default:
					$this->parser->parse('header', $lang[0]); 
					$this->parser->parse('admin/legal', $lang[0]); 
					$this->parser->parse('footer', $lang[0]); 
					break;

			}
	}else{
		$base_url = base_url();
		header("Location: $base_url");
	}
	}

	public function terms(){
		if($this->session->userdata('login') == true AND $this->session->userdata('rol') == 1){
			$lang = $this->Langs->lang();
			switch($this->session->userdata('lang')){
				case "es":
					$this->parser->parse('header', $lang[0]); 
					$this->parser->parse('admin/terms', $lang[0]); 
					$this->parser->parse('footer', $lang[0]); 
					break;
				case "en":
					$this->parser->parse('header', $lang[1]); 
					$this->parser->parse('admin/terms', $lang[1]); 
					$this->parser->parse('footer', $lang[1]); 
					break;
				case "tr":
					$this->parser->parse('header', $lang[2]); 
					$this->parser->parse('admin/terms', $lang[2]); 
					$this->parser->parse('footer', $lang[2]); 
					break;
				default:
					$this->parser->parse('header', $lang[0]); 
					$this->parser->parse('admin/terms', $lang[0]); 
					$this->parser->parse('footer', $lang[0]); 
					break;

			}
	}else{
		$base_url = base_url();
		header("Location: $base_url");
	}
	}
	public function privacity(){
		if($this->session->userdata('login') == true AND $this->session->userdata('rol') == 1){
			$lang = $this->Langs->lang();
			switch($this->session->userdata('lang')){
				case "es":
					$this->parser->parse('header', $lang[0]); 
					$this->parser->parse('admin/privacity', $lang[0]); 
					$this->parser->parse('footer', $lang[0]); 
					break;
				case "en":
					$this->parser->parse('header', $lang[1]); 
					$this->parser->parse('admin/privacity', $lang[1]); 
					$this->parser->parse('footer', $lang[1]); 
					break;
				case "tr":
					$this->parser->parse('header', $lang[2]); 
					$this->parser->parse('admin/privacity', $lang[2]); 
					$this->parser->parse('footer', $lang[2]); 
					break;
				default:
					$this->parser->parse('header', $lang[0]); 
					$this->parser->parse('admin/privacity', $lang[0]); 
					$this->parser->parse('footer', $lang[0]); 
					break;
				}
	}else{
		$base_url = base_url();
		header("Location: $base_url");
	}
	}
	public function menus(){
		if($this->session->userdata('login') == true AND $this->session->userdata('rol') == 1){
			$lang = $this->Langs->lang();
			switch($this->session->userdata('lang')){
				case "es":
					$this->parser->parse('header', $lang[0]); 
					$this->parser->parse('admin/menus', $lang[0]); 
					$this->parser->parse('footer', $lang[0]); 
					break;
				case "en":
					$this->parser->parse('header', $lang[1]); 
					$this->parser->parse('admin/menus', $lang[1]); 
					$this->parser->parse('footer', $lang[1]); 
					break;
				case "tr":
					$this->parser->parse('header', $lang[2]); 
					$this->parser->parse('admin/menus', $lang[2]); 
					$this->parser->parse('footer', $lang[2]); 
					break;
				default:
					$this->parser->parse('header', $lang[0]); 
					$this->parser->parse('admin/menus', $lang[0]); 
					$this->parser->parse('footer', $lang[0]); 
					break;
				}
	}else{
		$base_url = base_url();
		header("Location: $base_url");
	}
	}


	public function editmenus(){
		if($this->session->userdata('login') == true AND $this->session->userdata('rol') == 1){
		$menuheader = $this->input->post('menuheader');

		$menu1icon = $this->input->post('menu1icon');
		$menu1header = $this->input->post('menu1header');
		$menu1text = $this->input->post('menu1text');

		$menu2icon = $this->input->post('menu2icon');
		$menu2header = $this->input->post('menu2header');
		$menu2text = $this->input->post('menu2text');

		$menu3icon = $this->input->post('menu3icon');
		$menu3header = $this->input->post('menu3header');
		$menu3text = $this->input->post('menu3text');

		$id = 1;
		$where = [
			'id'=>$id,

		];
		$this->db->where($where);
		$resultado = $this->db->get('config');
		$datos = [
			'menuheader'=>$menuheader,

			'menu1icon'=>$menu1icon,
			'menu1header'=>$menu1header,
			'menu1text'=>$menu1text,

			'menu2icon'=>$menu2icon,
			'menu2header'=>$menu2header,
			'menu2text'=>$menu2text,

			'menu3icon'=>$menu3icon,
			'menu3header'=>$menu3header,
			'menu3text'=>$menu3text,

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

	public function changeprivacity(){
		if($this->session->userdata('login') == true AND $this->session->userdata('rol') == 1){
		$id = 1;
		$privacity = $this->input->post('privacity');
		$where = [
			'id'=>$id,

		];
		$this->db->where($where);
		$resultado = $this->db->get('config');
		$datos = [
			'privacity'=>$privacity

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
	public function changeterms(){
		if($this->session->userdata('login') == true AND $this->session->userdata('rol') == 1){
		$id = 1;
		$terms = $this->input->post('terms');
		$where = [
			'id'=>$id,

		];
		$this->db->where($where);
		$resultado = $this->db->get('config');
		$datos = [
			'terms'=>$terms

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

	public function changelegal(){
		if($this->session->userdata('login') == true AND $this->session->userdata('rol') == 1){
		$id = 1;
		$legal = $this->input->post('legal');
		$where = [
			'id'=>$id,

		];
		$this->db->where($where);
		$resultado = $this->db->get('config');
		$datos = [
			'legal'=>$legal

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
