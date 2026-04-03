<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Apiserverstats');
        $this->load->model('Apiusers');
        $this->load->model('Apiobjects');
        $this->load->model('Apiplayers');
        $this->load->model('Apimap');
        $this->load->model('Apievent');
        $this->load->model('Apiquest');
        $this->load->model('Apiplayersonline');
        $this->load->library('systemmetrics');
        $this->load->library('intersectapiclient');
        $this->requireAdmin();
    }

    public function index()
    {
        $dashboardData = $this->buildDashboardViewData();
        if ($this->input->get('json')) {
            $this->respondJson(array(
                'ram' => $dashboardData['ram_usage_percent'],
                'cpu' => $dashboardData['cpu_load_percent'],
                'disk' => $dashboardData['disk_usage_percent'],
                'connections' => $dashboardData['total_connections'],
            ));
            return;
        }

        $this->renderAdminPage('admin', $dashboardData);
    }

    public function news()
    {
        $this->renderAdminPage('admin/news', array(
            'admin_news_rows' => $this->buildAdminNewsRows(),
        ));
    }

    public function shop()
    {
        $this->renderAdminPage('admin/shop', array(
            'admin_product_rows' => $this->buildAdminProductRows(),
        ));
    }

    public function adminaccounts()
    {
        $this->renderAdminPage('admin/adminaccounts', array(
            'admin_account_rows' => $this->buildAdminAccountRows(),
        ));
    }

    public function tickets()
    {
        $this->renderAdminPage('admin/tickets', array(
            'admin_feedback_rows' => $this->buildAdminFeedbackRows(),
        ));
    }

    public function objects()
    {
        $this->renderAdminPage('admin/objects', array(
            'admin_object_rows' => $this->buildAdminObjectRows(),
        ));
    }

    public function maps()
    {
        $this->renderAdminPage('admin/maps', array(
            'admin_map_rows' => $this->buildAdminMapRows(),
        ));
    }

    public function events()
    {
        $this->renderAdminPage('admin/events', array(
            'admin_event_rows' => $this->buildAdminEventRows(),
        ));
    }

    public function quests()
    {
        $this->renderAdminPage('admin/quests', array(
            'admin_quest_rows' => $this->buildAdminQuestRows(),
        ));
    }

    public function commands()
    {
        $this->renderAdminPage('admin/commands', $this->buildCommandViewData());
    }

    public function changelog()
    {
        $this->renderAdminPage('admin/changelog', array(
            'admin_changelog_rows' => $this->buildAdminChangelogRows(),
        ));
    }

    private function buildDashboardViewData()
    {
        $serverStats = (array) $this->Apiserverstats->serverinfo();
        $users = (array) $this->Apiusers->user();
        $players = (array) $this->Apiplayers->player();
        $metrics = $this->systemmetrics->collect();
        $apiHealth = $this->intersectapiclient->getHealthSummary();
        $apiStatus = $this->buildApiStatusLabels($apiHealth);

        return array_merge($metrics, array(
            'dashboard_total_users' => (int) ($users['Total'] ?? 0),
            'dashboard_online_count' => (int) ($serverStats['onlineCount'] ?? 0),
            'dashboard_total_players' => (int) ($players['Total'] ?? 0),
            'dashboard_cps' => (int) ($serverStats['cps'] ?? 0),
            'dashboard_version' => 'API v1',
            'dashboard_api_configured' => !empty($apiHealth['configured']) ? 1 : 0,
            'dashboard_api_online' => !empty($apiHealth['online']) ? 1 : 0,
            'dashboard_api_cached' => !empty($apiHealth['using_cache']) ? 1 : 0,
            'dashboard_api_stale' => !empty($apiHealth['using_stale_cache']) ? 1 : 0,
            'dashboard_api_last_sync' => $apiHealth['last_sync_label'] ?? 'N/A',
            'dashboard_api_message' => $apiHealth['message'] ?? '',
            'dashboard_api_status_badge' => $apiStatus['badge'],
            'dashboard_api_status_text' => $apiStatus['detail'],
        ));
    }

    private function buildApiStatusLabels(array $apiHealth)
    {
        if (empty($apiHealth['configured'])) {
            return array(
                'badge' => $this->t('api_state_off', 'OFF'),
                'detail' => $this->t('api_detail_not_configured', 'Not configured'),
            );
        }

        if (!empty($apiHealth['online']) && empty($apiHealth['using_stale_cache'])) {
            return array(
                'badge' => !empty($apiHealth['using_cache']) ? $this->t('api_state_cache', 'CACHE') : $this->t('api_state_live', 'LIVE'),
                'detail' => !empty($apiHealth['using_cache']) ? $this->t('api_detail_cache', 'Available from cache') : $this->t('api_detail_live', 'Live response'),
            );
        }

        if (!empty($apiHealth['using_stale_cache'])) {
            return array(
                'badge' => $this->t('api_state_stale', 'STALE'),
                'detail' => $this->t('api_detail_stale', 'Stale cache fallback'),
            );
        }

        return array(
            'badge' => $this->t('api_state_down', 'DOWN'),
            'detail' => $this->t('api_detail_down', 'No response'),
        );
    }

    private function buildAdminNewsRows()
    {
        $rows = $this->db->order_by('id', 'DESC')->get('news')->result_array();
        $items = array();

        foreach ($rows as $row) {
            $items[] = array(
                'id' => $row['id'] ?? 0,
                'title' => $row['title'] ?? '',
                'description' => $row['descrip'] ?? '',
                'date' => $row['date'] ?? '',
                'is_visible' => (int) ($row['status'] ?? 0) === 1,
            );
        }

        return $items;
    }

    private function buildAdminProductRows()
    {
        $rows = $this->db->order_by('id', 'DESC')->get('products')->result_array();
        $items = array();

        foreach ($rows as $row) {
            $items[] = array(
                'id' => $row['id'] ?? 0,
                'name' => $row['name'] ?? '',
                'price' => $row['price'] ?? 0,
                'description' => $row['descrip'] ?? '',
                'attack_animation' => $row['aatk'] ?? '',
                'interaction_animation' => $row['ainterac'] ?? '',
                'is_visible' => (int) ($row['status'] ?? 0) === 1,
            );
        }

        return $items;
    }

    private function buildAdminAccountRows()
    {
        $rows = $this->db->order_by('id', 'DESC')->get('users')->result_array();
        $items = array();

        foreach ($rows as $row) {
            $items[] = array(
                'id' => $row['id'] ?? 0,
                'user' => $row['user'] ?? '',
                'email' => $row['email'] ?? '',
            );
        }

        return $items;
    }

    private function buildAdminChangelogRows()
    {
        $rows = $this->db->order_by('id', 'DESC')->get('changelog')->result_array();
        $items = array();

        foreach ($rows as $row) {
            $items[] = array(
                'id' => $row['id'] ?? 0,
                'title' => $row['title'] ?? '',
                'text' => $row['txt'] ?? '',
            );
        }

        return $items;
    }

    private function buildAdminFeedbackRows()
    {
        $rows = $this->db->order_by('id', 'DESC')->get('feedback')->result_array();
        $items = array();

        foreach ($rows as $row) {
            $items[] = array(
                'id' => $row['id'] ?? 0,
                'title' => $row['title'] ?? '',
                'type' => $row['type'] ?? '',
                'user' => $row['user'] ?? '',
                'email' => $row['email'] ?? '',
                'status' => $row['status'] ?? '',
                'admin' => $row['admin'] ?? '',
                'text' => $row['text'] ?? '',
            );
        }

        return $items;
    }

    private function buildCommandViewData()
    {
        $onlinePlayers = (array) $this->Apiplayersonline->playeronline();
        $maps = (array) $this->Apimap->map();
        $playerValues = isset($onlinePlayers['Values']) && is_array($onlinePlayers['Values']) ? $onlinePlayers['Values'] : array();
        $mapEntries = isset($maps['entries']) && is_array($maps['entries']) ? $maps['entries'] : array();
        $playerOptions = array();
        $mapOptions = array();

        foreach ($playerValues as $player) {
            $playerOptions[] = array(
                'value' => $player['Name'] ?? '',
                'label' => $player['Name'] ?? '',
            );
        }

        foreach ($mapEntries as $entry) {
            $mapOptions[] = array(
                'value' => $entry['Key'] ?? '',
                'label' => $entry['Value']['Name'] ?? '',
            );
        }

        return array(
            'command_player_options' => $playerOptions,
            'command_map_options' => $mapOptions,
            'command_player_count' => count($playerOptions),
            'command_map_count' => count($mapOptions),
        );
    }

    private function buildAdminApiRows(array $entries)
    {
        $items = array();

        foreach ($entries as $entry) {
            $items[] = array(
                'key' => $entry['Key'] ?? '',
                'name' => $entry['Value']['Name'] ?? '',
            );
        }

        return $items;
    }

    private function buildAdminObjectRows()
    {
        $objects = (array) $this->Apiobjects->object();
        $entries = isset($objects['entries']) && is_array($objects['entries']) ? $objects['entries'] : array();

        return $this->buildAdminApiRows($entries);
    }

    private function buildAdminMapRows()
    {
        $maps = (array) $this->Apimap->map();
        $entries = isset($maps['entries']) && is_array($maps['entries']) ? $maps['entries'] : array();

        return $this->buildAdminApiRows($entries);
    }

    private function buildAdminEventRows()
    {
        $events = (array) $this->Apievent->event();
        $entries = isset($events['entries']) && is_array($events['entries']) ? $events['entries'] : array();

        return $this->buildAdminApiRows($entries);
    }

    private function buildAdminQuestRows()
    {
        $quests = (array) $this->Apiquest->quest();
        $entries = isset($quests['entries']) && is_array($quests['entries']) ? $quests['entries'] : array();

        return $this->buildAdminApiRows($entries);
    }
}
