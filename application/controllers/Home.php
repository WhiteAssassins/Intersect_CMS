<?php
require FCPATH.'vendor/autoload.php';
use GuzzleHttp\Client;
class Home extends CI_Controller {
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
			$base_url = base_url();
            header("Location: $base_url/mant");
        }else{
			$lang = $this->Langs->lang();
			switch($this->session->userdata('lang')){
				case "es":
					$this->parser->parse('header', $lang[0]); 
					$this->parser->parse('navbar', $lang[0]); 
					$this->parser->parse('home', $lang[0]); 
					$this->parser->parse('footer', $lang[0]); 
					break;
				case "en":
					$this->parser->parse('header', $lang[1]); 
					$this->parser->parse('navbar', $lang[1]); 
					$this->parser->parse('home', $lang[1]); 
					$this->parser->parse('footer', $lang[1]); 
					break;
				case "tr":
					$this->parser->parse('header', $lang[2]); 
					$this->parser->parse('navbar', $lang[2]); 
					$this->parser->parse('home', $lang[2]); 
					$this->parser->parse('footer', $lang[2]); 
					break;
				case "jp":
					$this->parser->parse('header', $lang[3]); 
					$this->parser->parse('navbar', $lang[3]); 
					$this->parser->parse('home', $lang[3]); 
					$this->parser->parse('footer', $lang[3]); 
					break;
				case "de":
					$this->parser->parse('header', $lang[4]); 
					$this->parser->parse('navbar', $lang[4]); 
					$this->parser->parse('home', $lang[4]); 
					$this->parser->parse('footer', $lang[4]); 
					break;	
				case "ru":
					$this->parser->parse('header', $lang[5]); 
					$this->parser->parse('navbar', $lang[5]); 
					$this->parser->parse('home', $lang[5]); 
					$this->parser->parse('footer', $lang[5]); 
					break;
				case "zh":
					$this->parser->parse('header', $lang[6]); 
					$this->parser->parse('navbar', $lang[6]); 
					$this->parser->parse('home', $lang[6]); 
					$this->parser->parse('footer', $lang[6]); 
					break;	
				case "fr":
					$this->parser->parse('header', $lang[7]); 
					$this->parser->parse('navbar', $lang[7]); 
					$this->parser->parse('home', $lang[7]); 
					$this->parser->parse('footer', $lang[7]); 
					break;	
				case "pt":
					$this->parser->parse('header', $lang[8]); 
					$this->parser->parse('navbar', $lang[8]); 
					$this->parser->parse('home', $lang[8]); 
					$this->parser->parse('footer', $lang[8]); 
					break;
				case "hi":
					$this->parser->parse('header', $lang[9]); 
					$this->parser->parse('navbar', $lang[9]); 
					$this->parser->parse('home', $lang[9]); 
					$this->parser->parse('footer', $lang[9]); 
					break;	
				case "ar":
					$this->parser->parse('header', $lang[10]); 
					$this->parser->parse('navbar', $lang[10]); 
					$this->parser->parse('home', $lang[10]); 
					$this->parser->parse('footer', $lang[10]); 
					break;					
				default:
					$this->parser->parse('header', $lang[0]); 
					$this->parser->parse('navbar', $lang[0]); 
					$this->parser->parse('home', $lang[0]); 
					$this->parser->parse('footer', $lang[0]); 
					break;

			}
		
		}
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
						 		$users = array(
								'user' => $user,
								'pass' => md5($pass),
								'rol' => 2,
								'email' => $email,
								);
								$this->db->insert('users', $users);

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
        if($num == 1){
			$rest = $resultado->result_array();
            $data = [
                'user'=>$rest[0]['user'],
				'rol'=> $rest[0]['rol'],
                'login'=>true
            ];
            $this->session->set_userdata($data);
            $base_url = base_url();
            header("Location: $base_url");
        }else{
			$apiip = $this->config->item('apiip');
				$this->load->model('Apigettoken');
				$accesstoken = $this->Apigettoken->apitoken();
					 
					  $client = new Client([
						'base_uri' => 'http://'.$apiip.'/api/v1/users/'.$user,
						'timeout'  => 5.0,
						'http_errors' => false
						]);
						$res = $client->request('GET','',[
							'headers' => [
								"authorization" => "Bearer ".$accesstoken['access_token'],
							],						
						  ]);
						  $estado = json_decode($res->getBody(), true);
						  if ($res->getStatusCode() == '200') //Verifico que me retorne 200 = OK
							{
								
								$apiip = $this->config->item('apiip');
				$this->load->model('Apigettoken');
				$accesstoken = $this->Apigettoken->apitoken();
				$apiuser = [
					'password' => hash('sha256', $pass),
					  ];	 
					  $client = new Client([
						'base_uri' => 'http://'.$apiip.'/api/v1/users/'.$user.'/password/validate',
						'timeout'  => 5.0,
						'http_errors' => false
						]);
						$res = $client->request('POST','',[
							'headers' => [
								"authorization" => "Bearer ".$accesstoken['access_token'],
							],						
							'form_params' => $apiuser,
						  ]);
						  if ($res->getStatusCode() == '200') //Verifico que me retorne 200 = OK
						  {
							if($estado['Power']['Editor'] == true){
								$rol = 1;
							}else{
									 $rol = 2;
									}
							$rest = $resultado->result_array();
							$data = [
								'user'=>$estado['Name'],
								'rol'=> $rol,
								'login'=>true
							];
							$users = array(
								'user' => $estado['Name'],
								'pass' => md5($pass),
								'rol' => $rol,
								'email' => $estado['Email'],
								);
								$this->db->insert('users', $users);
							$this->session->set_userdata($data);
							$base_url = base_url();
							header("Location: $base_url");
						  }else{
							$base_url = base_url();
							header("Location: $base_url");
						  }





							}else{
								$base_url = base_url();
							header("Location: $base_url");
							}





			
        }

	}










	public function logout(){
        $this->session->sess_destroy();
        $base_url = base_url();
        header("Location: $base_url");
    }
}
