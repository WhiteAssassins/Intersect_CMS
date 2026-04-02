<?php
if (isset($sms) && $tipo == 'error') {
    echo '<div class="alert alert-info text-center">' . html_escape($sms) . '</div>';
}
if (isset($error)) {
    echo '<div class="alert alert-info text-center">' . html_escape($error) . '</div>';
}

$primaryMetrics = array(
    array(
        'icon' => 'fas fa-users',
        'label' => '{usersregistered}',
        'value' => $dashboard_total_users,
        'tone' => 'gold',
    ),
    array(
        'icon' => 'fas fa-signal',
        'label' => '{useronline}',
        'value' => $dashboard_online_count,
        'tone' => 'ember',
    ),
    array(
        'icon' => 'fas fa-id-badge',
        'label' => '{totalplayers}',
        'value' => $dashboard_total_players,
        'tone' => 'copper',
    ),
    array(
        'icon' => 'fas fa-server',
        'label' => '{cps}',
        'value' => $dashboard_cps,
        'tone' => 'rose',
    ),
);

$systemMetrics = array(
    array(
        'icon' => 'fas fa-memory',
        'label' => '{ram}',
        'value' => $ram_used_gb . '/' . $ram_total_gb . 'GB',
        'tone' => 'gold',
    ),
    array(
        'icon' => 'fas fa-hdd',
        'label' => '{hdd}',
        'value' => $disk_used_gb . '/' . $disk_total_gb . 'GB',
        'tone' => 'ember',
    ),
    array(
        'icon' => 'fas fa-microchip',
        'label' => '{cpu}',
        'value' => $cpu_load_percent . '%',
        'tone' => 'copper',
    ),
    array(
        'icon' => 'fas fa-code-branch',
        'label' => '{version}',
        'value' => $dashboard_version,
        'tone' => 'rose',
    ),
);
?>

<main class="admin-shell">
  <section class="admin-header">
    <div class="admin-header__copy">
      <span class="admin-header__eyebrow">{admin_dashboard_eyebrow}</span>
      <h1 class="admin-header__title">{admin_dashboard_title}</h1>
      <p class="admin-header__text">{admin_dashboard_text}</p>
    </div>

    <div class="admin-header__status cards-novo">
      <span class="admin-header__status-label">{site_title}</span>
      <strong class="admin-header__status-value"><?php echo $dashboard_version; ?></strong>
      <span class="admin-header__status-meta">{version}</span>
      <span class="admin-header__status-meta">
        API:
        <?php
        if (!$dashboard_api_configured) {
            echo 'no configurada';
        } elseif ($dashboard_api_online && !$dashboard_api_stale) {
            echo $dashboard_api_cached ? 'cache OK' : 'en vivo';
        } elseif ($dashboard_api_stale) {
            echo 'cache degradada';
        } else {
            echo 'sin respuesta';
        }
        ?>
      </span>
    </div>
  </section>

  <section class="admin-section">
    <div class="admin-section__heading">
      <div>
        <span class="admin-section__eyebrow">{statistics}</span>
        <h2 class="admin-section__title">{admin_metrics_title}</h2>
      </div>
      <p class="admin-section__text">{admin_metrics_text}</p>
    </div>

    <div class="admin-kpi-grid">
      <?php foreach ($primaryMetrics as $metric) { ?>
        <article class="admin-kpi admin-kpi--<?php echo $metric['tone']; ?>">
          <span class="admin-kpi__icon"><i class="<?php echo $metric['icon']; ?>"></i></span>
          <div class="admin-kpi__body">
            <span class="admin-kpi__label"><?php echo $metric['label']; ?></span>
            <strong class="admin-kpi__value"><?php echo $metric['value']; ?></strong>
          </div>
        </article>
      <?php } ?>
    </div>
  </section>

  <section class="admin-section">
    <div class="admin-panel admin-panel--chart">
      <div class="admin-panel__header">
        <div>
          <span class="admin-section__eyebrow">{statistics}</span>
          <h2 class="admin-panel__title">{admin_chart_title}</h2>
        </div>
        <p class="admin-panel__text">{admin_chart_text}</p>
      </div>
      <div class="admin-panel__body">
        <canvas id="lineChart" class="admin-panel__chart" height="96"></canvas>
      </div>
    </div>
  </section>

  <section class="admin-section admin-section--tight">
    <div class="admin-kpi-grid admin-kpi-grid--system">
      <?php foreach ($systemMetrics as $metric) { ?>
        <article class="admin-kpi admin-kpi--system admin-kpi--<?php echo $metric['tone']; ?>">
          <span class="admin-kpi__icon"><i class="<?php echo $metric['icon']; ?>"></i></span>
          <div class="admin-kpi__body">
            <span class="admin-kpi__label"><?php echo $metric['label']; ?></span>
            <strong class="admin-kpi__value"><?php echo $metric['value']; ?></strong>
          </div>
        </article>
      <?php } ?>
    </div>
  </section>
</main>
