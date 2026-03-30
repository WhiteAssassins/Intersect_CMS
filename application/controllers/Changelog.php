<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Changelog extends MY_Controller {
    private function buildChangelogRows()
    {
        $rows = $this->db->order_by('id', 'DESC')->get('changelog')->result_array();
        $items = array();

        foreach ($rows as $row) {
            $isInverted = (int) ($row['type'] ?? 0) !== 0;
            $items[] = array(
                'timeline_item_class' => $isInverted ? 'timeline-inverted' : '',
                'content_alignment_class' => $isInverted ? 'mr-xl-2' : 'ml-2',
                'title' => $row['title'] ?? '',
                'text' => $row['txt'] ?? '',
            );
        }

        return $items;
    }

	public function index()
	{
        if ($this->redirectToMaintenanceIfNeeded()) {
            return;
        }

        $this->renderPublicPage('changelog', array(
            'changelog_rows' => $this->buildChangelogRows(),
        ));
	}
}
