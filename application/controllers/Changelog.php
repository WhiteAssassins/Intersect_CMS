<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Changelog extends MY_Controller {
    private function buildChangelogRows()
    {
        $rows = $this->db->order_by('id', 'DESC')->get('changelog')->result_array();
        $items = array();
        $sequence = 1;

        foreach ($rows as $row) {
            $currentSequence = $sequence++;
            $title = trim((string) ($row['title'] ?? ''));
            $version = '';
            $headline = $title;
            if (preg_match('/^(v[0-9][^|]*)\s*\|\s*(.+)$/i', $title, $matches)) {
                $version = trim($matches[1]);
                $headline = trim($matches[2]);
            }

            $changes = array();
            $text = (string) ($row['txt'] ?? '');
            foreach (preg_split('/\r\n|\r|\n/', $text) as $line) {
                $line = trim($line);
                $line = preg_replace('/^[\-\*\x{2022}]+\s*/u', '', $line);
                if ($line !== '') {
                    $changes[] = $line;
                }
            }

            $items[] = array(
                'id' => (int) ($row['id'] ?? 0),
                'sequence' => $currentSequence,
                'alignment' => $currentSequence % 2 === 0 ? 'left' : 'right',
                'is_featured' => (int) ($row['type'] ?? 0) !== 0,
                'version' => $version !== '' ? $version : 'v0.0.' . str_pad((string) $currentSequence, 2, '0', STR_PAD_LEFT),
                'headline' => $headline,
                'changes' => $changes,
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
