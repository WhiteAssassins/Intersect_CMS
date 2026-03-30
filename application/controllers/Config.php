<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require FCPATH.'vendor/autoload.php';
use GuzzleHttp\Client;
class Config extends CI_Controller {
	function __construct() {
        parent::__construct();
        $this->load->model('Apigettoken');
		$this->load->model('Apiserverinfo');
		$this->load->model('Apiserverstats');
		$this->load->model('Apiusers');
		$this->load->model('Apiplayers');
		$this->load->model('Langs');
        $this->requireAdmin();
    }

    private function requireAdmin() {
        if ($this->session->userdata('login') != true || (int) $this->session->userdata('rol') !== 1) {
            redirect(base_url());
            exit;
        }
    }

    private function getLanguageData()
    {
        return $this->Langs->current();
    }

    private function getConfigRow()
    {
        return (array) $this->db->get('config')->row_array();
    }

    private function renderConfigPage($view, array $data = array(), $withSidebar = true)
    {
        $viewData = array_merge($this->getLanguageData(), $data);

        $this->parser->parse('header', $viewData);
        if ($withSidebar) {
            $this->parser->parse('sidebar', $viewData);
        }
        $this->parser->parse($view, $viewData);
        $this->parser->parse('footer', $viewData);
    }

    private function buildConfigDashboardViewData()
    {
        $configRow = $this->getConfigRow();

        return array(
            'config_color1' => $configRow['color1'] ?? '#000000',
            'config_color2' => $configRow['color2'] ?? '#000000',
            'config_analytics' => $configRow['analytics'] ?? '',
            'config_download' => $configRow['download'] ?? '',
            'config_maintenance_enabled' => (int) ($configRow['mant'] ?? 0) === 1,
        );
    }

    private function buildConfigMenuViewData()
    {
        $configRow = $this->getConfigRow();

        return array(
            'config_menu_header' => $configRow['menuheader'] ?? '',
            'config_menu1_icon' => $configRow['menu1icon'] ?? '',
            'config_menu1_header' => $configRow['menu1header'] ?? '',
            'config_menu1_text' => $configRow['menu1text'] ?? '',
            'config_menu2_icon' => $configRow['menu2icon'] ?? '',
            'config_menu2_header' => $configRow['menu2header'] ?? '',
            'config_menu2_text' => $configRow['menu2text'] ?? '',
            'config_menu3_icon' => $configRow['menu3icon'] ?? '',
            'config_menu3_header' => $configRow['menu3header'] ?? '',
            'config_menu3_text' => $configRow['menu3text'] ?? '',
        );
    }

    private function buildConfigContentViewData($field)
    {
        $configRow = $this->getConfigRow();

        return array(
            'config_id' => $configRow['id'] ?? 1,
            'config_content' => $configRow[$field] ?? '',
        );
    }
	
	public function index()
	{
        $this->renderConfigPage('admin/config', $this->buildConfigDashboardViewData());
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
		$this->db->get('config');
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

        $datos = array (
            'mant' => 1,
           );
          $this->db->update('config', $datos);
          $base_url = base_url();
        header("Location: $base_url/config");
    }


	public function mantdes(){
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
		$this->db->get('config');
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
		$this->db->get('config');
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
        $this->renderConfigPage('admin/legal', $this->buildConfigContentViewData('legal'), false);
	}

	public function terms(){
        $this->renderConfigPage('admin/terms', $this->buildConfigContentViewData('terms'), false);
	}
	public function privacity(){
        $this->renderConfigPage('admin/privacity', $this->buildConfigContentViewData('privacity'), false);
	}
	public function menus(){
        $this->renderConfigPage('admin/menus', $this->buildConfigMenuViewData(), false);
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
		$this->db->get('config');
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
		$this->db->get('config');
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
		$this->db->get('config');
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
		$this->db->get('config');
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

	public function changelang(){
		if($this->session->userdata('login') == true AND $this->session->userdata('rol') == 1){
		$lang = $this->input->post('lang');
		$id = 1;
		$where = [
			'id'=>$id,
		];
		$this->db->where($where);
		$this->db->get('config');
		$datos = [
			'lang'=>$lang,
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
