<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Apiserverstats extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('intersectapiclient');
    }

    public function serverinfo()
    {
        return $this->intersectapiclient->getCachedJson('info/stats', array(
            'uptime' => 0,
            'onlineCount' => 0,
            'cps' => 0,
        ), array(
            'cache_key' => 'server_stats',
            'ttl' => 120,
        ));
    }
}
