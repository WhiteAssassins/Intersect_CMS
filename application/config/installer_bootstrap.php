<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if (!function_exists('cms_installer_state_path')) {
    function cms_installer_state_path()
    {
        return APPPATH . 'config/installer.json';
    }
}

if (!function_exists('cms_installer_load_state')) {
    function cms_installer_load_state()
    {
        static $state = null;

        if ($state !== null) {
            return $state;
        }

        $path = cms_installer_state_path();

        if (!is_file($path)) {
            $state = array();
            return $state;
        }

        $contents = @file_get_contents($path);
        $contents = ltrim((string) $contents, "\xEF\xBB\xBF");
        $decoded = json_decode((string) $contents, true);

        $state = is_array($decoded) ? $decoded : array();

        return $state;
    }
}

if (!function_exists('cms_installer_is_installed')) {
    function cms_installer_is_installed()
    {
        $state = cms_installer_load_state();

        return !empty($state['installed']);
    }
}
