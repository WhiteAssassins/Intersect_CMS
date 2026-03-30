<?php $downloadUrl = trim((string) $download_url); ?>
<nav class="navbar navbar-expand-lg navbar-dark navbar-novo site-nav">
  <div class="site-nav__shell">
    <a class="navbar-brand site-nav__brand" href="<?php echo base_url(); ?>">
      <span class="site-nav__brand-mark">
        <img src="<?php echo base_url('public/favicon/favicon.svg'); ?>" alt="{site_title}">
      </span>
      <span class="site-nav__brand-copy">
        <span class="site-nav__brand-title">{site_title}</span>
        <span class="site-nav__brand-subtitle">{site_nav_subtitle}</span>
      </span>
    </a>

    <button class="navbar-toggler site-nav__toggler" type="button" data-toggle="collapse" data-target="#siteNavContent"
      aria-controls="siteNavContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse site-nav__content" id="siteNavContent">
      <ul class="navbar-nav site-nav__links">
        <li class="nav-item">
          <a class="nav-link site-nav__link" href="<?php echo base_url('news'); ?>">{news}</a>
        </li>
        <li class="nav-item">
          <a class="nav-link site-nav__link" href="<?php echo base_url('shop'); ?>">{shop}</a>
        </li>
        <li class="nav-item">
          <a class="nav-link site-nav__link" href="<?php echo base_url('playersonline'); ?>">{onlineplayers}</a>
        </li>
        <li class="nav-item">
          <a class="nav-link site-nav__link" href="<?php echo base_url('players'); ?>">{listplayers}</a>
        </li>
        <li class="nav-item">
          <a class="nav-link site-nav__link" href="<?php echo base_url('users'); ?>">{listusers}</a>
        </li>
        <li class="nav-item">
          <a class="nav-link site-nav__link" href="<?php echo base_url('changelog'); ?>">{changelog}</a>
        </li>
      </ul>

      <div class="site-nav__actions">
        <div class="nav-item dropdown site-nav__dropdown">
          <a class="nav-link dropdown-toggle site-nav__link site-nav__link--dropdown" id="siteNavLanguage" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">{language}</a>
          <div class="dropdown-menu dropdown-menu-right site-nav__menu" aria-labelledby="siteNavLanguage">
            <a class="dropdown-item" href="<?php echo base_url('langs/es'); ?>">ES</a>
            <a class="dropdown-item" href="<?php echo base_url('langs/en'); ?>">EN</a>
            <a class="dropdown-item" href="<?php echo base_url('langs/tr'); ?>">TR</a>
            <a class="dropdown-item" href="<?php echo base_url('langs/jp'); ?>">JP</a>
            <a class="dropdown-item" href="<?php echo base_url('langs/de'); ?>">DE</a>
            <a class="dropdown-item" href="<?php echo base_url('langs/ru'); ?>">RU</a>
            <a class="dropdown-item" href="<?php echo base_url('langs/zh'); ?>">ZH</a>
            <a class="dropdown-item" href="<?php echo base_url('langs/fr'); ?>">FR</a>
            <a class="dropdown-item" href="<?php echo base_url('langs/pt'); ?>">PT</a>
            <a class="dropdown-item" href="<?php echo base_url('langs/hi'); ?>">HI</a>
            <a class="dropdown-item" href="<?php echo base_url('langs/ar'); ?>">AR</a>
          </div>
        </div>

        <?php if ($downloadUrl !== '') { ?>
          <a href="<?php echo $downloadUrl; ?>" class="site-nav__download" target="_blank" rel="noopener noreferrer">
            <i class="fas fa-download"></i>
            <span>{downloadbutton}</span>
          </a>
        <?php } ?>

        <?php if ($this->session->userdata('login') == false) { ?>
          <div class="site-nav__auth-group">
            <a class="site-nav__auth site-nav__auth--ghost btn_modal_reg">{register}</a>
            <a class="site-nav__auth site-nav__auth--solid btn_modal_login">{login}</a>
          </div>
        <?php } else { ?>
          <div class="nav-item dropdown site-nav__dropdown">
            <a class="nav-link dropdown-toggle site-nav__profile" id="siteNavProfile" data-toggle="dropdown"
              aria-haspopup="true" aria-expanded="false">
              <span class="site-nav__profile-icon"><i class="fas fa-user"></i></span>
              <span class="site-nav__profile-text">{current_user}</span>
            </a>
            <div class="dropdown-menu dropdown-menu-right site-nav__menu" aria-labelledby="siteNavProfile">
              <a class="dropdown-item" href="<?php echo base_url('userpanel'); ?>"><i class="fas fa-cog mr-2"></i>{paneluser}</a>
              <?php if ($this->session->userdata('rol') == 1) { ?>
                <a class="dropdown-item" href="<?php echo base_url('admin'); ?>"><i class="fas fa-tools mr-2"></i>{administrativepanel}</a>
              <?php } ?>
              <a class="dropdown-item btn_modal_newticket"><i class="fas fa-headset mr-2"></i>{feedback}</a>
              <a class="dropdown-item" href="<?php echo base_url('home/logout'); ?>"><i class="fas fa-sign-out-alt mr-2"></i>{disconnect}</a>
            </div>
          </div>
        <?php } ?>
      </div>
    </div>
  </div>
</nav>
<?php
    if(isset($sms) && $tipo == 'error'){
        echo '<div class="alert alert-info text-center">'.$sms.'</div>';
    };
    if(isset($error)){
        echo '<div class="alert alert-info text-center">'.$error.'</div>';
    };
?>
