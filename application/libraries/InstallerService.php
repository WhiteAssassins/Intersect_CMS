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

    public function getRequirementChecks()
    {
        $configDirectory = APPPATH . 'config';
        $cacheDirectory = APPPATH . 'cache';
        $vendorAutoload = FCPATH . 'vendor/autoload.php';
        $sqlDump = FCPATH . 'intersec.sql';

        return array(
            array(
                'label' => 'PHP 8.1+',
                'status' => version_compare(PHP_VERSION, '8.1.0', '>='),
                'detail' => 'Current: ' . PHP_VERSION,
            ),
            array(
                'label' => 'MySQLi extension',
                'status' => extension_loaded('mysqli'),
                'detail' => extension_loaded('mysqli') ? 'Enabled' : 'Required for database install',
            ),
            array(
                'label' => 'JSON extension',
                'status' => extension_loaded('json'),
                'detail' => extension_loaded('json') ? 'Enabled' : 'Required for installer state',
            ),
            array(
                'label' => 'Config directory writable',
                'status' => $this->canWriteToPath($configDirectory),
                'detail' => $configDirectory,
            ),
            array(
                'label' => 'Cache directory writable',
                'status' => $this->canWriteToPath($cacheDirectory),
                'detail' => $cacheDirectory,
            ),
            array(
                'label' => 'Composer dependencies',
                'status' => is_file($vendorAutoload),
                'detail' => is_file($vendorAutoload) ? 'vendor/autoload.php found' : 'Run composer install first',
            ),
            array(
                'label' => 'Database schema dump',
                'status' => is_file($sqlDump),
                'detail' => is_file($sqlDump) ? 'intersec.sql found' : 'intersec.sql is missing',
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
                    'errors' => array('Server requirements are not ready for installation.'),
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
            $errors[] = 'Base URL is not valid.';
        }

        if ($data['db_host'] === '' || $data['db_name'] === '' || $data['db_user'] === '') {
            $errors[] = 'Database host, name and user are required.';
        }

        if (!ctype_digit((string) $data['db_port'])) {
            $errors[] = 'Database port must be numeric.';
        }

        if ($data['admin_user'] === '') {
            $errors[] = 'Admin username is required.';
        }

        if (!filter_var($data['admin_email'], FILTER_VALIDATE_EMAIL)) {
            $errors[] = 'Admin email is not valid.';
        }

        if (strlen($data['admin_pass']) < 6) {
            $errors[] = 'Admin password must contain at least 6 characters.';
        }

        if ($data['admin_pass'] !== $data['admin_pass_confirm']) {
            $errors[] = 'Admin passwords do not match.';
        }

        if (!preg_match('/^[a-z]{2}$/', $data['default_lang'])) {
            $errors[] = 'Default language is not valid.';
        }

        return $errors;
    }

    protected function ensureWritableStructure()
    {
        if (!is_dir($this->sessionPath)) {
            @mkdir($this->sessionPath, 0775, true);
        }

        $sessionIndex = $this->sessionPath . DIRECTORY_SEPARATOR . 'index.html';
        if (!is_file($sessionIndex)) {
            @file_put_contents($sessionIndex, '');
        }
    }

    protected function openServerConnection(array $data)
    {
        mysqli_report(MYSQLI_REPORT_OFF);
        $mysqli = @new mysqli($data['db_host'], $data['db_user'], $data['db_pass'], '', (int) $data['db_port']);

        if ($mysqli->connect_errno) {
            return array(
                'ok' => false,
                'error' => 'Database connection failed: ' . $mysqli->connect_error,
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
            $error = 'Unable to create or select the target database.';
            return false;
        }

        if (!$mysqli->select_db($data['db_name'])) {
            $error = 'Unable to select the target database.';
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
            $error = 'The database schema file could not be read.';
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
                $error = 'Schema import failed: ' . $mysqli->error;
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
            $error = 'Unable to save project configuration: ' . $mysqli->error;
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
            $error = 'Unable to create the admin account: ' . $mysqli->error;
            return false;
        }

        return true;
    }

    protected function writeStateFile(array $data, &$error)
    {
        $state = array(
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
                'qvapay_id' => $data['qvapay_id'],
                'qvapay_secret' => $data['qvapay_secret'],
                'support_email' => $data['support_email'],
                'support_email_password' => $data['support_email_password'],
            ),
        );

        $encoded = json_encode($state, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);

        if ($encoded === false || @file_put_contents($this->statePath, $encoded) === false) {
            $error = 'Unable to write installer state file. Check application/config permissions.';
            return false;
        }

        return true;
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
}
