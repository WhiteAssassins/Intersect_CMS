<main class="public-page public-page--stack onlinetracker-shell">
  <section class="onlinetracker-hero">
    <div class="onlinetracker-hero__grid">
      <div class="onlinetracker-hero__copy">
        <span class="onlinetracker-hero__eyebrow"><?php echo html_escape($online_hero_eyebrow); ?></span>
        <h1 class="onlinetracker-hero__title"><?php echo html_escape($online_hero_title); ?></h1>
        <p class="onlinetracker-hero__text"><?php echo html_escape($online_hero_text); ?></p>

        <div class="onlinetracker-hero__actions">
          <span class="onlinetracker-chip">
            <i class="fas fa-signal"></i>
            <?php echo html_escape($online_api_badge); ?>
          </span>
          <span class="onlinetracker-chip onlinetracker-chip--muted">
            <i class="fas fa-bolt"></i>
            <?php echo (int) $online_player_count; ?> {playersonline}
          </span>
          <span class="onlinetracker-chip onlinetracker-chip--muted">
            <i class="fas fa-map-marked-alt"></i>
            <?php echo (int) $online_maps_active_count; ?> <?php echo html_escape($online_maps_active_label); ?>
          </span>
        </div>
      </div>

      <div class="onlinetracker-hero__stats">
        <article class="onlinetracker-stat">
          <span class="onlinetracker-stat__label">{playersonline}</span>
          <strong class="onlinetracker-stat__value"><?php echo (int) $online_player_count; ?></strong>
        </article>
        <article class="onlinetracker-stat">
          <span class="onlinetracker-stat__label"><?php echo html_escape($online_maps_active_label); ?></span>
          <strong class="onlinetracker-stat__value"><?php echo (int) $online_maps_active_count; ?></strong>
        </article>
        <article class="onlinetracker-stat">
          <span class="onlinetracker-stat__label"><?php echo html_escape($online_average_exp_label); ?></span>
          <strong class="onlinetracker-stat__value"><?php echo html_escape(number_format((float) $online_average_exp)); ?></strong>
        </article>
        <article class="onlinetracker-stat">
          <span class="onlinetracker-stat__label"><?php echo html_escape($online_classes_active_label); ?></span>
          <strong class="onlinetracker-stat__value"><?php echo (int) $online_classes_active_count; ?></strong>
        </article>
      </div>
    </div>
  </section>

  <section class="onlinetracker-overview">
    <div class="onlinetracker-overview__grid">
      <article class="onlinetracker-card">
        <div class="onlinetracker-card__header">
          <span class="onlinetracker-card__icon"><i class="fas fa-broadcast-tower"></i></span>
          <div>
            <span class="onlinetracker-card__eyebrow"><?php echo html_escape($online_stats_title); ?></span>
            <h2 class="onlinetracker-card__title"><?php echo html_escape($online_api_status); ?></h2>
          </div>
        </div>
        <p class="onlinetracker-card__text"><?php echo html_escape($online_stats_text); ?></p>
        <div class="onlinetracker-meta">
          <div class="onlinetracker-meta__row">
            <span>{status}</span>
            <strong><?php echo html_escape($online_api_badge); ?></strong>
          </div>
          <div class="onlinetracker-meta__row">
            <span><?php echo html_escape($online_last_sync_label); ?></span>
            <strong><?php echo html_escape($online_api_last_sync); ?></strong>
          </div>
          <div class="onlinetracker-meta__row">
            <span><?php echo html_escape($online_top_map_label); ?></span>
            <strong><?php echo html_escape($online_top_map_name); ?><?php echo $online_top_map_count > 0 ? ' (' . (int) $online_top_map_count . ')' : ''; ?></strong>
          </div>
          <div class="onlinetracker-meta__row">
            <span><?php echo html_escape($online_total_exp_label); ?></span>
            <strong><?php echo html_escape(number_format((float) $online_total_exp)); ?></strong>
          </div>
        </div>
      </article>

      <article class="onlinetracker-card">
        <div class="onlinetracker-card__header">
          <span class="onlinetracker-card__icon"><i class="fas fa-crosshairs"></i></span>
          <div>
            <span class="onlinetracker-card__eyebrow"><?php echo html_escape($online_featured_title); ?></span>
            <h2 class="onlinetracker-card__title"><?php echo (int) $online_player_count; ?> <?php echo html_escape($online_player_word_label); ?></h2>
          </div>
        </div>
        <p class="onlinetracker-card__text"><?php echo html_escape($online_featured_text); ?></p>

        <div class="onlinetracker-leaders">
          <?php foreach ($online_player_featured_rows as $featuredRow) { ?>
            <div class="onlinetracker-leader">
              <span class="onlinetracker-leader__rank">#<?php echo (int) $featuredRow['rank']; ?></span>
              <div class="onlinetracker-leader__content">
                <strong><?php echo html_escape($featuredRow['name']); ?></strong>
                <small><?php echo html_escape($featuredRow['class_name']); ?> - <?php echo html_escape($featuredRow['map_name']); ?></small>
              </div>
              <span class="onlinetracker-state onlinetracker-state--<?php echo html_escape($featuredRow['gender_key']); ?>">
                <?php echo html_escape($featuredRow['exp_short']); ?> EXP
              </span>
            </div>
          <?php } ?>
        </div>

        <div class="onlinetracker-breakdown">
          <span class="onlinetracker-card__eyebrow"><?php echo html_escape($online_class_breakdown_label); ?></span>
          <div class="onlinetracker-tags">
            <?php if (!empty($online_class_rows)) { ?>
              <?php foreach ($online_class_rows as $classRow) { ?>
                <span class="onlinetracker-tag"><?php echo html_escape($classRow['name']); ?> <strong><?php echo (int) $classRow['count']; ?></strong></span>
              <?php } ?>
            <?php } else { ?>
              <span class="onlinetracker-tag onlinetracker-tag--empty"><?php echo html_escape($online_no_classes_label); ?></span>
            <?php } ?>
          </div>
        </div>
      </article>
    </div>
  </section>

  <section class="onlinetracker-strip">
    <article class="onlinetracker-card onlinetracker-card--compact">
      <div class="onlinetracker-card__header">
        <span class="onlinetracker-card__icon"><i class="fas fa-fire"></i></span>
        <div>
          <span class="onlinetracker-card__eyebrow"><?php echo html_escape($online_hotspots_label); ?></span>
          <h2 class="onlinetracker-card__title"><?php echo html_escape($online_top_map_name); ?></h2>
        </div>
      </div>
      <div class="onlinetracker-tags">
        <?php if (!empty($online_hotspot_rows)) { ?>
          <?php foreach ($online_hotspot_rows as $hotspotRow) { ?>
            <span class="onlinetracker-tag"><?php echo html_escape($hotspotRow['name']); ?> <strong><?php echo (int) $hotspotRow['count']; ?></strong></span>
          <?php } ?>
        <?php } else { ?>
          <span class="onlinetracker-tag onlinetracker-tag--empty"><?php echo html_escape($online_no_hotspots_label); ?></span>
        <?php } ?>
      </div>
    </article>
  </section>

  <section class="onlinetracker-card onlinetracker-card--table">
    <div class="onlinetracker-table__top">
      <div>
        <span class="onlinetracker-card__eyebrow"><?php echo html_escape($online_table_title); ?></span>
        <h2 class="onlinetracker-card__title"><?php echo html_escape($online_table_text); ?></h2>
      </div>
      <div class="onlinetracker-table__summary">
        <span id="onlinetracker-visible-count"><?php echo (int) $online_player_count; ?></span>
        <small>
          <?php echo html_escape($online_showing_label); ?>
          <span id="onlinetracker-visible-inline"><?php echo (int) $online_player_count; ?></span>
          <?php echo html_escape($online_of_label); ?>
          <span id="onlinetracker-total-inline"><?php echo (int) $online_player_count; ?></span>
        </small>
      </div>
    </div>

    <div class="onlinetracker-filters">
      <label class="onlinetracker-filter">
        <span>{search}</span>
        <input id="onlinetracker-search" type="search" class="onlinetracker-filter__input" placeholder="<?php echo html_escape($online_search_placeholder); ?>">
      </label>

      <label class="onlinetracker-filter">
        <span>{map}</span>
        <select id="onlinetracker-map" class="onlinetracker-filter__select">
          <option value="all"><?php echo html_escape($online_filter_all_maps); ?></option>
          <?php foreach ($online_map_filter_rows as $mapRow) { ?>
            <option value="<?php echo html_escape($mapRow['name']); ?>"><?php echo html_escape($mapRow['name']); ?></option>
          <?php } ?>
        </select>
      </label>

      <label class="onlinetracker-filter">
        <span>{class}</span>
        <select id="onlinetracker-class" class="onlinetracker-filter__select">
          <option value="all"><?php echo html_escape($online_filter_all_classes); ?></option>
          <?php foreach ($online_class_filter_rows as $classRow) { ?>
            <option value="<?php echo html_escape($classRow['name']); ?>"><?php echo html_escape($classRow['name']); ?></option>
          <?php } ?>
        </select>
      </label>
    </div>

    <div class="onlinetracker-table-wrap">
      <table class="onlinetracker-table">
        <thead>
          <tr>
            <th>#</th>
            <th>{name}</th>
            <th>{class}</th>
            <th>{gender}</th>
            <th>{exp}</th>
            <th>{map}</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($online_player_rows as $row) { ?>
            <tr
              data-online-row
              data-search="<?php echo html_escape(strtolower($row['name'] . ' ' . $row['class_name'] . ' ' . $row['map_name'] . ' ' . $row['gender_label'])); ?>"
              data-map="<?php echo html_escape(strtolower($row['map_name'])); ?>"
              data-class="<?php echo html_escape(strtolower($row['class_name'])); ?>"
            >
              <td>
                <span class="onlinetracker-rank<?php echo $row['rank'] <= 3 ? ' onlinetracker-rank--top' : ''; ?>">
                  #<?php echo (int) $row['rank']; ?>
                </span>
              </td>
              <td>
                <div class="onlinetracker-name">
                  <strong><?php echo html_escape($row['name']); ?></strong>
                  <small><?php echo $row['featured'] ? html_escape($online_featured_title) : html_escape($online_stats_title); ?></small>
                </div>
              </td>
              <td>
                <div class="onlinetracker-secondary">
                  <strong><?php echo html_escape($row['class_name']); ?></strong>
                  <small><?php echo html_escape($row['map_name']); ?></small>
                </div>
              </td>
              <td>
                <span class="onlinetracker-pill onlinetracker-pill--<?php echo html_escape($row['gender_key']); ?>">
                  <?php echo html_escape($row['gender_label']); ?>
                </span>
              </td>
              <td>
                <div class="onlinetracker-exp">
                  <strong><?php echo html_escape($row['exp_label']); ?></strong>
                  <span class="onlinetracker-exp__bar">
                    <span style="width: <?php echo (int) $row['presence_progress']; ?>%;"></span>
                  </span>
                </div>
              </td>
              <td><?php echo html_escape($row['map_name']); ?></td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>

    <div id="onlinetracker-empty" class="onlinetracker-empty"<?php echo !empty($online_player_rows) ? ' hidden' : ''; ?>>
      <?php echo html_escape($online_empty_label); ?>
    </div>
  </section>
</main>

<script>
document.addEventListener('DOMContentLoaded', function () {
  var searchInput = document.getElementById('onlinetracker-search');
  var mapSelect = document.getElementById('onlinetracker-map');
  var classSelect = document.getElementById('onlinetracker-class');
  var rows = Array.prototype.slice.call(document.querySelectorAll('[data-online-row]'));
  var emptyState = document.getElementById('onlinetracker-empty');
  var visibleCount = document.getElementById('onlinetracker-visible-count');
  var visibleInline = document.getElementById('onlinetracker-visible-inline');
  var totalInline = document.getElementById('onlinetracker-total-inline');
  var totalCount = rows.length;

  function normalize(value) {
    return (value || '').toString().toLowerCase().trim();
  }

  function syncFilters() {
    var searchValue = normalize(searchInput.value);
    var mapValue = normalize(mapSelect.value);
    var classValue = normalize(classSelect.value);
    var matches = 0;

    rows.forEach(function (row) {
      var rowSearch = normalize(row.getAttribute('data-search'));
      var rowMap = normalize(row.getAttribute('data-map'));
      var rowClass = normalize(row.getAttribute('data-class'));
      var searchMatch = searchValue === '' || rowSearch.indexOf(searchValue) !== -1;
      var mapMatch = mapValue === 'all' || rowMap === mapValue;
      var classMatch = classValue === 'all' || rowClass === classValue;
      var isVisible = searchMatch && mapMatch && classMatch;

      row.hidden = !isVisible;
      if (isVisible) {
        matches += 1;
      }
    });

    visibleCount.textContent = matches.toString();
    visibleInline.textContent = matches.toString();
    totalInline.textContent = totalCount.toString();
    emptyState.hidden = matches !== 0;
    emptyState.textContent = '<?php echo addslashes($online_empty_label); ?>';
  }

  searchInput.addEventListener('input', syncFilters);
  mapSelect.addEventListener('change', syncFilters);
  classSelect.addEventListener('change', syncFilters);
  syncFilters();
});
</script>
