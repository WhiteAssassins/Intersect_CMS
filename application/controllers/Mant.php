<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require FCPATH.'vendor/autoload.php';
use GuzzleHttp\Client;
class Mant extends CI_Controller {
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
        $conf = $this->db->get('config');
		$conf1 = $conf->result_array(); 
       if($conf1['0']['mant'] == 1 AND $this->session->userdata('login') == false){
            $this->load->view('header');
            $this->load->view('mant');
        }else{
            $this->load->view('header');
            $this->load->view('navbar');
            $this->load->view('home');
            $this->load->view('footer');
        } 
       
	}

    public function login(){
        $user = $this->input->post('user');
        $pass = $this->input->post('pass');
        $where = [
            'user'=>$user,
            'pass'=>md5($pass)
        ];
        $this->db->where($where);
        $resultado = $this->db->get('users');
        $num = $resultado->num_rows();
        if($num == 0){
            $this->load->view('header');
            $data = [
                'sms'=>'Usted no es Administrador',
                'tipo'=>'error'
            ];
            
            $this->load->view('mant',$data);
        }else{
            $rest = $resultado->result_array();
            $data = [
                'user'=>$rest[0]['user'],
				'rol'=> 1,
                'login'=>true
            ];
            $this->session->set_userdata($data);
            $this->load->view('header');
            $this->load->view('sidebar');
            $this->load->view('admin');
            $this->load->view('footer');
            $base_url = base_url();
            header("Location: $base_url");
        }
    }
	
}
