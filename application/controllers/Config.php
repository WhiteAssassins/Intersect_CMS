<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Config extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Langs');
        $this->load->library('intersectapiclient');
        $this->requireAdmin();
    }

    public function index()
    {
        $this->renderAdminPage('admin/config', $this->buildConfigDashboardViewData());
    }

    public function legal()
    {
        $this->renderAdminPage('admin/legal', $this->buildConfigContentViewData('legal'));
    }

    public function terms()
    {
        $this->renderAdminPage('admin/terms', $this->buildConfigContentViewData('terms'));
    }

    public function privacity()
    {
        $this->renderAdminPage('admin/privacity', $this->buildConfigContentViewData('privacity'));
    }

    public function menus()
    {
        $this->renderAdminPage('admin/menus', $this->buildConfigMenuViewData());
    }

    public function editcolors()
    {
        $this->updateConfigAndRedirect(array(
            'color1' => $this->getPostString('color1'),
            'color2' => $this->getPostString('color2'),
        ));
    }

    public function mantact()
    {
        $this->updateConfigAndRedirect(array('mant' => 1));
    }

    public function mantdes()
    {
        $this->updateConfigAndRedirect(array('mant' => 0));
    }

    public function analitycs()
    {
        $this->updateConfigAndRedirect(array(
            'analytics' => $this->getPostString('google'),
        ));
    }

    public function download()
    {
        $this->updateConfigAndRedirect(array(
            'download' => $this->getPostString('link'),
        ));
    }

    public function editmenus()
    {
        $this->updateConfigAndRedirect(array(
            'menuheader' => $this->getPostString('menuheader'),
            'menu1icon' => $this->getPostString('menu1icon'),
            'menu1header' => $this->getPostString('menu1header'),
            'menu1text' => $this->getPostString('menu1text'),
            'menu2icon' => $this->getPostString('menu2icon'),
            'menu2header' => $this->getPostString('menu2header'),
            'menu2text' => $this->getPostString('menu2text'),
            'menu3icon' => $this->getPostString('menu3icon'),
            'menu3header' => $this->getPostString('menu3header'),
            'menu3text' => $this->getPostString('menu3text'),
        ));
    }

    public function changeprivacity()
    {
        $this->updateConfigAndRedirect(array(
            'privacity' => cms_sanitize_rich_text($this->input->post('privacity')),
        ));
    }

    public function changeterms()
    {
        $this->updateConfigAndRedirect(array(
            'terms' => cms_sanitize_rich_text($this->input->post('terms')),
        ));
    }

    public function changelegal()
    {
        $this->updateConfigAndRedirect(array(
            'legal' => cms_sanitize_rich_text($this->input->post('legal')),
        ));
    }

    public function changelang()
    {
        $lang = $this->getPostString('lang');
        if (!$this->Langs->isSupportedLanguage($lang)) {
            $lang = 'es';
        }

        $this->updateConfigAndRedirect(array(
            'lang' => $lang,
        ));
    }

    private function buildConfigDashboardViewData()
    {
        $configRow = $this->getConfigRow();
        $apiHealth = $this->intersectapiclient->getHealthSummary();
        $apiStatus = $this->buildApiStatusLabels($apiHealth);

        return array(
            'config_color1' => $configRow['color1'] ?? '#000000',
            'config_color2' => $configRow['color2'] ?? '#000000',
            'config_analytics' => $configRow['analytics'] ?? '',
            'config_download' => $configRow['download'] ?? '',
            'config_maintenance_enabled' => (int) ($configRow['mant'] ?? 0) === 1,
            'config_current_lang' => $configRow['lang'] ?? 'es',
            'config_language_options' => $this->Langs->getLanguageOptions($configRow['lang'] ?? 'es'),
            'config_api_configured' => !empty($apiHealth['configured']) ? 1 : 0,
            'config_api_online' => !empty($apiHealth['online']) ? 1 : 0,
            'config_api_cached' => !empty($apiHealth['using_cache']) ? 1 : 0,
            'config_api_stale' => !empty($apiHealth['using_stale_cache']) ? 1 : 0,
            'config_api_last_sync' => $apiHealth['last_sync_label'] ?? 'N/A',
            'config_api_message' => $apiHealth['message'] ?? '',
            'config_api_status_badge' => $apiStatus['badge'],
            'config_api_status_text' => $apiStatus['detail'],
            'config_api_status_readonly' => $apiStatus['status'],
            'config_maintenance_label' => $this->t('status_on', 'ON'),
            'config_maintenance_disabled_label' => $this->t('status_off', 'OFF'),
            'config_download_enabled_label' => $this->t('status_on', 'ON'),
            'config_download_disabled_label' => $this->t('status_off', 'OFF'),
        );
    }

    private function buildApiStatusLabels(array $apiHealth)
    {
        if (empty($apiHealth['configured'])) {
            return array(
                'badge' => $this->t('api_state_off', 'OFF'),
                'status' => $this->t('api_status_not_configured', 'Not configured'),
                'detail' => $this->t('api_detail_not_configured', 'Not configured'),
            );
        }

        if (!empty($apiHealth['online']) && empty($apiHealth['using_stale_cache'])) {
            if (!empty($apiHealth['using_cache'])) {
                return array(
                    'badge' => $this->t('api_state_cache', 'CACHE'),
                    'status' => $this->t('api_status_cache', 'Available from cache'),
                    'detail' => $this->t('api_detail_cache', 'Available from cache'),
                );
            }

            return array(
                'badge' => $this->t('api_state_live', 'LIVE'),
                'status' => $this->t('api_status_live', 'Available live'),
                'detail' => $this->t('api_detail_live', 'Live response'),
            );
        }

        if (!empty($apiHealth['using_stale_cache'])) {
            return array(
                'badge' => $this->t('api_state_stale', 'STALE'),
                'status' => $this->t('api_status_stale', 'Stale cache fallback'),
                'detail' => $this->t('api_detail_stale', 'Stale cache fallback'),
            );
        }

        return array(
            'badge' => $this->t('api_state_down', 'DOWN'),
            'status' => $this->t('api_status_down', 'No response'),
            'detail' => $this->t('api_detail_down', 'No response'),
        );
    }

    private function buildConfigMenuViewData()
    {
        $configRow = $this->getConfigRow();

        return array(
            'config_menu_header' => $configRow['menuheader'] ?? '',
            'config_menu1_icon' => $configRow['menu1icon'] ?? '',
            'config_menu1_header' => $configRow['menu1header'] ?? '',
            'config_menu1_text' => $configRow['menu1text'] ?? '',
            'config_menu2_icon' => $configRow['menu2icon'] ?? '',
            'config_menu2_header' => $configRow['menu2header'] ?? '',
            'config_menu2_text' => $configRow['menu2text'] ?? '',
            'config_menu3_icon' => $configRow['menu3icon'] ?? '',
            'config_menu3_header' => $configRow['menu3header'] ?? '',
            'config_menu3_text' => $configRow['menu3text'] ?? '',
        );
    }

    private function buildConfigContentViewData($field)
    {
        $configRow = $this->getConfigRow();

        return array(
            'config_id' => $configRow['id'] ?? 1,
            'config_content' => $configRow[$field] ?? '',
        );
    }

    private function updateConfigAndRedirect(array $data)
    {
        $this->updateConfigRow($data);
        $this->redirectTo('config');
    }
}
