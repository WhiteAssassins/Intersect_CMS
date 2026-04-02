<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Apiplayersonline extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('intersectapiclient');
    }

    public function playeronline()
    {
        $response = $this->intersectapiclient->requestCachedJson('POST', 'players/online', array(
            'total' => 0,
            'count' => 0,
            'Page' => 0,
            'entries' => array(),
            'Values' => array(),
        ), array(
            'cache_key' => 'players_online',
            'ttl' => 45,
            'json' => array(
                'page' => 0,
                'count' => 5000,
            ),
        ));

        $values = array();
        if (isset($response['Values']) && is_array($response['Values'])) {
            $values = $response['Values'];
        } elseif (isset($response['entries']) && is_array($response['entries'])) {
            $values = $response['entries'];
        }

        $total = isset($response['Total']) ? (int) $response['Total'] : (int) ($response['total'] ?? count($values));
        $count = isset($response['Count']) ? (int) $response['Count'] : (int) ($response['count'] ?? count($values));

        return array(
            'Total' => $total,
            'Count' => $count,
            'Page' => (int) ($response['Page'] ?? 0),
            'Values' => $values,
            'Entries' => $values,
            'entries' => $values,
            'total' => $total,
            'count' => $count,
        );
    }

    public function onlinecount()
    {
        return $this->intersectapiclient->getCachedJson('players/online/count', array(
            'onlineCount' => 0,
        ), array(
            'cache_key' => 'players_online_count',
            'ttl' => 45,
        ));
    }
}
