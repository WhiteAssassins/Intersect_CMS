<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Legal extends MY_Controller {
	public function index()
	{
        if ($this->redirectToMaintenanceIfNeeded()) {
            return;
        }

        $configRow = (array) $this->db->get('config')->row_array();
        $this->renderPublicPage('legal', array(
            'legal_content' => $configRow['legal'] ?? '',
        ));
	}
}
