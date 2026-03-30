<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Userpaneldata extends CI_Model
{
    public function getUserByUsername($username)
    {
        if ($username === '') {
            return array();
        }

        return (array) $this->db->get_where('users', array('user' => $username))->row_array();
    }

    public function getFeedbackTickets($username)
    {
        if ($username === '') {
            return array();
        }

        return $this->db
            ->order_by('id', 'DESC')
            ->get_where('feedback', array('user' => $username))
            ->result_array();
    }

    public function updatePassword($username, $passwordHash)
    {
        $this->db->where('user', $username);
        return $this->db->update('users', array('pass' => $passwordHash));
    }

    public function debitBalanceIfEnough($username, $amount)
    {
        $amount = (float) $amount;
        if ($username === '' || $amount <= 0) {
            return false;
        }

        $this->db->set('balance', 'balance-' . $amount, false);
        $this->db->where('user', $username);
        $this->db->where('balance >=', $amount);
        $this->db->update('users');

        return $this->db->affected_rows() > 0;
    }

    public function creditBalance($username, $amount)
    {
        $amount = (float) $amount;
        if ($username === '' || $amount <= 0) {
            return false;
        }

        $this->db->set('balance', 'balance+' . $amount, false);
        $this->db->where('user', $username);
        $this->db->update('users');

        return $this->db->affected_rows() > 0;
    }

    public function createTicket(array $data)
    {
        return $this->db->insert('feedback', $data);
    }
}
