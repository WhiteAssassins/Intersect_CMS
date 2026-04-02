<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Apievent extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('intersectapiclient');
    }

    public function event()
    {
        $response = $this->intersectapiclient->requestCachedJson('POST', 'gameobjects/event', array(
            'total' => 0,
            'count' => 0,
            'Page' => 0,
            'entries' => array(),
        ), array(
            'cache_key' => 'events_index',
            'ttl' => 300,
            'json' => array(
                'page' => 0,
                'count' => 5000,
            ),
        ));

        return $this->normalizeEntries($response);
    }

    private function normalizeEntries(array $response)
    {
        $entries = isset($response['entries']) && is_array($response['entries']) ? $response['entries'] : array();
        $total = isset($response['Total']) ? (int) $response['Total'] : (int) ($response['total'] ?? count($entries));
        $count = isset($response['Count']) ? (int) $response['Count'] : (int) ($response['count'] ?? count($entries));

        return array(
            'Total' => $total,
            'Count' => $count,
            'Page' => (int) ($response['Page'] ?? 0),
            'entries' => $entries,
            'Entries' => $entries,
            'Values' => $entries,
            'total' => $total,
            'count' => $count,
        );
    }
}
