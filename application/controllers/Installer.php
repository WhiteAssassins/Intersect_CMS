<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Installer extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('url', 'auth'));
        $this->load->library('session');
        $this->load->library('installerservice');
        $this->load->model('Langs');
    }

    public function index()
    {
        if ($this->installerservice->isInstalled()) {
            redirect(base_url());
            return;
        }

        if (strtoupper((string) ($_SERVER['REQUEST_METHOD'] ?? 'GET')) === 'POST') {
            $postedData = is_array($_POST) ? $_POST : array();
            $selectedLang = (string) ($postedData['default_lang'] ?? 'es');
            if ($this->Langs->isSupportedLanguage($selectedLang)) {
                $this->session->set_userdata(array('installer_lang' => $selectedLang));
            }
            $result = $this->installerservice->install($postedData);

            if (!empty($result['ok'])) {
                $this->session->set_flashdata('installer_success', $result['summary']);
                $this->session->set_userdata(array(
                    'installer_lang' => $result['summary']['language'] ?? $this->getInstallerLanguageCode(),
                ));
                redirect('install/success');
                return;
            }

            $this->render(array(
                'checks' => $this->installerservice->getRequirementChecks(),
                'form' => array_merge($this->installerservice->getDefaults(), $postedData),
                'errors' => $result['errors'] ?? array($this->Langs->getText('installer_error_title', $this->getInstallerLanguageCode($selectedLang), 'The install could not finish')),
                'success' => false,
            ));
            return;
        }

        $this->render(array(
            'checks' => $this->installerservice->getRequirementChecks(),
            'form' => $this->installerservice->getDefaults(),
            'errors' => array(),
            'success' => false,
        ), $this->getInstallerLanguageCode());
    }

    public function success()
    {
        $summary = $this->session->flashdata('installer_success');

        if (empty($summary)) {
            redirect(base_url());
            return;
        }

        $this->render(array(
            'checks' => array(),
            'form' => array(),
            'errors' => array(),
            'success' => true,
            'summary' => $summary,
        ), (string) ($summary['language'] ?? $this->getInstallerLanguageCode()));
    }

    protected function render(array $data, $langCode = null)
    {
        $langCode = $this->getInstallerLanguageCode($langCode ?: ($data['form']['default_lang'] ?? 'es'));
        $meta = $this->Langs->getLanguageMeta($langCode);

        $viewData = array_merge(
            $this->Langs->getStandaloneData($langCode),
            $data,
            array(
                'installer_language_options' => $this->Langs->getLanguageOptions($langCode),
                'current_language_code' => $meta['code'],
                'current_language_short' => $meta['short'],
                'current_language_label' => $meta['label'],
                'current_language_direction' => $meta['direction'],
                'current_language_is_rtl' => $meta['is_rtl'] ? 1 : 0,
            )
        );

        $this->load->view('installer/index', $viewData);
    }

    protected function getInstallerLanguageCode($fallback = 'es')
    {
        $langCode = (string) $this->session->userdata('installer_lang');
        if ($langCode === '') {
            $langCode = (string) $fallback;
        }

        return $this->Langs->isSupportedLanguage($langCode) ? $langCode : 'es';
    }
}
