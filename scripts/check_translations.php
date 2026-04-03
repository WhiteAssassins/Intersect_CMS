<?php
declare(strict_types=1);

$root = dirname(__DIR__);
$languageDir = $root . DIRECTORY_SEPARATOR . 'application' . DIRECTORY_SEPARATOR . 'language' . DIRECTORY_SEPARATOR . 'cms';
$supported = array('es', 'en', 'tr', 'jp', 'de', 'ru', 'zh', 'fr', 'pt', 'hi', 'ar');

function fail(string $message): void
{
    fwrite(STDERR, $message . PHP_EOL);
}

function loadLanguageFile(string $path): array
{
    if (!is_file($path)) {
        throw new RuntimeException('Missing translation file: ' . $path);
    }

    $data = require $path;
    if (!is_array($data)) {
        throw new RuntimeException('Invalid translation payload: ' . $path);
    }

    return array(
        'ui' => isset($data['ui']) && is_array($data['ui']) ? $data['ui'] : array(),
        'rebrand' => isset($data['rebrand']) && is_array($data['rebrand']) ? $data['rebrand'] : array(),
    );
}

function sortKeys(array $keys): array
{
    $keys = array_values(array_unique($keys));
    sort($keys);
    return $keys;
}

function scanPlaceholderKeys(string $applicationPath): array
{
    $found = array();
    $iterator = new RecursiveIteratorIterator(
        new RecursiveDirectoryIterator($applicationPath, FilesystemIterator::SKIP_DOTS)
    );

    foreach ($iterator as $file) {
        if (!$file->isFile()) {
            continue;
        }

        if (!preg_match('/\.(php|js|html)$/i', $file->getFilename())) {
            continue;
        }

        $contents = file_get_contents($file->getPathname());
        if ($contents === false) {
            continue;
        }

        if (!preg_match_all('/\{([a-zA-Z0-9_]+)\}/', $contents, $matches)) {
            continue;
        }

        foreach ($matches[1] as $key) {
            if (ctype_digit($key)) {
                continue;
            }

            $found[$key] = true;
        }
    }

    return sortKeys(array_keys($found));
}

$base = loadLanguageFile($languageDir . DIRECTORY_SEPARATOR . 'base.php');
$baseUiKeys = sortKeys(array_keys($base['ui']));
$baseRebrandKeys = sortKeys(array_keys($base['rebrand']));

$dynamicKeys = sortKeys(array(
    'site_lang',
    'site_title',
    'analytics_id',
    'theme_color1',
    'theme_color2',
    'download_url',
    'current_user',
    'is_logged_in',
    'is_admin',
    'current_year',
    'tinymce_language',
    'visits_january',
    'visits_february',
    'visits_march',
    'visits_april',
    'visits_may',
    'visits_june',
    'visits_july',
    'visits_august',
    'visits_september',
    'visits_october',
    'visits_november',
    'visits_december',
));

$issues = array();

foreach ($supported as $lang) {
    try {
        $data = loadLanguageFile($languageDir . DIRECTORY_SEPARATOR . $lang . '.php');
    } catch (RuntimeException $exception) {
        $issues[] = $exception->getMessage();
        continue;
    }

    $uiKeys = sortKeys(array_keys($data['ui']));
    $rebrandKeys = sortKeys(array_keys($data['rebrand']));

    $missingUi = array_values(array_diff($baseUiKeys, $uiKeys));
    $extraUi = array_values(array_diff($uiKeys, $baseUiKeys));
    $missingRebrand = array_values(array_diff($baseRebrandKeys, $rebrandKeys));
    $extraRebrand = array_values(array_diff($rebrandKeys, $baseRebrandKeys));

    if ($missingUi !== array()) {
        $issues[] = $lang . ' missing ui keys: ' . implode(', ', $missingUi);
    }

    if ($extraUi !== array()) {
        $issues[] = $lang . ' extra ui keys: ' . implode(', ', $extraUi);
    }

    if ($missingRebrand !== array()) {
        $issues[] = $lang . ' missing rebrand keys: ' . implode(', ', $missingRebrand);
    }

    if ($extraRebrand !== array()) {
        $issues[] = $lang . ' extra rebrand keys: ' . implode(', ', $extraRebrand);
    }
}

$placeholderKeys = scanPlaceholderKeys($root . DIRECTORY_SEPARATOR . 'application');
$allowedKeys = array_fill_keys(array_merge($baseUiKeys, $baseRebrandKeys, $dynamicKeys), true);
$missingPlaceholders = array();

foreach ($placeholderKeys as $key) {
    if (!isset($allowedKeys[$key])) {
        $missingPlaceholders[] = $key;
    }
}

if ($missingPlaceholders !== array()) {
    $issues[] = 'Unknown placeholders in application files: ' . implode(', ', $missingPlaceholders);
}

if ($issues !== array()) {
    foreach ($issues as $issue) {
        fail($issue);
    }

    exit(1);
}

fwrite(STDOUT, 'Translation check passed for ' . count($supported) . ' languages.' . PHP_EOL);
