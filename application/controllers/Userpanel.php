<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require FCPATH.'vendor/autoload.php';
use GuzzleHttp\Client;
class Userpanel extends CI_Controller {
	function __construct() {
        parent::__construct();
        $this->load->model('Apigettoken');
		$this->load->model('Apiserverinfo');
		$this->load->model('Apiregister');
		$this->load->model('Apiserverstats');
		$this->load->model('Apiusers');
		$this->load->model('Apiplayers');
        $this->load->model('Langs');
    }
	
	public function index(){	
        $conf = $this->db->get('config');
		$conf1 = $conf->result_array(); 
       if($conf1['0']['mant'] == 1 AND  $this->session->userdata('rol') == 2){
        $base_url = base_url();
        header("Location: $base_url/mant");
        }else{
            $lang = $this->Langs->lang();
			switch($this->session->userdata('lang')){
				case "es":
					$this->parser->parse('header', $lang[0]); 
					$this->parser->parse('navbar', $lang[0]); 
					$this->parser->parse('user/panel', $lang[0]); 
					$this->parser->parse('footer', $lang[0]); 
					break;
				case "en":
					$this->parser->parse('header', $lang[1]); 
					$this->parser->parse('navbar', $lang[1]); 
					$this->parser->parse('user/panel', $lang[1]); 
					$this->parser->parse('footer', $lang[1]); 
					break;
				case "tr":
					$this->parser->parse('header', $lang[2]); 
					$this->parser->parse('navbar', $lang[2]); 
					$this->parser->parse('user/panel', $lang[2]); 
					$this->parser->parse('footer', $lang[2]); 
					break;
				case "jp":
					$this->parser->parse('header', $lang[3]); 
					$this->parser->parse('navbar', $lang[3]); 
					$this->parser->parse('user/panel', $lang[3]); 
					$this->parser->parse('footer', $lang[3]); 
					break;	
				default:
					$this->parser->parse('header', $lang[0]); 
					$this->parser->parse('navbar', $lang[0]); 
					$this->parser->parse('user/panel', $lang[0]); 
					$this->parser->parse('footer', $lang[0]); 
					break;

			}
        } 
       
	}



    public function recharge(){	
        $conf = $this->db->get('config');
		$conf1 = $conf->result_array(); 
       if($conf1['0']['mant'] == 1 AND $this->session->userdata('rol') == 2){
        $base_url = base_url();
        header("Location: $base_url/mant");
        }else{
            $lang = $this->Langs->lang();
			switch($this->session->userdata('lang')){
				case "es":
					$this->parser->parse('header', $lang[0]); 
					$this->parser->parse('navbar', $lang[0]); 
					$this->parser->parse('user/recharge', $lang[0]); 
					$this->parser->parse('footer', $lang[0]); 
					break;
				case "en":
					$this->parser->parse('header', $lang[1]); 
					$this->parser->parse('navbar', $lang[1]); 
					$this->parser->parse('user/recharge', $lang[1]); 
					$this->parser->parse('footer', $lang[1]); 
					break;
				case "tr":
					$this->parser->parse('header', $lang[2]); 
					$this->parser->parse('navbar', $lang[2]); 
					$this->parser->parse('user/recharge', $lang[2]); 
					$this->parser->parse('footer', $lang[2]); 
					break;
				case "jp":
					$this->parser->parse('header', $lang[3]); 
					$this->parser->parse('navbar', $lang[3]); 
					$this->parser->parse('user/recharge', $lang[3]); 
					$this->parser->parse('footer', $lang[3]); 
					break;	
				default:
					$this->parser->parse('header', $lang[0]); 
					$this->parser->parse('navbar', $lang[0]); 
					$this->parser->parse('user/recharge', $lang[0]); 
					$this->parser->parse('footer', $lang[0]); 
					break;

			}
        } 
       
	}



    public function rechargin(){
        $amount = $this->input->post('cant');
		$user = $this->input->post('user');
        $apiip = $this->config->item('apiip');;
        $apiuser = [
            'app_id' => $this->config->item('apiqvapayid'),
            'app_secret' => $this->config->item('apiqvapaysecret'),
            'amount' => $amount,
            'description' => "Recarga de Cuenta",
            'remote_id' => $user,
            'signed' => 1
            
              ];
            $client = new Client([
          'base_uri' => 'https://qvapay.com/api/v1/create_invoice',
          'timeout'  => 5.0,
          ]);
          $res = $client->request('POST', '', ['form_params' => $apiuser]);
          $accesstoken = json_decode($res->getBody(), true);
           $url = $accesstoken['signedUrl'];
           header("Location: $url");
    }


	public function changepassword(){
		$pedido['status'] = 0;
		//get from post old password, new password, confirmnewpassword and user from session
		$oldpassword = $this->input->post('oldpassword');
		$newpassword = $this->input->post('newpassword');
		$confirmnewpassword = $this->input->post('confirmnewpassword');
		$user = $this->session->userdata('user');
		//verify if old password is correct before encrypt in md5
		$this->db->where('user', $user);
		$this->db->where('pass', md5($oldpassword));
		$query = $this->db->get('users');
		if($query->num_rows() == 1){
			if($newpassword == $confirmnewpassword){
				$data = array(
					'pass' => md5($newpassword)
				);
				$this->db->where('user', $user);
				$this->db->update('users', $data);
				$pedido['status'] = 200;
				echo json_encode($pedido);
			}else{
				$pedido['sms'] = 'Las Contraseñas no Coinciden';
				echo json_encode($pedido);
			}
		}else{
			$pedido['sms'] = 'La Contraseña Actual no es Correcta';
			echo json_encode($pedido);
		}





	}


	
}
