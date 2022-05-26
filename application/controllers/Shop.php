<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require FCPATH.'vendor/autoload.php';
use GuzzleHttp\Client;
class Shop extends CI_Controller {
	function __construct() {
        parent::__construct();
		$this->load->library('paypal_lib');
        $this->load->model('Apigettoken');
		$this->load->model('Apiserverinfo');
		$this->load->model('Apiregister');
		$this->load->model('Apiserverstats');
		$this->load->model('Apiusers');
		$this->load->model('Apiplayers');
		$this->load->model('paypalmodel');
    }
	
	public function index()
	{	
		$this->load->view('header');
		$this->load->view('navbar');  
		$this->load->view('shop');
		$this->load->view('footer');
	}
	
	public function shoping(){
		 $billing = $this->input->post('billing');
		 $id = $this->input->post('id');
		 if($billing = "paypal"){
			
			$returnURL = base_url().'shop/paymentSuccess';
			$failURL = base_url().'shop/fail';
			$notifyURL = base_url().'shop/ipn'; 
			$product = $this->paypalmodel->getProducts($id);
			$userID = 1; //current user id
			$logo = base_url().'Your_logo_url';
			 
			$this->paypal_lib->add_field('return', $returnURL);
			$this->paypal_lib->add_field('fail_return', $failURL);
			$this->paypal_lib->add_field('notify_url', $notifyURL);
			$this->paypal_lib->add_field('item_name', $product['name']);
			$this->paypal_lib->add_field('custom', $userID);
			$this->paypal_lib->add_field('item_number',  $product['id']);
			$this->paypal_lib->add_field('amount',  $product['price']);        
			$this->paypal_lib->image($logo);
			 
			$this->paypal_lib->paypal_auto_form();
		 }elseif($billing = "qvapay"){

		 }
	}

	function paymentSuccess(){
 
        //get the transaction data
        $paypalInfo = $this->input->post();
           
        $data['item_number'] =  $_POST['item_number']; 
        $data['txn_id'] = $_POST['txn_id'];
        $data['payment_amt'] = $_POST['mc_gross'];
        $data['currency_code'] = $_POST['mc_currency'];
        $data['status'] = $_POST["payment_status"];

        //pass the transaction data to view
        $this->load->view('shop/paymentSuccess', $data);
     }

	 function paymentFail(){
        //if transaction cancelled
        $this->load->view('shop/paymentFail');
     }

	function ipn(){
        //paypal return transaction details array
        $paypalInfo    = $this->input->post();
 
        $data['user_id'] = $paypalInfo['custom'];
        $data['product_id']    = $paypalInfo["item_number"];
        $data['txn_id']    = $paypalInfo["txn_id"];
        $data['payment_gross'] = $paypalInfo["mc_gross"];
        $data['currency_code'] = $paypalInfo["mc_currency"];
        $data['payer_email'] = $paypalInfo["payer_email"];
        $data['payment_status']    = $paypalInfo["payment_status"];
 
        $paypalURL = $this->paypal_lib->paypal_url;        
        $result    = $this->paypal_lib->curlPost($paypalURL,$paypalInfo);
         
        //check whether the payment is verified
        if(preg_match("/VERIFIED/i",$result)){
            //insert the transaction data into the database
            $this->paypalmodel->storeTransaction($data);
        }
    }
}
