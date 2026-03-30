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

    private function getLanguageIndex()
    {
        switch ($this->session->userdata('lang')) {
            case 'en': return 1;
            case 'tr': return 2;
            case 'jp': return 3;
            case 'de': return 4;
            case 'ru': return 5;
            case 'zh': return 6;
            case 'fr': return 7;
            case 'pt': return 8;
            case 'hi': return 9;
            case 'ar': return 10;
            case 'es':
            default:
                return 0;
        }
    }

    private function buildHomeViewData(array $configRow)
    {
        $serverStats = (array) $this->Apiserverstats->serverinfo();
        $users = (array) $this->Apiusers->user();

        return array(
            'home_uptime_hours' => round(((float) ($serverStats['uptime'] ?? 0)) / 1000 / 60 / 60, 2),
            'home_online_count' => (int) ($serverStats['onlineCount'] ?? 0),
            'home_total_users' => (int) ($users['Total'] ?? 0),
            'home_menu_header' => $configRow['menuheader'] ?? '',
            'home_menu1_icon' => $configRow['menu1icon'] ?? '',
            'home_menu1_header' => $configRow['menu1header'] ?? '',
            'home_menu1_text' => $configRow['menu1text'] ?? '',
            'home_menu2_icon' => $configRow['menu2icon'] ?? '',
            'home_menu2_header' => $configRow['menu2header'] ?? '',
            'home_menu2_text' => $configRow['menu2text'] ?? '',
            'home_menu3_icon' => $configRow['menu3icon'] ?? '',
            'home_menu3_header' => $configRow['menu3header'] ?? '',
            'home_menu3_text' => $configRow['menu3text'] ?? '',
        );
    }
	
	public function index()
	{	
		$configRow = (array) $this->db->get('config')->row_array();
       if(($configRow['mant'] ?? 0) == 1 AND $this->session->userdata('login') == false){
			$base_url = base_url();
            header("Location: $base_url/mant");
        }else{
			$lang = $this->Langs->lang();
            $viewData = array_merge($lang[$this->getLanguageIndex()], $this->buildHomeViewData($configRow));
			$this->parser->parse('header', $viewData); 
			$this->parser->parse('navbar', $viewData); 
			$this->parser->parse('home', $viewData); 
			$this->parser->parse('footer', $viewData);
		
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
								'pass' => cms_hash_password($pass),
								'rol' => 2,
								'email' => $email,
								);
								$existing = $this->db->get_where('users', array('user' => $user))->row_array();
								if ($existing) {
									$this->db->where('id', $existing['id']);
									$this->db->update('users', $users);
								} else {
									$this->db->insert('users', $users);
								}

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
        $resultado = $this->db->get_where('users', array('user' => $user));
        $rest = $resultado->row_array();
        if($rest && cms_password_verify($pass, $rest['pass'])){
            if (cms_password_needs_rehash($rest['pass'])) {
                $this->db->where('id', $rest['id']);
                $this->db->update('users', array('pass' => cms_hash_password($pass)));
            }
            $data = [
                'user'=>$rest['user'],
				'rol'=> $rest['rol'],
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
								'pass' => cms_hash_password($pass),
								'rol' => $rol,
								'email' => $estado['Email'],
								);
								$existing = $this->db->get_where('users', array('user' => $estado['Name']))->row_array();
								if ($existing) {
									$this->db->where('id', $existing['id']);
									$this->db->update('users', $users);
								} else {
									$this->db->insert('users', $users);
								}
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
