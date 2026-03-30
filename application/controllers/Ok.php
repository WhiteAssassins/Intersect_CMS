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

    private function renderOkPage($langIndex, $extraData = array()){
        $lang = $this->Langs->lang();
        $data = array_merge($lang[$langIndex], $extraData);
        $this->parser->parse('header', $data);
        $this->parser->parse('navbar', $data);
        $this->parser->parse('user/ok', $data);
        $this->parser->parse('footer', $data);
    }
	
	public function index(){
        $uuid = trim((string) $this->input->get('transaction_uuid', TRUE));
        $creditedUser = '';
        $balanceAvailable = 0;
        $appId = $this->config->item('apiqvapayid');
        $appSecret = $this->config->item('apiqvapaysecret');

        if ($uuid === '') {
          show_error('Invalid payment transaction.', 400);
          return;
        }

        $apiuser = [
            'app_id' => $appId,
            'app_secret' => $appSecret,
            
              ];
          if (empty($appId) || $appId === 'apiqvapayid' || empty($appSecret) || $appSecret === 'apiqvapaysecret') {
            $transaction = array();
          } else {
            try {
              $client = new Client([
                'base_uri' => 'https://qvapay.com/api/v1/transactions/'.$uuid,
                'timeout'  => 5.0,
                'http_errors' => false,
              ]);
              $res = $client->request('POST', '', ['form_params' => $apiuser]);
              $transaction = json_decode($res->getBody(), true);
            } catch (\Exception $e) {
              $transaction = array();
            }
          }

          $amount = isset($transaction['amount']) ? (float) $transaction['amount'] : 0;
          $status = isset($transaction['status']) ? $transaction['status'] : '';
          $payment = $this->db->get_where('payments', array('transid' => $uuid))->row_array();
          if ($payment) {
            $creditedUser = trim((string) $payment['method']);
          } elseif (isset($transaction['remote_id'])) {
            $creditedUser = trim((string) $transaction['remote_id']);
          }

          if($status === "paid" && $creditedUser !== '' && $amount > 0){
              $paymentstatus = $this->db->get_where('paymentstatus', array('uuid' => $uuid))->row_array();

              if(!$paymentstatus){
                $datos2 = [
                  'user' => $creditedUser,
                  'uuid'=> $uuid,
                  'status' => 'payed'
                  
                ];
                $this->db->insert('paymentstatus', $datos2);

                $userRow = $this->db->get_where('users', array('user' => $creditedUser))->row_array();
                if ($userRow) {
                  $this->db->where('id', $userRow['id']);
                  $this->db->update('users', array(
                    'balance' => (float) $userRow['balance'] + $amount,
                  ));
                  $balanceAvailable = (float) $userRow['balance'] + $amount;
                }
              } else {
                $userRow = $this->db->get_where('users', array('user' => $creditedUser))->row_array();
                if ($userRow) {
                  $balanceAvailable = (float) $userRow['balance'];
                }
              }
          } elseif ($creditedUser !== '') {
            $userRow = $this->db->get_where('users', array('user' => $creditedUser))->row_array();
            if ($userRow) {
              $balanceAvailable = (float) $userRow['balance'];
            }
          }

          if ($balanceAvailable === 0 && $this->session->userdata('user')) {
            $sessionUser = $this->db->get_where('users', array('user' => $this->session->userdata('user')))->row_array();
            if ($sessionUser) {
              $balanceAvailable = (float) $sessionUser['balance'];
            }
          }

          $viewData = array(
            'balance_available' => number_format($balanceAvailable, 2, '.', ''),
            'credited_user' => $creditedUser,
          );
          $lang = $this->Langs->lang();
          switch($this->session->userdata('lang')){
            case "es":
              $this->renderOkPage(0, $viewData); 
              break;
            case "en":
              $this->renderOkPage(1, $viewData); 
              break;
            case "tr":
              $this->renderOkPage(2, $viewData); 
              break;
            case "jp":
              $this->renderOkPage(3, $viewData); 
              break;	
              case "de":
                $this->renderOkPage(4, $viewData); 
                break;	
              case "ru":
                $this->renderOkPage(5, $viewData); 
                break;
              case "zh":
                $this->renderOkPage(6, $viewData); 
                break;	
              case "fr":
                $this->renderOkPage(7, $viewData); 
                break;	
              case "pt":
                $this->renderOkPage(8, $viewData); 
                break;
              case "hi":
                $this->renderOkPage(9, $viewData); 
                break;	
              case "ar":
                $this->renderOkPage(10, $viewData); 
                break;	
            default:
              $this->renderOkPage(0, $viewData); 
              break;
    
          }
    }
	
}
