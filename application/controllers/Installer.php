<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Installer extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('url', 'auth'));
        $this->load->library('session');
        $this->load->library('installerservice');
    }

    public function index()
    {
        if ($this->installerservice->isInstalled()) {
            redirect(base_url());
            return;
        }

        if (strtoupper((string) ($_SERVER['REQUEST_METHOD'] ?? 'GET')) === 'POST') {
            $postedData = is_array($_POST) ? $_POST : array();
            $result = $this->installerservice->install($postedData);

            if (!empty($result['ok'])) {
                $this->session->set_flashdata('installer_success', $result['summary']);
                redirect('install/success');
                return;
            }

            $this->render(array(
                'checks' => $this->installerservice->getRequirementChecks(),
                'form' => array_merge($this->installerservice->getDefaults(), $postedData),
                'errors' => $result['errors'] ?? array('Installation failed.'),
                'success' => false,
            ));
            return;
        }

        $this->render(array(
            'checks' => $this->installerservice->getRequirementChecks(),
            'form' => $this->installerservice->getDefaults(),
            'errors' => array(),
            'success' => false,
        ));
    }

    public function success()
    {
        $summary = $this->session->flashdata('installer_success');

        if (empty($summary)) {
            redirect(base_url());
            return;
        }

        $this->render(array(
            'checks' => array(),
            'form' => array(),
            'errors' => array(),
            'success' => true,
            'summary' => $summary,
        ));
    }

    protected function render(array $data)
    {
        $this->load->view('installer/index', $data);
    }
}
