<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Recover extends MY_Controller {
	function __construct() {
        parent::__construct();
        $this->load->library('intersectapiclient');
    }
	
	public function index()
	{
        if ($this->isMaintenanceEnabled()) {
            $this->redirectTo('mant');
            return;
        }

        $this->renderMinimalPage('recover', array(
            'recover_message' => (string) $this->session->flashdata('recover_message'),
            'recover_message_type' => (string) $this->session->flashdata('recover_message_type'),
        ));
	}
	

	public function rec(){
		$user = $this->getPostString('user');
        if ($user === '') {
            $this->session->set_flashdata('recover_message', 'Debe indicar un usuario.');
            $this->session->set_flashdata('recover_message_type', 'error');
            $this->redirectTo('recover');
        }

        $result = $this->intersectapiclient->requestPasswordReset($user);
        if (empty($result['ok'])) {
            $this->session->set_flashdata('recover_message', $result['message'] ?: 'No se pudo iniciar la recuperacion de contrasena.');
            $this->session->set_flashdata('recover_message_type', 'error');
            $this->redirectTo('recover');
        }

        $this->session->set_flashdata('recover_message', 'Si el usuario existe y el servidor SMTP esta configurado, se ha enviado el correo de recuperacion.');
        $this->session->set_flashdata('recover_message_type', 'success');
        $this->redirectTo('recover');
	}















}
