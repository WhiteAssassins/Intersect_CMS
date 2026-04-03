<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Langs extends CI_Model
{
    private const SUPPORTED_LANGS = array('es', 'en', 'tr', 'jp', 'de', 'ru', 'zh', 'fr', 'pt', 'hi', 'ar');
    private const LANGUAGE_LABELS = array(
        'es' => array('short' => 'ES', 'label' => 'Español', 'direction' => 'ltr'),
        'en' => array('short' => 'EN', 'label' => 'English', 'direction' => 'ltr'),
        'tr' => array('short' => 'TR', 'label' => 'Türkçe', 'direction' => 'ltr'),
        'jp' => array('short' => 'JP', 'label' => '日本語', 'direction' => 'ltr'),
        'de' => array('short' => 'DE', 'label' => 'Deutsch', 'direction' => 'ltr'),
        'ru' => array('short' => 'RU', 'label' => 'Русский', 'direction' => 'ltr'),
        'zh' => array('short' => 'ZH', 'label' => '中文', 'direction' => 'ltr'),
        'fr' => array('short' => 'FR', 'label' => 'Français', 'direction' => 'ltr'),
        'pt' => array('short' => 'PT', 'label' => 'Português', 'direction' => 'ltr'),
        'hi' => array('short' => 'HI', 'label' => 'हिन्दी', 'direction' => 'ltr'),
        'ar' => array('short' => 'AR', 'label' => 'العربية', 'direction' => 'rtl'),
    );

    private $cacheDirectory;
    private static $memoryCache = array();

    public function __construct()
    {
        parent::__construct();
        $this->cacheDirectory = APPPATH . 'cache/langs/';
        if (!is_dir($this->cacheDirectory)) {
            @mkdir($this->cacheDirectory, 0775, true);
        }
    }

    public function currentIndex()
    {
        $index = array_search($this->getCurrentLangCode(), self::SUPPORTED_LANGS, true);
        return $index === false ? 0 : (int) $index;
    }

    public function current()
    {
        $langCode = $this->getCurrentLangCode();
        $cacheKey = 'current_' . $langCode;
        $cached = $this->readCache($cacheKey, $langCode);
        if ($cached !== null) {
            return $cached;
        }

        $pack = $this->loadTranslationPack($langCode);
        $payload = array_merge(
            $pack['ui'],
            $this->getSharedData($langCode, $pack['rebrand'])
        );

        $this->writeCache($cacheKey, $langCode, $payload);
        return $payload;
    }

    public function rebrandText($lang = null)
    {
        $langCode = $this->normalizeLangCode($lang ?: $this->getCurrentLangCode());
        $cacheKey = 'rebrand_' . $langCode;
        $cached = $this->readCache($cacheKey, $langCode);
        if ($cached !== null) {
            return $cached;
        }

        $payload = $this->loadTranslationPack($langCode)['rebrand'];
        $this->writeCache($cacheKey, $langCode, $payload);
        return $payload;
    }

    public function lang()
    {
        $languages = array();
        foreach (self::SUPPORTED_LANGS as $langCode) {
            $languages[] = $this->loadTranslationPack($langCode)['ui'];
        }

        return $languages;
    }

    public function getSupportedLanguageCodes()
    {
        return self::SUPPORTED_LANGS;
    }

    public function getStandaloneData($langCode = null)
    {
        $langCode = $this->normalizeLangCode($langCode ?: $this->getCurrentLangCode());
        $pack = $this->loadTranslationPack($langCode);

        return array_merge(
            $pack['ui'],
            $pack['rebrand'],
            array(
                'site_lang' => $langCode,
            )
        );
    }

    public function getText($key, $langCode = null, $default = '')
    {
        $languageData = $this->getStandaloneData($langCode);

        if (isset($languageData[$key]) && $languageData[$key] !== '') {
            return $languageData[$key];
        }

        return $default;
    }

    public function getLanguageOptions($selectedLang = null)
    {
        $selectedLang = $this->normalizeLangCode($selectedLang ?: $this->getCurrentLangCode());
        $options = array();

        foreach (self::SUPPORTED_LANGS as $langCode) {
            $meta = self::LANGUAGE_LABELS[$langCode];
            $options[] = array(
                'code' => $langCode,
                'short' => $meta['short'],
                'label' => $meta['label'],
                'url' => base_url('langs/' . $langCode),
                'is_current' => $langCode === $selectedLang,
                'direction' => $meta['direction'],
                'is_rtl' => $meta['direction'] === 'rtl',
            );
        }

        return $options;
    }

    public function getLanguageMeta($langCode = null)
    {
        $langCode = $this->normalizeLangCode($langCode ?: $this->getCurrentLangCode());
        $meta = self::LANGUAGE_LABELS[$langCode];

        return array(
            'code' => $langCode,
            'short' => $meta['short'],
            'label' => $meta['label'],
            'direction' => $meta['direction'],
            'is_rtl' => $meta['direction'] === 'rtl',
        );
    }

    public function isSupportedLanguage($langCode)
    {
        return in_array($langCode, self::SUPPORTED_LANGS, true);
    }

    private function getCurrentLangCode()
    {
        return $this->normalizeLangCode((string) ($this->session->userdata('lang') ?: 'es'));
    }

    private function normalizeLangCode($langCode)
    {
        return in_array($langCode, self::SUPPORTED_LANGS, true) ? $langCode : 'es';
    }

    private function loadTranslationPack($langCode)
    {
        $langCode = $this->normalizeLangCode($langCode);
        $memoryKey = 'pack_' . $langCode;
        if (isset(self::$memoryCache[$memoryKey])) {
            return self::$memoryCache[$memoryKey];
        }

        $basePack = $this->loadTranslationFile('base');
        $languagePack = $this->loadTranslationFile($langCode);
        $mergedPack = array(
            'ui' => $this->mergeTranslationSection($basePack['ui'], $languagePack['ui']),
            'rebrand' => $this->mergeTranslationSection($basePack['rebrand'], $languagePack['rebrand']),
        );

        self::$memoryCache[$memoryKey] = $mergedPack;
        return $mergedPack;
    }

    private function loadTranslationFile($langCode)
    {
        $path = APPPATH . 'language/cms/' . $langCode . '.php';
        if (!is_file($path)) {
            return array(
                'ui' => array(),
                'rebrand' => array(),
            );
        }

        $data = require $path;
        return array(
            'ui' => isset($data['ui']) && is_array($data['ui']) ? $data['ui'] : array(),
            'rebrand' => isset($data['rebrand']) && is_array($data['rebrand']) ? $data['rebrand'] : array(),
        );
    }

    private function mergeTranslationSection(array $baseSection, array $languageSection)
    {
        foreach ($languageSection as $key => $value) {
            if ($value !== null && $value !== '') {
                $baseSection[$key] = $value;
            }
        }

        return $baseSection;
    }

    private function getCacheFile($cacheKey, $langCode)
    {
        $files = array(
            __FILE__,
            APPPATH . 'language/cms/base.php',
            APPPATH . 'language/cms/' . $langCode . '.php',
        );

        $fingerprintParts = array();
        foreach ($files as $file) {
            $fingerprintParts[] = is_file($file) ? md5_file($file) : 'missing';
        }

        return $this->cacheDirectory . $cacheKey . '_' . md5(implode('|', $fingerprintParts)) . '.json';
    }

    private function readCache($cacheKey, $langCode)
    {
        $memoryKey = 'cache_' . $cacheKey . '_' . $langCode;
        if (isset(self::$memoryCache[$memoryKey])) {
            return self::$memoryCache[$memoryKey];
        }

        $path = $this->getCacheFile($cacheKey, $langCode);
        if (!is_file($path)) {
            return null;
        }

        $contents = @file_get_contents($path);
        if ($contents === false || $contents === '') {
            return null;
        }

        $decoded = json_decode($contents, true);
        if (!is_array($decoded)) {
            return null;
        }

        self::$memoryCache[$memoryKey] = $decoded;
        return $decoded;
    }

    private function writeCache($cacheKey, $langCode, array $payload)
    {
        $memoryKey = 'cache_' . $cacheKey . '_' . $langCode;
        self::$memoryCache[$memoryKey] = $payload;
        @file_put_contents(
            $this->getCacheFile($cacheKey, $langCode),
            json_encode($payload, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES)
        );
    }

    private function getSharedData($langCode, array $rebrandText)
    {
        $this->load->model('Sitecontext');
        $configRow = $this->Sitecontext->getConfigRow();
        $effectiveLang = $this->normalizeLangCode($langCode ?: ($configRow['lang'] ?? 'es'));

        if ($this->session->userdata('lang') === '') {
            $this->session->set_userdata(array(
                'lang' => $effectiveLang,
            ));
        }

        return $this->Sitecontext->getSharedData(
            $effectiveLang,
            $this->session->userdata('user') ?: '',
            (bool) $this->session->userdata('login'),
            (int) $this->session->userdata('rol'),
            $rebrandText
        );
    }
}
