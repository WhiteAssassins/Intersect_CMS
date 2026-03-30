<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Privacity extends MY_Controller {
	public function index()
	{
        if ($this->redirectToMaintenanceIfNeeded()) {
            return;
        }

        $configRow = (array) $this->db->get('config')->row_array();
        $this->renderPublicPage('privacity', array(
            'privacity_content' => $configRow['privacity'] ?? '',
        ));
	}
}
