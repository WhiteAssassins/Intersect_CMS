<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Players extends MY_Controller {
	function __construct() {
        parent::__construct();
		$this->load->model('Apiplayers');
        $this->load->model('Apiplayersonline');
		$this->load->library('intersectapiclient');
    }

    private function buildPlayerRows(array $values, $maxLevel)
    {
        $rows = array();
        $position = 1;

        foreach ($values as $player) {
            $level = (int) ($player['Level'] ?? 0);
            $exp = (int) ($player['Exp'] ?? 0);
            $isDead = !empty($player['Dead']);
            $gender = (int) ($player['Gender'] ?? 0);

            $rows[] = array(
                'rank' => $position++,
                'name' => $player['Name'] ?? '',
                'gender_label' => $gender === 0
                    ? $this->t('players_gender_male', 'Male')
                    : $this->t('players_gender_female', 'Female'),
                'gender_key' => $gender === 0 ? 'male' : 'female',
                'level' => $level,
                'exp' => $exp,
                'exp_label' => number_format($exp),
                'status_label' => $isDead
                    ? $this->t('players_status_dead', 'Dead')
                    : $this->t('players_status_alive', 'Alive'),
                'status_key' => $isDead ? 'dead' : 'alive',
                'level_progress' => $maxLevel > 0 ? max(8, (int) round(($level / $maxLevel) * 100)) : 0,
                'is_featured' => $position <= 4 ? 1 : 0,
            );
        }

        return $rows;
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

    private function buildPageData()
    {
        $players = (array) $this->Apiplayers->rank();
        $values = isset($players['Values']) && is_array($players['Values']) ? $players['Values'] : array();
        $onlineCount = (array) $this->Apiplayersonline->onlinecount();
        $apiHealth = $this->intersectapiclient->getHealthSummary();
        $apiStatus = $this->buildApiStatusLabels($apiHealth);
        $totalPlayers = count($values);
        $aliveCount = 0;
        $femaleCount = 0;
        $levelTotal = 0;
        $maxLevel = 0;

        foreach ($values as $player) {
            $level = (int) ($player['Level'] ?? 0);
            $levelTotal += $level;
            $maxLevel = max($maxLevel, $level);

            if (empty($player['Dead'])) {
                $aliveCount++;
            }

            if ((int) ($player['Gender'] ?? 0) !== 0) {
                $femaleCount++;
            }
        }

        $rows = $this->buildPlayerRows($values, $maxLevel);
        $featuredRows = array_slice($rows, 0, 3);
        $avgLevel = $totalPlayers > 0 ? round($levelTotal / $totalPlayers, 1) : 0;

        return array(
            'player_rows' => $rows,
            'player_featured_rows' => $featuredRows,
            'player_total_count' => $totalPlayers,
            'player_online_count' => (int) ($onlineCount['onlineCount'] ?? 0),
            'player_alive_count' => $aliveCount,
            'player_dead_count' => max(0, $totalPlayers - $aliveCount),
            'player_male_count' => max(0, $totalPlayers - $femaleCount),
            'player_female_count' => $femaleCount,
            'player_average_level' => $avgLevel,
            'player_highest_level' => $maxLevel,
            'player_api_badge' => $apiStatus['badge'],
            'player_api_status' => $apiStatus['text'],
            'player_api_last_sync' => $apiHealth['last_sync_label'] ?? 'N/A',
            'player_api_message' => $apiHealth['message'] ?? '',
            'player_hero_eyebrow' => $this->t('players_hero_eyebrow', 'Ranking'),
            'player_hero_title' => $this->t('players_hero_title', 'Character leaderboard'),
            'player_hero_text' => $this->t('players_hero_text', 'Browse the ranked characters connected to Intersect, compare levels quickly and filter the ladder without relying on the old legacy table.'),
            'player_search_placeholder' => $this->t('players_search_placeholder', 'Search by name, rank or state'),
            'player_filter_all' => $this->t('players_filter_all', 'All'),
            'player_filter_all_genders' => $this->t('players_filter_all_genders', 'All genders'),
            'player_filter_all_statuses' => $this->t('players_filter_all_statuses', 'All statuses'),
            'player_gender_male_label' => $this->t('players_gender_male', 'Male'),
            'player_gender_female_label' => $this->t('players_gender_female', 'Female'),
            'player_status_alive_label' => $this->t('players_status_alive', 'Alive'),
            'player_status_dead_label' => $this->t('players_status_dead', 'Dead'),
            'player_featured_title' => $this->t('players_featured_title', 'Top contenders'),
            'player_featured_text' => $this->t('players_featured_text', 'The current top positions update from the same Intersect ranking feed shown below.'),
            'player_stats_title' => $this->t('players_stats_title', 'Ranking snapshot'),
            'player_stats_text' => $this->t('players_stats_text', 'A quick operational overview of the ladder, online activity and freshness of the API data.'),
            'player_table_title' => $this->t('players_table_title', 'Ranked characters'),
            'player_table_text' => $this->t('players_table_text', 'Filter locally by text, gender or state. The ranking stays ordered by the API response.'),
            'player_empty_label' => $this->t('players_empty_label', 'No characters match the current filters.'),
            'player_showing_label' => $this->t('players_showing_label', 'Showing'),
            'player_of_label' => $this->t('players_of_label', 'of'),
            'player_average_level_label' => $this->t('players_average_level_label', 'Average level'),
            'player_highest_level_label' => $this->t('players_highest_level_label', 'Highest level'),
            'player_last_sync_label' => $this->t('players_last_sync_label', 'Last sync'),
        );
    }
	
	public function index()
	{
        if ($this->redirectToMaintenanceIfNeeded()) {
            return;
        }

        $this->renderPublicPage('players', $this->buildPageData());
	}
}
