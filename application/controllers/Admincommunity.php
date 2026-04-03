<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admincommunity extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->requireAdmin();
    }

    public function adminadd()
    {
        $user = $this->getPostString('user');
        $pass = (string) $this->input->post('pass');
        $passConfirm = (string) $this->input->post('pass1');
        $email = $this->getPostString('email');

        $userExists = !empty($user) ? (array) $this->db->get_where('users', array('user' => $user))->row_array() : array();

        if ($user !== '' && $email !== '' && $pass !== '' && $pass === $passConfirm && filter_var($email, FILTER_VALIDATE_EMAIL) && strlen($pass) >= 6 && empty($userExists)) {
            $this->db->insert('users', array(
                'user' => $user,
                'pass' => cms_hash_password($pass),
                'email' => $email,
                'rol' => 1,
            ));
            $this->logAdminAction($this->t('log_admin_account_created', 'Admin account created'), $user);
        }

        $this->redirectTo('admin/adminaccounts');
    }

    public function deladminaccount()
    {
        $id = (int) $this->input->post('id');
        $currentAdmin = (string) $this->session->userdata('user');
        $targetRow = $id > 0 ? (array) $this->db->get_where('users', array('id' => $id))->row_array() : array();
        $adminCount = (int) $this->db->where('rol', 1)->count_all_results('users');

        if ($id > 0 && !empty($targetRow) && ($targetRow['user'] ?? '') !== $currentAdmin && $adminCount > 1) {
            $this->db->delete('users', array('id' => $id));
            $this->logAdminAction($this->t('log_admin_account_deleted', 'Admin account deleted'));
        }

        $this->redirectTo('admin/adminaccounts');
    }

    public function addchangelog()
    {
        $title = $this->getPostString('title');
        $text = $this->getPostString('text');
        if ($title === '' || $text === '') {
            $this->redirectTo('admin/changelog');
            return;
        }

        $lastRow = (array) $this->db->order_by('id', 'DESC')->limit(1)->get('changelog')->row_array();
        $lastType = (int) ($lastRow['type'] ?? 1);

        $this->db->insert('changelog', array(
            'title' => $title,
            'txt' => $text,
            'type' => $lastType === 0 ? 1 : 0,
        ));

        $this->logAdminAction($this->t('log_changelog_created', 'Changelog entry created'));
        $this->redirectTo('admin/changelog');
    }

    public function delchangelog()
    {
        $id = (int) $this->input->post('id');
        if ($id > 0) {
            $this->db->delete('changelog', array('id' => $id));
            $this->logAdminAction($this->t('log_changelog_deleted', 'Changelog entry deleted'));
        }

        $this->redirectTo('admin/changelog');
    }
}
