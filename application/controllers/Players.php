<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Players extends MY_Controller {
	function __construct() {
        parent::__construct();
		$this->load->model('Apiplayers');
		$this->load->model('Langs');
    }

    private function buildPlayerRows()
    {
        $players = (array) $this->Apiplayers->rank();
        $values = isset($players['Values']) && is_array($players['Values']) ? $players['Values'] : array();
        $rows = array();
        $position = 1;

        foreach ($values as $player) {
            $rows[] = array(
                'rank' => $position++,
                'name' => $player['Name'] ?? '',
                'gender_label' => ((int) ($player['Gender'] ?? 0) === 0) ? 'Hombre' : 'Mujer',
                'level' => (int) ($player['Level'] ?? 0),
                'exp' => (int) ($player['Exp'] ?? 0),
                'status_label' => !empty($player['Dead']) ? 'Muerto' : 'Vivo',
            );
        }

        return $rows;
    }
	
	public function index()
	{
        if ($this->redirectToMaintenanceIfNeeded()) {
            return;
        }

        $this->renderPublicPage('players', array(
            'player_rows' => $this->buildPlayerRows(),
        ));
	}
}
