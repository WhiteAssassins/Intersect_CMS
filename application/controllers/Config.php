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
        $this->updateConfigAndRedirect(array(
            'lang' => $this->getPostString('lang'),
        ));
    }

    private function buildConfigDashboardViewData()
    {
        $configRow = $this->getConfigRow();
        $apiHealth = $this->intersectapiclient->getHealthSummary();

        return array(
            'config_color1' => $configRow['color1'] ?? '#000000',
            'config_color2' => $configRow['color2'] ?? '#000000',
            'config_analytics' => $configRow['analytics'] ?? '',
            'config_download' => $configRow['download'] ?? '',
            'config_maintenance_enabled' => (int) ($configRow['mant'] ?? 0) === 1,
            'config_current_lang' => $configRow['lang'] ?? 'es',
            'config_api_configured' => !empty($apiHealth['configured']) ? 1 : 0,
            'config_api_online' => !empty($apiHealth['online']) ? 1 : 0,
            'config_api_cached' => !empty($apiHealth['using_cache']) ? 1 : 0,
            'config_api_stale' => !empty($apiHealth['using_stale_cache']) ? 1 : 0,
            'config_api_last_sync' => $apiHealth['last_sync_label'] ?? 'N/A',
            'config_api_message' => $apiHealth['message'] ?? '',
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
