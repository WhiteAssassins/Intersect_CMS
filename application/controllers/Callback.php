<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require FCPATH.'vendor/autoload.php';
use GuzzleHttp\Client;
class Callback extends CI_Controller {
	function __construct() {
        parent::__construct();
        $this->load->model('Apigettoken');
		$this->load->model('Apiserverinfo');
		$this->load->model('Apiregister');
		$this->load->model('Apiserverstats');
		$this->load->model('Apiusers');
		$this->load->model('Apiplayers');
    }
	
	public function index(){
        $method = $_GET['remote_id'];
        $paymentid = $_GET['id'];
        $uuid = $_GET['uuid'];
        $data = [
            'payment_id' => $paymentid,
            'method' => $method,
            'transid' => $uuid
        ];
        $this->db->insert('payments', $data);
    }

	
}
