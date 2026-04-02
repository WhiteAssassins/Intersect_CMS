<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class IntersectAuthService
{
    protected $CI;

    public function __construct()
    {
        $this->CI =& get_instance();
        $this->CI->load->library('intersectapiclient');
    }

    public function registerRemoteUser($username, $password, $email)
    {
        return $this->CI->intersectapiclient->requestJson('POST', 'users/register', array(
            'json' => array(
                'username' => $username,
                'password' => $this->CI->intersectapiclient->hashPassword($password),
                'email' => $email,
            ),
            'timeout' => 2.5,
            'connect_timeout' => 0.7,
        ));
    }

    public function fetchRemoteUser($username)
    {
        $response = $this->CI->intersectapiclient->requestJson('GET', 'users/' . rawurlencode($username), array(
            'timeout' => 2.0,
            'connect_timeout' => 0.7,
        ));

        return !empty($response['ok']) && is_array($response['body']) ? $response['body'] : null;
    }

    public function validateRemotePassword($username, $password)
    {
        $response = $this->CI->intersectapiclient->requestJson('POST', 'users/' . rawurlencode($username) . '/password/validate', array(
            'json' => array(
                'password' => $this->CI->intersectapiclient->hashPassword($password),
            ),
            'timeout' => 2.5,
            'connect_timeout' => 0.7,
        ));

        return !empty($response['ok']);
    }

    public function changeRemotePassword($username, $currentPassword, $newPassword)
    {
        return $this->CI->intersectapiclient->requestJson('POST', 'users/' . rawurlencode($username) . '/password/change', array(
            'json' => array(
                'new' => $this->CI->intersectapiclient->hashPassword($newPassword),
                'authorization' => $this->CI->intersectapiclient->hashPassword($currentPassword),
            ),
            'timeout' => 2.5,
            'connect_timeout' => 0.7,
        ));
    }
}
