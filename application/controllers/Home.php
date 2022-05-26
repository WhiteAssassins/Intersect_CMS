<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require FCPATH.'vendor/autoload.php';
use GuzzleHttp\Client;
class Home extends CI_Controller {
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
		$this->load->view('header');
		$this->load->view('navbar');
		$this->load->view('home');
		$this->load->view('footer');
	}
	public function reg(){
		$pedido['status'] = 0;
		$user = $this->input->post('user');
		$pass = $this->input->post('pass');
		$pass1 = $this->input->post('pass1');
		$email = $this->input->post('email');
		if($user == '' || $pass == '' || $pass1 == ''|| $email == ''){
			$pedido['sms'] = 'Complete todos los campos';
			echo json_encode($pedido);
		}else{
			if($pass == $pass1){
				$apiip = $this->config->item('apiip');
				$this->load->model('Apigettoken');
				$accesstoken = $this->Apigettoken->apitoken();
				$apiuser = [
					'username' => $user,
					'password' => hash('sha256', $pass),
					'email' => $email,
					  ];
					 
					  $client = new Client([
						'base_uri' => 'http://'.$apiip.'/api/v1/users/register',
						'timeout'  => 5.0,
						'http_errors' => false
						]);
						$res = $client->request('POST','',[
							'headers' => [
								"authorization" => "Bearer ".$accesstoken['access_token'],
							],
							'form_params' => $apiuser,
							
						  ]);
						  $estado = json_decode($res->getBody(), true);
						  if ($res->getStatusCode() == '200') //Verifico que me retorne 200 = OK
							{
								$pedido['status'] = 200;
								echo json_encode($pedido);
							}else{
								$pedido['sms'] = $estado['Message'];
								echo json_encode($pedido);
								
							}
						  
						
			}else{
				$pedido['sms'] = 'Sus contraseñas deben coincidir';
				echo json_encode($pedido);
				
			}
			
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
            $this->load->view('navbar',$data);
            
            $this->load->view('home');
            $this->load->view('footer');
        }else{
            $rest = $resultado->result_array();
            $data = [
                'user'=>$rest[0]['user'],
				'rol'=> 1,
                'login'=>true
            ];
            $this->session->set_userdata($data);
            $this->load->view('header');
            $this->load->view('navbar');
            $this->load->view('home');
            $this->load->view('footer');
            $base_url = base_url();
            header("Location: $base_url");
        }
	}
	public function logout(){
        $this->session->sess_destroy();
        $base_url = base_url();
        header("Location: $base_url");
    }
}
