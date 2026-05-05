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

        $transaction = $this->CI->qvapayservice->fetchTransaction($uuid);
        if (empty($transaction)) {
            return false;
        }

        $verifiedUser = trim((string) ($transaction['remote_id'] ?? ''));
        if ($verifiedUser !== '') {
            if (!hash_equals($verifiedUser, $username)) {
                return false;
            }

            $username = $verifiedUser;
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
        if ($uuid === '') {
            return $this->emptyTransactionResult();
        }

        if (!$this->acquirePaymentLock($uuid)) {
            return $this->emptyTransactionResult();
        }

        $transaction = $this->CI->qvapayservice->fetchTransaction($uuid);

        try {
            $creditedUser = $this->resolveCreditedUser($uuid, $transaction);
            $amount = (float) ($transaction['amount'] ?? 0);
            $status = strtolower(trim((string) ($transaction['status'] ?? '')));
            $processedNow = false;

            if ($status === 'paid' && $creditedUser !== '' && $amount > 0 && !$this->isProcessed($uuid)) {
                $this->CI->db->trans_begin();

                $inserted = $this->CI->db->insert('paymentstatus', array(
                    'user' => $creditedUser,
                    'uuid' => $uuid,
                    'status' => 'payed',
                ));
                $credited = $inserted && $this->CI->Userpaneldata->creditBalance($creditedUser, $amount);

                if ($credited && $this->CI->db->trans_status() !== false) {
                    $this->CI->db->trans_commit();
                    $processedNow = true;
                } else {
                    $this->CI->db->trans_rollback();
                }
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
        } finally {
            $this->releasePaymentLock($uuid);
        }
    }

    private function resolveCreditedUser($uuid, array $transaction)
    {
        $remoteUser = trim((string) ($transaction['remote_id'] ?? ''));
        if ($remoteUser !== '') {
            return $remoteUser;
        }

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

    private function emptyTransactionResult()
    {
        return array(
            'credited_user' => '',
            'balance_available' => '0.00',
            'payment_amount' => '0.00',
            'payment_status_value' => '',
            'payment_processed_now' => false,
            'payment_found' => false,
        );
    }

    private function acquirePaymentLock($uuid)
    {
        $lockName = $this->buildPaymentLockName($uuid);
        $query = $this->CI->db->query('SELECT GET_LOCK(' . $this->CI->db->escape($lockName) . ', 5) AS lock_status');
        $row = $query ? $query->row_array() : array();

        return (int) ($row['lock_status'] ?? 0) === 1;
    }

    private function releasePaymentLock($uuid)
    {
        $lockName = $this->buildPaymentLockName($uuid);
        $this->CI->db->query('SELECT RELEASE_LOCK(' . $this->CI->db->escape($lockName) . ')');
    }

    private function buildPaymentLockName($uuid)
    {
        return 'intersect_payment_' . sha1((string) $uuid);
    }
}
