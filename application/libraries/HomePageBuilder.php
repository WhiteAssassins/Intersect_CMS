<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HomePageBuilder
{
    protected $CI;

    public function __construct()
    {
        $this->CI =& get_instance();
        $this->CI->load->model('Apiserverstats');
        $this->CI->load->model('Apiusers');
        $this->CI->load->model('Langs');
        $this->CI->load->model('Sitecontext');
    }

    public function build()
    {
        $configRow = $this->CI->Sitecontext->getConfigRow();
        $serverStats = (array) $this->CI->Apiserverstats->serverinfo();
        $users = (array) $this->CI->Apiusers->user();
        $onlineCount = (int) ($serverStats['onlineCount'] ?? 0);
        $totalUsers = (int) ($users['Total'] ?? 0);
        $uptimeHours = round(((float) ($serverStats['uptime'] ?? 0)) / 1000 / 60 / 60, 2);
        $languageData = $this->CI->Langs->rebrandText($this->CI->session->userdata('lang') ?: 'es');

        $menuHeader = trim((string) ($configRow['menuheader'] ?? ''));
        $featureOneHeader = trim((string) ($configRow['menu1header'] ?? ''));
        $featureTwoHeader = trim((string) ($configRow['menu2header'] ?? ''));
        $featureThreeHeader = trim((string) ($configRow['menu3header'] ?? ''));
        $featureOneText = trim((string) ($configRow['menu1text'] ?? ''));
        $featureTwoText = trim((string) ($configRow['menu2text'] ?? ''));
        $featureThreeText = trim((string) ($configRow['menu3text'] ?? ''));
        $featureOneIcon = trim((string) ($configRow['menu1icon'] ?? '')) ?: 'fas fa-satellite-dish';
        $featureTwoIcon = trim((string) ($configRow['menu2icon'] ?? '')) ?: 'fas fa-shield-alt';
        $featureThreeIcon = trim((string) ($configRow['menu3icon'] ?? '')) ?: 'fas fa-crown';

        return array(
            'home_uptime_hours' => $uptimeHours,
            'home_online_count' => $onlineCount,
            'home_total_users' => $totalUsers,
            'home_hero_kicker' => $languageData['home_hero_kicker'] ?? '',
            'home_menu_header' => $menuHeader !== '' ? $menuHeader : ($languageData['home_default_lead'] ?? ''),
            'home_menu1_icon' => $featureOneIcon,
            'home_menu1_header' => $featureOneHeader !== '' ? $featureOneHeader : ($languageData['home_default_feature_one_title'] ?? ''),
            'home_menu1_text' => $featureOneText !== '' ? $featureOneText : ($languageData['home_default_feature_one_text'] ?? ''),
            'home_menu2_icon' => $featureTwoIcon,
            'home_menu2_header' => $featureTwoHeader !== '' ? $featureTwoHeader : ($languageData['home_default_feature_two_title'] ?? ''),
            'home_menu2_text' => $featureTwoText !== '' ? $featureTwoText : ($languageData['home_default_feature_two_text'] ?? ''),
            'home_menu3_icon' => $featureThreeIcon,
            'home_menu3_header' => $featureThreeHeader !== '' ? $featureThreeHeader : ($languageData['home_default_feature_three_title'] ?? ''),
            'home_menu3_text' => $featureThreeText !== '' ? $featureThreeText : ($languageData['home_default_feature_three_text'] ?? ''),
            'home_support_title' => $languageData['home_support_title'] ?? '',
            'home_support_text' => $languageData['home_support_text'] ?? '',
            'home_story_title' => $languageData['home_story_title'] ?? '',
            'home_story_text' => $languageData['home_story_text'] ?? '',
            'home_story_card_one_eyebrow' => $languageData['home_story_card_one_eyebrow'] ?? '',
            'home_story_card_two_eyebrow' => $languageData['home_story_card_two_eyebrow'] ?? '',
            'home_story_card_three_eyebrow' => $languageData['home_story_card_three_eyebrow'] ?? '',
            'home_final_title' => $languageData['home_final_title'] ?? '',
            'home_final_text' => $languageData['home_final_text'] ?? '',
            'home_feature_rows' => array(
                array(
                    'icon' => $featureOneIcon,
                    'title' => $featureOneHeader !== '' ? $featureOneHeader : ($languageData['home_default_feature_one_title'] ?? ''),
                    'text' => $featureOneText !== '' ? $featureOneText : ($languageData['home_default_feature_one_text'] ?? ''),
                ),
                array(
                    'icon' => $featureTwoIcon,
                    'title' => $featureTwoHeader !== '' ? $featureTwoHeader : ($languageData['home_default_feature_two_title'] ?? ''),
                    'text' => $featureTwoText !== '' ? $featureTwoText : ($languageData['home_default_feature_two_text'] ?? ''),
                ),
                array(
                    'icon' => $featureThreeIcon,
                    'title' => $featureThreeHeader !== '' ? $featureThreeHeader : ($languageData['home_default_feature_three_title'] ?? ''),
                    'text' => $featureThreeText !== '' ? $featureThreeText : ($languageData['home_default_feature_three_text'] ?? ''),
                ),
            ),
            'home_metric_rows' => array(
                array(
                    'value' => $onlineCount,
                    'suffix' => '',
                    'label' => '{useronline}',
                    'icon' => 'fas fa-signal',
                    'counter_class' => 'count1',
                    'time' => 1000,
                ),
                array(
                    'value' => $totalUsers,
                    'suffix' => '',
                    'label' => '{usersregistered}',
                    'icon' => 'fas fa-users',
                    'counter_class' => 'count-up',
                    'time' => 500,
                ),
                array(
                    'value' => $uptimeHours,
                    'suffix' => 'H',
                    'label' => '{onlinetime}',
                    'icon' => 'fas fa-clock',
                    'counter_class' => 'count2',
                    'time' => 1000,
                ),
            ),
        );
    }
}
