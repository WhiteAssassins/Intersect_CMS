<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require FCPATH.'vendor/autoload.php';
use GuzzleHttp\Client;
class Shop extends CI_Controller {
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
					$this->parser->parse('shop', $lang[0]); 
					$this->parser->parse('footer', $lang[0]); 
					break;
				case "en":
					$this->parser->parse('header', $lang[1]); 
					$this->parser->parse('navbar', $lang[1]); 
					$this->parser->parse('shop', $lang[1]); 
					$this->parser->parse('footer', $lang[1]); 
					break;
				case "tr":
					$this->parser->parse('header', $lang[2]); 
					$this->parser->parse('navbar', $lang[2]); 
					$this->parser->parse('shop', $lang[2]); 
					$this->parser->parse('footer', $lang[2]); 
					break;
				case "jp":
					$this->parser->parse('header', $lang[3]); 
					$this->parser->parse('navbar', $lang[3]); 
					$this->parser->parse('shop', $lang[3]); 
					$this->parser->parse('footer', $lang[3]); 
					break;	
				default:
					$this->parser->parse('header', $lang[0]); 
					$this->parser->parse('navbar', $lang[0]); 
					$this->parser->parse('shop', $lang[0]); 
					$this->parser->parse('footer', $lang[0]); 
					break;

			}
		}
	}
	
	public function shoping(){
		$pedido['status'] = 0;
		//get from post the player
		$player = $this->input->post('player');
		//get from post the id
		$id = $this->input->post('id');
		//get from session user
		$user = $this->session->userdata('user');
		//get from the db products the item with the id
		$product = $this->db->get_where('products', array('id' => $id));
		$product = $product->result_array();
		//get from the db users the user with the user
		$user = $this->db->get_where('users', array('user' => $user));
		$user = $user->result_array();
		//verify if the user balance is mayor than the price of the product
		if($player == ''){
			$pedido['sms'] = 'Complete todos los campos';
			echo json_encode($pedido);
		}else{
		if($user[0]['balance'] >= $product[0]['price']){
			//connect to the api
			$apiip = $this->config->item('apiip');
				$this->load->model('Apigettoken');
				$accesstoken = $this->Apigettoken->apitoken();
				$apiuser = [
					'itemid' => $product[0]['ingameid'],
					'quantity' => 1,
					  ];
					 
					  $client = new Client([
						'base_uri' => 'http://'.$apiip.'/api/v1/players/'.$player.'/items/give',
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
						  $estado = json_decode($res->getBody(), true);
						  if ($res->getStatusCode() == '200') 
							  {
								  //reduce the balance of the user
									$this->db->set('balance', 'balance-'.$product[0]['price'], FALSE);
									$this->db->where('user', $user[0]['user']);
									$this->db->update('users');
								  	$pedido['status'] = 200;
								  	echo json_encode($pedido);
							  }else{
								  $pedido['sms'] = $estado['Message'];
								  echo json_encode($pedido);
								  
							  }
		}else{
			$pedido['sms'] = "No tiene Saldo Suficiente";
			echo json_encode($pedido);
		}

	}
	}




}
