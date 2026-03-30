<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admincommands extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('intersectadminapi');
        $this->requireAdmin();
    }

    public function global()
    {
        $message = $this->getPostString('txt');
        if ($message === '') {
            $this->respondJson($this->errorPayload());
            return;
        }

        $this->completeCommand(
            $this->intersectadminapi->sendGlobalMessage('Server: ' . $message),
            'Mensaje Global'
        );
    }

    public function direct()
    {
        $message = $this->getPostString('txt');
        $user = $this->getPostString('user');
        if ($message === '' || $user === '') {
            $this->respondJson($this->errorPayload());
            return;
        }

        $this->completeCommand(
            $this->intersectadminapi->sendDirectMessage($user, 'Server: ' . $message),
            'Mensaje Directo',
            $user
        );
    }

    public function proximity()
    {
        $message = $this->getPostString('txt');
        $map = $this->getPostString('map');
        if ($message === '' || $map === '') {
            $this->respondJson($this->errorPayload());
            return;
        }

        $this->completeCommand(
            $this->intersectadminapi->sendProximityMessage($map, 'Server: ' . $message),
            'Mensaje de Proximidad',
            $map
        );
    }

    public function ban()
    {
        $reason = $this->getPostString('reason');
        $user = $this->getPostString('user');
        $duration = $this->getPostString('time');
        if ($reason === '' || $user === '' || $duration === '') {
            $this->respondJson($this->errorPayload());
            return;
        }

        $this->completeCommand(
            $this->intersectadminapi->moderateUser($user, 'ban', array(
                'duration' => $duration,
                'reason' => $reason,
                'moderator' => $this->session->userdata('user'),
            )),
            'Ban',
            $user
        );
    }

    public function unban()
    {
        $user = $this->getPostString('user');
        if ($user === '') {
            $this->respondJson($this->errorPayload());
            return;
        }

        $this->completeCommand(
            $this->intersectadminapi->moderateUser($user, 'unban'),
            'Desbaneado',
            $user
        );
    }

    public function mute()
    {
        $reason = $this->getPostString('reason');
        $user = $this->getPostString('user');
        $duration = $this->getPostString('time');
        if ($reason === '' || $user === '' || $duration === '') {
            $this->respondJson($this->errorPayload());
            return;
        }

        $this->completeCommand(
            $this->intersectadminapi->moderateUser($user, 'mute', array(
                'duration' => $duration,
                'reason' => $reason,
                'moderator' => $this->session->userdata('user'),
            )),
            'Muteado',
            $user
        );
    }

    public function unmute()
    {
        $user = $this->getPostString('user');
        if ($user === '') {
            $this->respondJson($this->errorPayload());
            return;
        }

        $this->completeCommand(
            $this->intersectadminapi->moderateUser($user, 'unmute'),
            'Desmuteado',
            $user
        );
    }

    public function kick()
    {
        $user = $this->getPostString('user');
        if ($user === '') {
            $this->respondJson($this->errorPayload());
            return;
        }

        $this->completeCommand(
            $this->intersectadminapi->moderateUser($user, 'kick'),
            'Expulsado',
            $user
        );
    }

    public function kill()
    {
        $user = $this->getPostString('user');
        if ($user === '') {
            $this->respondJson($this->errorPayload());
            return;
        }

        $this->completeCommand(
            $this->intersectadminapi->moderateUser($user, 'kill'),
            'Asesinado',
            $user
        );
    }

    public function tp()
    {
        $user = $this->getPostString('user');
        $map = $this->getPostString('map');
        if ($user === '' || $map === '') {
            $this->respondJson($this->errorPayload());
            return;
        }

        $this->completeCommand(
            $this->intersectadminapi->warpUserToMap($user, $map),
            'Teletransportado',
            $user
        );
    }

    private function errorPayload($message = 'Complete todos los campos')
    {
        return array(
            'status' => 0,
            'sms' => $message,
        );
    }

    private function completeCommand(array $result, $action, $user = 'N/A')
    {
        if (!empty($result['ok'])) {
            $this->logAdminAction($action, $user);
            $this->respondJson(array('status' => 200));
            return;
        }

        $message = $result['message'] ?? 'No fue posible completar la accion.';
        $this->respondJson($this->errorPayload($message));
    }
}
