<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require FCPATH.'vendor/autoload.php';

use GuzzleHttp\Client;

class Shop extends MY_Controller {
	function __construct() {
        parent::__construct();
        $this->load->model('Apigettoken');
		$this->load->model('Apiserverinfo');
		$this->load->model('Apiserverstats');
		$this->load->model('Apiusers');
		$this->load->model('Apiplayers');
        $this->load->model('product');
		$this->load->model('Langs');
    }

    private function buildShopProducts()
    {
        $products = $this->product->getRows();
        $rows = array();

        if (!is_array($products)) {
            return $rows;
        }

        foreach ($products as $product) {
            if ((int) ($product['status'] ?? 0) !== 1) {
                continue;
            }

            $rows[] = array(
                'name' => $product['name'] ?? '',
                'price' => $product['price'] ?? 0,
                'image_url' => base_url('img/products/' . ($product['image'] ?? '')),
                'details_url' => base_url('products/' . ($product['url_slug'] ?? '')),
            );
        }

        return $rows;
    }
	
	public function index()
	{
        if ($this->redirectToMaintenanceIfNeeded()) {
            return;
        }

        $this->renderPublicPage('shop', array(
            'shop_products' => $this->buildShopProducts(),
        ));
	}
	
	public function shoping(){
		$pedido['status'] = 0;
		$player = $this->input->post('player');
		$id = $this->input->post('id');
		$user = $this->session->userdata('user');
		$product = $this->db->get_where('products', array('id' => $id));
		$product = $product->result_array();
		$user = $this->db->get_where('users', array('user' => $user));
		$user = $user->result_array();
		if($player == ''){
			$pedido['sms'] = 'Complete todos los campos';
			echo json_encode($pedido);
		}else{
		if($user[0]['balance'] >= $product[0]['price']){
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
