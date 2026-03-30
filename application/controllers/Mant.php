<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require FCPATH.'vendor/autoload.php';
use GuzzleHttp\Client;
class Mant extends MY_Controller {
	function __construct() {
        parent::__construct();
    }
	
	public function index()
	{
        if ($this->isMaintenanceEnabled() && !$this->session->userdata('login')) {
            $this->renderMinimalPage('mant');
            return;
        }

        $this->redirectTo('');
	}

    public function login(){
        $user = $this->input->post('user');
        $pass = $this->input->post('pass');
        $resultado = $this->db->get_where('users', array('user' => $user));
        $rest = $resultado->row_array();
        if(!$rest || !cms_password_verify($pass, $rest['pass'])){
            $base_url = base_url();
            header("Location: $base_url/mant");
             
        }elseif($rest['rol'] == 1){
            if (cms_password_needs_rehash($rest['pass'])) {
                $this->db->where('id', $rest['id']);
                $this->db->update('users', array('pass' => cms_hash_password($pass)));
            }
            $data = [
                'user'=>$rest['user'],
				'rol'=> 1,
                'login'=>true
            ];
            $this->session->set_userdata($data);
            $base_url = base_url();
            header("Location: $base_url");
        }
    }
	
}
