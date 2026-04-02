<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class IntersectAdminApi
{
    protected $CI;

    public function __construct()
    {
        $this->CI =& get_instance();
        $this->CI->load->library('intersectapiclient');
    }

    public function sendGlobalMessage($message)
    {
        return $this->request('POST', 'chat/global', array(
            'json' => $this->buildChatPayload($message),
        ));
    }

    public function sendDirectMessage($username, $message)
    {
        return $this->request('POST', 'chat/direct/' . rawurlencode($username), array(
            'json' => $this->buildChatPayload($message),
        ));
    }

    public function sendProximityMessage($mapId, $message)
    {
        return $this->request('POST', 'chat/proximity/' . rawurlencode($mapId), array(
            'json' => $this->buildChatPayload($message),
        ));
    }

    public function moderateUser($playerLookup, $action, array $payload = array())
    {
        return $this->request('POST', 'players/' . rawurlencode($playerLookup) . '/admin/' . $action, array(
            'json' => $payload,
        ));
    }

    public function warpUserToMap($username, $mapId)
    {
        return $this->moderateUser($username, 'warpto', array(
            'MapId' => $mapId,
        ));
    }

    public function giveItemToPlayer($playerName, $itemId, $quantity = 1)
    {
        return $this->request('POST', 'players/' . rawurlencode($playerName) . '/items/give', array(
            'json' => array(
                'itemid' => $itemId,
                'quantity' => (int) $quantity,
                'bankoverflow' => false,
            ),
        ));
    }

    protected function buildChatPayload($message)
    {
        return array(
            'Message' => $message,
            'Color' => array(
                'A' => 255,
                'R' => 255,
                'G' => 0,
                'B' => 0,
            ),
        );
    }

    protected function request($method, $path, array $options = array())
    {
        $options['timeout'] = $options['timeout'] ?? 3.0;
        $options['connect_timeout'] = $options['connect_timeout'] ?? 0.7;
        return $this->CI->intersectapiclient->requestJson($method, $path, $options);
    }
}
