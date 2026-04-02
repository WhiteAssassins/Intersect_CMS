<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends MY_Controller {
	function __construct() {
        parent::__construct();
		$this->load->model('Apiusers');
		$this->load->model('Langs');
    }

    private function buildUserRows()
    {
        $users = (array) $this->Apiusers->user();
        $values = isset($users['Values']) && is_array($users['Values']) ? $users['Values'] : array();
        $rows = array();

        foreach ($values as $user) {
            $playTimeHours = round(((float) ($user['PlayTimeSeconds'] ?? 0)) / 60 / 60, 2);

            $rows[] = array(
                'name' => $user['Name'] ?? '',
                'time_played_label' => $playTimeHours . ' Horas',
                'is_banned_label' => !empty($user['IsBanned']) ? 'Si' : 'No',
                'is_muted_label' => !empty($user['IsMuted']) ? 'Si' : 'No',
            );
        }

        return $rows;
    }
	
	public function index()
	{
        if ($this->redirectToMaintenanceIfNeeded()) {
            return;
        }

        $this->renderPublicPage('users', array(
            'user_rows' => $this->buildUserRows(),
        ));
	}
}
