<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require FCPATH.'vendor/autoload.php';
use GuzzleHttp\Client;
class Admin extends CI_Controller {
	function __construct() {
        parent::__construct();
        $this->load->model('Apigettoken');
		$this->load->model('Apiserverinfo');
		$this->load->model('Apiregister');
		$this->load->model('Apiserverstats');
		$this->load->model('Apiusers');
		$this->load->model('Apiplayers');
		$this->load->model('newss');
		$this->load->model('shops');
        $this->load->helper('common');
        $this->load->library('form_validation');
    }
	

	/*
	////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	////////////////////////////////////////////////////////////Start Load Views///////////////////////////////////////////////////////////////////////////////////
	//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	*/
	public function index(){	
		$this->load->view('header');
        $this->load->view('sidebar');
		$this->load->view('admin');
		$this->load->view('footer');
	}
	public function news(){
		$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('admin/news');
		$this->load->view('footer');
	}
	public function shop(){
		$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('admin/shop');
		$this->load->view('footer');
	}
	public function config(){
		$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('admin/config');
		$this->load->view('footer');
	}
	/*
	//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	////////////////////////////////////////////////////////////End Load Views///////////////////////////////////////////////////////////////////////////////////
	////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	*/




	/*
	///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	////////////////////////////////////////////////////////////Start Dashboard///////////////////////////////////////////////////////////////////////////////////
	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	*/
	public function global(){
		$pedido['status'] = 0;
		$txt = $this->input->post('txt');
		if($txt == ''){
			$pedido['sms'] = 'Complete todos los campos';
			echo json_encode($pedido);
		}else{
		$this->load->model('Apigettoken');
				$accesstoken = $this->Apigettoken->apitoken();
				$global = [
					'Message' => $txt,
					"Color" => [
						"A"=> 100,
						"R"=> 255,
						"G"=> 53,
						"B"=> 71
					],
					  ];
					  $apiip = $this->config->item('apiip');
					  $client = new Client([						  
						'base_uri' => 'http://'.$apiip.'/api/v1/chat/global',
						'timeout'  => 5.0,
						'http_errors' => false
						]);
						$res = $client->request('POST','',[
							'headers' => [
								"authorization" => "Bearer ".$accesstoken['access_token'],
							],
							'form_params' => $global,							
						  ]);
						  $estado = json_decode($res->getBody(), true);
						  if ($res->getStatusCode() == '200')
							{
								$time = date("F j, Y, g:i a");
								$datos = array (
									'admin' => $this->session->userdata('user'),
									'user' => 'N/A',
									'action' =>  'Mensaje Global',
									'time' =>  $time,
								   );
								
								   $this->db->insert('logs', $datos);
								$pedido['status'] = 200;
								echo json_encode($pedido);
								
							}else{
								$pedido['sms'] = $estado['Message'];
								echo json_encode($pedido);
								
							}
		}
	}

	public function direct(){
		$pedido['status'] = 0;
		$txt = $this->input->post('txt');
		$user = $this->input->post('user');
		if($txt == '' || $user == ''){
			$pedido['sms'] = 'Complete todos los campos';
			echo json_encode($pedido);
		}else{
		$this->load->model('Apigettoken');
				$accesstoken = $this->Apigettoken->apitoken();
				$global = [
					'Message' => $txt,
					"Color" => [
						"A"=> 100,
						"R"=> 255,
						"G"=> 53,
						"B"=> 71
					],
					];
					$apiip = $this->config->item('apiip');
					$client = new Client([
						
						'base_uri' => 'http://'.$apiip.'/api/v1/chat/direct/'.$user,
						'timeout'  => 5.0,
						'http_errors' => false
						]);
						$res = $client->request('POST','',[
							'headers' => [
								"authorization" => "Bearer ".$accesstoken['access_token'],
							],
							'form_params' => $global,
							
						]);
						$estado = json_decode($res->getBody(), true);
						if ($res->getStatusCode() == '200') 
							{
								$time = date("F j, Y, g:i a");
								$datos = array (
									'admin' => $this->session->userdata('user'),
									'user' => 'N/A',
									'action' =>  'Mensaje Directo',
									'time' =>  $time,
								);
								
								$this->db->insert('logs', $datos);
								$pedido['status'] = 200;
								echo json_encode($pedido);
							}else{
								$pedido['sms'] = $estado['Message'];
								echo json_encode($pedido);
								
							}
		}
	}

	public function proximity(){
		$pedido['status'] = 0;
		$txt = $this->input->post('txt');
		$map = $this->input->post('map');
		if($txt == '' || $map == ''){
			$pedido['sms'] = 'Complete todos los campos';
			echo json_encode($pedido);
		}else{
		$this->load->model('Apigettoken');
				$accesstoken = $this->Apigettoken->apitoken();
				$global = [
					'Message' => $txt,
					"Color" => [
						"A"=> 100,
						"R"=> 255,
						"G"=> 53,
						"B"=> 71
					],
					];
					$apiip = $this->config->item('apiip');
					$client = new Client([
						
						'base_uri' => 'http://'.$apiip.'/api/v1/chat/proximity/'.$map,
						'timeout'  => 5.0,
						'http_errors' => false
						]);
						$res = $client->request('POST','',[
							'headers' => [
								"authorization" => "Bearer ".$accesstoken['access_token'],
							],
							'form_params' => $global,
							
						]);
						$estado = json_decode($res->getBody(), true);
						if ($res->getStatusCode() == '200') 
							{
								$time = date("F j, Y, g:i a");
								$datos = array (
									'admin' => $this->session->userdata('user'),
									'user' => 'N/A',
									'action' =>  'Mensaje de Proximidad',
									'time' =>  $time,
								);
								
								$this->db->insert('logs', $datos);
								$pedido['status'] = 200;
								echo json_encode($pedido);
							}else{
								$pedido['sms'] = $estado['Message'];
								echo json_encode($pedido);
								
							}
		}
	}

	public function ban(){
		$pedido['status'] = 0;
		$reason = $this->input->post('reason');
		$user = $this->input->post('user');
		$time = $this->input->post('time');
		if($reason == '' || $user == '' || $time == ''){
			$pedido['sms'] = 'Complete todos los campos';
			echo json_encode($pedido);
		}else{
		$this->load->model('Apigettoken');
				$accesstoken = $this->Apigettoken->apitoken();
				$global = [
					'duration' => $time,
					'reason' => $reason,
					'moderator' => $this->session->userdata('user'),
					];
					$apiip = $this->config->item('apiip');
					$client = new Client([
						
						'base_uri' => 'http://'.$apiip.'/api/v1/users/'.$user.'/admin/ban',
						'timeout'  => 5.0,
						'http_errors' => false
						]);
						$res = $client->request('POST','',[
							'headers' => [
								"authorization" => "Bearer ".$accesstoken['access_token'],
							],
							'form_params' => $global,
							
						]);
						$estado = json_decode($res->getBody(), true);
						if ($res->getStatusCode() == '200') 
							{
								$time = date("F j, Y, g:i a");
								$datos = array (
									'admin' => $this->session->userdata('user'),
									'user' => $user,
									'action' =>  'Ban',
									'time' =>  $time,
								);
								
								$this->db->insert('logs', $datos);
								$pedido['status'] = 200;
								echo json_encode($pedido);
							}else{
								$pedido['sms'] = $estado['Message'];
								echo json_encode($pedido);
								
							}
		}
	}

	public function unban(){
		$pedido['status'] = 0;
		$user = $this->input->post('user');
		if($user == '' ){
			$pedido['sms'] = 'Complete todos los campos';
			echo json_encode($pedido);
		}else{
		$this->load->model('Apigettoken');
				$accesstoken = $this->Apigettoken->apitoken();
			
					$apiip = $this->config->item('apiip');
					$client = new Client([
						'base_uri' => 'http://'.$apiip.'/api/v1/users/'.$user.'/admin/unban',
						'timeout'  => 5.0,
						'http_errors' => false
						]);
						$res = $client->request('POST','',[
							'headers' => [
								"authorization" => "Bearer ".$accesstoken['access_token'],
							],
							
							
						]);
						$estado = json_decode($res->getBody(), true);
						if ($res->getStatusCode() == '200') 
							{
								$time = date("F j, Y, g:i a");
								$datos = array (
									'admin' => $this->session->userdata('user'),
									'user' => $user,
									'action' =>  'Desbaneado',
									'time' =>  $time,
								);
								
								$this->db->insert('logs', $datos);
								$pedido['status'] = 200;
								echo json_encode($pedido);
							}else{
								$pedido['sms'] = $estado['Message'];
								echo json_encode($pedido);
								
							}
		}
	}

	public function mute(){
		
		$pedido['status'] = 0;
		$reason = $this->input->post('reason');
		$user = $this->input->post('user');
		$time = $this->input->post('time');
		if($reason == '' || $user == '' || $time == ''){
			$pedido['sms'] = 'Complete todos los campos';
			echo json_encode($pedido);
		}else{
		$this->load->model('Apigettoken');
				$accesstoken = $this->Apigettoken->apitoken();
				$global = [
					'duration' => $time,
					'reason' => $reason,
					'moderator' => $this->session->userdata('user'),
					];
					$apiip = $this->config->item('apiip');
					$client = new Client([
						
						'base_uri' => 'http://'.$apiip.'/api/v1/users/'.$user.'/admin/mute',
						'timeout'  => 5.0,
						'http_errors' => false
						]);
						$res = $client->request('POST','',[
							'headers' => [
								"authorization" => "Bearer ".$accesstoken['access_token'],
							],
							'form_params' => $global,
							
						]);
						$estado = json_decode($res->getBody(), true);
						if ($res->getStatusCode() == '200') 
							{
								$time = date("F j, Y, g:i a");
								$datos = array (
									'admin' => $this->session->userdata('user'),
									'user' => $user,
									'action' =>  'Muteado',
									'time' =>  $time,
								);
								
								$this->db->insert('logs', $datos);
								$pedido['status'] = 200;
								echo json_encode($pedido);
							}else{
								$pedido['sms'] = $estado['Message'];
								echo json_encode($pedido);
								
							}
		}	
	}

	public function unmute(){
		$pedido['status'] = 0;
		$user = $this->input->post('user');
		if($user == '' ){
			$pedido['sms'] = 'Complete todos los campos';
			echo json_encode($pedido);
		}else{
		$this->load->model('Apigettoken');
				$accesstoken = $this->Apigettoken->apitoken();
			
					$apiip = $this->config->item('apiip');
					$client = new Client([
						'base_uri' => 'http://'.$apiip.'/api/v1/users/'.$user.'/admin/unmute',
						'timeout'  => 5.0,
						'http_errors' => false
						]);
						$res = $client->request('POST','',[
							'headers' => [
								"authorization" => "Bearer ".$accesstoken['access_token'],
							],
							
							
						]);
						$estado = json_decode($res->getBody(), true);
						if ($res->getStatusCode() == '200') 
							{
								$time = date("F j, Y, g:i a");
								$datos = array (
									'admin' => $this->session->userdata('user'),
									'user' => $user,
									'action' =>  'Desmuteado',
									'time' =>  $time,
								);
								
								$this->db->insert('logs', $datos);
								$pedido['status'] = 200;
								echo json_encode($pedido);
							}else{
								$pedido['sms'] = $estado['Message'];
								echo json_encode($pedido);
								
							}
		}
	}

	public function kick(){
		$pedido['status'] = 0;
		$user = $this->input->post('user');
		if($user == '' ){
			$pedido['sms'] = 'Complete todos los campos';
			echo json_encode($pedido);
		}else{
		$this->load->model('Apigettoken');
				$accesstoken = $this->Apigettoken->apitoken();
			
					$apiip = $this->config->item('apiip');
					$client = new Client([
						'base_uri' => 'http://'.$apiip.'/api/v1/users/'.$user.'/admin/kick',
						'timeout'  => 5.0,
						'http_errors' => false
						]);
						$res = $client->request('POST','',[
							'headers' => [
								"authorization" => "Bearer ".$accesstoken['access_token'],
							],
							
							
						]);
						$estado = json_decode($res->getBody(), true);
						if ($res->getStatusCode() == '200') 
							{
								$time = date("F j, Y, g:i a");
								$datos = array (
									'admin' => $this->session->userdata('user'),
									'user' => $user,
									'action' =>  'Expulsado',
									'time' =>  $time,
								);
								
								$this->db->insert('logs', $datos);
								$pedido['status'] = 200;
								echo json_encode($pedido);
							}else{
								$pedido['sms'] = $estado['Message'];
								echo json_encode($pedido);
								
							}
		}
	}

	public function kill(){
		$pedido['status'] = 0;
		$user = $this->input->post('user');
		if($user == '' ){
			$pedido['sms'] = 'Complete todos los campos';
			echo json_encode($pedido);
		}else{
		$this->load->model('Apigettoken');
				$accesstoken = $this->Apigettoken->apitoken();
			
					$apiip = $this->config->item('apiip');
					$client = new Client([
						'base_uri' => 'http://'.$apiip.'/api/v1/users/'.$user.'/admin/kill',
						'timeout'  => 5.0,
						'http_errors' => false
						]);
						$res = $client->request('POST','',[
							'headers' => [
								"authorization" => "Bearer ".$accesstoken['access_token'],
							],
							
							
						]);
						$estado = json_decode($res->getBody(), true);
						if ($res->getStatusCode() == '200') 
							{
								$time = date("F j, Y, g:i a");
								$datos = array (
									'admin' => $this->session->userdata('user'),
									'user' => $user,
									'action' =>  'Asesinado',
									'time' =>  $time,
								);
								
								$this->db->insert('logs', $datos);
								$pedido['status'] = 200;
								echo json_encode($pedido);
							}else{
								$pedido['sms'] = $estado['Message'];
								echo json_encode($pedido);
								
							}
		}
	}

	public function tp(){
		$pedido['status'] = 0;
		$user = $this->input->post('user');
		$map = $this->input->post('map');
		if($user == '' || $map == ''){
			$pedido['sms'] = 'Complete todos los campos';
			echo json_encode($pedido);
		}else{
		$this->load->model('Apigettoken');
				$accesstoken = $this->Apigettoken->apitoken();
				$global = [
					'MapId' => $map,
					
					];
					$apiip = $this->config->item('apiip');
					$client = new Client([
						
						'base_uri' => 'http://'.$apiip.'/api/v1/users/'.$user.'/admin/warpto',
						'timeout'  => 5.0,
						]);
						$res = $client->request('POST','',[
							'headers' => [
								"authorization" => "Bearer ".$accesstoken['access_token'],
							],
							'form_params' => $global,
							
						]);
						$estado = json_decode($res->getBody(), true);
						if ($res->getStatusCode() == '200') 
							{
								$time = date("F j, Y, g:i a");
								$datos = array (
									'admin' => $this->session->userdata('user'),
									'user' => $user,
									'action' =>  'Teletransportado',
									'time' =>  $time,
								);
								
								$this->db->insert('logs', $datos);
								$pedido['status'] = 200;
								echo json_encode($pedido);
							}else{
								$pedido['sms'] = $estado['Message'];
								echo json_encode($pedido);
								
							}
		}
	}
	/*
	///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	////////////////////////////////////////////////////////////End Dashboard/////////////////////////////////////////////////////////////////////////////////////
	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	*/
	




	/*
	//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	////////////////////////////////////////////////////////////Start News///////////////////////////////////////////////////////////////////////////////////////
	////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	*/

	public function addnews(){
		$data = array();
        $txtData = array();         
        setlocale(LC_TIME, "spanish");
        $date = strftime("%A, %d de %B de %Y");
        $user = $this->session->userdata('user');
            $filename=$_FILES['archivo']['name'];


            $txtData = array(
                'title' => strip_tags($this->input->post('title')),
				'descrip' => strip_tags($this->input->post('descrip')),
                'txt' => strip_tags($this->input->post('txt')),
                'img' => ($filename),
                'date' => ($date),
                'admin' => ($user)
            );

                /*
                 * Genera la URL Amigable
                 */
                $title = strip_tags($this->input->post('title'));
                $titleURL = strtolower(url_title($title));
                if(isUrlExists('news',$titleURL)){
                   $titleURL = $titleURL.'-'.time(); 
                }
                $txtData['url_slug'] = $titleURL;
                
                //Inserta los datos del TXT a la base de datos
                $insert = $this->newss->insert($txtData);

              

                $archivo = "archivo";
                $config['upload_path'] = "img/news";
                $config['file_name'] = $filename;
                $config['allowed_types'] = "*";
                $config['max_size'] = "50000";
                $config['max_width'] = "2000";
                $config['max_height'] = "2000";
        
                $this->load->library('upload', $config);

                if (!$this->upload->do_upload($archivo)) {
                    //*** ocurrio un error
                    $data['uploadError'] = $this->upload->display_errors();
                    echo $this->upload->display_errors();
                    return;
                }
        
                $data['uploadSuccess'] = $this->upload->data();

            
        
        
        $data['txt'] = $txtData;
        
        //Carga la vista
		$this->load->view('header');
		$this->load->view('sidebar');
        $this->load->view('admin/news', $data, false);
		$this->load->view('footer');
        
        
    }

	public function delnews(){
		$id = $this->input->post('id');
        $this->db->delete('news', array ('id' => $id)); 
        $base_url = base_url();
        header("Location: $base_url/admin/news");
        
    }

	public function editnews(){
		$id = $this->input->post('id');
		$this->load->view('header');
        $this->load->view('admin/editnews', array('id' => $id));
		$this->load->view('footer');
	}
	
	public function editnewss(){
		$id = $this->input->post('id');
		$title = $this->input->post('title');
		$descrip = $this->input->post('descrip');
		$txt = $this->input->post('txt');
		$where = [
			'id'=>$id,

		];
		$this->db->where($where);
		$resultado = $this->db->get('news');
		$datos = [
			'title'=>$title,
			'descrip'=>$descrip,
			'txt'=>$txt

		];
		$this->db->where('id', $id);
        $this->db->update('news', $datos); 
		$base_url = base_url();
		header("Location: $base_url/admin/news");
	}


	/*
	///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	////////////////////////////////////////////////////////////End News//////////////////////////////////////////////////////////////////////////////////////////
	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	*/





	/*
	//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	////////////////////////////////////////////////////////////Start Shop///////////////////////////////////////////////////////////////////////////////////////
	////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	*/

	public function delproduct(){
		$id = $this->input->post('id');
        $this->db->delete('products', array ('id' => $id)); 
        $base_url = base_url();
        header("Location: $base_url/admin/shop");
        
    }

	public function addproduct(){
		$data = array();
        $txtData = array();         
        $user = $this->session->userdata('user');
            $filename=$_FILES['archivo']['name'];


            $txtData = array(
                'name' => strip_tags($this->input->post('name')),
				'descrip' => strip_tags($this->input->post('descrip')),
				'price' => strip_tags($this->input->post('price')),
                'aatk' => strip_tags($this->input->post('aatk')),
				'ainterac' => strip_tags($this->input->post('ainterac')),
                'image' => ($filename),
            );

                /*
                 * Genera la URL Amigable
                 */
                $title = strip_tags($this->input->post('name'));
                $titleURL = strtolower(url_title($title));
                if(isUrlExists('products',$titleURL)){
                   $titleURL = $titleURL.'-'.time(); 
                }
                $txtData['url_slug'] = $titleURL;
                
                //Inserta los datos del TXT a la base de datos
                $insert = $this->shops->insert($txtData);

              

                $archivo = "archivo";
                $config['upload_path'] = "img/products";
                $config['file_name'] = $filename;
                $config['allowed_types'] = "png";
                $config['max_size'] = "50000";
                $config['max_width'] = "2000";
                $config['max_height'] = "2000";
        
                $this->load->library('upload', $config);

                if (!$this->upload->do_upload($archivo)) {
                    //*** ocurrio un error
                    $data['uploadError'] = $this->upload->display_errors();
                    echo $this->upload->display_errors();
                    return;
                }
        
                $data['uploadSuccess'] = $this->upload->data();

            
        
        
        $data['txt'] = $txtData;
        
        //Carga la vista
		$this->load->view('header');
		$this->load->view('sidebar');
        $this->load->view('admin/shop', $data, false);
		$this->load->view('footer');
        

	}

	public function editproduct(){
		$id = $this->input->post('id');
		$this->load->view('header');
        $this->load->view('admin/editproduct', array('id' => $id));
		$this->load->view('footer');
	}

	public function editproducts(){
		$id = $this->input->post('id');
		$name = $this->input->post('name');
		$descrip = $this->input->post('descrip');
		$price = $this->input->post('price');
		$aatk = $this->input->post('aatk');
		$ainterac = $this->input->post('ainterac');
		$where = [
			'id'=>$id,

		];
		$this->db->where($where);
		$resultado = $this->db->get('products');
		$datos = [
			'name'=>$name,
			'descrip'=>$descrip,
			'price'=>$price,
			'aatk'=>$aatk,
			'ainterac'=>$ainterac,

		];
		$this->db->where('id', $id);
        $this->db->update('products', $datos); 
		$base_url = base_url();
		header("Location: $base_url/admin/shop");
	}


	/*
	///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	////////////////////////////////////////////////////////////End Shop//////////////////////////////////////////////////////////////////////////////////////////
	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	*/







	

}
