<main class="admin-shell admin-shell--page">
  <section class="admin-section">
    <div class="admin-section__heading">
      <div>
        <span class="admin-section__eyebrow">{admin_sidebar_system}</span>
        <h2 class="admin-section__title">{config}</h2>
      </div>
      <p class="admin-section__text">{admin_metrics_text}</p>
    </div>

    <?php if ($config_notice_message !== '') { ?>
      <div class="alert <?php echo $config_notice_type === 'error' ? 'alert-info' : 'alert-success'; ?> mb-4">
        <?php echo html_escape($config_notice_message); ?>
      </div>
    <?php } ?>

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
          <span class="admin-config-card__icon"><i class="fas fa-window-maximize"></i></span>
          <div>
            <h3><?php echo html_escape($config_project_title); ?></h3>
            <p class="admin-form-card__text"><?php echo html_escape($config_project_text); ?></p>
          </div>
        </div>
        <form method="POST" action="<?php echo base_url('config/projectstate'); ?>" class="form-admin">
          <?php echo cms_csrf_field(); ?>
          <label class="admin-form-group">
            <span class="admin-form-group__label"><?php echo html_escape($config_project_base_url_label); ?></span>
            <input type="url" class="form-control" name="base_url" value="<?php echo html_escape($config_state_base_url); ?>" required>
          </label>
          <label class="admin-form-group">
            <span class="admin-form-group__label">{chooselang}</span>
            <select class="form-control" name="default_lang">
              <?php foreach ($config_language_options as $languageOption) { ?>
                <option value="<?php echo html_escape($languageOption['code']); ?>"<?php echo $languageOption['code'] === $config_state_default_lang ? ' selected' : ''; ?>>
                  <?php echo html_escape($languageOption['short'] . ' - ' . $languageOption['label']); ?>
                </option>
              <?php } ?>
            </select>
          </label>
          <label class="admin-form-group">
            <span class="admin-form-group__label"><?php echo html_escape($config_project_download_label); ?></span>
            <input type="url" class="form-control" name="download_url" placeholder="https://..." value="<?php echo html_escape($config_state_download_url); ?>">
          </label>
          <label class="admin-form-group">
            <span class="admin-form-group__label"><?php echo html_escape($config_project_analytics_label); ?></span>
            <input type="text" class="form-control" name="analytics_id" placeholder="G-XXXXXXXXXX" value="<?php echo html_escape($config_state_analytics_id); ?>">
          </label>
          <button type="submit" class="admin-button admin-button--primary">{change}</button>
        </form>
      </article>

      <article class="admin-config-card">
        <div class="admin-config-card__header">
          <span class="admin-config-card__icon"><i class="fas fa-user-shield"></i></span>
          <div>
            <h3><?php echo html_escape($config_admin_title); ?></h3>
            <p class="admin-form-card__text"><?php echo html_escape($config_admin_text); ?></p>
          </div>
        </div>
        <form method="POST" action="<?php echo base_url('config/adminstate'); ?>" class="form-admin">
          <?php echo cms_csrf_field(); ?>
          <label class="admin-form-group">
            <span class="admin-form-group__label"><?php echo html_escape($config_admin_user_label); ?></span>
            <input type="text" class="form-control" name="admin_user" value="<?php echo html_escape($config_state_admin_user); ?>" required>
          </label>
          <label class="admin-form-group">
            <span class="admin-form-group__label"><?php echo html_escape($config_admin_email_label); ?></span>
            <input type="email" class="form-control" name="admin_email" value="<?php echo html_escape($config_state_admin_email); ?>" required>
          </label>
          <label class="admin-form-group">
            <span class="admin-form-group__label"><?php echo html_escape($config_admin_password_label); ?></span>
            <input type="password" class="form-control" name="admin_pass" placeholder="<?php echo html_escape($config_secret_placeholder); ?>" autocomplete="new-password">
          </label>
          <label class="admin-form-group">
            <span class="admin-form-group__label"><?php echo html_escape($config_admin_password_confirm_label); ?></span>
            <input type="password" class="form-control" name="admin_pass_confirm" placeholder="<?php echo html_escape($config_secret_placeholder); ?>" autocomplete="new-password">
          </label>
          <button type="submit" class="admin-button admin-button--primary">{change}</button>
        </form>
      </article>

      <article class="admin-config-card">
        <div class="admin-config-card__header">
          <span class="admin-config-card__icon"><i class="fas fa-database"></i></span>
          <div>
            <h3><?php echo html_escape($config_database_title); ?></h3>
            <p class="admin-form-card__text"><?php echo html_escape($config_database_text); ?></p>
          </div>
        </div>
        <form method="POST" action="<?php echo base_url('config/databasestate'); ?>" class="form-admin">
          <?php echo cms_csrf_field(); ?>
          <div class="admin-color-pair">
            <label class="admin-form-group">
              <span class="admin-form-group__label"><?php echo html_escape($config_database_host_label); ?></span>
              <input type="text" class="form-control" name="db_host" value="<?php echo html_escape($config_state_db_host); ?>" required>
            </label>
            <label class="admin-form-group">
              <span class="admin-form-group__label"><?php echo html_escape($config_database_port_label); ?></span>
              <input type="number" min="1" class="form-control" name="db_port" value="<?php echo html_escape($config_state_db_port); ?>" required>
            </label>
          </div>
          <label class="admin-form-group">
            <span class="admin-form-group__label"><?php echo html_escape($config_database_name_label); ?></span>
            <input type="text" class="form-control" name="db_name" value="<?php echo html_escape($config_state_db_name); ?>" required>
          </label>
          <label class="admin-form-group">
            <span class="admin-form-group__label"><?php echo html_escape($config_database_user_label); ?></span>
            <input type="text" class="form-control" name="db_user" value="<?php echo html_escape($config_state_db_user); ?>" required>
          </label>
          <label class="admin-form-group">
            <span class="admin-form-group__label"><?php echo html_escape($config_database_password_label); ?></span>
            <input type="password" class="form-control" name="db_pass" placeholder="<?php echo html_escape($config_secret_placeholder); ?>" autocomplete="new-password">
          </label>
          <button type="submit" class="admin-button admin-button--primary">{change}</button>
        </form>
      </article>

      <article class="admin-config-card">
        <div class="admin-config-card__header">
          <span class="admin-config-card__icon"><i class="fas fa-network-wired"></i></span>
          <div>
            <h3><?php echo html_escape($config_integrations_title); ?></h3>
            <p class="admin-form-card__text"><?php echo html_escape($config_integrations_text); ?></p>
          </div>
        </div>
        <form method="POST" action="<?php echo base_url('config/integrationstate'); ?>" class="form-admin">
          <?php echo cms_csrf_field(); ?>
          <label class="admin-form-group">
            <span class="admin-form-group__label"><?php echo html_escape($config_api_host_label); ?></span>
            <input type="text" class="form-control" name="api_ip" value="<?php echo html_escape($config_state_api_ip); ?>">
          </label>
          <label class="admin-form-group">
            <span class="admin-form-group__label"><?php echo html_escape($config_api_user_label); ?></span>
            <input type="text" class="form-control" name="api_user" value="<?php echo html_escape($config_state_api_user); ?>">
          </label>
          <label class="admin-form-group">
            <span class="admin-form-group__label"><?php echo html_escape($config_api_password_label); ?></span>
            <input type="password" class="form-control" name="api_pass" placeholder="<?php echo html_escape($config_secret_placeholder); ?>" autocomplete="new-password">
          </label>
          <div class="admin-color-pair">
            <label class="admin-form-group">
              <span class="admin-form-group__label"><?php echo html_escape($config_api_cache_ttl_label); ?></span>
              <input type="number" min="5" class="form-control" name="api_cache_ttl" value="<?php echo html_escape($config_state_api_cache_ttl); ?>" required>
            </label>
            <label class="admin-form-group">
              <span class="admin-form-group__label"><?php echo html_escape($config_api_stale_cache_ttl_label); ?></span>
              <input type="number" min="5" class="form-control" name="api_stale_cache_ttl" value="<?php echo html_escape($config_state_api_stale_cache_ttl); ?>" required>
            </label>
          </div>
          <label class="admin-form-group">
            <span class="admin-form-group__label"><?php echo html_escape($config_qvapay_id_label); ?></span>
            <input type="text" class="form-control" name="qvapay_id" value="<?php echo html_escape($config_state_qvapay_id); ?>">
          </label>
          <label class="admin-form-group">
            <span class="admin-form-group__label"><?php echo html_escape($config_qvapay_secret_label); ?></span>
            <input type="password" class="form-control" name="qvapay_secret" placeholder="<?php echo html_escape($config_secret_placeholder); ?>" autocomplete="new-password">
          </label>
          <label class="admin-form-group">
            <span class="admin-form-group__label"><?php echo html_escape($config_support_email_label); ?></span>
            <input type="email" class="form-control" name="support_email" value="<?php echo html_escape($config_state_support_email); ?>">
          </label>
          <label class="admin-form-group">
            <span class="admin-form-group__label"><?php echo html_escape($config_support_password_label); ?></span>
            <input type="password" class="form-control" name="support_email_password" placeholder="<?php echo html_escape($config_secret_placeholder); ?>" autocomplete="new-password">
          </label>
          <button type="submit" class="admin-button admin-button--primary">{change}</button>
        </form>
      </article>

      <article class="admin-config-card">
        <div class="admin-config-card__header">
          <span class="admin-config-card__icon"><i class="fas fa-lock"></i></span>
          <div>
            <h3><?php echo html_escape($config_security_title); ?></h3>
            <p class="admin-form-card__text"><?php echo html_escape($config_security_text); ?></p>
          </div>
        </div>
        <form method="POST" action="<?php echo base_url('config/securitystate'); ?>" class="form-admin">
          <?php echo cms_csrf_field(); ?>
          <label class="admin-form-group">
            <span class="admin-form-group__label"><?php echo html_escape($config_session_path_label); ?></span>
            <input type="text" class="form-control" name="session_path" value="<?php echo html_escape($config_state_session_path); ?>" required>
          </label>
          <label class="admin-form-group">
            <span class="admin-form-group__label"><?php echo html_escape($config_encryption_key_label); ?></span>
            <input type="text" class="form-control" name="encryption_key" placeholder="<?php echo html_escape($config_secret_placeholder); ?>" autocomplete="off">
          </label>
          <label class="admin-checkbox">
            <input type="checkbox" name="csrf_protection" value="1"<?php echo $config_state_csrf_enabled ? ' checked' : ''; ?>>
            <span><?php echo html_escape($config_csrf_label); ?></span>
          </label>
          <button type="submit" class="admin-button admin-button--primary">{change}</button>
        </form>
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
    </div>
  </section>
</main>
