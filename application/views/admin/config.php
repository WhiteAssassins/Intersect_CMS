<main class="admin-shell admin-shell--page">
  <section class="admin-section">
    <div class="admin-section__heading">
      <div>
        <span class="admin-section__eyebrow">{admin_sidebar_system}</span>
        <h2 class="admin-section__title">{config}</h2>
      </div>
      <p class="admin-section__text">{admin_metrics_text}</p>
    </div>

    <div class="admin-overview-grid">
      <article class="admin-overview-stat">
        <span class="admin-overview-stat__label">{gradient}</span>
        <strong class="admin-overview-stat__value">
          <span class="admin-color-chip" style="background: linear-gradient(135deg, <?php echo $config_color1; ?>, <?php echo $config_color2; ?>);"></span>
        </strong>
      </article>
      <article class="admin-overview-stat">
        <span class="admin-overview-stat__label">{configdownloadbutton}</span>
        <strong class="admin-overview-stat__value admin-overview-stat__value--compact"><?php echo $config_download !== '' ? 'ON' : 'OFF'; ?></strong>
      </article>
      <article class="admin-overview-stat">
        <span class="admin-overview-stat__label">{maintenance}</span>
        <strong class="admin-overview-stat__value admin-overview-stat__value--compact"><?php echo $config_maintenance_enabled ? 'ON' : 'OFF'; ?></strong>
      </article>
    </div>

    <div class="admin-config-grid">
      <article class="admin-config-card">
        <div class="admin-config-card__header">
          <span class="admin-config-card__icon"><i class="fas fa-fill-drip"></i></span>
          <h3>{gradient}</h3>
        </div>
        <form method="POST" action="<?php echo base_url('config/editcolors'); ?>" class="form-admin">
          <?php echo cms_csrf_field(); ?>
          <div class="admin-color-pair">
            <label class="admin-color-input">
              <span>Color 1</span>
              <input name="color1" type="color" value="<?php echo $config_color1; ?>">
            </label>
            <label class="admin-color-input">
              <span>Color 2</span>
              <input name="color2" type="color" value="<?php echo $config_color2; ?>">
            </label>
          </div>
          <button type="submit" class="admin-button admin-button--primary">{change}</button>
        </form>
      </article>

      <article class="admin-config-card">
        <div class="admin-config-card__header">
          <span class="admin-config-card__icon"><i class="fas fa-chart-line"></i></span>
          <h3>{analytics}</h3>
        </div>
        <form method="POST" action="<?php echo base_url('config/analitycs'); ?>" class="form-admin">
          <?php echo cms_csrf_field(); ?>
          <input type="text" class="form-control" name="google" placeholder="G-TAG" value="<?php echo $config_analytics; ?>">
          <button type="submit" class="admin-button admin-button--primary">{change}</button>
        </form>
      </article>

      <article class="admin-config-card">
        <div class="admin-config-card__header">
          <span class="admin-config-card__icon"><i class="fas fa-download"></i></span>
          <h3>{configdownloadbutton}</h3>
        </div>
        <form method="POST" action="<?php echo base_url('config/download'); ?>" class="form-admin">
          <?php echo cms_csrf_field(); ?>
          <input type="text" class="form-control" name="link" placeholder="Link" value="<?php echo $config_download; ?>">
          <button type="submit" class="admin-button admin-button--primary">{change}</button>
        </form>
      </article>

      <article class="admin-config-card">
        <div class="admin-config-card__header">
          <span class="admin-config-card__icon"><i class="fas fa-tools"></i></span>
          <h3>{maintenance}</h3>
        </div>
        <div class="form-admin">
          <?php if (!$config_maintenance_enabled) { ?>
            <a href="<?php echo base_url('config/mantact'); ?>" class="admin-button admin-button--primary">{activate}</a>
          <?php } else { ?>
            <a href="<?php echo base_url('config/mantdes'); ?>" class="admin-button admin-button--danger">{deactivate}</a>
          <?php } ?>
        </div>
      </article>

      <article class="admin-config-card">
        <div class="admin-config-card__header">
          <span class="admin-config-card__icon"><i class="fas fa-balance-scale"></i></span>
          <h3>{changelegal}</h3>
        </div>
        <div class="admin-editor__actions">
          <a href="<?php echo base_url('config/legal'); ?>" class="admin-button admin-button--primary">{change}</a>
          <a href="<?php echo base_url('config/terms'); ?>" class="admin-button admin-button--ghost">{changeterms}</a>
          <a href="<?php echo base_url('config/privacity'); ?>" class="admin-button admin-button--ghost">{changeprivacity}</a>
        </div>
      </article>

      <article class="admin-config-card">
        <div class="admin-config-card__header">
          <span class="admin-config-card__icon"><i class="fas fa-th-large"></i></span>
          <h3>{editmenus}</h3>
        </div>
        <div class="admin-editor__actions">
          <a href="<?php echo base_url('config/menus'); ?>" class="admin-button admin-button--primary">{editmenus}</a>
        </div>
      </article>

      <article class="admin-config-card">
        <div class="admin-config-card__header">
          <span class="admin-config-card__icon"><i class="fas fa-language"></i></span>
          <h3>{editlang}</h3>
        </div>
        <form method="POST" action="<?php echo base_url('config/changelang'); ?>" class="form-admin">
          <?php echo cms_csrf_field(); ?>
          <select class="form-control" name="lang">
            <option value="" disabled selected>{chooselang}</option>
            <option value="es">ES</option>
            <option value="en">EN</option>
            <option value="tr">TR</option>
            <option value="jp">JP</option>
            <option value="de">DE</option>
            <option value="ru">RU</option>
          </select>
          <button type="submit" class="admin-button admin-button--primary">{change}</button>
        </form>
      </article>
    </div>
  </section>
</main>
