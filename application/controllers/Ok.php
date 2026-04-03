<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ok extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('paymentservice');
        $this->load->model('Userpaneldata');
    }

    public function index()
    {
        $uuid = trim((string) $this->input->get('transaction_uuid', true));
        if ($uuid === '') {
            show_error($this->t('payment_invalid_transaction', 'Invalid payment transaction.'), 400);
            return;
        }

        $viewData = $this->paymentservice->processTransaction($uuid);

        if (($viewData['credited_user'] ?? '') === '' && $this->session->userdata('login')) {
            $sessionUser = $this->Userpaneldata->getUserByUsername((string) $this->session->userdata('user'));
            $viewData['credited_user'] = $sessionUser['user'] ?? (string) $this->session->userdata('user');
            $viewData['balance_available'] = number_format((float) ($sessionUser['balance'] ?? 0), 2, '.', '');
        }

        $this->renderPublicPage('user/ok', $viewData);
    }
}
