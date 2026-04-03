<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if (!function_exists('cms_installer_set_state_cache')) {
    function cms_installer_set_state_cache(array $state)
    {
        $GLOBALS['cms_installer_state_cache'] = $state;
    }
}

if (!function_exists('cms_installer_state_path')) {
    function cms_installer_state_path()
    {
        return APPPATH . 'config/installer.json';
    }
}

if (!function_exists('cms_installer_load_state')) {
    function cms_installer_load_state()
    {
        if (array_key_exists('cms_installer_state_cache', $GLOBALS)) {
            return is_array($GLOBALS['cms_installer_state_cache']) ? $GLOBALS['cms_installer_state_cache'] : array();
        }

        $path = cms_installer_state_path();

        if (!is_file($path)) {
            cms_installer_set_state_cache(array());
            return array();
        }

        $contents = @file_get_contents($path);
        $contents = ltrim((string) $contents, "\xEF\xBB\xBF");
        $decoded = json_decode((string) $contents, true);

        cms_installer_set_state_cache(is_array($decoded) ? $decoded : array());
        return cms_installer_load_state();
    }
}

if (!function_exists('cms_installer_save_state')) {
    function cms_installer_save_state(array $state)
    {
        $path = cms_installer_state_path();
        $encoded = json_encode($state, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);

        if ($encoded === false || @file_put_contents($path, $encoded) === false) {
            return false;
        }

        cms_installer_set_state_cache($state);
        return true;
    }
}

if (!function_exists('cms_installer_is_installed')) {
    function cms_installer_is_installed()
    {
        $state = cms_installer_load_state();

        return !empty($state['installed']);
    }
}
