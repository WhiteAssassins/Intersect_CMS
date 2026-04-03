<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Config extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Langs');
        $this->load->library('intersectapiclient');
        $this->load->library('installerservice');
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
        $state = $this->installerservice->getEditableState();
        $result = $this->installerservice->updateApplicationSettings(array(
            'base_url' => $state['base_url'],
            'default_lang' => $state['app']['default_lang'],
            'download_url' => $state['app']['download_url'],
            'analytics_id' => $this->getPostString('google'),
        ));

        $this->handleInstallerUpdateResult($result, $this->t('config_success_project', 'Project settings updated.'));
    }

    public function download()
    {
        $state = $this->installerservice->getEditableState();
        $result = $this->installerservice->updateApplicationSettings(array(
            'base_url' => $state['base_url'],
            'default_lang' => $state['app']['default_lang'],
            'download_url' => $this->getPostString('link'),
            'analytics_id' => $state['app']['analytics_id'],
        ));

        $this->handleInstallerUpdateResult($result, $this->t('config_success_project', 'Project settings updated.'));
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

        $state = $this->installerservice->getEditableState();
        $result = $this->installerservice->updateApplicationSettings(array(
            'base_url' => $state['base_url'],
            'default_lang' => $lang,
            'download_url' => $state['app']['download_url'],
            'analytics_id' => $state['app']['analytics_id'],
        ));

        $this->handleInstallerUpdateResult($result, $this->t('config_success_project', 'Project settings updated.'));
    }

    public function projectstate()
    {
        $result = $this->installerservice->updateApplicationSettings(array(
            'base_url' => $this->getPostString('base_url'),
            'default_lang' => $this->getPostString('default_lang'),
            'download_url' => $this->getPostString('download_url'),
            'analytics_id' => $this->getPostString('analytics_id'),
        ));

        $this->handleInstallerUpdateResult($result, $this->t('config_success_project', 'Project settings updated.'));
    }

    public function adminstate()
    {
        $result = $this->installerservice->updateAdminSettings(array(
            'admin_user' => $this->getPostString('admin_user'),
            'admin_email' => $this->getPostString('admin_email'),
            'admin_pass' => $this->getPostString('admin_pass'),
            'admin_pass_confirm' => $this->getPostString('admin_pass_confirm'),
        ));

        $this->handleInstallerUpdateResult($result, $this->t('config_success_admin', 'Admin account updated.'));
    }

    public function databasestate()
    {
        $result = $this->installerservice->updateDatabaseSettings(array(
            'db_host' => $this->getPostString('db_host'),
            'db_port' => $this->getPostString('db_port'),
            'db_name' => $this->getPostString('db_name'),
            'db_user' => $this->getPostString('db_user'),
            'db_pass' => $this->getPostString('db_pass'),
        ));

        $this->handleInstallerUpdateResult($result, $this->t('config_success_database', 'Database connection updated.'));
    }

    public function integrationstate()
    {
        $result = $this->installerservice->updateIntegrationSettings(array(
            'api_ip' => $this->getPostString('api_ip'),
            'api_user' => $this->getPostString('api_user'),
            'api_pass' => $this->getPostString('api_pass'),
            'api_cache_ttl' => $this->getPostString('api_cache_ttl'),
            'api_stale_cache_ttl' => $this->getPostString('api_stale_cache_ttl'),
            'qvapay_id' => $this->getPostString('qvapay_id'),
            'qvapay_secret' => $this->getPostString('qvapay_secret'),
            'support_email' => $this->getPostString('support_email'),
            'support_email_password' => $this->getPostString('support_email_password'),
        ));

        $this->handleInstallerUpdateResult($result, $this->t('config_success_integrations', 'Integrations updated.'));
    }

    public function securitystate()
    {
        $result = $this->installerservice->updateSecuritySettings(array(
            'session_path' => $this->getPostString('session_path'),
            'encryption_key' => $this->getPostString('encryption_key'),
            'csrf_protection' => $this->input->post('csrf_protection') ? '1' : '',
        ));

        $this->handleInstallerUpdateResult($result, $this->t('config_success_security', 'Security settings updated.'));
    }

    private function buildConfigDashboardViewData()
    {
        $configRow = $this->getConfigRow();
        $installerState = $this->installerservice->getEditableState();
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
            'config_notice_message' => (string) $this->session->flashdata('config_message'),
            'config_notice_type' => (string) $this->session->flashdata('config_message_type'),
            'config_maintenance_label' => $this->t('status_on', 'ON'),
            'config_maintenance_disabled_label' => $this->t('status_off', 'OFF'),
            'config_download_enabled_label' => $this->t('status_on', 'ON'),
            'config_download_disabled_label' => $this->t('status_off', 'OFF'),
            'config_state_base_url' => $installerState['base_url'],
            'config_state_default_lang' => $installerState['app']['default_lang'],
            'config_state_download_url' => $installerState['app']['download_url'],
            'config_state_analytics_id' => $installerState['app']['analytics_id'],
            'config_state_admin_user' => $installerState['admin']['username'],
            'config_state_admin_email' => $installerState['admin']['email'],
            'config_state_db_host' => $installerState['database']['hostname'],
            'config_state_db_port' => $installerState['database']['port'],
            'config_state_db_name' => $installerState['database']['database'],
            'config_state_db_user' => $installerState['database']['username'],
            'config_state_api_ip' => $installerState['integrations']['api_ip'],
            'config_state_api_user' => $installerState['integrations']['api_user'],
            'config_state_api_cache_ttl' => $installerState['integrations']['api_cache_ttl'],
            'config_state_api_stale_cache_ttl' => $installerState['integrations']['api_stale_cache_ttl'],
            'config_state_qvapay_id' => $installerState['integrations']['qvapay_id'],
            'config_state_support_email' => $installerState['integrations']['support_email'],
            'config_state_session_path' => $installerState['security']['session_path'],
            'config_state_csrf_enabled' => !empty($installerState['security']['csrf_protection']) ? 1 : 0,
            'config_project_title' => $this->t('config_project_title', 'Project and base URL'),
            'config_project_text' => $this->t('config_project_text', 'Keep the CMS URL, language and public project metadata synchronized with installer.json and the main config table.'),
            'config_project_base_url_label' => $this->t('config_project_base_url_label', 'Base URL'),
            'config_project_download_label' => $this->t('config_project_download_label', 'Download URL'),
            'config_project_analytics_label' => $this->t('config_project_analytics_label', 'Analytics ID'),
            'config_admin_title' => $this->t('config_admin_title', 'Admin account'),
            'config_admin_text' => $this->t('config_admin_text', 'Update the primary administrator stored in the CMS database and in installer.json. Leave the password blank to keep the current one.'),
            'config_admin_user_label' => $this->t('config_admin_user_label', 'Admin username'),
            'config_admin_email_label' => $this->t('config_admin_email_label', 'Admin email'),
            'config_admin_password_label' => $this->t('config_admin_password_label', 'New password'),
            'config_admin_password_confirm_label' => $this->t('config_admin_password_confirm_label', 'Confirm new password'),
            'config_secret_placeholder' => $this->t('config_secret_placeholder', 'Leave blank to keep the current secret'),
            'config_database_title' => $this->t('config_database_title', 'Database connection'),
            'config_database_text' => $this->t('config_database_text', 'These values are validated against the target database before they are written to installer.json.'),
            'config_database_host_label' => $this->t('installer_field_db_host', 'Host'),
            'config_database_port_label' => $this->t('installer_field_db_port', 'Port'),
            'config_database_name_label' => $this->t('installer_field_db_name', 'Database name'),
            'config_database_user_label' => $this->t('installer_field_db_user', 'Database user'),
            'config_database_password_label' => $this->t('installer_field_db_pass', 'Database password'),
            'config_integrations_title' => $this->t('config_integrations_title', 'Integrations and API cache'),
            'config_integrations_text' => $this->t('config_integrations_text', 'Update Intersect credentials, keep secrets hashed where needed and reduce stale API data with shorter cache windows.'),
            'config_api_host_label' => $this->t('installer_field_api_ip', 'Intersect API host'),
            'config_api_user_label' => $this->t('installer_field_api_user', 'Intersect API user'),
            'config_api_password_label' => $this->t('installer_field_api_pass', 'Intersect API password or SHA-256'),
            'config_api_cache_ttl_label' => $this->t('config_api_cache_ttl_label', 'Fresh cache TTL (seconds)'),
            'config_api_stale_cache_ttl_label' => $this->t('config_api_stale_cache_ttl_label', 'Stale fallback TTL (seconds)'),
            'config_qvapay_id_label' => $this->t('installer_field_qvapay_id', 'QvaPay app ID'),
            'config_qvapay_secret_label' => $this->t('installer_field_qvapay_secret', 'QvaPay app secret'),
            'config_support_email_label' => $this->t('installer_field_support_email', 'Support email'),
            'config_support_password_label' => $this->t('installer_field_support_email_password', 'Support email password'),
            'config_security_title' => $this->t('config_security_title', 'Security runtime'),
            'config_security_text' => $this->t('config_security_text', 'Adjust the writable session directory, CSRF protection and encryption key persisted by the installer state file.'),
            'config_session_path_label' => $this->t('config_session_path_label', 'Session path'),
            'config_csrf_label' => $this->t('config_csrf_label', 'Enable CSRF protection'),
            'config_encryption_key_label' => $this->t('config_encryption_key_label', 'Encryption key'),
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
        $this->setConfigNotice($this->t('config_success_saved', 'Configuration updated.'), 'success');
        $this->redirectTo('config');
    }

    private function handleInstallerUpdateResult(array $result, $successMessage)
    {
        if (!empty($result['ok'])) {
            $this->setConfigNotice($successMessage, 'success');
        } else {
            $errors = isset($result['errors']) && is_array($result['errors']) ? $result['errors'] : array($this->t('admin_action_failed_default', 'Could not complete the action.'));
            $this->setConfigNotice(implode(' ', $errors), 'error');
        }

        $this->redirectTo('config');
    }

    private function setConfigNotice($message, $type)
    {
        $this->session->set_flashdata('config_message', (string) $message);
        $this->session->set_flashdata('config_message_type', $type === 'error' ? 'error' : 'success');
    }
}
