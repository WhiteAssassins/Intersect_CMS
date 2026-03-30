<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require FCPATH.'vendor/autoload.php';

use GuzzleHttp\Client;

class Players extends MY_Controller {
	function __construct() {
        parent::__construct();
        $this->load->model('Apigettoken');
		$this->load->model('Apiserverinfo');
		$this->load->model('Apiserverstats');
		$this->load->model('Apiusers');
		$this->load->model('Apiplayers');
		$this->load->model('Langs');
    }

    private function buildPlayerRows()
    {
        $players = (array) $this->Apiplayers->player();
        $values = isset($players['Values']) && is_array($players['Values']) ? $players['Values'] : array();
        $rows = array();

        foreach ($values as $player) {
            $rows[] = array(
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
