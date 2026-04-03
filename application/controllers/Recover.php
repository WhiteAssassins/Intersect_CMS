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
            $this->session->set_flashdata('recover_message', $this->t('recover_username_required', 'Please enter a username.'));
            $this->session->set_flashdata('recover_message_type', 'error');
            $this->redirectTo('recover');
        }

        $result = $this->intersectapiclient->requestPasswordReset($user);
        if (empty($result['ok'])) {
            $this->session->set_flashdata('recover_message', $result['message'] ?: $this->t('recover_start_failed', 'Could not start password recovery.'));
            $this->session->set_flashdata('recover_message_type', 'error');
            $this->redirectTo('recover');
        }

        $this->session->set_flashdata('recover_message', $this->t('recover_email_sent', 'If the user exists and SMTP is configured, the recovery email has been sent.'));
        $this->session->set_flashdata('recover_message_type', 'success');
        $this->redirectTo('recover');
	}















}
