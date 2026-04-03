<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller
{
    private $languageDataCache;

    protected function respondJson(array $payload, $statusCode = 200)
    {
        $this->output
            ->set_status_header($statusCode)
            ->set_content_type('application/json')
            ->set_output(json_encode($payload, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES));
    }

    protected function getConfigRow()
    {
        $this->load->model('Sitecontext');
        return $this->Sitecontext->getConfigRow();
    }

    protected function updateConfigRow(array $data)
    {
        $this->db->where('id', 1);
        return $this->db->update('config', $data);
    }

    protected function isMaintenanceEnabled()
    {
        $configRow = $this->getConfigRow();

        return (int) ($configRow['mant'] ?? 0) === 1;
    }

    protected function redirectTo($path)
    {
        header('Location: ' . base_url($path));
        exit;
    }

    protected function getLanguageData()
    {
        if (is_array($this->languageDataCache)) {
            return $this->languageDataCache;
        }

        $this->load->model('Langs');
        $languageData = $this->Langs->current();
        $currentLanguage = $this->Langs->getLanguageMeta($languageData['site_lang'] ?? null);

        $languageData['language_options'] = $this->Langs->getLanguageOptions($currentLanguage['code']);
        $languageData['current_language_code'] = $currentLanguage['code'];
        $languageData['current_language_short'] = $currentLanguage['short'];
        $languageData['current_language_label'] = $currentLanguage['label'];
        $languageData['current_language_direction'] = $currentLanguage['direction'];
        $languageData['current_language_is_rtl'] = $currentLanguage['is_rtl'] ? 1 : 0;

        $this->languageDataCache = $languageData;
        return $this->languageDataCache;
    }

    protected function t($key, $default = '')
    {
        $languageData = $this->getLanguageData();

        if (isset($languageData[$key]) && $languageData[$key] !== '') {
            return $languageData[$key];
        }

        return $default;
    }

    protected function redirectToMaintenanceIfNeeded()
    {
        if ($this->isMaintenanceEnabled() && !$this->session->userdata('login')) {
            header('Location: ' . base_url('mant'));
            return true;
        }

        return false;
    }

    protected function renderPublicPage($view, array $data = array())
    {
        $viewData = array_merge($this->getLanguageData(), $data);

        $this->parser->parse('header', $viewData);
        $this->parser->parse('navbar', $viewData);
        $this->parser->parse($view, $viewData);
        $this->parser->parse('footer', $viewData);
    }

    protected function renderMinimalPage($view, array $data = array())
    {
        $viewData = array_merge($this->getLanguageData(), $data);

        $this->parser->parse('header', $viewData);
        $this->parser->parse($view, $viewData);
        $this->parser->parse('footer', $viewData);
    }

    protected function renderAdminPage($view, array $data = array())
    {
        $viewData = array_merge($this->getLanguageData(), $this->getAdminChromeData(), $data);

        $this->parser->parse('header', $viewData);
        $this->parser->parse('sidebar', $viewData);
        $this->parser->parse($view, $viewData);
        $this->parser->parse('footer', $viewData);
    }

    protected function requireLogin($redirectPath = '')
    {
        if ($this->session->userdata('login')) {
            return true;
        }

        $this->redirectTo($redirectPath);
        return false;
    }

    protected function requireAdmin($redirectPath = '')
    {
        if ($this->session->userdata('login') && (int) $this->session->userdata('rol') === 1) {
            return true;
        }

        $this->redirectTo($redirectPath);
        return false;
    }

    protected function getPostString($key)
    {
        return trim((string) $this->input->post($key));
    }

    protected function logAdminAction($action, $user = 'N/A')
    {
        return $this->db->insert('logs', array(
            'admin' => $this->session->userdata('user'),
            'user' => $user,
            'action' => $action,
            'time' => date('F j, Y, g:i a'),
        ));
    }

    protected function getAdminChromeData()
    {
        $this->load->library('releasecheckservice');
        $releaseState = $this->releasecheckservice->getProjectUpdateState('0.8');

        return array(
            'has_update_available' => !empty($releaseState['has_update']) ? 1 : 0,
            'available_version' => $releaseState['available_version'] ?? '',
        );
    }
}
