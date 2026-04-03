<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class InstallerService
{
    protected $CI;
    protected $statePath;
    protected $sessionPath;

    public function __construct()
    {
        $this->CI = & get_instance();
        $this->statePath = APPPATH . 'config/installer.json';
        $this->sessionPath = APPPATH . 'cache/sessions';
    }

    public function isInstalled()
    {
        return cms_installer_is_installed();
    }

    public function getInstallState()
    {
        return cms_installer_load_state();
    }

    public function getDefaults()
    {
        return array(
            'base_url' => $this->detectBaseUrl(),
            'default_lang' => 'es',
            'db_host' => 'localhost',
            'db_port' => '3306',
            'db_name' => 'intersec',
            'db_user' => 'root',
            'db_pass' => '',
            'admin_user' => 'Admin',
            'admin_email' => 'admin@example.com',
            'admin_pass' => '',
            'admin_pass_confirm' => '',
            'api_ip' => '',
            'api_user' => '',
            'api_pass' => '',
            'qvapay_id' => '',
            'qvapay_secret' => '',
            'support_email' => '',
            'support_email_password' => '',
            'download_url' => '',
            'analytics_id' => '',
        );
    }

    public function getEditableState()
    {
        return $this->normalizeInstalledState(cms_installer_load_state());
    }

    public function updateApplicationSettings(array $input)
    {
        $state = $this->getEditableState();
        $langCode = $this->resolveLanguageCode($input['default_lang'] ?? $state['app']['default_lang']);
        $baseUrl = trim((string) ($input['base_url'] ?? $state['base_url']));
        $downloadUrl = trim((string) ($input['download_url'] ?? $state['app']['download_url']));
        $analyticsId = trim((string) ($input['analytics_id'] ?? $state['app']['analytics_id']));
        $errors = array();

        if ($baseUrl === '') {
            $baseUrl = $this->detectBaseUrl();
        }

        $baseUrl = rtrim($baseUrl, '/') . '/';

        if (!filter_var($baseUrl, FILTER_VALIDATE_URL)) {
            $errors[] = $this->t('installer_error_base_url', 'Base URL is not valid.', $langCode);
        }

        if ($downloadUrl !== '' && !filter_var($downloadUrl, FILTER_VALIDATE_URL)) {
            $errors[] = $this->t('config_error_download_url', 'Download URL is not valid.', $langCode);
        }

        if (!empty($errors)) {
            return array(
                'ok' => false,
                'errors' => $errors,
            );
        }

        $this->CI->db->trans_begin();

        $updated = $this->CI->db
            ->where('id', 1)
            ->update('config', array(
                'lang' => $langCode,
                'download' => $downloadUrl,
                'analytics' => $analyticsId,
            ));

        if (!$updated) {
            $this->CI->db->trans_rollback();
            $dbError = $this->CI->db->error();
            return array(
                'ok' => false,
                'errors' => array($this->t(
                    'config_error_project_save',
                    'Unable to save the project settings.' . (!empty($dbError['message']) ? ' ' . $dbError['message'] : ''),
                    $langCode
                )),
            );
        }

        $state['base_url'] = $baseUrl;
        $state['app']['default_lang'] = $langCode;
        $state['app']['download_url'] = $downloadUrl;
        $state['app']['analytics_id'] = $analyticsId;

        if (!$this->saveInstalledState($state, $stateError, $langCode)) {
            $this->CI->db->trans_rollback();
            return array(
                'ok' => false,
                'errors' => array($stateError),
            );
        }

        $this->CI->db->trans_commit();
        $this->CI->session->set_userdata(array('lang' => $langCode));

        return array(
            'ok' => true,
            'state' => $state,
        );
    }

    public function updateAdminSettings(array $input)
    {
        $state = $this->getEditableState();
        $langCode = $this->resolveLanguageCode($state['app']['default_lang']);
        $username = trim((string) ($input['admin_user'] ?? ''));
        $email = trim((string) ($input['admin_email'] ?? ''));
        $password = trim((string) ($input['admin_pass'] ?? ''));
        $passwordConfirm = trim((string) ($input['admin_pass_confirm'] ?? ''));
        $errors = array();

        if ($username === '') {
            $errors[] = $this->t('installer_error_admin_user', 'Admin username is required.', $langCode);
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = $this->t('installer_error_admin_email', 'Admin email is not valid.', $langCode);
        }

        if ($password !== '' && strlen($password) < 6) {
            $errors[] = $this->t('installer_error_admin_password_length', 'Admin password must contain at least 6 characters.', $langCode);
        }

        if ($password !== '' && $password !== $passwordConfirm) {
            $errors[] = $this->t('installer_error_admin_password_match', 'Admin passwords do not match.', $langCode);
        }

        if (!empty($errors)) {
            return array(
                'ok' => false,
                'errors' => $errors,
            );
        }

        $adminData = array(
            'user' => $username,
            'email' => $email,
            'rol' => 1,
        );

        if ($password !== '') {
            $adminData['pass'] = cms_hash_password($password);
        }

        $this->CI->db->trans_begin();

        $adminQuery = $this->CI->db
            ->select('id')
            ->from('users')
            ->where('rol', 1)
            ->order_by('id', 'ASC')
            ->limit(1)
            ->get();

        if ($adminQuery->num_rows() > 0) {
            $adminId = (int) $adminQuery->row()->id;
            $updated = $this->CI->db->where('id', $adminId)->update('users', $adminData);
        } else {
            $adminData['balance'] = 0.00;
            $updated = $this->CI->db->insert('users', $adminData);
        }

        if (!$updated) {
            $this->CI->db->trans_rollback();
            $dbError = $this->CI->db->error();
            return array(
                'ok' => false,
                'errors' => array($this->t(
                    'config_error_admin_save',
                    'Unable to save the admin account.' . (!empty($dbError['message']) ? ' ' . $dbError['message'] : ''),
                    $langCode
                )),
            );
        }

        $state['admin']['username'] = $username;
        $state['admin']['email'] = $email;

        if (!$this->saveInstalledState($state, $stateError, $langCode)) {
            $this->CI->db->trans_rollback();
            return array(
                'ok' => false,
                'errors' => array($stateError),
            );
        }

        $this->CI->db->trans_commit();

        if ((int) $this->CI->session->userdata('rol') === 1) {
            $this->CI->session->set_userdata(array('user' => $username));
        }

        return array(
            'ok' => true,
            'state' => $state,
        );
    }

    public function updateDatabaseSettings(array $input)
    {
        $state = $this->getEditableState();
        $langCode = $this->resolveLanguageCode($state['app']['default_lang']);
        $passwordInput = array_key_exists('db_pass', $input) ? trim((string) $input['db_pass']) : null;
        $database = array(
            'hostname' => trim((string) ($input['db_host'] ?? $state['database']['hostname'])),
            'port' => trim((string) ($input['db_port'] ?? $state['database']['port'])),
            'database' => trim((string) ($input['db_name'] ?? $state['database']['database'])),
            'username' => trim((string) ($input['db_user'] ?? $state['database']['username'])),
            'password' => $passwordInput !== null && $passwordInput !== '' ? $passwordInput : (string) $state['database']['password'],
        );
        $errors = array();

        if ($database['hostname'] === '' || $database['database'] === '' || $database['username'] === '') {
            $errors[] = $this->t('installer_error_db_required', 'Database host, name and user are required.', $langCode);
        }

        if ($database['port'] === '') {
            $database['port'] = '3306';
        }

        if (!ctype_digit((string) $database['port'])) {
            $errors[] = $this->t('installer_error_db_port', 'Database port must be numeric.', $langCode);
        }

        if (empty($errors)) {
            $databaseCheck = $this->validateExistingDatabase($database, $langCode);
            if (!$databaseCheck['ok']) {
                $errors[] = $databaseCheck['error'];
            }
        }

        if (!empty($errors)) {
            return array(
                'ok' => false,
                'errors' => $errors,
            );
        }

        $state['database'] = $database;

        if (!$this->saveInstalledState($state, $stateError, $langCode)) {
            return array(
                'ok' => false,
                'errors' => array($stateError),
            );
        }

        return array(
            'ok' => true,
            'state' => $state,
        );
    }

    public function updateIntegrationSettings(array $input)
    {
        $state = $this->getEditableState();
        $langCode = $this->resolveLanguageCode($state['app']['default_lang']);
        $currentIntegrations = $state['integrations'];
        $apiPassInput = array_key_exists('api_pass', $input) ? trim((string) $input['api_pass']) : null;
        $qvaPaySecretInput = array_key_exists('qvapay_secret', $input) ? trim((string) $input['qvapay_secret']) : null;
        $supportPasswordInput = array_key_exists('support_email_password', $input) ? trim((string) $input['support_email_password']) : null;
        $integrations = array(
            'api_ip' => trim((string) ($input['api_ip'] ?? $currentIntegrations['api_ip'])),
            'api_user' => trim((string) ($input['api_user'] ?? $currentIntegrations['api_user'])),
            'api_pass' => $apiPassInput !== null && $apiPassInput !== '' ? $this->hashApiPassword($apiPassInput) : (string) $currentIntegrations['api_pass'],
            'api_cache_ttl' => trim((string) ($input['api_cache_ttl'] ?? $currentIntegrations['api_cache_ttl'])),
            'api_stale_cache_ttl' => trim((string) ($input['api_stale_cache_ttl'] ?? $currentIntegrations['api_stale_cache_ttl'])),
            'qvapay_id' => trim((string) ($input['qvapay_id'] ?? $currentIntegrations['qvapay_id'])),
            'qvapay_secret' => $qvaPaySecretInput !== null && $qvaPaySecretInput !== '' ? $qvaPaySecretInput : (string) $currentIntegrations['qvapay_secret'],
            'support_email' => trim((string) ($input['support_email'] ?? $currentIntegrations['support_email'])),
            'support_email_password' => $supportPasswordInput !== null && $supportPasswordInput !== '' ? $supportPasswordInput : (string) $currentIntegrations['support_email_password'],
        );
        $errors = array();

        foreach (array('api_cache_ttl', 'api_stale_cache_ttl') as $numericField) {
            if (!ctype_digit((string) $integrations[$numericField])) {
                $errors[] = $this->t('config_error_numeric_cache', 'Cache values must be numeric.', $langCode);
                break;
            }
        }

        $integrations['api_cache_ttl'] = max(5, (int) $integrations['api_cache_ttl']);
        $integrations['api_stale_cache_ttl'] = max($integrations['api_cache_ttl'], (int) $integrations['api_stale_cache_ttl']);

        if ($integrations['support_email'] !== '' && !filter_var($integrations['support_email'], FILTER_VALIDATE_EMAIL)) {
            $errors[] = $this->t('form_valid_email_required', 'Please enter a valid email address.', $langCode);
        }

        if (!empty($errors)) {
            return array(
                'ok' => false,
                'errors' => $errors,
            );
        }

        $state['integrations'] = array_merge($currentIntegrations, $integrations);

        if (!$this->saveInstalledState($state, $stateError, $langCode)) {
            return array(
                'ok' => false,
                'errors' => array($stateError),
            );
        }

        $this->clearApiCache();

        return array(
            'ok' => true,
            'state' => $state,
        );
    }

    public function updateSecuritySettings(array $input)
    {
        $state = $this->getEditableState();
        $langCode = $this->resolveLanguageCode($state['app']['default_lang']);
        $sessionPath = trim((string) ($input['session_path'] ?? $state['security']['session_path']));
        $encryptionKey = trim((string) ($input['encryption_key'] ?? ''));
        $csrfProtection = !empty($input['csrf_protection']);

        if ($sessionPath === '') {
            $sessionPath = $this->sessionPath;
        }

        if (!$this->ensureSessionDirectoryAtPath($sessionPath)) {
            return array(
                'ok' => false,
                'errors' => array($this->t('config_error_session_path', 'Session path is not writable.', $langCode)),
            );
        }

        if ($encryptionKey === '') {
            $encryptionKey = (string) $state['security']['encryption_key'];
        }

        if (strlen($encryptionKey) < 32) {
            return array(
                'ok' => false,
                'errors' => array($this->t('config_error_encryption_key', 'Encryption key must contain at least 32 characters.', $langCode)),
            );
        }

        $state['security']['session_path'] = $sessionPath;
        $state['security']['csrf_protection'] = $csrfProtection;
        $state['security']['encryption_key'] = $encryptionKey;

        if (!$this->saveInstalledState($state, $stateError, $langCode)) {
            return array(
                'ok' => false,
                'errors' => array($stateError),
            );
        }

        return array(
            'ok' => true,
            'state' => $state,
        );
    }

    public function getRequirementChecks()
    {
        $langCode = $this->getLanguageCode();
        $configDirectory = APPPATH . 'config';
        $cacheDirectory = APPPATH . 'cache';
        $vendorAutoload = FCPATH . 'vendor/autoload.php';
        $sqlDump = FCPATH . 'intersec.sql';

        return array(
            array(
                'label' => $this->t('installer_requirement_php_label', 'PHP 8.1+', $langCode),
                'status' => version_compare(PHP_VERSION, '8.1.0', '>='),
                'detail' => sprintf($this->t('installer_requirement_php_detail', 'Current: %s', $langCode), PHP_VERSION),
            ),
            array(
                'label' => $this->t('installer_requirement_mysqli_label', 'MySQLi extension', $langCode),
                'status' => extension_loaded('mysqli'),
                'detail' => extension_loaded('mysqli')
                    ? $this->t('installer_requirement_enabled', 'Enabled', $langCode)
                    : $this->t('installer_requirement_mysqli_missing', 'Required for database install', $langCode),
            ),
            array(
                'label' => $this->t('installer_requirement_json_label', 'JSON extension', $langCode),
                'status' => extension_loaded('json'),
                'detail' => extension_loaded('json')
                    ? $this->t('installer_requirement_enabled', 'Enabled', $langCode)
                    : $this->t('installer_requirement_json_missing', 'Required for installer state', $langCode),
            ),
            array(
                'label' => $this->t('installer_requirement_config_label', 'Config directory writable', $langCode),
                'status' => $this->canWriteToPath($configDirectory),
                'detail' => $configDirectory,
            ),
            array(
                'label' => $this->t('installer_requirement_cache_label', 'Cache directory writable', $langCode),
                'status' => $this->canWriteToPath($cacheDirectory),
                'detail' => $cacheDirectory,
            ),
            array(
                'label' => $this->t('installer_requirement_composer_label', 'Composer dependencies', $langCode),
                'status' => is_file($vendorAutoload),
                'detail' => is_file($vendorAutoload)
                    ? $this->t('installer_requirement_composer_ok', 'vendor/autoload.php found', $langCode)
                    : $this->t('installer_requirement_composer_missing', 'Run composer install first', $langCode),
            ),
            array(
                'label' => $this->t('installer_requirement_schema_label', 'Database schema dump', $langCode),
                'status' => is_file($sqlDump),
                'detail' => is_file($sqlDump)
                    ? $this->t('installer_requirement_schema_ok', 'intersec.sql found', $langCode)
                    : $this->t('installer_requirement_schema_missing', 'intersec.sql is missing', $langCode),
            ),
        );
    }

    public function install(array $input)
    {
        $data = $this->normalizeInput($input);
        $errors = $this->validate($data);

        if (!empty($errors)) {
            return array(
                'ok' => false,
                'errors' => $errors,
            );
        }

        $requirements = $this->getRequirementChecks();
        foreach ($requirements as $requirement) {
            if (!$requirement['status']) {
                return array(
                    'ok' => false,
                    'errors' => array($this->t('installer_error_requirements', 'Server requirements are not ready for installation.', $data['default_lang'])),
                );
            }
        }

        $this->ensureWritableStructure();

        $serverConnection = $this->openServerConnection($data);
        if (!$serverConnection['ok']) {
            return array(
                'ok' => false,
                'errors' => array($serverConnection['error']),
            );
        }

        $mysqli = $serverConnection['mysqli'];

        if (!$this->prepareDatabase($mysqli, $data, $databaseError)) {
            $mysqli->close();
            return array(
                'ok' => false,
                'errors' => array($databaseError),
            );
        }

        if ($this->databaseNeedsSchema($mysqli)) {
            if (!$this->importSchema($mysqli, FCPATH . 'intersec.sql', $schemaError)) {
                $mysqli->close();
                return array(
                    'ok' => false,
                    'errors' => array($schemaError),
                );
            }
        }

        $mysqli->query('SET AUTOCOMMIT = 1');
        $mysqli->autocommit(true);

        if (!$this->seedConfigRow($mysqli, $data, $seedError)) {
            $mysqli->close();
            return array(
                'ok' => false,
                'errors' => array($seedError),
            );
        }

        if (!$this->upsertAdminUser($mysqli, $data, $adminError)) {
            $mysqli->close();
            return array(
                'ok' => false,
                'errors' => array($adminError),
            );
        }

        if (!$this->writeStateFile($data, $stateError)) {
            $mysqli->close();
            return array(
                'ok' => false,
                'errors' => array($stateError),
            );
        }

        $mysqli->commit();

        $mysqli->close();

        return array(
            'ok' => true,
            'summary' => array(
                'base_url' => $data['base_url'],
                'admin_user' => $data['admin_user'],
                'admin_email' => $data['admin_email'],
                'database' => $data['db_name'],
                'language' => $data['default_lang'],
            ),
        );
    }

    protected function normalizeInput(array $input)
    {
        $defaults = $this->getDefaults();
        $data = array_merge($defaults, $input);

        foreach ($data as $key => $value) {
            if (!is_string($value)) {
                continue;
            }

            $data[$key] = trim($value);
        }

        $data['base_url'] = rtrim($data['base_url'], '/') . '/';
        $data['db_port'] = $data['db_port'] !== '' ? $data['db_port'] : '3306';

        return $data;
    }

    protected function validate(array $data)
    {
        $errors = array();

        if (!filter_var($data['base_url'], FILTER_VALIDATE_URL)) {
            $errors[] = $this->t('installer_error_base_url', 'Base URL is not valid.', $data['default_lang']);
        }

        if ($data['db_host'] === '' || $data['db_name'] === '' || $data['db_user'] === '') {
            $errors[] = $this->t('installer_error_db_required', 'Database host, name and user are required.', $data['default_lang']);
        }

        if (!ctype_digit((string) $data['db_port'])) {
            $errors[] = $this->t('installer_error_db_port', 'Database port must be numeric.', $data['default_lang']);
        }

        if ($data['admin_user'] === '') {
            $errors[] = $this->t('installer_error_admin_user', 'Admin username is required.', $data['default_lang']);
        }

        if (!filter_var($data['admin_email'], FILTER_VALIDATE_EMAIL)) {
            $errors[] = $this->t('installer_error_admin_email', 'Admin email is not valid.', $data['default_lang']);
        }

        if (strlen($data['admin_pass']) < 6) {
            $errors[] = $this->t('installer_error_admin_password_length', 'Admin password must contain at least 6 characters.', $data['default_lang']);
        }

        if ($data['admin_pass'] !== $data['admin_pass_confirm']) {
            $errors[] = $this->t('installer_error_admin_password_match', 'Admin passwords do not match.', $data['default_lang']);
        }

        if (!preg_match('/^[a-z]{2}$/', $data['default_lang'])) {
            $errors[] = $this->t('installer_error_default_language', 'Default language is not valid.', $data['default_lang']);
        }

        return $errors;
    }

    protected function ensureWritableStructure()
    {
        $this->ensureSessionDirectoryAtPath($this->sessionPath);
    }

    protected function openServerConnection(array $data)
    {
        mysqli_report(MYSQLI_REPORT_OFF);
        $mysqli = @new mysqli($data['db_host'], $data['db_user'], $data['db_pass'], '', (int) $data['db_port']);

        if ($mysqli->connect_errno) {
            return array(
                'ok' => false,
                'error' => sprintf(
                    $this->t('installer_error_db_connection', 'Database connection failed: %s', $data['default_lang']),
                    $mysqli->connect_error
                ),
            );
        }

        $mysqli->set_charset('utf8mb4');

        return array(
            'ok' => true,
            'mysqli' => $mysqli,
        );
    }

    protected function prepareDatabase(mysqli $mysqli, array $data, &$error)
    {
        $dbName = str_replace('`', '``', $data['db_name']);
        $createSql = "CREATE DATABASE IF NOT EXISTS `{$dbName}` CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci";

        if (!$mysqli->query($createSql) && !$mysqli->select_db($data['db_name'])) {
            $error = $this->t('installer_error_db_create_or_select', 'Unable to create or select the target database.', $data['default_lang']);
            return false;
        }

        if (!$mysqli->select_db($data['db_name'])) {
            $error = $this->t('installer_error_db_select', 'Unable to select the target database.', $data['default_lang']);
            return false;
        }

        return true;
    }

    protected function databaseNeedsSchema(mysqli $mysqli)
    {
        $requiredTables = array('config', 'users', 'visits');

        foreach ($requiredTables as $table) {
            $escapedTable = $mysqli->real_escape_string($table);
            $query = $mysqli->query("SHOW TABLES LIKE '{$escapedTable}'");

            if (!$query || $query->num_rows === 0) {
                return true;
            }
        }

        return false;
    }

    protected function importSchema(mysqli $mysqli, $path, &$error)
    {
        $sql = @file_get_contents($path);

        if ($sql === false) {
            $error = $this->t('installer_error_schema_read', 'The database schema file could not be read.', $this->getLanguageCode());
            return false;
        }

        $sql = preg_replace('/\/\*.*?\*\//s', '', $sql);
        $sql = preg_replace('/^\s*--.*$/m', '', $sql);
        $statements = preg_split('/;[\r\n]+/', (string) $sql);

        foreach ($statements as $statement) {
            $statement = trim($statement);

            if ($statement === '') {
                continue;
            }

            if (!$mysqli->query($statement)) {
                $error = sprintf(
                    $this->t('installer_error_schema_import', 'Schema import failed: %s', $this->getLanguageCode()),
                    $mysqli->error
                );
                return false;
            }
        }

        return true;
    }

    protected function seedConfigRow(mysqli $mysqli, array $data, &$error)
    {
        $exists = $mysqli->query("SELECT id FROM `config` WHERE `id` = 1 LIMIT 1");
        $lang = $mysqli->real_escape_string($data['default_lang']);
        $analytics = $mysqli->real_escape_string($data['analytics_id']);
        $download = $mysqli->real_escape_string($data['download_url']);

        if ($exists && $exists->num_rows > 0) {
            $sql = "UPDATE `config` SET `lang` = '{$lang}', `analytics` = '{$analytics}', `download` = '{$download}' WHERE `id` = 1";
        } else {
            $sql = "INSERT INTO `config` (`id`, `color1`, `color2`, `mant`, `analytics`, `download`, `legal`, `terms`, `privacity`, `menu1icon`, `menu1header`, `menu1text`, `menuheader`, `menu2icon`, `menu2header`, `menu2text`, `menu3icon`, `menu3header`, `menu3text`, `lang`) VALUES (1, '#2d5474', '#107e72', 0, '{$analytics}', '{$download}', '', '', '', '', '', '', '', '', '', '', '', '', '', '{$lang}')";
        }

        if (!$mysqli->query($sql)) {
            $error = sprintf(
                $this->t('installer_error_config_save', 'Unable to save project configuration: %s', $data['default_lang']),
                $mysqli->error
            );
            return false;
        }

        return true;
    }

    protected function upsertAdminUser(mysqli $mysqli, array $data, &$error)
    {
        $adminQuery = $mysqli->query("SELECT `id` FROM `users` WHERE `rol` = 1 ORDER BY `id` ASC LIMIT 1");
        $username = $mysqli->real_escape_string($data['admin_user']);
        $email = $mysqli->real_escape_string($data['admin_email']);
        $password = $mysqli->real_escape_string(cms_hash_password($data['admin_pass']));

        if ($adminQuery && $adminQuery->num_rows > 0) {
            $row = $adminQuery->fetch_assoc();
            $adminId = (int) $row['id'];
            $sql = "UPDATE `users` SET `user` = '{$username}', `pass` = '{$password}', `email` = '{$email}', `rol` = 1 WHERE `id` = {$adminId}";
        } else {
            $sql = "INSERT INTO `users` (`user`, `pass`, `email`, `rol`, `balance`) VALUES ('{$username}', '{$password}', '{$email}', 1, 0.00)";
        }

        if (!$mysqli->query($sql)) {
            $error = sprintf(
                $this->t('installer_error_admin_create', 'Unable to create the admin account: %s', $data['default_lang']),
                $mysqli->error
            );
            return false;
        }

        return true;
    }

    protected function writeStateFile(array $data, &$error)
    {
        $state = $this->normalizeInstalledState(array(
            'installed' => true,
            'installed_at' => date('c'),
            'base_url' => $data['base_url'],
            'app' => array(
                'default_lang' => $data['default_lang'],
                'download_url' => $data['download_url'],
                'analytics_id' => $data['analytics_id'],
            ),
            'admin' => array(
                'username' => $data['admin_user'],
                'email' => $data['admin_email'],
            ),
            'database' => array(
                'hostname' => $data['db_host'],
                'port' => $data['db_port'],
                'database' => $data['db_name'],
                'username' => $data['db_user'],
                'password' => $data['db_pass'],
            ),
            'security' => array(
                'encryption_key' => bin2hex(random_bytes(32)),
                'session_path' => $this->sessionPath,
                'csrf_protection' => true,
            ),
            'integrations' => array(
                'api_ip' => $data['api_ip'],
                'api_user' => $data['api_user'],
                'api_pass' => $data['api_pass'],
                'api_cache_ttl' => 15,
                'api_stale_cache_ttl' => 90,
                'qvapay_id' => $data['qvapay_id'],
                'qvapay_secret' => $data['qvapay_secret'],
                'support_email' => $data['support_email'],
                'support_email_password' => $data['support_email_password'],
            ),
        ));

        return $this->saveInstalledState($state, $error, $data['default_lang']);
    }

    protected function getLanguageCode($fallback = 'es')
    {
        $langCode = (string) $this->CI->session->userdata('installer_lang');
        if ($langCode === '') {
            $langCode = (string) $fallback;
        }

        $this->CI->load->model('Langs');
        return $this->CI->Langs->isSupportedLanguage($langCode) ? $langCode : 'es';
    }

    protected function t($key, $default, $langCode = null)
    {
        $this->CI->load->model('Langs');
        return $this->CI->Langs->getText($key, $this->getLanguageCode($langCode ?: 'es'), $default);
    }

    protected function detectBaseUrl()
    {
        $scheme = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https' : 'http';
        $host = $_SERVER['HTTP_HOST'] ?? '127.0.0.1';
        $scriptPath = isset($_SERVER['SCRIPT_NAME']) ? str_replace('\\', '/', dirname($_SERVER['SCRIPT_NAME'])) : '';
        $scriptPath = trim($scriptPath, '/');

        return $scheme . '://' . $host . ($scriptPath !== '' ? '/' . $scriptPath : '') . '/';
    }

    protected function canWriteToPath($path)
    {
        if (!is_dir($path)) {
            return false;
        }

        $testFile = rtrim($path, '/\\') . DIRECTORY_SEPARATOR . '.installer-write-test-' . uniqid('', true);
        $written = @file_put_contents($testFile, 'ok');

        if ($written === false) {
            return false;
        }

        @unlink($testFile);

        return true;
    }

    protected function normalizeInstalledState(array $state)
    {
        $installedAt = trim((string) ($state['installed_at'] ?? ''));
        $encryptionKey = trim((string) (($state['security']['encryption_key'] ?? '')));
        $apiCacheTtl = $state['integrations']['api_cache_ttl'] ?? 15;
        $apiStaleCacheTtl = $state['integrations']['api_stale_cache_ttl'] ?? 90;

        return array(
            'installed' => array_key_exists('installed', $state) ? (bool) $state['installed'] : true,
            'installed_at' => $installedAt !== '' ? $installedAt : date('c'),
            'base_url' => rtrim((string) ($state['base_url'] ?? $this->detectBaseUrl()), '/') . '/',
            'app' => array(
                'default_lang' => $this->resolveLanguageCode($state['app']['default_lang'] ?? 'es'),
                'download_url' => trim((string) ($state['app']['download_url'] ?? '')),
                'analytics_id' => trim((string) ($state['app']['analytics_id'] ?? '')),
            ),
            'admin' => array(
                'username' => trim((string) ($state['admin']['username'] ?? 'Admin')),
                'email' => trim((string) ($state['admin']['email'] ?? 'admin@example.com')),
            ),
            'database' => array(
                'hostname' => trim((string) ($state['database']['hostname'] ?? 'localhost')),
                'port' => trim((string) ($state['database']['port'] ?? '3306')),
                'database' => trim((string) ($state['database']['database'] ?? 'intersec')),
                'username' => trim((string) ($state['database']['username'] ?? 'root')),
                'password' => (string) ($state['database']['password'] ?? ''),
            ),
            'security' => array(
                'encryption_key' => $encryptionKey !== '' ? $encryptionKey : bin2hex(random_bytes(32)),
                'session_path' => trim((string) ($state['security']['session_path'] ?? $this->sessionPath)),
                'csrf_protection' => array_key_exists('csrf_protection', $state['security'] ?? array())
                    ? (bool) $state['security']['csrf_protection']
                    : true,
            ),
            'integrations' => array(
                'api_ip' => trim((string) ($state['integrations']['api_ip'] ?? '')),
                'api_user' => trim((string) ($state['integrations']['api_user'] ?? '')),
                'api_pass' => $this->hashApiPassword($state['integrations']['api_pass'] ?? ''),
                'api_cache_ttl' => max(5, is_numeric($apiCacheTtl) ? (int) $apiCacheTtl : 15),
                'api_stale_cache_ttl' => max(5, is_numeric($apiStaleCacheTtl) ? (int) $apiStaleCacheTtl : 90),
                'qvapay_id' => trim((string) ($state['integrations']['qvapay_id'] ?? '')),
                'qvapay_secret' => (string) ($state['integrations']['qvapay_secret'] ?? ''),
                'support_email' => trim((string) ($state['integrations']['support_email'] ?? '')),
                'support_email_password' => (string) ($state['integrations']['support_email_password'] ?? ''),
            ),
        );
    }

    protected function saveInstalledState(array $state, &$error, $langCode = 'es')
    {
        $normalizedState = $this->normalizeInstalledState($state);
        $normalizedState['integrations']['api_stale_cache_ttl'] = max(
            $normalizedState['integrations']['api_cache_ttl'],
            $normalizedState['integrations']['api_stale_cache_ttl']
        );

        if (!$this->ensureSessionDirectoryAtPath($normalizedState['security']['session_path'])) {
            $error = $this->t('config_error_session_path', 'Session path is not writable.', $langCode);
            return false;
        }

        if (!cms_installer_save_state($normalizedState)) {
            $error = $this->t(
                'installer_error_state_write',
                'Unable to write installer state file. Check application/config permissions.',
                $langCode
            );
            return false;
        }

        return true;
    }

    protected function resolveLanguageCode($langCode, $fallback = 'es')
    {
        $candidate = trim((string) $langCode);
        if ($candidate === '') {
            $candidate = $fallback;
        }

        $this->CI->load->model('Langs');
        return $this->CI->Langs->isSupportedLanguage($candidate) ? $candidate : 'es';
    }

    protected function validateExistingDatabase(array $database, $langCode)
    {
        $payload = array(
            'db_host' => $database['hostname'],
            'db_port' => $database['port'],
            'db_name' => $database['database'],
            'db_user' => $database['username'],
            'db_pass' => $database['password'],
            'default_lang' => $langCode,
        );

        $connection = $this->openServerConnection($payload);
        if (!$connection['ok']) {
            return array(
                'ok' => false,
                'error' => $connection['error'],
            );
        }

        $mysqli = $connection['mysqli'];

        if (!$mysqli->select_db($database['database'])) {
            $error = $this->t('installer_error_db_select', 'Unable to select the target database.', $langCode);
            $mysqli->close();
            return array(
                'ok' => false,
                'error' => $error,
            );
        }

        if ($this->databaseNeedsSchema($mysqli)) {
            $mysqli->close();
            return array(
                'ok' => false,
                'error' => $this->t('config_error_db_schema', 'The selected database does not contain the CMS tables yet.', $langCode),
            );
        }

        $mysqli->close();
        return array('ok' => true);
    }

    protected function clearApiCache()
    {
        $files = glob(APPPATH . 'cache/api/*.json');
        if (!is_array($files)) {
            return;
        }

        foreach ($files as $file) {
            if (is_file($file)) {
                @unlink($file);
            }
        }
    }

    protected function ensureSessionDirectoryAtPath($path)
    {
        $path = trim((string) $path);
        if ($path === '') {
            return false;
        }

        if (!is_dir($path) && !@mkdir($path, 0775, true)) {
            return false;
        }

        $sessionIndex = rtrim($path, '/\\') . DIRECTORY_SEPARATOR . 'index.html';
        if (!is_file($sessionIndex)) {
            @file_put_contents($sessionIndex, '');
        }

        return is_writable($path);
    }

    protected function hashApiPassword($password)
    {
        $password = trim((string) $password);
        if ($password === '') {
            return '';
        }

        if (preg_match('/\A[a-f0-9]{64}\z/i', $password)) {
            return strtoupper($password);
        }

        return strtoupper(hash('sha256', $password));
    }
}
