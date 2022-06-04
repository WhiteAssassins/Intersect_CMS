<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require FCPATH.'vendor/autoload.php';
use GuzzleHttp\Client;
class Ok extends CI_Controller {
	function __construct() {
        parent::__construct();
    $this->load->model('Apigettoken');
		$this->load->model('Apiserverinfo');
		$this->load->model('Apiserverstats');
		$this->load->model('Apiusers');
		$this->load->model('Apiplayers');
    $this->load->model('Langs');
    }
	
	public function index(){
        $uuid = $_GET['transaction_uuid'];
        $apiuser = [
            'app_id' => $this->config->item('apiqvapayid'),
            'app_secret' => $this->config->item('apiqvapaysecret'),
            
              ];
            $client = new Client([
          'base_uri' => 'https://qvapay.com/api/v1/transactions/'.$uuid,
          'timeout'  => 5.0,
          ]);
          $res = $client->request('POST', '', ['form_params' => $apiuser]);
          $transaction = json_decode($res->getBody(), true);

          $amount = $transaction['amount'];
          $status = $transaction['status'];
          $user = $this->session->userdata('user');
          if($status == "paid"){
              $where2 = [
                'uuid' => $uuid
              ];
              $this->db->where($where2);
              $paymentstatus = $this->db->get('paymentstatus');
              $num = $paymentstatus->num_rows();



              if($num == 0){



                $datos2 = [
                  'user' => $user,
                  'uuid'=> $uuid,
                  'status' => 'payed'
                  
                ];
                $this->db->insert('paymentstatus', $datos2);


                
                $where = [
                  'user' => $user
                ];
                $this->db->where($where);
                $resultado = $this->db->get('users');
                $rest = $resultado->result_array();
                $datos = [
                      'balance'=>$rest[0]['balance'] + $amount,


                  ];
                $this->db->where('user', $user);
                $this->db->update('users', $datos); 

              }
             




          }
          $lang = $this->Langs->lang();
          switch($this->session->userdata('lang')){
            case "es":
              $this->parser->parse('header', $lang[0]); 
              $this->parser->parse('navbar', $lang[0]); 
              $this->parser->parse('user/ok', $lang[0]); 
              $this->parser->parse('footer', $lang[0]); 
              break;
            case "en":
              $this->parser->parse('header', $lang[1]); 
              $this->parser->parse('navbar', $lang[1]); 
              $this->parser->parse('user/ok', $lang[1]); 
              $this->parser->parse('footer', $lang[1]); 
              break;
            case "tr":
              $this->parser->parse('header', $lang[2]); 
              $this->parser->parse('navbar', $lang[2]); 
              $this->parser->parse('user/ok', $lang[2]); 
              $this->parser->parse('footer', $lang[2]); 
              break;
            case "jp":
              $this->parser->parse('header', $lang[3]); 
              $this->parser->parse('navbar', $lang[3]); 
              $this->parser->parse('user/ok', $lang[3]); 
              $this->parser->parse('footer', $lang[3]); 
              break;	
            default:
              $this->parser->parse('header', $lang[0]); 
              $this->parser->parse('navbar', $lang[0]); 
              $this->parser->parse('user/ok', $lang[0]); 
              $this->parser->parse('footer', $lang[0]); 
              break;
    
          }
    }
	
}
