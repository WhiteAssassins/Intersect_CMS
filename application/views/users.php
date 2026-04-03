<main class="public-page public-page--stack userdirectory-shell">
  <section class="userdirectory-hero">
    <div class="userdirectory-hero__grid">
      <div class="userdirectory-hero__copy">
        <span class="userdirectory-hero__eyebrow"><?php echo html_escape($user_hero_eyebrow); ?></span>
        <h1 class="userdirectory-hero__title"><?php echo html_escape($user_hero_title); ?></h1>
        <p class="userdirectory-hero__text"><?php echo html_escape($user_hero_text); ?></p>

        <div class="userdirectory-hero__actions">
          <span class="userdirectory-chip">
            <i class="fas fa-signal"></i>
            <?php echo html_escape($user_api_badge); ?>
          </span>
          <span class="userdirectory-chip userdirectory-chip--muted">
            <i class="fas fa-user-shield"></i>
            <?php echo (int) $user_total_count; ?> <?php echo html_escape($user_table_title); ?>
          </span>
          <span class="userdirectory-chip userdirectory-chip--muted">
            <i class="fas fa-clock"></i>
            <?php echo html_escape(number_format((float) $user_total_hours, 1)); ?> <?php echo html_escape($user_hours_suffix_label); ?>
          </span>
        </div>
      </div>

      <div class="userdirectory-hero__stats">
        <article class="userdirectory-stat">
          <span class="userdirectory-stat__label">{listusers}</span>
          <strong class="userdirectory-stat__value"><?php echo (int) $user_total_count; ?></strong>
        </article>
        <article class="userdirectory-stat">
          <span class="userdirectory-stat__label">{banned}</span>
          <strong class="userdirectory-stat__value"><?php echo (int) $user_banned_count; ?></strong>
        </article>
        <article class="userdirectory-stat">
          <span class="userdirectory-stat__label"><?php echo html_escape($user_average_hours_label); ?></span>
          <strong class="userdirectory-stat__value"><?php echo html_escape(number_format((float) $user_average_hours, 1)); ?></strong>
        </article>
        <article class="userdirectory-stat">
          <span class="userdirectory-stat__label">{muted}</span>
          <strong class="userdirectory-stat__value"><?php echo (int) $user_muted_count; ?></strong>
        </article>
      </div>
    </div>
  </section>

  <section class="userdirectory-overview">
    <div class="userdirectory-overview__grid">
      <article class="userdirectory-card">
        <div class="userdirectory-card__header">
          <span class="userdirectory-card__icon"><i class="fas fa-gavel"></i></span>
          <div>
            <span class="userdirectory-card__eyebrow"><?php echo html_escape($user_stats_title); ?></span>
            <h2 class="userdirectory-card__title"><?php echo html_escape($user_api_status); ?></h2>
          </div>
        </div>
        <p class="userdirectory-card__text"><?php echo html_escape($user_stats_text); ?></p>
        <div class="userdirectory-meta">
          <div class="userdirectory-meta__row">
            <span>{status}</span>
            <strong><?php echo html_escape($user_api_badge); ?></strong>
          </div>
          <div class="userdirectory-meta__row">
            <span><?php echo html_escape($user_last_sync_label); ?></span>
            <strong><?php echo html_escape($user_api_last_sync); ?></strong>
          </div>
          <div class="userdirectory-meta__row">
            <span>{detail}</span>
            <strong><?php echo html_escape($user_api_message !== '' ? $user_api_message : $user_api_status); ?></strong>
          </div>
        </div>
      </article>

      <article class="userdirectory-card">
        <div class="userdirectory-card__header">
          <span class="userdirectory-card__icon"><i class="fas fa-stopwatch"></i></span>
          <div>
            <span class="userdirectory-card__eyebrow"><?php echo html_escape($user_featured_title); ?></span>
            <h2 class="userdirectory-card__title"><?php echo html_escape(number_format((float) $user_total_hours, 1)); ?> <?php echo html_escape($user_hours_suffix_label); ?></h2>
          </div>
        </div>
        <p class="userdirectory-card__text"><?php echo html_escape($user_featured_text); ?></p>
        <div class="userdirectory-leaders">
          <?php foreach ($user_featured_rows as $featuredRow) { ?>
            <div class="userdirectory-leader">
              <span class="userdirectory-leader__time"><?php echo html_escape($featuredRow['time_played_short']); ?>h</span>
              <div class="userdirectory-leader__content">
                <strong><?php echo html_escape($featuredRow['name']); ?></strong>
                <small><?php echo html_escape($featuredRow['restriction_label']); ?> - <?php echo html_escape($featuredRow['time_played_label']); ?></small>
              </div>
              <span class="userdirectory-state userdirectory-state--<?php echo html_escape($featuredRow['restriction_key']); ?>">
                <?php echo html_escape($featuredRow['restriction_label']); ?>
              </span>
            </div>
          <?php } ?>
        </div>
      </article>
    </div>
  </section>

  <section class="userdirectory-card userdirectory-card--table">
    <div class="userdirectory-table__top">
      <div>
        <span class="userdirectory-card__eyebrow"><?php echo html_escape($user_table_title); ?></span>
        <h2 class="userdirectory-card__title"><?php echo html_escape($user_table_text); ?></h2>
      </div>
      <div class="userdirectory-table__summary">
        <span id="userdirectory-visible-count"><?php echo (int) $user_total_count; ?></span>
        <small>
          <?php echo html_escape($user_showing_label); ?>
          <span id="userdirectory-visible-inline"><?php echo (int) $user_total_count; ?></span>
          <?php echo html_escape($user_of_label); ?>
          <span id="userdirectory-total-inline"><?php echo (int) $user_total_count; ?></span>
        </small>
      </div>
    </div>

    <div class="userdirectory-filters">
      <label class="userdirectory-filter">
        <span>{search}</span>
        <input id="userdirectory-search" type="search" class="userdirectory-filter__input" placeholder="<?php echo html_escape($user_search_placeholder); ?>">
      </label>

      <label class="userdirectory-filter">
        <span>{banned}</span>
        <select id="userdirectory-banned" class="userdirectory-filter__select">
          <option value="all"><?php echo html_escape($user_filter_all_ban); ?></option>
          <option value="yes"><?php echo html_escape($user_yes_label); ?></option>
          <option value="no"><?php echo html_escape($user_no_label); ?></option>
        </select>
      </label>

      <label class="userdirectory-filter">
        <span>{muted}</span>
        <select id="userdirectory-muted" class="userdirectory-filter__select">
          <option value="all"><?php echo html_escape($user_filter_all_mute); ?></option>
          <option value="yes"><?php echo html_escape($user_yes_label); ?></option>
          <option value="no"><?php echo html_escape($user_no_label); ?></option>
        </select>
      </label>
    </div>

    <div class="userdirectory-table-wrap">
      <table class="userdirectory-table">
        <thead>
          <tr>
            <th>{name}</th>
            <th>{timeplayed}</th>
            <th>{banned}</th>
            <th>{muted}</th>
            <th><?php echo html_escape($user_stats_title); ?></th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($user_rows as $row) { ?>
            <tr
              data-user-row
              data-search="<?php echo html_escape(strtolower($row['name'] . ' ' . $row['time_played_label'] . ' ' . $row['restriction_label'])); ?>"
              data-banned="<?php echo html_escape($row['is_banned_key']); ?>"
              data-muted="<?php echo html_escape($row['is_muted_key']); ?>"
            >
              <td>
                <div class="userdirectory-name">
                  <strong><?php echo html_escape($row['name']); ?></strong>
                  <small><?php echo html_escape($row['restriction_label']); ?></small>
                </div>
              </td>
              <td>
                <div class="userdirectory-time">
                  <strong><?php echo html_escape($row['time_played_short']); ?>h</strong>
                  <small><?php echo html_escape($row['time_played_label']); ?></small>
                </div>
              </td>
              <td>
                <span class="userdirectory-badge userdirectory-badge--<?php echo html_escape($row['is_banned_key']); ?>">
                  <?php echo html_escape($row['is_banned_label']); ?>
                </span>
              </td>
              <td>
                <span class="userdirectory-badge userdirectory-badge--<?php echo html_escape($row['is_muted_key']); ?>">
                  <?php echo html_escape($row['is_muted_label']); ?>
                </span>
              </td>
              <td>
                <span class="userdirectory-state userdirectory-state--<?php echo html_escape($row['restriction_key']); ?>">
                  <?php echo html_escape($row['restriction_label']); ?>
                </span>
              </td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>

    <div id="userdirectory-empty" class="userdirectory-empty"<?php echo !empty($user_rows) ? ' hidden' : ''; ?>>
      <?php echo html_escape($user_empty_label); ?>
    </div>
  </section>
</main>

<script>
document.addEventListener('DOMContentLoaded', function () {
  var searchInput = document.getElementById('userdirectory-search');
  var bannedSelect = document.getElementById('userdirectory-banned');
  var mutedSelect = document.getElementById('userdirectory-muted');
  var rows = Array.prototype.slice.call(document.querySelectorAll('[data-user-row]'));
  var emptyState = document.getElementById('userdirectory-empty');
  var visibleCount = document.getElementById('userdirectory-visible-count');
  var visibleInline = document.getElementById('userdirectory-visible-inline');
  var totalInline = document.getElementById('userdirectory-total-inline');
  var totalCount = rows.length;

  function normalize(value) {
    return (value || '').toString().toLowerCase().trim();
  }

  function syncFilters() {
    var searchValue = normalize(searchInput.value);
    var bannedValue = normalize(bannedSelect.value);
    var mutedValue = normalize(mutedSelect.value);
    var matches = 0;

    rows.forEach(function (row) {
      var rowSearch = normalize(row.getAttribute('data-search'));
      var rowBanned = normalize(row.getAttribute('data-banned'));
      var rowMuted = normalize(row.getAttribute('data-muted'));
      var searchMatch = searchValue === '' || rowSearch.indexOf(searchValue) !== -1;
      var bannedMatch = bannedValue === 'all' || rowBanned === bannedValue;
      var mutedMatch = mutedValue === 'all' || rowMuted === mutedValue;
      var isVisible = searchMatch && bannedMatch && mutedMatch;

      row.hidden = !isVisible;
      if (isVisible) {
        matches += 1;
      }
    });

    visibleCount.textContent = matches.toString();
    visibleInline.textContent = matches.toString();
    totalInline.textContent = totalCount.toString();
    emptyState.hidden = matches !== 0;
    emptyState.textContent = '<?php echo addslashes($user_empty_label); ?>';
  }

  searchInput.addEventListener('input', syncFilters);
  bannedSelect.addEventListener('change', syncFilters);
  mutedSelect.addEventListener('change', syncFilters);
  syncFilters();
});
</script>
