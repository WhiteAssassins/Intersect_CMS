<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logs extends MY_Controller {
    private function buildLogRows()
    {
        $rows = $this->db->order_by('id', 'DESC')->get('logs')->result_array();
        $items = array();

        foreach ($rows as $row) {
            $items[] = array(
                'admin' => $row['admin'] ?? '',
                'user' => $row['user'] ?? '',
                'action' => $row['action'] ?? '',
                'date' => $row['time'] ?? '',
            );
        }

        return $items;
    }
	
	public function index()
	{
		if (!$this->requireAdmin()) {
            return;
        }

        $this->renderAdminPage('logs', array(
            'log_rows' => $this->buildLogRows(),
        ));
	}
}
