<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require FCPATH.'vendor/autoload.php';

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class Home extends MY_Controller {
	function __construct() {
        parent::__construct();
        $this->load->model('Apigettoken');
		$this->load->model('Apiserverstats');
		$this->load->model('Apiusers');
        $this->load->model('Langs');
    }

    private function buildHomeViewData(array $configRow)
    {
        $serverStats = (array) $this->Apiserverstats->serverinfo();
        $users = (array) $this->Apiusers->user();
        $onlineCount = (int) ($serverStats['onlineCount'] ?? 0);
        $totalUsers = (int) ($users['Total'] ?? 0);
        $uptimeHours = round(((float) ($serverStats['uptime'] ?? 0)) / 1000 / 60 / 60, 2);
        $languageData = $this->Langs->rebrandText($this->session->userdata('lang') ?: 'es');

        $menuHeader = trim((string) ($configRow['menuheader'] ?? ''));
        $featureOneHeader = trim((string) ($configRow['menu1header'] ?? ''));
        $featureTwoHeader = trim((string) ($configRow['menu2header'] ?? ''));
        $featureThreeHeader = trim((string) ($configRow['menu3header'] ?? ''));
        $featureOneText = trim((string) ($configRow['menu1text'] ?? ''));
        $featureTwoText = trim((string) ($configRow['menu2text'] ?? ''));
        $featureThreeText = trim((string) ($configRow['menu3text'] ?? ''));
        $featureOneIcon = trim((string) ($configRow['menu1icon'] ?? '')) ?: 'fas fa-satellite-dish';
        $featureTwoIcon = trim((string) ($configRow['menu2icon'] ?? '')) ?: 'fas fa-shield-alt';
        $featureThreeIcon = trim((string) ($configRow['menu3icon'] ?? '')) ?: 'fas fa-crown';

        return array(
            'home_uptime_hours' => $uptimeHours,
            'home_online_count' => $onlineCount,
            'home_total_users' => $totalUsers,
            'home_hero_kicker' => $languageData['home_hero_kicker'] ?? '',
            'home_menu_header' => $menuHeader !== '' ? $menuHeader : ($languageData['home_default_lead'] ?? ''),
            'home_menu1_icon' => $featureOneIcon,
            'home_menu1_header' => $featureOneHeader !== '' ? $featureOneHeader : ($languageData['home_default_feature_one_title'] ?? ''),
            'home_menu1_text' => $featureOneText !== '' ? $featureOneText : ($languageData['home_default_feature_one_text'] ?? ''),
            'home_menu2_icon' => $featureTwoIcon,
            'home_menu2_header' => $featureTwoHeader !== '' ? $featureTwoHeader : ($languageData['home_default_feature_two_title'] ?? ''),
            'home_menu2_text' => $featureTwoText !== '' ? $featureTwoText : ($languageData['home_default_feature_two_text'] ?? ''),
            'home_menu3_icon' => $featureThreeIcon,
            'home_menu3_header' => $featureThreeHeader !== '' ? $featureThreeHeader : ($languageData['home_default_feature_three_title'] ?? ''),
            'home_menu3_text' => $featureThreeText !== '' ? $featureThreeText : ($languageData['home_default_feature_three_text'] ?? ''),
            'home_support_title' => $languageData['home_support_title'] ?? '',
            'home_support_text' => $languageData['home_support_text'] ?? '',
            'home_story_title' => $languageData['home_story_title'] ?? '',
            'home_story_text' => $languageData['home_story_text'] ?? '',
            'home_story_card_one_eyebrow' => $languageData['home_story_card_one_eyebrow'] ?? '',
            'home_story_card_two_eyebrow' => $languageData['home_story_card_two_eyebrow'] ?? '',
            'home_story_card_three_eyebrow' => $languageData['home_story_card_three_eyebrow'] ?? '',
            'home_final_title' => $languageData['home_final_title'] ?? '',
            'home_final_text' => $languageData['home_final_text'] ?? '',
            'home_feature_rows' => array(
                array(
                    'icon' => $featureOneIcon,
                    'title' => $featureOneHeader !== '' ? $featureOneHeader : ($languageData['home_default_feature_one_title'] ?? ''),
                    'text' => $featureOneText !== '' ? $featureOneText : ($languageData['home_default_feature_one_text'] ?? ''),
                ),
                array(
                    'icon' => $featureTwoIcon,
                    'title' => $featureTwoHeader !== '' ? $featureTwoHeader : ($languageData['home_default_feature_two_title'] ?? ''),
                    'text' => $featureTwoText !== '' ? $featureTwoText : ($languageData['home_default_feature_two_text'] ?? ''),
                ),
                array(
                    'icon' => $featureThreeIcon,
                    'title' => $featureThreeHeader !== '' ? $featureThreeHeader : ($languageData['home_default_feature_three_title'] ?? ''),
                    'text' => $featureThreeText !== '' ? $featureThreeText : ($languageData['home_default_feature_three_text'] ?? ''),
                ),
            ),
            'home_metric_rows' => array(
                array(
                    'value' => $onlineCount,
                    'suffix' => '',
                    'label' => '{useronline}',
                    'icon' => 'fas fa-signal',
                    'counter_class' => 'count1',
                    'time' => 1000,
                ),
                array(
                    'value' => $totalUsers,
                    'suffix' => '',
                    'label' => '{usersregistered}',
                    'icon' => 'fas fa-users',
                    'counter_class' => 'count-up',
                    'time' => 500,
                ),
                array(
                    'value' => $uptimeHours,
                    'suffix' => 'H',
                    'label' => '{onlinetime}',
                    'icon' => 'fas fa-clock',
                    'counter_class' => 'count2',
                    'time' => 1000,
                ),
            ),
        );
    }

    private function respondJson(array $payload)
    {
        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($payload));
    }

    private function getApiBaseUri($path)
    {
        return 'http://' . $this->config->item('apiip') . '/api/v1/' . ltrim($path, '/');
    }

    private function getApiAccessToken()
    {
        return (array) $this->Apigettoken->apitoken();
    }

    private function requestApi($method, $path, array $options = array())
    {
        $token = $this->getApiAccessToken();

        if (empty($token['access_token'])) {
            return null;
        }

        $client = new Client(array(
            'base_uri' => $this->getApiBaseUri($path),
            'timeout' => 5.0,
            'http_errors' => false,
        ));

        $requestOptions = $options;
        $requestOptions['headers']['authorization'] = 'Bearer ' . $token['access_token'];

        try {
            return $client->request($method, '', $requestOptions);
        } catch (GuzzleException $exception) {
            log_message('error', 'Home API request failed: ' . $exception->getMessage());
            return null;
        }
    }

    private function getLocalUser($user)
    {
        return (array) $this->db->get_where('users', array('user' => $user))->row_array();
    }

    private function upsertLocalUser(array $userData)
    {
        $existing = $this->getLocalUser($userData['user'] ?? '');

        if (!empty($existing['id'])) {
            $this->db->where('id', $existing['id']);
            $this->db->update('users', $userData);
            return $existing['id'];
        }

        $this->db->insert('users', $userData);
        return $this->db->insert_id();
    }

    private function loginUserSession(array $userData)
    {
        $this->session->set_userdata(array(
            'user' => $userData['user'] ?? '',
            'rol' => (int) ($userData['rol'] ?? 2),
            'login' => true,
        ));
    }

    private function fetchRemoteUser($user)
    {
        $response = $this->requestApi('GET', 'users/' . rawurlencode($user));

        if ($response === null || $response->getStatusCode() !== 200) {
            return null;
        }

        $remoteUser = json_decode((string) $response->getBody(), true);

        return is_array($remoteUser) ? $remoteUser : null;
    }

    private function validateRemotePassword($user, $password)
    {
        $response = $this->requestApi('POST', 'users/' . rawurlencode($user) . '/password/validate', array(
            'form_params' => array(
                'password' => hash('sha256', $password),
            ),
        ));

        return $response !== null && $response->getStatusCode() === 200;
    }

    private function syncRemoteUserLocally(array $remoteUser, $password)
    {
        $role = !empty($remoteUser['Power']['Editor']) ? 1 : 2;
        $localUser = array(
            'user' => $remoteUser['Name'] ?? '',
            'pass' => cms_hash_password($password),
            'rol' => $role,
            'email' => $remoteUser['Email'] ?? '',
        );

        $this->upsertLocalUser($localUser);

        return $localUser;
    }

    public function index()
	{
        if ($this->redirectToMaintenanceIfNeeded()) {
            return;
        }

        $this->renderPublicPage('home', $this->buildHomeViewData($this->getConfigRow()));
	}

	public function reg(){
        $payload = array('status' => 0);
        $user = trim((string) $this->input->post('user'));
        $pass = (string) $this->input->post('pass');
        $pass1 = (string) $this->input->post('pass1');
        $email = trim((string) $this->input->post('email'));

        if ($user === '' || $pass === '' || $pass1 === '' || $email === '') {
            $payload['sms'] = 'Complete todos los campos';
            return $this->respondJson($payload);
        }

        if ($pass !== $pass1) {
            $payload['sms'] = 'Sus contraseñas deben coincidir';
            return $this->respondJson($payload);
        }

        $response = $this->requestApi('POST', 'users/register', array(
            'form_params' => array(
                'username' => $user,
                'password' => hash('sha256', $pass),
                'email' => $email,
            ),
        ));

        if ($response === null) {
            $payload['sms'] = 'No se pudo conectar con la API del juego';
            return $this->respondJson($payload);
        }

        $responseData = json_decode((string) $response->getBody(), true);

        if ($response->getStatusCode() !== 200) {
            $payload['sms'] = $responseData['Message'] ?? 'No se pudo completar el registro';
            return $this->respondJson($payload);
        }

        $this->upsertLocalUser(array(
            'user' => $user,
            'pass' => cms_hash_password($pass),
            'rol' => 2,
            'email' => $email,
        ));

        $payload['status'] = 200;
        return $this->respondJson($payload);
	}

	public function login(){
		$user = trim((string) $this->input->post('user'));
        $pass = (string) $this->input->post('pass');
        $localUser = $this->getLocalUser($user);

        if (!empty($localUser) && cms_password_verify($pass, $localUser['pass'] ?? '')) {
            if (cms_password_needs_rehash($localUser['pass'])) {
                $localUser['pass'] = cms_hash_password($pass);
                $this->upsertLocalUser($localUser);
            }

            $this->loginUserSession($localUser);
            $this->redirectTo('');
        }

        $remoteUser = $this->fetchRemoteUser($user);
        if ($remoteUser === null || !$this->validateRemotePassword($user, $pass)) {
            $this->redirectTo('');
        }

        $this->loginUserSession($this->syncRemoteUserLocally($remoteUser, $pass));
        $this->redirectTo('');
	}

	public function logout(){
        $this->session->sess_destroy();
        $this->redirectTo('');
    }
}
