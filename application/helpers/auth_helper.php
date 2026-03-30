<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('cms_hash_password')) {
    function cms_hash_password($password) {
        return password_hash($password, PASSWORD_DEFAULT);
    }
}

if (!function_exists('cms_password_verify')) {
    function cms_password_verify($password, $storedHash) {
        if ($storedHash === null || $storedHash === '') {
            return false;
        }

        $info = password_get_info($storedHash);
        if (!empty($info['algo'])) {
            return password_verify($password, $storedHash);
        }

        return hash_equals(md5($password), (string) $storedHash);
    }
}

if (!function_exists('cms_password_needs_rehash')) {
    function cms_password_needs_rehash($storedHash) {
        if ($storedHash === null || $storedHash === '') {
            return true;
        }

        $info = password_get_info($storedHash);
        if (empty($info['algo'])) {
            return true;
        }

        return password_needs_rehash($storedHash, PASSWORD_DEFAULT);
    }
}

if (!function_exists('cms_csrf_field')) {
    function cms_csrf_field() {
        $ci = & get_instance();

        if (!$ci->config->item('csrf_protection')) {
            return '';
        }

        return '<input type="hidden" name="' . html_escape($ci->security->get_csrf_token_name()) . '" value="' . html_escape($ci->security->get_csrf_hash()) . '">';
    }
}
