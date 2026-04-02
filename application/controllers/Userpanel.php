<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Userpanel extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Userpaneldata');
        $this->load->library('qvapayservice');
        $this->load->library('supportmailer');
    }

    public function index()
    {
        if (!$this->ensurePanelAccess()) {
            return;
        }

        $this->renderPublicPage('user/panel', $this->buildPanelViewData());
    }

    public function recharge()
    {
        if (!$this->ensurePanelAccess()) {
            return;
        }

        $this->renderPublicPage('user/recharge', $this->buildRechargeViewData());
    }

    public function rechargin()
    {
        if (!$this->requireLogin()) {
            return;
        }

        $amount = (float) $this->input->post('cant');
        $username = (string) $this->session->userdata('user');
        $signedUrl = $this->qvapayservice->createInvoice($username, $amount);

        if ($signedUrl === null) {
            $this->redirectTo('userpanel/recharge');
            return;
        }

        header('Location: ' . $signedUrl);
        exit;
    }

    public function changepassword()
    {
        if (!$this->session->userdata('login')) {
            $this->respondJson(array(
                'status' => 0,
                'sms' => 'Debe iniciar sesion',
            ));
            return;
        }

        $oldPassword = (string) $this->input->post('oldpassword');
        $newPassword = (string) $this->input->post('newpassword');
        $confirmPassword = (string) $this->input->post('confirmnewpassword');
        $username = (string) $this->session->userdata('user');
        $userData = $this->Userpaneldata->getUserByUsername($username);

        if (empty($userData) || !cms_password_verify($oldPassword, $userData['pass'] ?? '')) {
            $this->respondJson(array(
                'status' => 0,
                'sms' => 'La contrasena actual no es correcta',
            ));
            return;
        }

        if ($newPassword === '' || $newPassword !== $confirmPassword) {
            $this->respondJson(array(
                'status' => 0,
                'sms' => 'Las contrasenas no coinciden',
            ));
            return;
        }

        $this->Userpaneldata->updatePassword($username, cms_hash_password($newPassword));
        $this->respondJson(array('status' => 200));
    }

    public function feedback()
    {
        if (!$this->ensurePanelAccess()) {
            return;
        }

        $this->renderPublicPage('user/feedback', $this->buildFeedbackViewData());
    }

    public function addticket()
    {
        if (!$this->session->userdata('login')) {
            $this->respondJson(array(
                'status' => 0,
                'sms' => 'Debe iniciar sesion',
            ));
            return;
        }

        $text = $this->getPostString('text');
        $title = $this->getPostString('title');
        $ticketType = $this->getPostString('ticket');
        $username = (string) $this->session->userdata('user');
        $userRow = $this->Userpaneldata->getUserByUsername($username);

        if ($text === '' || $title === '' || $ticketType === '' || empty($userRow)) {
            $this->respondJson(array(
                'status' => 0,
                'sms' => 'Todos los campos son obligatorios',
            ));
            return;
        }

        $this->Userpaneldata->createTicket(array(
            'text' => $text,
            'title' => $title,
            'type' => $ticketType,
            'user' => $userRow['user'] ?? $username,
            'email' => $userRow['email'] ?? '',
            'status' => 'Unasigned',
        ));

        $this->supportmailer->sendTicketConfirmation($userRow['email'] ?? '');
        $this->respondJson(array('status' => 200));
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

    private function redirectToMaintenanceForRegularUsers()
    {
        if ($this->isMaintenanceEnabled() && (int) $this->session->userdata('rol') === 2) {
            $this->redirectTo('mant');
            return true;
        }

        return false;
    }

    private function getCurrentUserRow()
    {
        return $this->Userpaneldata->getUserByUsername((string) $this->session->userdata('user'));
    }

    private function buildPanelViewData()
    {
        $userRow = $this->getCurrentUserRow();
        $tickets = $this->Userpaneldata->getFeedbackTickets((string) $this->session->userdata('user'));
        $openTickets = 0;
        $closedTickets = 0;

        foreach ($tickets as $ticket) {
            $status = strtolower(trim((string) ($ticket['status'] ?? '')));
            if (in_array($status, array('closed', 'resolved', 'done'), true)) {
                $closedTickets++;
            } else {
                $openTickets++;
            }
        }

        return array(
            'panel_username' => $userRow['user'] ?? $this->session->userdata('user') ?? '',
            'panel_balance' => $userRow['balance'] ?? 0,
            'panel_email' => $userRow['email'] ?? '',
            'panel_os' => $this->agent->platform(),
            'panel_ip' => $this->input->ip_address(),
            'panel_browser' => $this->agent->browser() . ' ' . $this->agent->version(),
            'panel_open_tickets' => $openTickets,
            'panel_closed_tickets' => $closedTickets,
            'panel_total_tickets' => count($tickets),
            'panel_is_admin' => (int) $this->session->userdata('rol') === 1,
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
        $tickets = $this->Userpaneldata->getFeedbackTickets((string) $this->session->userdata('user'));

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
}
