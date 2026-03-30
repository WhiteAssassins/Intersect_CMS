<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Terms extends MY_Controller {
	public function index()
	{
        if ($this->redirectToMaintenanceIfNeeded()) {
            return;
        }

        $configRow = (array) $this->db->get('config')->row_array();
        $this->renderPublicPage('terms', array(
            'terms_content' => $configRow['terms'] ?? '',
        ));
	}
}
