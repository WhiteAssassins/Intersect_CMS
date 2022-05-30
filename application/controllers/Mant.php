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
        $this->load->model('Langs');
    }
	
	public function index()
	{	
        $conf = $this->db->get('config');
		$conf1 = $conf->result_array(); 
       if($conf1['0']['mant'] == 1 AND $this->session->userdata('login') == false){

        $lang = $this->Langs->lang();
        switch($this->session->userdata('lang')){
            case "es":
                $this->parser->parse('header', $lang[0]);
                $this->parser->parse('mant', $lang[0]);
                break;
            case "en":
                $this->parser->parse('header', $lang[1]); 
                $this->parser->parse('mant', $lang[1]); 
                break;
            case "tr":
                $this->parser->parse('header', $lang[2]); 
                $this->parser->parse('mant', $lang[2]); 
                break;
            default:
                $this->parser->parse('header', $lang[0]); 
                $this->parser->parse('mant', $lang[0]); 
                break;

        }
        }else{
            $base_url = base_url();
            header("Location: $base_url");
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
