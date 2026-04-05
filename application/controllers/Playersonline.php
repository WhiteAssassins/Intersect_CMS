<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Playersonline extends MY_Controller {
	function __construct() {
        parent::__construct();
        $this->load->model('Apiplayersonline');
        $this->load->library('intersectapiclient');
    }

    private function buildApiStatusLabels(array $apiHealth)
    {
        if (empty($apiHealth['configured'])) {
            return array(
                'badge' => $this->t('api_state_off', 'OFF'),
                'text' => $this->t('api_status_not_configured', 'Not configured'),
            );
        }

        if (!empty($apiHealth['online']) && empty($apiHealth['using_stale_cache'])) {
            if (!empty($apiHealth['using_cache'])) {
                return array(
                    'badge' => $this->t('api_state_cache', 'CACHE'),
                    'text' => $this->t('api_status_cache', 'Available from cache'),
                );
            }

            return array(
                'badge' => $this->t('api_state_live', 'LIVE'),
                'text' => $this->t('api_status_live', 'Available live'),
            );
        }

        if (!empty($apiHealth['using_stale_cache'])) {
            return array(
                'badge' => $this->t('api_state_stale', 'STALE'),
                'text' => $this->t('api_status_stale', 'Stale cache fallback'),
            );
        }

        return array(
            'badge' => $this->t('api_state_down', 'DOWN'),
            'text' => $this->t('api_status_down', 'No response'),
        );
    }

    private function sortPlayersByExp(array &$values)
    {
        usort($values, static function ($left, $right) {
            $expCompare = ((int) ($right['Exp'] ?? 0)) <=> ((int) ($left['Exp'] ?? 0));
            if ($expCompare !== 0) {
                return $expCompare;
            }

            return strcmp((string) ($left['Name'] ?? ''), (string) ($right['Name'] ?? ''));
        });
    }

    private function buildHotspots(array $mapCounts)
    {
        arsort($mapCounts);
        $rows = array();

        foreach (array_slice($mapCounts, 0, 3, true) as $mapName => $count) {
            $rows[] = array(
                'name' => $mapName,
                'count' => (int) $count,
            );
        }

        return $rows;
    }

    private function buildClassSummary(array $classCounts)
    {
        arsort($classCounts);
        $rows = array();

        foreach (array_slice($classCounts, 0, 4, true) as $className => $count) {
            $rows[] = array(
                'name' => $className,
                'count' => (int) $count,
            );
        }

        return $rows;
    }

    private function buildFilterRows(array $counts)
    {
        ksort($counts, SORT_NATURAL | SORT_FLAG_CASE);
        $rows = array();

        foreach ($counts as $name => $count) {
            $rows[] = array(
                'name' => $name,
                'count' => (int) $count,
            );
        }

        return $rows;
    }

    private function buildOnlinePlayerRows(array $values, $maxExp)
    {
        $rows = array();
        $position = 1;

        foreach ($values as $player) {
            $gender = (int) ($player['Gender'] ?? 0);
            $exp = (int) ($player['Exp'] ?? 0);
            $name = trim((string) ($player['Name'] ?? ''));
            $className = trim((string) ($player['ClassName'] ?? ''));
            $mapName = trim((string) ($player['MapName'] ?? ''));

            $rows[] = array(
                'rank' => $position,
                'name' => $name,
                'class_name' => $className !== '' ? $className : $this->t('playersonline_no_class_label', 'No class'),
                'map_name' => $mapName !== '' ? $mapName : $this->t('playersonline_no_map_label', 'No map'),
                'gender_label' => $gender === 0
                    ? $this->t('players_gender_male', 'Male')
                    : $this->t('players_gender_female', 'Female'),
                'gender_key' => $gender === 0 ? 'male' : 'female',
                'exp' => $exp,
                'exp_label' => number_format($exp),
                'exp_short' => $exp >= 1000 ? number_format($exp / 1000, 1) . 'k' : (string) $exp,
                'presence_progress' => $maxExp > 0 ? max(10, (int) round(($exp / $maxExp) * 100)) : 0,
                'featured' => $position <= 3,
            );

            $position++;
        }

        return $rows;
    }

    private function buildPageData()
    {
        $onlinePlayers = (array) $this->Apiplayersonline->playeronline();
        $values = isset($onlinePlayers['Values']) && is_array($onlinePlayers['Values']) ? $onlinePlayers['Values'] : array();
        $onlineCountResponse = (array) $this->Apiplayersonline->onlinecount();
        $apiHealth = $this->intersectapiclient->getHealthSummary();
        $apiStatus = $this->buildApiStatusLabels($apiHealth);
        $mapCounts = array();
        $classCounts = array();
        $totalExp = 0;
        $femaleCount = 0;
        $maxExp = 0;

        $this->sortPlayersByExp($values);

        foreach ($values as $player) {
            $mapName = trim((string) ($player['MapName'] ?? ''));
            $className = trim((string) ($player['ClassName'] ?? ''));
            $exp = (int) ($player['Exp'] ?? 0);

            if ($mapName !== '') {
                $mapCounts[$mapName] = isset($mapCounts[$mapName]) ? $mapCounts[$mapName] + 1 : 1;
            }

            if ($className !== '') {
                $classCounts[$className] = isset($classCounts[$className]) ? $classCounts[$className] + 1 : 1;
            }

            if ((int) ($player['Gender'] ?? 0) !== 0) {
                $femaleCount++;
            }

            $totalExp += $exp;
            $maxExp = max($maxExp, $exp);
        }

        $rows = $this->buildOnlinePlayerRows($values, $maxExp);
        $featuredRows = array_slice($rows, 0, 3);
        $hotspots = $this->buildHotspots($mapCounts);
        $classSummary = $this->buildClassSummary($classCounts);
        $mapFilterRows = $this->buildFilterRows($mapCounts);
        $classFilterRows = $this->buildFilterRows($classCounts);
        $topMapName = '';
        $topMapCount = 0;

        if (!empty($hotspots)) {
            $topMapName = $hotspots[0]['name'];
            $topMapCount = (int) $hotspots[0]['count'];
        }

        $totalPlayers = count($rows);
        $onlineCount = (int) ($onlineCountResponse['onlineCount'] ?? $totalPlayers);

        return array(
            'online_player_rows' => $rows,
            'online_player_featured_rows' => $featuredRows,
            'online_hotspot_rows' => $hotspots,
            'online_class_rows' => $classSummary,
            'online_map_filter_rows' => $mapFilterRows,
            'online_class_filter_rows' => $classFilterRows,
            'online_player_count' => $onlineCount,
            'online_total_exp' => $totalExp,
            'online_average_exp' => $totalPlayers > 0 ? round($totalExp / $totalPlayers) : 0,
            'online_maps_active_count' => count($mapCounts),
            'online_classes_active_count' => count($classCounts),
            'online_male_count' => max(0, $totalPlayers - $femaleCount),
            'online_female_count' => $femaleCount,
            'online_top_map_name' => $topMapName !== '' ? $topMapName : $this->t('playersonline_no_map_label', 'No map'),
            'online_top_map_count' => $topMapCount,
            'online_api_badge' => $apiStatus['badge'],
            'online_api_status' => $apiStatus['text'],
            'online_api_last_sync' => $apiHealth['last_sync_label'] ?? 'N/A',
            'online_api_message' => $apiHealth['message'] ?? '',
            'online_hero_eyebrow' => $this->t('playersonline_hero_eyebrow', 'Live presence'),
            'online_hero_title' => $this->t('playersonline_hero_title', 'Players online'),
            'online_hero_text' => $this->t('playersonline_hero_text', 'Track the live population connected to Intersect, spot crowded maps quickly and filter the session list without relying on the old legacy table.'),
            'online_search_placeholder' => $this->t('playersonline_search_placeholder', 'Search by player, class or map'),
            'online_filter_all_maps' => $this->t('playersonline_filter_all_maps', 'All maps'),
            'online_filter_all_classes' => $this->t('playersonline_filter_all_classes', 'All classes'),
            'online_featured_title' => $this->t('playersonline_featured_title', 'Top online presence'),
            'online_featured_text' => $this->t('playersonline_featured_text', 'This list highlights the connected characters with the highest experience from the same live feed shown below.'),
            'online_stats_title' => $this->t('playersonline_stats_title', 'Live snapshot'),
            'online_stats_text' => $this->t('playersonline_stats_text', 'A quick overview of live presence, API freshness and where the current player activity is concentrated.'),
            'online_table_title' => $this->t('playersonline_table_title', 'Connected characters'),
            'online_table_text' => $this->t('playersonline_table_text', 'Filter locally by character name, map or class. Rows stay ordered by experience from the live online feed.'),
            'online_empty_label' => $this->t('playersonline_empty_label', 'No online characters match the current filters.'),
            'online_showing_label' => $this->t('playersonline_showing_label', 'Showing'),
            'online_of_label' => $this->t('playersonline_of_label', 'of'),
            'online_average_exp_label' => $this->t('playersonline_average_exp_label', 'Average EXP'),
            'online_maps_active_label' => $this->t('playersonline_maps_active_label', 'Active maps'),
            'online_classes_active_label' => $this->t('playersonline_classes_active_label', 'Active classes'),
            'online_last_sync_label' => $this->t('playersonline_last_sync_label', 'Last sync'),
            'online_top_map_label' => $this->t('playersonline_top_map_label', 'Top map'),
            'online_total_exp_label' => $this->t('playersonline_total_exp_label', 'Total EXP'),
            'online_hotspots_label' => $this->t('playersonline_hotspots_label', 'Hotspots'),
            'online_class_breakdown_label' => $this->t('playersonline_class_breakdown_label', 'Class spread'),
            'online_no_hotspots_label' => $this->t('playersonline_no_hotspots_label', 'No hotspots yet'),
            'online_no_classes_label' => $this->t('playersonline_no_classes_label', 'No classes yet'),
            'online_no_map_label' => $this->t('playersonline_no_map_label', 'No map'),
            'online_no_class_label' => $this->t('playersonline_no_class_label', 'No class'),
            'online_player_word_label' => $this->t('player', 'Player'),
        );
    }
	
    public function index()
	{
        if ($this->redirectToMaintenanceIfNeeded()) {
            return;
        }

        $this->renderPublicPage('playersonline', $this->buildPageData());
	}
}
