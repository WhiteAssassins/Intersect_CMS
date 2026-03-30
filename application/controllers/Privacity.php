<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Privacity extends MY_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Sitecontext');
    }

	public function index()
	{
        if ($this->redirectToMaintenanceIfNeeded()) {
            return;
        }

        $this->renderPublicPage('privacity', array(
            'privacity_content' => $this->Sitecontext->getConfigContent('privacity'),
        ));
	}
}
