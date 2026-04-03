<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Callback extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('paymentservice');
    }

    public function index()
    {
        $remoteId = trim((string) $this->input->get('remote_id', true));
        $paymentId = trim((string) $this->input->get('id', true));
        $uuid = trim((string) $this->input->get('uuid', true));

        if ($remoteId === '' || $paymentId === '' || $uuid === '') {
            show_error($this->t('payment_invalid_callback', 'Invalid payment callback.'), 400);
            return;
        }

        $this->paymentservice->registerCallback($paymentId, $remoteId, $uuid);
    }
}
