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
            $this->intersectadminapi->sendGlobalMessage($this->serverMessagePrefix() . $message),
            $this->t('admin_action_global_message', 'Global Message')
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
            $this->intersectadminapi->sendDirectMessage($user, $this->serverMessagePrefix() . $message),
            $this->t('admin_action_direct_message', 'Direct Message'),
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
            $this->intersectadminapi->sendProximityMessage($map, $this->serverMessagePrefix() . $message),
            $this->t('admin_action_proximity_message', 'Proximity Message'),
            $map
        );
    }

    public function ban()
    {
        $reason = $this->getPostString('reason');
        $user = $this->getPostString('user');
        $duration = (int) $this->getPostString('time');
        if ($reason === '' || $user === '' || $duration <= 0) {
            $this->respondJson($this->errorPayload());
            return;
        }

        $this->completeCommand(
            $this->intersectadminapi->moderateUser($user, 'ban', array(
                'duration' => $duration,
                'reason' => $reason,
                'moderator' => $this->session->userdata('user'),
                'ip' => false,
            )),
            $this->t('admin_action_ban', 'Ban'),
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
            $this->t('admin_action_unban', 'Unban'),
            $user
        );
    }

    public function mute()
    {
        $reason = $this->getPostString('reason');
        $user = $this->getPostString('user');
        $duration = (int) $this->getPostString('time');
        if ($reason === '' || $user === '' || $duration <= 0) {
            $this->respondJson($this->errorPayload());
            return;
        }

        $this->completeCommand(
            $this->intersectadminapi->moderateUser($user, 'mute', array(
                'duration' => $duration,
                'reason' => $reason,
                'moderator' => $this->session->userdata('user'),
                'ip' => false,
            )),
            $this->t('admin_action_mute', 'Mute'),
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
            $this->t('admin_action_unmute', 'Unmute'),
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
            $this->t('admin_action_kick', 'Kick'),
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
            $this->t('admin_action_kill', 'Kill'),
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
            $this->t('admin_action_teleport', 'Teleport'),
            $user
        );
    }

    private function serverMessagePrefix()
    {
        return $this->t('server_message_prefix', 'Server') . ': ';
    }

    private function errorPayload($message = null)
    {
        return array(
            'status' => 0,
            'sms' => $message ?: $this->t('form_complete_all_fields', 'Complete all fields.'),
        );
    }

    private function completeCommand(array $result, $action, $user = 'N/A')
    {
        if (!empty($result['ok'])) {
            $this->logAdminAction($action, $user);
            $this->respondJson(array('status' => 200));
            return;
        }

        $message = $result['message'] ?? $this->t('admin_action_failed_default', 'Could not complete the action.');
        $this->respondJson($this->errorPayload($message));
    }
}
