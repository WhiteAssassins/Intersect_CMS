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
          <span class="admin-color-chip" style="background: linear-gradient(135deg, <?php echo html_escape($config_color1); ?>, <?php echo html_escape($config_color2); ?>);"></span>
        </strong>
      </article>
      <article class="admin-overview-stat">
        <span class="admin-overview-stat__label">{configdownloadbutton}</span>
        <strong class="admin-overview-stat__value admin-overview-stat__value--compact">
          <?php echo html_escape($config_download !== '' ? $config_download_enabled_label : $config_download_disabled_label); ?>
        </strong>
      </article>
      <article class="admin-overview-stat">
        <span class="admin-overview-stat__label">{maintenance}</span>
        <strong class="admin-overview-stat__value admin-overview-stat__value--compact">
          <?php echo html_escape($config_maintenance_enabled ? $config_maintenance_label : $config_maintenance_disabled_label); ?>
        </strong>
      </article>
      <article class="admin-overview-stat">
        <span class="admin-overview-stat__label">{api}</span>
        <strong class="admin-overview-stat__value admin-overview-stat__value--compact">
          <?php echo html_escape($config_api_status_badge); ?>
        </strong>
      </article>
    </div>

    <div class="admin-config-grid">
      <article class="admin-config-card">
        <div class="admin-config-card__header">
          <span class="admin-config-card__icon"><i class="fas fa-plug"></i></span>
          <div>
            <h3>{intersect_api}</h3>
            <p class="admin-form-card__text">{admin_config_api_text}</p>
          </div>
        </div>
        <div class="form-admin">
          <label class="admin-form-group">
            <span class="admin-form-group__label">{admin_config_api_status_label}</span>
            <input type="text" class="form-control" value="<?php echo html_escape($config_api_status_readonly); ?>" readonly>
          </label>
          <label class="admin-form-group">
            <span class="admin-form-group__label">{admin_config_api_last_sync_label}</span>
            <input type="text" class="form-control" value="<?php echo html_escape($config_api_last_sync); ?>" readonly>
          </label>
          <?php if ($config_api_message !== '') { ?>
            <label class="admin-form-group">
              <span class="admin-form-group__label">{detail}</span>
              <textarea class="form-control" rows="3" readonly><?php echo html_escape($config_api_message); ?></textarea>
            </label>
          <?php } ?>
        </div>
      </article>

      <article class="admin-config-card">
        <div class="admin-config-card__header">
          <span class="admin-config-card__icon"><i class="fas fa-fill-drip"></i></span>
          <div>
            <h3>{gradient}</h3>
            <p class="admin-form-card__text">{admin_config_color_text}</p>
          </div>
        </div>
        <form method="POST" action="<?php echo base_url('config/editcolors'); ?>" class="form-admin">
          <?php echo cms_csrf_field(); ?>
          <div class="admin-color-pair">
            <label class="admin-color-input">
              <span>{admin_config_color_one}</span>
              <input name="color1" type="color" value="<?php echo html_escape($config_color1); ?>">
            </label>
            <label class="admin-color-input">
              <span>{admin_config_color_two}</span>
              <input name="color2" type="color" value="<?php echo html_escape($config_color2); ?>">
            </label>
          </div>
          <button type="submit" class="admin-button admin-button--primary">{change}</button>
        </form>
      </article>

      <article class="admin-config-card">
        <div class="admin-config-card__header">
          <span class="admin-config-card__icon"><i class="fas fa-chart-line"></i></span>
          <div>
            <h3>{analytics}</h3>
            <p class="admin-form-card__text">{admin_config_analytics_text}</p>
          </div>
        </div>
        <form method="POST" action="<?php echo base_url('config/analitycs'); ?>" class="form-admin">
          <?php echo cms_csrf_field(); ?>
          <label class="admin-form-group">
            <span class="admin-form-group__label">{admin_config_analytics_id_label}</span>
            <input type="text" class="form-control" name="google" placeholder="G-XXXXXXXXXX" value="<?php echo html_escape($config_analytics); ?>">
          </label>
          <button type="submit" class="admin-button admin-button--primary">{change}</button>
        </form>
      </article>

      <article class="admin-config-card">
        <div class="admin-config-card__header">
          <span class="admin-config-card__icon"><i class="fas fa-download"></i></span>
          <div>
            <h3>{configdownloadbutton}</h3>
            <p class="admin-form-card__text">{admin_config_download_text}</p>
          </div>
        </div>
        <form method="POST" action="<?php echo base_url('config/download'); ?>" class="form-admin">
          <?php echo cms_csrf_field(); ?>
          <label class="admin-form-group">
            <span class="admin-form-group__label">{admin_config_download_url_label}</span>
            <input type="text" class="form-control" name="link" placeholder="https://..." value="<?php echo html_escape($config_download); ?>">
          </label>
          <button type="submit" class="admin-button admin-button--primary">{change}</button>
        </form>
      </article>

      <article class="admin-config-card">
        <div class="admin-config-card__header">
          <span class="admin-config-card__icon"><i class="fas fa-tools"></i></span>
          <div>
            <h3>{maintenance}</h3>
            <p class="admin-form-card__text">{admin_config_maintenance_text}</p>
          </div>
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
          <div>
            <h3>{changelegal}</h3>
            <p class="admin-form-card__text">{admin_config_legal_text}</p>
          </div>
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
          <div>
            <h3>{editmenus}</h3>
            <p class="admin-form-card__text">{admin_config_menus_text}</p>
          </div>
        </div>
        <div class="admin-editor__actions">
          <a href="<?php echo base_url('config/menus'); ?>" class="admin-button admin-button--primary">{editmenus}</a>
        </div>
      </article>

      <article class="admin-config-card">
        <div class="admin-config-card__header">
          <span class="admin-config-card__icon"><i class="fas fa-language"></i></span>
          <div>
            <h3>{editlang}</h3>
            <p class="admin-form-card__text">{admin_config_language_text}</p>
          </div>
        </div>
        <form method="POST" action="<?php echo base_url('config/changelang'); ?>" class="form-admin">
          <?php echo cms_csrf_field(); ?>
          <label class="admin-form-group">
            <span class="admin-form-group__label">{chooselang}</span>
            <select class="form-control" name="lang">
              <?php foreach ($config_language_options as $languageOption) { ?>
                <option value="<?php echo html_escape($languageOption['code']); ?>"<?php echo $languageOption['is_current'] ? ' selected' : ''; ?>>
                  <?php echo html_escape($languageOption['short'] . ' - ' . $languageOption['label']); ?>
                </option>
              <?php } ?>
            </select>
          </label>
          <button type="submit" class="admin-button admin-button--primary">{change}</button>
        </form>
      </article>
    </div>
  </section>
</main>
