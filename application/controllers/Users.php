<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends MY_Controller {
	function __construct() {
        parent::__construct();
		$this->load->model('Apiusers');
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

    private function buildUserRows(array $values)
    {
        $rows = array();
        usort($values, static function ($left, $right) {
            return ((int) ($right['PlayTimeSeconds'] ?? 0)) <=> ((int) ($left['PlayTimeSeconds'] ?? 0));
        });

        foreach ($values as $user) {
            $playTimeSeconds = (int) ($user['PlayTimeSeconds'] ?? 0);
            $playTimeHours = round($playTimeSeconds / 60 / 60, 2);
            $isBanned = !empty($user['IsBanned']);
            $isMuted = !empty($user['IsMuted']);

            $rows[] = array(
                'name' => $user['Name'] ?? '',
                'time_played_hours' => $playTimeHours,
                'time_played_label' => number_format($playTimeHours, 2) . ' ' . $this->t('users_hours_suffix', 'hours'),
                'time_played_short' => number_format($playTimeHours, 1),
                'is_banned_label' => $isBanned ? $this->t('users_yes', 'Yes') : $this->t('users_no', 'No'),
                'is_banned_key' => $isBanned ? 'yes' : 'no',
                'is_muted_label' => $isMuted ? $this->t('users_yes', 'Yes') : $this->t('users_no', 'No'),
                'is_muted_key' => $isMuted ? 'yes' : 'no',
                'restriction_label' => $isBanned
                    ? $this->t('users_restriction_banned', 'Banned')
                    : ($isMuted ? $this->t('users_restriction_muted', 'Muted') : $this->t('users_restriction_clean', 'Clear')),
                'restriction_key' => $isBanned ? 'banned' : ($isMuted ? 'muted' : 'clear'),
            );
        }

        return $rows;
    }

    private function buildPageData()
    {
        $users = (array) $this->Apiusers->user();
        $values = isset($users['Values']) && is_array($users['Values']) ? $users['Values'] : array();
        $apiHealth = $this->intersectapiclient->getHealthSummary();
        $apiStatus = $this->buildApiStatusLabels($apiHealth);
        $rows = $this->buildUserRows($values);
        $featuredRows = array_slice($rows, 0, 3);
        $totalUsers = count($rows);
        $bannedCount = 0;
        $mutedCount = 0;
        $playTimeHoursTotal = 0;

        foreach ($rows as $row) {
            if ($row['is_banned_key'] === 'yes') {
                $bannedCount++;
            }

            if ($row['is_muted_key'] === 'yes') {
                $mutedCount++;
            }

            $playTimeHoursTotal += (float) $row['time_played_hours'];
        }

        return array(
            'user_rows' => $rows,
            'user_featured_rows' => $featuredRows,
            'user_total_count' => $totalUsers,
            'user_banned_count' => $bannedCount,
            'user_muted_count' => $mutedCount,
            'user_clean_count' => max(0, $totalUsers - $bannedCount - $mutedCount),
            'user_average_hours' => $totalUsers > 0 ? round($playTimeHoursTotal / $totalUsers, 1) : 0,
            'user_total_hours' => round($playTimeHoursTotal, 1),
            'user_api_badge' => $apiStatus['badge'],
            'user_api_status' => $apiStatus['text'],
            'user_api_last_sync' => $apiHealth['last_sync_label'] ?? 'N/A',
            'user_api_message' => $apiHealth['message'] ?? '',
            'user_hero_eyebrow' => $this->t('users_hero_eyebrow', 'Accounts'),
            'user_hero_title' => $this->t('users_hero_title', 'User directory'),
            'user_hero_text' => $this->t('users_hero_text', 'Review account activity, moderation states and the most active users from the current Intersect API response without relying on the old legacy listing.'),
            'user_search_placeholder' => $this->t('users_search_placeholder', 'Search by user, activity or restriction'),
            'user_filter_all' => $this->t('users_filter_all', 'All'),
            'user_filter_all_ban' => $this->t('users_filter_all_ban', 'All ban states'),
            'user_filter_all_mute' => $this->t('users_filter_all_mute', 'All mute states'),
            'user_featured_title' => $this->t('users_featured_title', 'Most active accounts'),
            'user_featured_text' => $this->t('users_featured_text', 'The featured block is sorted by total play time from the same account feed shown below.'),
            'user_stats_title' => $this->t('users_stats_title', 'Moderation snapshot'),
            'user_stats_text' => $this->t('users_stats_text', 'A quick overview of account restrictions, total activity and the freshness of the Intersect user feed.'),
            'user_table_title' => $this->t('users_table_title', 'User accounts'),
            'user_table_text' => $this->t('users_table_text', 'Filter locally by account name, ban state or mute state. Rows stay ordered by play time.'),
            'user_empty_label' => $this->t('users_empty_label', 'No accounts match the current filters.'),
            'user_showing_label' => $this->t('users_showing_label', 'Showing'),
            'user_of_label' => $this->t('users_of_label', 'of'),
            'user_average_hours_label' => $this->t('users_average_hours_label', 'Average hours'),
            'user_total_hours_label' => $this->t('users_total_hours_label', 'Total hours'),
            'user_last_sync_label' => $this->t('users_last_sync_label', 'Last sync'),
            'user_yes_label' => $this->t('users_yes', 'Yes'),
            'user_no_label' => $this->t('users_no', 'No'),
            'user_banned_label' => $this->t('users_restriction_banned', 'Banned'),
            'user_muted_label' => $this->t('users_restriction_muted', 'Muted'),
            'user_clear_label' => $this->t('users_restriction_clean', 'Clear'),
            'user_hours_suffix_label' => $this->t('users_hours_suffix', 'hours'),
        );
    }
	
	public function index()
	{
        if ($this->redirectToMaintenanceIfNeeded()) {
            return;
        }

        $this->renderPublicPage('users', $this->buildPageData());
	}
}
