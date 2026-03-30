<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller
{
    protected function redirectTo($path)
    {
        header('Location: ' . base_url($path));
    }

    protected function getLanguageData()
    {
        $this->load->model('Langs');

        return $this->Langs->current();
    }

    protected function redirectToMaintenanceIfNeeded()
    {
        $configRow = (array) $this->db->get('config')->row_array();

        if ((int) ($configRow['mant'] ?? 0) === 1 && !$this->session->userdata('login')) {
            header('Location: ' . base_url('mant'));
            return true;
        }

        return false;
    }

    protected function renderPublicPage($view, array $data = array())
    {
        $viewData = array_merge($this->getLanguageData(), $data);

        $this->parser->parse('header', $viewData);
        $this->parser->parse('navbar', $viewData);
        $this->parser->parse($view, $viewData);
        $this->parser->parse('footer', $viewData);
    }

    protected function renderAdminPage($view, array $data = array())
    {
        $viewData = array_merge($this->getLanguageData(), $data);

        $this->parser->parse('header', $viewData);
        $this->parser->parse('sidebar', $viewData);
        $this->parser->parse($view, $viewData);
        $this->parser->parse('footer', $viewData);
    }

    protected function requireLogin($redirectPath = '')
    {
        if ($this->session->userdata('login')) {
            return true;
        }

        $this->redirectTo($redirectPath);
        return false;
    }

    protected function requireAdmin($redirectPath = '')
    {
        if ($this->session->userdata('login') && (int) $this->session->userdata('rol') === 1) {
            return true;
        }

        $this->redirectTo($redirectPath);
        return false;
    }
}
