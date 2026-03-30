<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require FCPATH.'vendor/autoload.php';

use GuzzleHttp\Client;

class Playersonline extends MY_Controller {
	function __construct() {
        parent::__construct();
        $this->load->model('Apigettoken');
		$this->load->model('Apiserverinfo');
		$this->load->model('Apiserverstats');
		$this->load->model('Apiusers');
		$this->load->model('Apiplayers');
        $this->load->model('Apiplayersonline');
		$this->load->model('Langs');
    }

    private function buildOnlinePlayerRows()
    {
        $onlinePlayers = (array) $this->Apiplayersonline->playeronline();
        $values = isset($onlinePlayers['Values']) && is_array($onlinePlayers['Values']) ? $onlinePlayers['Values'] : array();
        $rows = array();

        foreach ($values as $player) {
            $rows[] = array(
                'name' => $player['Name'] ?? '',
                'class_name' => $player['ClassName'] ?? '',
                'gender_label' => ((int) ($player['Gender'] ?? 0) === 0) ? 'Hombre' : 'Mujer',
                'exp' => (int) ($player['Exp'] ?? 0),
                'map_name' => $player['MapName'] ?? '',
            );
        }

        return $rows;
    }
	
	public function index()
	{
        if ($this->redirectToMaintenanceIfNeeded()) {
            return;
        }

        $this->renderPublicPage('playersonline', array(
            'online_player_rows' => $this->buildOnlinePlayerRows(),
        ));
	}
}
