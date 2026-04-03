<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('homepagebuilder');
        $this->load->library('intersectauthservice');
        $this->load->model('Userpaneldata');
    }

    public function index()
    {
        if ($this->redirectToMaintenanceIfNeeded()) {
            return;
        }

        $this->renderPublicPage('home', $this->homepagebuilder->build());
    }

    public function reg()
    {
        $payload = array('status' => 0);
        $user = $this->getPostString('user');
        $pass = (string) $this->input->post('pass');
        $pass1 = (string) $this->input->post('pass1');
        $email = $this->getPostString('email');

        if ($user === '' || $pass === '' || $pass1 === '' || $email === '') {
            $payload['sms'] = $this->t('form_complete_all_fields', 'Complete all fields.');
            $this->respondJson($payload);
            return;
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $payload['sms'] = $this->t('form_valid_email_required', 'Please enter a valid email address.');
            $this->respondJson($payload);
            return;
        }

        if (strlen($pass) < 6) {
            $payload['sms'] = $this->t('password_min_length', 'Password must be at least 6 characters long.');
            $this->respondJson($payload);
            return;
        }

        if ($pass !== $pass1) {
            $payload['sms'] = $this->t('passwords_must_match', 'Passwords must match.');
            $this->respondJson($payload);
            return;
        }

        $response = $this->intersectauthservice->registerRemoteUser($user, $pass, $email);
        if (empty($response)) {
            $payload['sms'] = $this->t('auth_api_unreachable', 'Could not connect to the game API.');
            $this->respondJson($payload);
            return;
        }

        if (empty($response['ok'])) {
            $responseData = (array) ($response['body'] ?? array());
            $payload['sms'] = $responseData['Message'] ?? ($response['message'] ?? $this->t('register_failed_default', 'Could not complete registration.'));
            $this->respondJson($payload);
            return;
        }

        $this->upsertLocalUser(array(
            'user' => $user,
            'pass' => cms_hash_password($pass),
            'rol' => 2,
            'email' => $email,
        ));

        $payload['status'] = 200;
        $this->respondJson($payload);
    }

    public function login()
    {
        $user = $this->getPostString('user');
        $pass = (string) $this->input->post('pass');
        $localUser = $this->getLocalUser($user);

        if (!empty($localUser) && cms_password_verify($pass, $localUser['pass'] ?? '')) {
            if (cms_password_needs_rehash($localUser['pass'])) {
                $localUser['pass'] = cms_hash_password($pass);
                $this->upsertLocalUser($localUser);
            }

            $this->loginUserSession($localUser);
            $this->redirectTo('');
            return;
        }

        $remoteUser = $this->intersectauthservice->fetchRemoteUser($user);
        if ($remoteUser === null || !$this->intersectauthservice->validateRemotePassword($user, $pass)) {
            $this->redirectTo('');
            return;
        }

        $this->loginUserSession($this->syncRemoteUserLocally($remoteUser, $pass));
        $this->redirectTo('');
    }

    public function logout()
    {
        $this->session->sess_destroy();
        $this->redirectTo('');
    }

    protected function respondJson(array $payload, $statusCode = 200)
    {
        $this->output
            ->set_status_header($statusCode)
            ->set_content_type('application/json')
            ->set_output(json_encode($payload, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES));
    }

    private function getLocalUser($user)
    {
        return $this->Userpaneldata->getUserByUsername($user);
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
}
