<?php
require FCPATH.'vendor/autoload.php';

use GuzzleHttp\Client;

$currentController = strtolower((string) $this->uri->segment(1));
$currentMethod = strtolower((string) $this->uri->segment(2));

if ($currentController === '') {
    $currentController = 'home';
}

if ($currentMethod === '') {
    $currentMethod = $currentController === 'admin' ? 'index' : '';
}

$hasUpdateAvailable = false;
$availableVersion = '';
$version = '0.8';

try {
    $client = new Client(array('timeout' => 2.5));
    $response = $client->request('GET', 'http://novo.aewhitedevs.com/api/cms');
    $body = json_decode((string) $response->getBody(), true);
    if (!empty($body['version']) && version_compare((string) $body['version'], $version, '>')) {
        $hasUpdateAvailable = true;
        $availableVersion = (string) $body['version'];
    }
} catch (Exception $exception) {
    $hasUpdateAvailable = false;
}

$isRoute = function ($controller, $method = '') use ($currentController, $currentMethod) {
    if ($currentController !== $controller) {
        return false;
    }

    if ($method === '') {
        return true;
    }

    return $currentMethod === $method;
};
?>

<button type="button" class="btn admin-sidebar-toggle" aria-controls="slide-out" aria-expanded="false" aria-label="Toggle admin navigation">
  <i class="fas fa-bars"></i>
</button>

<div id="slide-out" class="admin-sidebar">
  <div class="admin-sidebar__backdrop"></div>
  <div class="admin-sidebar__shell">
    <div class="admin-sidebar__brand">
      <a class="admin-sidebar__brand-link" href="<?php echo base_url('admin'); ?>">
        <span class="admin-sidebar__brand-mark">
          <img src="<?php echo base_url('public/favicon/favicon.svg'); ?>" alt="{site_title}">
        </span>
        <span class="admin-sidebar__brand-copy">
          <span class="admin-sidebar__brand-title">{site_title}</span>
          <span class="admin-sidebar__brand-subtitle">{site_nav_subtitle}</span>
        </span>
      </a>
      <div class="admin-sidebar__brand-meta">
        <span class="admin-sidebar__brand-badge">{dashboard}</span>
        <a class="admin-sidebar__brand-exit" href="<?php echo base_url(); ?>">
          <i class="fas fa-external-link-alt"></i>
          <span>{admin_sidebar_back_to_site}</span>
        </a>
      </div>
    </div>

    <div class="admin-sidebar__scroll custom-scrollbar">
      <div class="admin-sidebar__section">
        <span class="admin-sidebar__section-title">{admin_sidebar_overview}</span>
        <a href="<?php echo base_url('home'); ?>" class="admin-sidebar__link<?php echo $isRoute('home') ? ' admin-sidebar__link--active' : ''; ?>">
          <i class="fas fa-home"></i>
          <span>{home}</span>
        </a>
        <a href="<?php echo base_url('admin'); ?>" class="admin-sidebar__link<?php echo $isRoute('admin', 'index') ? ' admin-sidebar__link--active' : ''; ?>">
          <i class="fas fa-chart-line"></i>
          <span>{dashboard}</span>
        </a>
        <a href="<?php echo base_url('admin/commands'); ?>" class="admin-sidebar__link<?php echo $isRoute('admin', 'commands') ? ' admin-sidebar__link--active' : ''; ?>">
          <i class="fas fa-terminal"></i>
          <span>{commands}</span>
        </a>
      </div>

      <div class="admin-sidebar__section">
        <span class="admin-sidebar__section-title">{admin_sidebar_content}</span>
        <a href="<?php echo base_url('admin/news'); ?>" class="admin-sidebar__link<?php echo $isRoute('admin', 'news') || $isRoute('admin', 'editnews') ? ' admin-sidebar__link--active' : ''; ?>">
          <i class="fas fa-newspaper"></i>
          <span>{news}</span>
        </a>
        <a href="<?php echo base_url('admin/shop'); ?>" class="admin-sidebar__link<?php echo $isRoute('admin', 'shop') || $isRoute('admin', 'editproduct') ? ' admin-sidebar__link--active' : ''; ?>">
          <i class="fas fa-shopping-bag"></i>
          <span>{shop}</span>
        </a>
        <a href="<?php echo base_url('admin/changelog'); ?>" class="admin-sidebar__link<?php echo $isRoute('admin', 'changelog') ? ' admin-sidebar__link--active' : ''; ?>">
          <i class="fas fa-scroll"></i>
          <span>{changelog}</span>
        </a>
      </div>

      <div class="admin-sidebar__section">
        <span class="admin-sidebar__section-title">{admin_sidebar_world}</span>
        <a href="<?php echo base_url('admin/objects'); ?>" class="admin-sidebar__link<?php echo $isRoute('admin', 'objects') ? ' admin-sidebar__link--active' : ''; ?>">
          <i class="fas fa-box"></i>
          <span>{objects}</span>
        </a>
        <a href="<?php echo base_url('admin/maps'); ?>" class="admin-sidebar__link<?php echo $isRoute('admin', 'maps') ? ' admin-sidebar__link--active' : ''; ?>">
          <i class="fas fa-map-marked-alt"></i>
          <span>{maps}</span>
        </a>
        <a href="<?php echo base_url('admin/events'); ?>" class="admin-sidebar__link<?php echo $isRoute('admin', 'events') ? ' admin-sidebar__link--active' : ''; ?>">
          <i class="fas fa-calendar-alt"></i>
          <span>{events}</span>
        </a>
        <a href="<?php echo base_url('admin/quests'); ?>" class="admin-sidebar__link<?php echo $isRoute('admin', 'quests') ? ' admin-sidebar__link--active' : ''; ?>">
          <i class="fas fa-compass"></i>
          <span>{quests}</span>
        </a>
      </div>

      <div class="admin-sidebar__section">
        <span class="admin-sidebar__section-title">{admin_sidebar_community}</span>
        <a href="<?php echo base_url('admin/tickets'); ?>" class="admin-sidebar__link<?php echo $isRoute('admin', 'tickets') ? ' admin-sidebar__link--active' : ''; ?>">
          <i class="fas fa-ticket-alt"></i>
          <span>{tickets}</span>
        </a>
        <a href="<?php echo base_url('admin/adminaccounts'); ?>" class="admin-sidebar__link<?php echo $isRoute('admin', 'adminaccounts') ? ' admin-sidebar__link--active' : ''; ?>">
          <i class="fas fa-user-shield"></i>
          <span>{adminaccounts}</span>
        </a>
        <a href="<?php echo base_url('logs'); ?>" class="admin-sidebar__link<?php echo $isRoute('logs') ? ' admin-sidebar__link--active' : ''; ?>">
          <i class="fas fa-stream"></i>
          <span>{logs}</span>
        </a>
      </div>

      <div class="admin-sidebar__section">
        <span class="admin-sidebar__section-title">{admin_sidebar_system}</span>
        <a href="<?php echo base_url('config'); ?>" class="admin-sidebar__link<?php echo $isRoute('config') ? ' admin-sidebar__link--active' : ''; ?>">
          <i class="fas fa-cogs"></i>
          <span>{config}</span>
        </a>
        <a href="https://github.com/WhiteAssassins/Intersect_CMS" target="_blank" rel="noopener noreferrer" class="admin-sidebar__link admin-sidebar__link--external">
          <i class="fab fa-github"></i>
          <span>{admin_sidebar_source_code}</span>
        </a>
        <a href="https://github.com/WhiteAssassins/Intersect_CMS" target="_blank" rel="noopener noreferrer" class="admin-sidebar__link<?php echo $hasUpdateAvailable ? ' admin-sidebar__link--highlight' : ''; ?>">
          <i class="fas fa-code-branch"></i>
          <span>{updates}</span>
          <?php if ($hasUpdateAvailable) { ?>
            <span class="admin-sidebar__pill"><?php echo $availableVersion; ?> {available}</span>
          <?php } ?>
        </a>
        <a href="<?php echo base_url('home/logout'); ?>" class="admin-sidebar__link admin-sidebar__link--danger">
          <i class="fas fa-sign-out-alt"></i>
          <span>{disconnect}</span>
        </a>
      </div>
    </div>
  </div>
</div>
<button type="button" class="admin-sidebar-overlay" aria-label="Close admin navigation"></button>
<script>
  (function () {
    var body = document.body;
    var sidebar = document.getElementById('slide-out');
    var toggle = document.querySelector('.admin-sidebar-toggle');
    var overlay = document.querySelector('.admin-sidebar-overlay');
    var mobileQuery = window.matchMedia('(max-width: 991px)');

    body.classList.add('admin-layout');

    function closeSidebar() {
      sidebar.classList.remove('admin-sidebar--open');
      overlay.classList.remove('admin-sidebar-overlay--visible');
      toggle.setAttribute('aria-expanded', 'false');
    }

    function openSidebar() {
      sidebar.classList.add('admin-sidebar--open');
      overlay.classList.add('admin-sidebar-overlay--visible');
      toggle.setAttribute('aria-expanded', 'true');
    }

    function syncSidebarMode() {
      if (mobileQuery.matches) {
        body.classList.remove('admin-layout--desktop');
        closeSidebar();
      } else {
        body.classList.add('admin-layout--desktop');
        overlay.classList.remove('admin-sidebar-overlay--visible');
        toggle.setAttribute('aria-expanded', 'false');
      }
    }

    toggle.addEventListener('click', function () {
      if (!mobileQuery.matches) {
        return;
      }

      if (sidebar.classList.contains('admin-sidebar--open')) {
        closeSidebar();
      } else {
        openSidebar();
      }
    });

    overlay.addEventListener('click', closeSidebar);
    window.addEventListener('resize', syncSidebarMode);
    syncSidebarMode();
  }());
</script>
