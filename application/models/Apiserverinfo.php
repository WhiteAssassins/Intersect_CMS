<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Apiserverinfo extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('intersectapiclient');
    }

    public function serverinfo()
    {
        return $this->intersectapiclient->getCachedJson('info/config', array(
            'GameName' => 'Intersect CMS',
        ), array(
            'cache_key' => 'server_info',
            'ttl' => 600,
        ));
    }
}
