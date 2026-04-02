<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sitecontext extends CI_Model
{
    private $visitCookieName = 'cms_visit_hit';
    private $visitCookieTtl = 21600;
    private static $configRowCache;
    private static $visitsRowCache;

    public function getConfigRow()
    {
        if (self::$configRowCache !== null) {
            return self::$configRowCache;
        }

        self::$configRowCache = (array) $this->db->get('config')->row_array();
        return self::$configRowCache;
    }

    public function getVisitsRow()
    {
        if (self::$visitsRowCache !== null) {
            return self::$visitsRowCache;
        }

        self::$visitsRowCache = (array) $this->db->get('visits')->row_array();
        return self::$visitsRowCache;
    }

    public function getConfigContent($field)
    {
        $configRow = $this->getConfigRow();
        return $configRow[$field] ?? '';
    }

    public function getSharedData($sessionLang, $sessionUser, $isLoggedIn, $role, array $rebrandText = array())
    {
        $configRow = $this->getConfigRow();
        $effectiveLang = $sessionLang ?: ($configRow['lang'] ?? 'es');
        $visitsRow = $this->refreshVisits($role, $isLoggedIn, $this->getVisitsRow());

        $this->load->model('Apiserverinfo');
        $serverInfo = (array) $this->Apiserverinfo->serverinfo();

        return array_merge(array(
            'site_lang' => $effectiveLang,
            'site_title' => $serverInfo['GameName'] ?? 'Intersect CMS',
            'analytics_id' => $configRow['analytics'] ?? '',
            'theme_color1' => $configRow['color1'] ?? '#2d5474',
            'theme_color2' => $configRow['color2'] ?? '#107e72',
            'download_url' => $configRow['download'] ?? '',
            'current_user' => $sessionUser ?: '',
            'is_logged_in' => $isLoggedIn ? 1 : 0,
            'is_admin' => ((int) $role === 1) ? 1 : 0,
            'current_year' => date('Y'),
            'tinymce_language' => $this->getTinymceLanguage($effectiveLang),
            'visits_january' => (int) ($visitsRow['january'] ?? 0),
            'visits_february' => (int) ($visitsRow['february'] ?? 0),
            'visits_march' => (int) ($visitsRow['march'] ?? 0),
            'visits_april' => (int) ($visitsRow['april'] ?? 0),
            'visits_may' => (int) ($visitsRow['may'] ?? 0),
            'visits_june' => (int) ($visitsRow['june'] ?? 0),
            'visits_july' => (int) ($visitsRow['july'] ?? 0),
            'visits_august' => (int) ($visitsRow['august'] ?? 0),
            'visits_september' => (int) ($visitsRow['september'] ?? 0),
            'visits_october' => (int) ($visitsRow['october'] ?? 0),
            'visits_november' => (int) ($visitsRow['november'] ?? 0),
            'visits_december' => (int) ($visitsRow['december'] ?? 0),
        ), $rebrandText);
    }

    private function refreshVisits($role, $isLoggedIn, array $visitsRow)
    {
        $month = date('M');

        if ($month === 'Jan' || (isset($visitsRow['december']) && (int) $visitsRow['december'] < 0)) {
            $resetData = array(
                'january' => 0,
                'february' => 0,
                'march' => 0,
                'april' => 0,
                'may' => 0,
                'june' => 0,
                'july' => 0,
                'august' => 0,
                'september' => 0,
                'october' => 0,
                'november' => 0,
                'december' => 0,
            );
            $this->db->where('id', 1);
            $this->db->update('visits', $resetData);
            $visitsRow = array_merge($visitsRow, $resetData);
            self::$visitsRowCache = $visitsRow;
        }

        if (((int) $role === 2 || !$isLoggedIn) && !$this->hasRecentVisitCookie()) {
            $monthMap = array(
                'Jan' => 'january',
                'Feb' => 'february',
                'Mar' => 'march',
                'Apr' => 'april',
                'May' => 'may',
                'Jun' => 'june',
                'Jul' => 'july',
                'Aug' => 'august',
                'Sep' => 'september',
                'Oct' => 'october',
                'Nov' => 'november',
                'Dec' => 'december',
            );

            if (isset($monthMap[$month])) {
                $column = $monthMap[$month];
                $currentValue = isset($visitsRow[$column]) ? (int) $visitsRow[$column] : 0;
                $visitsRow[$column] = $currentValue + 1;
                $this->db->where('id', 1);
                $this->db->update('visits', array($column => $visitsRow[$column]));
                $this->markRecentVisit();
                self::$visitsRowCache = $visitsRow;
            }
        }

        return $visitsRow;
    }

    private function hasRecentVisitCookie()
    {
        $cookie = $this->input->cookie($this->visitCookieName, true);
        return !empty($cookie);
    }

    private function markRecentVisit()
    {
        $secure = !empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off';
        setcookie($this->visitCookieName, '1', array(
            'expires' => time() + $this->visitCookieTtl,
            'path' => '/',
            'secure' => $secure,
            'httponly' => true,
            'samesite' => 'Lax',
        ));
    }

    private function getTinymceLanguage($lang)
    {
        switch ($lang) {
            case 'jp':
                return 'ja';
            case 'zh':
                return 'zh-Hans';
            case 'fr':
                return 'fr_FR';
            case 'pt':
                return 'pt_BR';
            default:
                return $lang ?: 'es';
        }
    }
}
