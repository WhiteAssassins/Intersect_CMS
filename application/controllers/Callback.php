<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require FCPATH.'vendor/autoload.php';
use GuzzleHttp\Client;
class Callback extends CI_Controller {
	function __construct() {
        parent::__construct();
        $this->load->model('Apigettoken');
		$this->load->model('Apiserverinfo');
		$this->load->model('Apiserverstats');
		$this->load->model('Apiusers');
		$this->load->model('Apiplayers');
	}
	
	public function index(){
        $remoteId = trim((string) $this->input->get('remote_id', TRUE));
        $paymentid = trim((string) $this->input->get('id', TRUE));
        $uuid = trim((string) $this->input->get('uuid', TRUE));

        if ($remoteId === '' || $paymentid === '' || $uuid === '') {
            show_error('Invalid payment callback.', 400);
            return;
        }

        $exists = $this->db->get_where('payments', array('payment_id' => $paymentid, 'transid' => $uuid))->row_array();
        if ($exists) {
            return;
        }

        $data = [
            'payment_id' => $paymentid,
            'method' => $remoteId,
            'transid' => $uuid
        ];
        $this->db->insert('payments', $data);
    }

	
}
