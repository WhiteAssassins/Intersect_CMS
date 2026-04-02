<main class="userpanel-shell">
  <section class="userpanel-hero">
    <div class="container">
      <div class="userpanel-hero__grid">
        <div class="userpanel-hero__copy">
          <span class="userpanel-hero__eyebrow">Intersect CMS</span>
          <h1 class="userpanel-hero__title"><?php echo html_escape($panel_username); ?></h1>
          <div class="userpanel-hero__balance">
            <span class="userpanel-hero__balance-label">{balanceavailable}</span>
            <strong class="userpanel-hero__balance-value">$<?php echo number_format((float) $panel_balance, 2, '.', ''); ?></strong>
          </div>
          <div class="userpanel-hero__actions">
            <a href="<?php echo base_url('userpanel/recharge'); ?>" class="home-btn home-btn--primary">
              <i class="fas fa-plus-circle"></i>
              <span>{recharge}</span>
            </a>
            <a href="<?php echo base_url('userpanel/feedback'); ?>" class="home-btn home-btn--ghost">
              <i class="fas fa-life-ring"></i>
              <span>{feedback}</span>
            </a>
            <?php if (!empty($panel_is_admin)) { ?>
              <a href="<?php echo base_url('admin'); ?>" class="home-btn home-btn--ghost">
                <i class="fas fa-tools"></i>
                <span>{dashboard}</span>
              </a>
            <?php } ?>
          </div>
        </div>

        <div class="userpanel-hero__stats">
          <article class="userpanel-stat">
            <span class="userpanel-stat__label">{email}</span>
            <strong class="userpanel-stat__value userpanel-stat__value--compact"><?php echo html_escape($panel_email !== '' ? $panel_email : '--'); ?></strong>
          </article>
          <article class="userpanel-stat">
            <span class="userpanel-stat__label">{feedback}</span>
            <strong class="userpanel-stat__value"><?php echo (int) $panel_total_tickets; ?></strong>
          </article>
          <article class="userpanel-stat">
            <span class="userpanel-stat__label">{userpanel_open_label}</span>
            <strong class="userpanel-stat__value"><?php echo (int) $panel_open_tickets; ?></strong>
          </article>
          <article class="userpanel-stat">
            <span class="userpanel-stat__label">{userpanel_closed_label}</span>
            <strong class="userpanel-stat__value"><?php echo (int) $panel_closed_tickets; ?></strong>
          </article>
        </div>
      </div>
    </div>
  </section>

  <section class="userpanel-workspace">
    <div class="container">
      <div class="userpanel-grid">
        <article class="userpanel-card userpanel-card--security">
          <div class="userpanel-card__header">
            <span class="userpanel-card__icon"><i class="fas fa-shield-alt"></i></span>
            <div>
              <span class="userpanel-card__eyebrow">{password}</span>
              <h2 class="userpanel-card__title">{changepassword}</h2>
            </div>
          </div>

          <form method="POST" action="<?php echo base_url('userpanel/changepassword'); ?>" class="userpanel-form" id="form_changepassword">
            <?php echo cms_csrf_field(); ?>
            <div class="userpanel-form__grid">
              <input type="password" class="form-control userpanel-form__input" name="oldpassword" placeholder="{oldpassword}" required>
              <input type="password" class="form-control userpanel-form__input" name="newpassword" placeholder="{newpassword}" minlength="6" required>
              <input type="password" class="form-control userpanel-form__input" name="confirmnewpassword" placeholder="{confirmnewpassword}" minlength="6" required>
            </div>
            <div class="userpanel-form__actions">
              <button type="submit" class="admin-button admin-button--primary">{change}</button>
              <button type="reset" class="admin-button admin-button--ghost">{reset}</button>
            </div>
          </form>
        </article>

        <aside class="userpanel-side">
          <article class="userpanel-card">
            <div class="userpanel-card__header">
              <span class="userpanel-card__icon"><i class="fas fa-user-circle"></i></span>
              <div>
                <span class="userpanel-card__eyebrow">{userpanel_session_label}</span>
                <h2 class="userpanel-card__title"><?php echo html_escape($panel_username); ?></h2>
              </div>
            </div>

            <div class="userpanel-meta">
              <div class="userpanel-meta__row">
                <span>OS</span>
                <strong><?php echo html_escape($panel_os); ?></strong>
              </div>
              <div class="userpanel-meta__row">
                <span>IP</span>
                <strong><?php echo html_escape($panel_ip); ?></strong>
              </div>
              <div class="userpanel-meta__row">
                <span>{browser}</span>
                <strong><?php echo html_escape($panel_browser); ?></strong>
              </div>
              <div class="userpanel-meta__row">
                <span>{email}</span>
                <strong><?php echo html_escape($panel_email !== '' ? $panel_email : '--'); ?></strong>
              </div>
            </div>
          </article>

          <article class="userpanel-card">
            <div class="userpanel-card__header">
              <span class="userpanel-card__icon"><i class="fas fa-bolt"></i></span>
              <div>
                <span class="userpanel-card__eyebrow">{userpanel_actions_label}</span>
                <h2 class="userpanel-card__title">{userpanel_quick_title}</h2>
              </div>
            </div>

            <div class="userpanel-links">
              <a href="<?php echo base_url('userpanel/recharge'); ?>" class="userpanel-link">
                <span class="userpanel-link__icon"><i class="fas fa-wallet"></i></span>
                <span class="userpanel-link__content">
                  <strong>{recharge}</strong>
                  <small>{balanceavailable}</small>
                </span>
              </a>

              <a href="<?php echo base_url('userpanel/feedback'); ?>" class="userpanel-link">
                <span class="userpanel-link__icon"><i class="fas fa-ticket-alt"></i></span>
                <span class="userpanel-link__content">
                  <strong>{feedback}</strong>
                  <small><?php echo (int) $panel_total_tickets; ?></small>
                </span>
              </a>
            </div>
          </article>
        </aside>
      </div>
    </div>
  </section>
</main>
