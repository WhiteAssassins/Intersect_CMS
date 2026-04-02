<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Apiplayers extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('intersectapiclient');
    }

    public function player()
    {
        $response = $this->intersectapiclient->getCachedJson('players?pageSize=5000', array(
            'Total' => 0,
            'Count' => 0,
            'Page' => 0,
            'PageSize' => 0,
            'Entries' => array(),
            'Values' => array(),
        ), array(
            'cache_key' => 'players_index',
            'ttl' => 180,
        ));

        return $this->normalizePlayerPayload($response);
    }

    public function rank()
    {
        $response = $this->intersectapiclient->getCachedJson('players/rank?pageSize=100&sortDirection=Descending', array(
            'Total' => 0,
            'Count' => 0,
            'Page' => 0,
            'PageSize' => 0,
            'Entries' => array(),
            'Values' => array(),
        ), array(
            'cache_key' => 'players_rank',
            'ttl' => 120,
        ));

        return $this->normalizePlayerPayload($response);
    }

    private function normalizePlayerPayload(array $response)
    {
        $values = array();
        if (isset($response['Values']) && is_array($response['Values'])) {
            $values = $response['Values'];
        } elseif (isset($response['entries']) && is_array($response['entries'])) {
            $values = $response['entries'];
        } elseif (isset($response['Entries']) && is_array($response['Entries'])) {
            $values = $response['Entries'];
        }

        $total = isset($response['Total']) ? (int) $response['Total'] : (int) ($response['total'] ?? count($values));
        $count = isset($response['Count']) ? (int) $response['Count'] : (int) ($response['count'] ?? count($values));
        $page = isset($response['Page']) ? (int) $response['Page'] : (int) ($response['page'] ?? 0);
        $pageSize = isset($response['PageSize']) ? (int) $response['PageSize'] : (int) ($response['count'] ?? count($values));

        return array(
            'Total' => $total,
            'Count' => $count,
            'Page' => $page,
            'PageSize' => $pageSize,
            'Values' => $values,
            'Entries' => $values,
            'entries' => $values,
            'total' => $total,
            'count' => $count,
        );
    }
}
