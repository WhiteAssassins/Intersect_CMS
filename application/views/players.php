<main class="public-page public-page--stack playerboard-shell">
  <section class="playerboard-hero">
    <div class="playerboard-hero__grid">
      <div class="playerboard-hero__copy">
        <span class="playerboard-hero__eyebrow"><?php echo html_escape($player_hero_eyebrow); ?></span>
        <h1 class="playerboard-hero__title"><?php echo html_escape($player_hero_title); ?></h1>
        <p class="playerboard-hero__text"><?php echo html_escape($player_hero_text); ?></p>

        <div class="playerboard-hero__actions">
          <span class="playerboard-chip">
            <i class="fas fa-signal"></i>
            <?php echo html_escape($player_api_badge); ?>
          </span>
          <span class="playerboard-chip playerboard-chip--muted">
            <i class="fas fa-users"></i>
            <?php echo (int) $player_total_count; ?> <?php echo html_escape($player_table_title); ?>
          </span>
          <span class="playerboard-chip playerboard-chip--muted">
            <i class="fas fa-bolt"></i>
            <?php echo (int) $player_online_count; ?> {playersonline}
          </span>
        </div>
      </div>

      <div class="playerboard-hero__stats">
        <article class="playerboard-stat">
          <span class="playerboard-stat__label">{totalplayers}</span>
          <strong class="playerboard-stat__value"><?php echo (int) $player_total_count; ?></strong>
        </article>
        <article class="playerboard-stat">
          <span class="playerboard-stat__label">{playersonline}</span>
          <strong class="playerboard-stat__value"><?php echo (int) $player_online_count; ?></strong>
        </article>
        <article class="playerboard-stat">
          <span class="playerboard-stat__label"><?php echo html_escape($player_average_level_label); ?></span>
          <strong class="playerboard-stat__value"><?php echo html_escape(number_format((float) $player_average_level, 1)); ?></strong>
        </article>
        <article class="playerboard-stat">
          <span class="playerboard-stat__label"><?php echo html_escape($player_highest_level_label); ?></span>
          <strong class="playerboard-stat__value"><?php echo (int) $player_highest_level; ?></strong>
        </article>
      </div>
    </div>
  </section>

  <section class="playerboard-overview">
    <div class="playerboard-overview__grid">
      <article class="playerboard-card">
        <div class="playerboard-card__header">
          <span class="playerboard-card__icon"><i class="fas fa-chart-line"></i></span>
          <div>
            <span class="playerboard-card__eyebrow"><?php echo html_escape($player_stats_title); ?></span>
            <h2 class="playerboard-card__title"><?php echo html_escape($player_api_status); ?></h2>
          </div>
        </div>
        <p class="playerboard-card__text"><?php echo html_escape($player_stats_text); ?></p>
        <div class="playerboard-meta">
          <div class="playerboard-meta__row">
            <span>{status}</span>
            <strong><?php echo html_escape($player_api_badge); ?></strong>
          </div>
          <div class="playerboard-meta__row">
            <span><?php echo html_escape($player_last_sync_label); ?></span>
            <strong><?php echo html_escape($player_api_last_sync); ?></strong>
          </div>
          <div class="playerboard-meta__row">
            <span>{detail}</span>
            <strong><?php echo html_escape($player_api_message !== '' ? $player_api_message : $player_api_status); ?></strong>
          </div>
        </div>
      </article>

      <article class="playerboard-card">
        <div class="playerboard-card__header">
          <span class="playerboard-card__icon"><i class="fas fa-trophy"></i></span>
          <div>
            <span class="playerboard-card__eyebrow"><?php echo html_escape($player_featured_title); ?></span>
            <h2 class="playerboard-card__title"><?php echo (int) $player_total_count; ?> {player}</h2>
          </div>
        </div>
        <p class="playerboard-card__text"><?php echo html_escape($player_featured_text); ?></p>
        <div class="playerboard-leaders">
          <?php foreach ($player_featured_rows as $featuredRow) { ?>
            <div class="playerboard-leader">
              <span class="playerboard-leader__rank">#<?php echo (int) $featuredRow['rank']; ?></span>
              <div class="playerboard-leader__content">
                <strong><?php echo html_escape($featuredRow['name']); ?></strong>
                <small><?php echo html_escape($featuredRow['gender_label']); ?> - {level} <?php echo (int) $featuredRow['level']; ?></small>
              </div>
              <span class="playerboard-status playerboard-status--<?php echo html_escape($featuredRow['status_key']); ?>">
                <?php echo html_escape($featuredRow['status_label']); ?>
              </span>
            </div>
          <?php } ?>
        </div>
      </article>
    </div>
  </section>

  <section class="playerboard-card playerboard-card--table">
    <div class="playerboard-table__top">
      <div>
        <span class="playerboard-card__eyebrow"><?php echo html_escape($player_table_title); ?></span>
        <h2 class="playerboard-card__title"><?php echo html_escape($player_table_text); ?></h2>
      </div>
      <div class="playerboard-table__summary">
        <span id="playerboard-visible-count"><?php echo (int) $player_total_count; ?></span>
        <small>
          <?php echo html_escape($player_showing_label); ?>
          <span id="playerboard-visible-inline"><?php echo (int) $player_total_count; ?></span>
          <?php echo html_escape($player_of_label); ?>
          <span id="playerboard-total-inline"><?php echo (int) $player_total_count; ?></span>
        </small>
      </div>
    </div>

    <div class="playerboard-filters">
      <label class="playerboard-filter">
        <span>{search}</span>
        <input id="playerboard-search" type="search" class="playerboard-filter__input" placeholder="<?php echo html_escape($player_search_placeholder); ?>">
      </label>

      <label class="playerboard-filter">
        <span>{gender}</span>
        <select id="playerboard-gender" class="playerboard-filter__select">
          <option value="all"><?php echo html_escape($player_filter_all_genders); ?></option>
          <option value="male"><?php echo html_escape($player_gender_male_label); ?></option>
          <option value="female"><?php echo html_escape($player_gender_female_label); ?></option>
        </select>
      </label>

      <label class="playerboard-filter">
        <span>{status}</span>
        <select id="playerboard-status" class="playerboard-filter__select">
          <option value="all"><?php echo html_escape($player_filter_all_statuses); ?></option>
          <option value="alive"><?php echo html_escape($player_status_alive_label); ?></option>
          <option value="dead"><?php echo html_escape($player_status_dead_label); ?></option>
        </select>
      </label>
    </div>

    <div class="playerboard-table-wrap">
      <table class="playerboard-table">
        <thead>
          <tr>
            <th>#</th>
            <th>{name}</th>
            <th>{gender}</th>
            <th>{level}</th>
            <th>{exp}</th>
            <th>{status}</th>
          </tr>
        </thead>
        <tbody id="playerboard-table-body">
          <?php foreach ($player_rows as $row) { ?>
            <tr
              data-player-row
              data-search="<?php echo html_escape(strtolower($row['name'] . ' ' . $row['rank'] . ' ' . $row['gender_label'] . ' ' . $row['status_label'])); ?>"
              data-gender="<?php echo html_escape($row['gender_key']); ?>"
              data-status="<?php echo html_escape($row['status_key']); ?>"
            >
              <td>
                <span class="playerboard-rank<?php echo $row['rank'] <= 3 ? ' playerboard-rank--top' : ''; ?>">
                  #<?php echo (int) $row['rank']; ?>
                </span>
              </td>
              <td>
                <div class="playerboard-name">
                  <strong><?php echo html_escape($row['name']); ?></strong>
                  <small><?php echo $row['is_featured'] ? html_escape($player_featured_title) : html_escape($player_stats_title); ?></small>
                </div>
              </td>
              <td>
                <span class="playerboard-pill playerboard-pill--<?php echo html_escape($row['gender_key']); ?>">
                  <?php echo html_escape($row['gender_label']); ?>
                </span>
              </td>
              <td>
                <div class="playerboard-level">
                  <strong><?php echo (int) $row['level']; ?></strong>
                  <span class="playerboard-level__bar">
                    <span style="width: <?php echo (int) $row['level_progress']; ?>%;"></span>
                  </span>
                </div>
              </td>
              <td><?php echo html_escape($row['exp_label']); ?></td>
              <td>
                <span class="playerboard-status playerboard-status--<?php echo html_escape($row['status_key']); ?>">
                  <?php echo html_escape($row['status_label']); ?>
                </span>
              </td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>

    <div id="playerboard-empty" class="playerboard-empty"<?php echo !empty($player_rows) ? ' hidden' : ''; ?>>
      <?php echo html_escape($player_empty_label); ?>
    </div>
  </section>
</main>

<script>
document.addEventListener('DOMContentLoaded', function () {
  var searchInput = document.getElementById('playerboard-search');
  var genderSelect = document.getElementById('playerboard-gender');
  var statusSelect = document.getElementById('playerboard-status');
  var rows = Array.prototype.slice.call(document.querySelectorAll('[data-player-row]'));
  var emptyState = document.getElementById('playerboard-empty');
  var visibleCount = document.getElementById('playerboard-visible-count');
  var visibleInline = document.getElementById('playerboard-visible-inline');
  var totalInline = document.getElementById('playerboard-total-inline');
  var totalCount = rows.length;

  function normalize(value) {
    return (value || '').toString().toLowerCase().trim();
  }

  function syncFilters() {
    var searchValue = normalize(searchInput.value);
    var genderValue = normalize(genderSelect.value);
    var statusValue = normalize(statusSelect.value);
    var matches = 0;

    rows.forEach(function (row) {
      var rowSearch = normalize(row.getAttribute('data-search'));
      var rowGender = normalize(row.getAttribute('data-gender'));
      var rowStatus = normalize(row.getAttribute('data-status'));
      var searchMatch = searchValue === '' || rowSearch.indexOf(searchValue) !== -1;
      var genderMatch = genderValue === 'all' || rowGender === genderValue;
      var statusMatch = statusValue === 'all' || rowStatus === statusValue;
      var isVisible = searchMatch && genderMatch && statusMatch;

      row.hidden = !isVisible;
      if (isVisible) {
        matches += 1;
      }
    });

    visibleCount.textContent = matches.toString();
    visibleInline.textContent = matches.toString();
    totalInline.textContent = totalCount.toString();
    emptyState.hidden = matches !== 0;
    emptyState.textContent = '<?php echo addslashes($player_empty_label); ?>';
  }

  searchInput.addEventListener('input', syncFilters);
  genderSelect.addEventListener('change', syncFilters);
  statusSelect.addEventListener('change', syncFilters);
  syncFilters();
});
</script>
