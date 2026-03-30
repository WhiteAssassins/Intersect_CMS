<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PaymentService
{
    protected $CI;

    public function __construct()
    {
        $this->CI =& get_instance();
        $this->CI->load->model('Userpaneldata');
        $this->CI->load->library('qvapayservice');
    }

    public function registerCallback($paymentId, $username, $uuid)
    {
        $paymentId = trim((string) $paymentId);
        $username = trim((string) $username);
        $uuid = trim((string) $uuid);

        if ($paymentId === '' || $username === '' || $uuid === '') {
            return false;
        }

        $exists = $this->CI->db
            ->get_where('payments', array(
                'payment_id' => $paymentId,
                'transid' => $uuid,
            ))
            ->row_array();

        if (!empty($exists)) {
            return true;
        }

        return (bool) $this->CI->db->insert('payments', array(
            'payment_id' => $paymentId,
            'method' => $username,
            'transid' => $uuid,
        ));
    }

    public function processTransaction($uuid)
    {
        $uuid = trim((string) $uuid);
        $transaction = $this->CI->qvapayservice->fetchTransaction($uuid);
        $creditedUser = $this->resolveCreditedUser($uuid, $transaction);
        $amount = (float) ($transaction['amount'] ?? 0);
        $status = strtolower(trim((string) ($transaction['status'] ?? '')));
        $processedNow = false;

        if ($status === 'paid' && $creditedUser !== '' && $amount > 0 && !$this->isProcessed($uuid)) {
            $this->CI->db->insert('paymentstatus', array(
                'user' => $creditedUser,
                'uuid' => $uuid,
                'status' => 'payed',
            ));

            $this->CI->Userpaneldata->creditBalance($creditedUser, $amount);
            $processedNow = true;
        }

        $userRow = $this->CI->Userpaneldata->getUserByUsername($creditedUser);

        return array(
            'credited_user' => $creditedUser,
            'balance_available' => number_format((float) ($userRow['balance'] ?? 0), 2, '.', ''),
            'payment_amount' => number_format($amount, 2, '.', ''),
            'payment_status_value' => $status,
            'payment_processed_now' => $processedNow,
            'payment_found' => !empty($transaction),
        );
    }

    private function resolveCreditedUser($uuid, array $transaction)
    {
        $payment = $this->CI->db
            ->get_where('payments', array('transid' => $uuid))
            ->row_array();

        if (!empty($payment['method'])) {
            return trim((string) $payment['method']);
        }

        return trim((string) ($transaction['remote_id'] ?? ''));
    }

    private function isProcessed($uuid)
    {
        $statusRow = $this->CI->db
            ->get_where('paymentstatus', array('uuid' => $uuid))
            ->row_array();

        return !empty($statusRow);
    }
}
