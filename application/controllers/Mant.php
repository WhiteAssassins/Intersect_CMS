<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require FCPATH.'vendor/autoload.php';
use GuzzleHttp\Client;
class Mant extends CI_Controller {
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
            case "jp":
                $this->parser->parse('header', $lang[3]); 
                $this->parser->parse('mant', $lang[3]); 
                break;
                case "de":
                    $this->parser->parse('header', $lang[4]); 
                    $this->parser->parse('mant', $lang[4]); 
                    break;	
                case "ru":
                    $this->parser->parse('header', $lang[5]); 
                    $this->parser->parse('mant', $lang[5]); 
                    break;
                case "zh":
                    $this->parser->parse('header', $lang[6]); 
                    $this->parser->parse('mant', $lang[6]); 
                    break;	
                case "fr":
                    $this->parser->parse('header', $lang[7]); 
                    $this->parser->parse('mant', $lang[7]); 
                    break;	
                case "pt":
                    $this->parser->parse('header', $lang[8]); 
                    $this->parser->parse('mant', $lang[8]); 
                    break;
                case "hi":
                    $this->parser->parse('header', $lang[9]); 
                    $this->parser->parse('mant', $lang[9]); 

                    break;	
                case "ar":
                    $this->parser->parse('header', $lang[10]); 
                    $this->parser->parse('mant', $lang[10]); 
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
        $rest = $resultado->result_array();
        if($num == 0){
            $base_url = base_url();
            header("Location: $base_url/mant");
            
        }elseif($rest[0]['rol'] == 1){
            $data = [
                'user'=>$rest[0]['user'],
				'rol'=> 1,
                'login'=>true
            ];
            $this->session->set_userdata($data);
            $base_url = base_url();
            header("Location: $base_url");
        }
    }
	
}
