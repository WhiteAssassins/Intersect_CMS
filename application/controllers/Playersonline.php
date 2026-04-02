<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Playersonline extends MY_Controller {
	function __construct() {
        parent::__construct();
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

        $onlineCount = (array) $this->Apiplayersonline->onlinecount();
        $this->renderPublicPage('playersonline', array(
            'online_player_rows' => $this->buildOnlinePlayerRows(),
            'online_player_count' => (int) ($onlineCount['onlineCount'] ?? 0),
        ));
	}
}
