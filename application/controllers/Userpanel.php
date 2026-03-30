<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require FCPATH.'vendor/autoload.php';

use GuzzleHttp\Client;

class Userpanel extends MY_Controller {
	function __construct() {
        parent::__construct();
        $this->load->model('Apigettoken');
		$this->load->model('Apiserverinfo');
		$this->load->model('Apiserverstats');
		$this->load->model('Apiusers');
		$this->load->model('Apiplayers');
        $this->load->model('Langs');
    }

    private function redirectToMaintenanceForRegularUsers()
    {
        $configRow = (array) $this->db->get('config')->row_array();

        if ((int) ($configRow['mant'] ?? 0) === 1 && (int) $this->session->userdata('rol') === 2) {
            $this->redirectTo('mant');
            return true;
        }

        return false;
    }

    private function ensurePanelAccess()
    {
        if (!$this->requireLogin()) {
            return false;
        }

        if ($this->redirectToMaintenanceForRegularUsers()) {
            return false;
        }

        return true;
    }

    private function getCurrentUserRow()
    {
        $username = $this->session->userdata('user');

        if (!$username) {
            return array();
        }

        return (array) $this->db->get_where('users', array('user' => $username))->row_array();
    }

    private function buildPanelViewData()
    {
        $userRow = $this->getCurrentUserRow();

        return array(
            'panel_username' => $userRow['user'] ?? $this->session->userdata('user') ?? '',
            'panel_balance' => $userRow['balance'] ?? 0,
            'panel_os' => $this->agent->platform(),
            'panel_ip' => $this->input->ip_address(),
            'panel_browser' => $this->agent->browser() . ' ' . $this->agent->version(),
        );
    }

    private function buildRechargeViewData()
    {
        $userRow = $this->getCurrentUserRow();

        return array(
            'panel_balance' => $userRow['balance'] ?? 0,
        );
    }

    private function buildFeedbackViewData()
    {
        $userRow = $this->getCurrentUserRow();
        $tickets = $this->db
            ->order_by('id', 'DESC')
            ->get_where('feedback', array('user' => $this->session->userdata('user')))
            ->result_array();

        $openTickets = array();
        $closedTickets = array();

        foreach ($tickets as $ticket) {
            $formatted = array(
                'title' => $ticket['title'] ?? '',
                'type' => $ticket['type'] ?? '',
                'status' => $ticket['status'] ?? '',
                'admin' => $ticket['admin'] ?? '',
                'email' => $ticket['email'] ?? ($userRow['email'] ?? ''),
                'text' => $ticket['text'] ?? '',
            );

            $status = strtolower(trim((string) ($ticket['status'] ?? '')));
            if (in_array($status, array('closed', 'resolved', 'done'), true)) {
                $closedTickets[] = $formatted;
            } else {
                $openTickets[] = $formatted;
            }
        }

        return array(
            'open_tickets' => $openTickets,
            'closed_tickets' => $closedTickets,
            'open_ticket_count' => count($openTickets),
            'closed_ticket_count' => count($closedTickets),
            'feedback_email' => $userRow['email'] ?? '',
        );
    }
	
	public function index(){
        if (!$this->ensurePanelAccess()) {
            return;
        }

        $this->renderPublicPage('user/panel', $this->buildPanelViewData());
	}

    public function recharge(){
        if (!$this->ensurePanelAccess()) {
            return;
        }

        $this->renderPublicPage('user/recharge', $this->buildRechargeViewData());
	}

    public function rechargin(){
        if (!$this->requireLogin()) {
            return;
        }

        $amount = (float) $this->input->post('cant');
		$user = $this->session->userdata('user');
        $appId = $this->config->item('apiqvapayid');
        $appSecret = $this->config->item('apiqvapaysecret');
        if (!$user || $amount <= 0 || empty($appId) || $appId === 'apiqvapayid' || empty($appSecret) || $appSecret === 'apiqvapaysecret') {
            $this->redirectTo('userpanel/recharge');
            return;
        }
        $apiuser = [
            'app_id' => $appId,
            'app_secret' => $appSecret,
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
           if (!isset($accesstoken['signedUrl'])) {
            $this->redirectTo('userpanel/recharge');
            return;
           }
           $url = $accesstoken['signedUrl'];
           header("Location: $url");
    }

	public function changepassword(){
		$pedido['status'] = 0;
        if (!$this->session->userdata('login')) {
            $pedido['sms'] = 'Debe iniciar sesion';
            echo json_encode($pedido);
            return;
        }
		$oldpassword = $this->input->post('oldpassword');
		$newpassword = $this->input->post('newpassword');
		$confirmnewpassword = $this->input->post('confirmnewpassword');
		$user = $this->session->userdata('user');
		$query = $this->db->get_where('users', array('user' => $user));
		$userData = $query->row_array();
		if($userData && cms_password_verify($oldpassword, $userData['pass'])){
			if($newpassword == $confirmnewpassword){
				$data = array(
					'pass' => cms_hash_password($newpassword)
				);
				$this->db->where('user', $user);
				$this->db->update('users', $data);
				$pedido['status'] = 200;
				echo json_encode($pedido);
			}else{
				$pedido['sms'] = 'Las ContraseÃ±as no Coinciden';
				echo json_encode($pedido);
			}
		}else{
			$pedido['sms'] = 'La ContraseÃ±a Actual no es Correcta';
			echo json_encode($pedido);
		}
	}

	public function feedback(){
        if (!$this->ensurePanelAccess()) {
            return;
        }

        $this->renderPublicPage('user/feedback', $this->buildFeedbackViewData());
	}

	public function addticket(){
		$pedido['status'] = 0;
        if (!$this->session->userdata('login')) {
            $pedido['sms'] = 'Debe iniciar sesion';
            echo json_encode($pedido);
            return;
        }
		$text = $this->input->post('text');
		$title = $this->input->post('title');
		$ticket = $this->input->post('ticket');
		$user = $this->session->userdata('user');
		if($text != '' AND $title != '' AND $ticket != ''){
			$this->db->where('user', $user);
			$query = $this->db->get('users');
			$user = $query->result_array();
			$email = $user['0']['email'];
			$data = array(
				'text' => $text,
				'title' => $title,
				'type' => $ticket,
				'user' => $user['0']['user'],
				'email' => $email,
				'status' => "Unasigned"
			);
			$this->db->insert('feedback', $data);
			$pedido['status'] = 200;
			echo json_encode($pedido);

			$mail_message= utf8_decode(file_get_contents(base_url('public/email.html')));

			date_default_timezone_set('Etc/UTC');
			require FCPATH.'vendor/phpmailer/phpmailer/src/Exception.php';
			require FCPATH.'vendor/phpmailer/phpmailer/src/PHPMailer.php';
			require FCPATH.'vendor/phpmailer/phpmailer/src/SMTP.php';

			$mail = new PHPMailer\PHPMailer\PHPMailer();
			$mail->IsSMTP(); 
		
			$mail->CharSet="UTF-8";
			$mail->Host = "smtp.gmail.com";
			$mail->SMTPDebug = 0; 
			$mail->Port = 465 ;
		
			 $mail->SMTPSecure = 'ssl';  
			$mail->SMTPAuth = true; 
			$mail->IsHTML(true);
		
			$mail->Username = $this->config->item('supportemail');
			$mail->Password = $this->config->item('supportemailpassword');
		
			$mail->SetFrom($this->config->item('supportemail'), 'Soporte');
			$mail->addAddress($email);
			$mail->IsHTML(true);
			$mail->Subject = "Support Ticket";
			$mail->Body    = $mail_message;
			$mail->AltBody = $mail_message;
			

			if (!$mail->send()) {
				
			}
		}else{
			$pedido['sms'] = 'Todos los campos son obligatorios';
			echo json_encode($pedido);
		}
	}
}
