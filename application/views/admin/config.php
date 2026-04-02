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
        <strong class="admin-overview-stat__value admin-overview-stat__value--compact"><?php echo $config_download !== '' ? 'ON' : 'OFF'; ?></strong>
      </article>
      <article class="admin-overview-stat">
        <span class="admin-overview-stat__label">{maintenance}</span>
        <strong class="admin-overview-stat__value admin-overview-stat__value--compact"><?php echo $config_maintenance_enabled ? 'ON' : 'OFF'; ?></strong>
      </article>
      <article class="admin-overview-stat">
        <span class="admin-overview-stat__label">API</span>
        <strong class="admin-overview-stat__value admin-overview-stat__value--compact">
          <?php
          if (!$config_api_configured) {
              echo 'OFF';
          } elseif ($config_api_online && !$config_api_stale) {
              echo $config_api_cached ? 'CACHE' : 'LIVE';
          } elseif ($config_api_stale) {
              echo 'STALE';
          } else {
              echo 'DOWN';
          }
          ?>
        </strong>
      </article>
    </div>

    <div class="admin-config-grid">
      <article class="admin-config-card">
        <div class="admin-config-card__header">
          <span class="admin-config-card__icon"><i class="fas fa-plug"></i></span>
          <div>
            <h3>Intersect API</h3>
            <p class="admin-form-card__text">Comprueba rapido si el CMS esta leyendo en vivo, usando cache o degradado por falta de conexion.</p>
          </div>
        </div>
        <div class="form-admin">
          <label class="admin-form-group">
            <span class="admin-form-group__label">Estado</span>
            <input type="text" class="form-control" value="<?php
            if (!$config_api_configured) {
                echo 'No configurada';
            } elseif ($config_api_online && !$config_api_stale) {
                echo $config_api_cached ? 'Disponible desde cache' : 'Disponible en vivo';
            } elseif ($config_api_stale) {
                echo 'Respuesta degradada con cache antigua';
            } else {
                echo 'Sin respuesta';
            }
            ?>" readonly>
          </label>
          <label class="admin-form-group">
            <span class="admin-form-group__label">Ultima sincronizacion</span>
            <input type="text" class="form-control" value="<?php echo html_escape($config_api_last_sync); ?>" readonly>
          </label>
          <?php if ($config_api_message !== '') { ?>
            <label class="admin-form-group">
              <span class="admin-form-group__label">Detalle</span>
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
            <p class="admin-form-card__text">Actualiza el color base del sitio y del panel admin desde un solo bloque.</p>
          </div>
        </div>
        <form method="POST" action="<?php echo base_url('config/editcolors'); ?>" class="form-admin">
          <?php echo cms_csrf_field(); ?>
          <div class="admin-color-pair">
            <label class="admin-color-input">
              <span>Color 1</span>
              <input name="color1" type="color" value="<?php echo html_escape($config_color1); ?>">
            </label>
            <label class="admin-color-input">
              <span>Color 2</span>
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
            <p class="admin-form-card__text">Configura el identificador de medicion usado por Google Analytics.</p>
          </div>
        </div>
        <form method="POST" action="<?php echo base_url('config/analitycs'); ?>" class="form-admin">
          <?php echo cms_csrf_field(); ?>
          <label class="admin-form-group">
            <span class="admin-form-group__label">Analytics ID</span>
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
            <p class="admin-form-card__text">Define la URL publica del cliente, launcher o build que quieras destacar.</p>
          </div>
        </div>
        <form method="POST" action="<?php echo base_url('config/download'); ?>" class="form-admin">
          <?php echo cms_csrf_field(); ?>
          <label class="admin-form-group">
            <span class="admin-form-group__label">Download URL</span>
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
            <p class="admin-form-card__text">Activa o desactiva el acceso publico para hacer cambios o desplegar nuevas versiones.</p>
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
            <p class="admin-form-card__text">Edita los textos legales que se muestran en el sitio y en el footer publico.</p>
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
            <p class="admin-form-card__text">Ajusta los bloques destacados del home sin tocar codigo ni plantillas.</p>
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
            <p class="admin-form-card__text">Selecciona el idioma activo por defecto del frontend y de la navegacion.</p>
          </div>
        </div>
        <form method="POST" action="<?php echo base_url('config/changelang'); ?>" class="form-admin">
          <?php echo cms_csrf_field(); ?>
          <label class="admin-form-group">
            <span class="admin-form-group__label">{chooselang}</span>
            <select class="form-control" name="lang">
              <option value="es"<?php echo $config_current_lang === 'es' ? ' selected' : ''; ?>>ES</option>
              <option value="en"<?php echo $config_current_lang === 'en' ? ' selected' : ''; ?>>EN</option>
              <option value="tr"<?php echo $config_current_lang === 'tr' ? ' selected' : ''; ?>>TR</option>
              <option value="jp"<?php echo $config_current_lang === 'jp' ? ' selected' : ''; ?>>JP</option>
              <option value="de"<?php echo $config_current_lang === 'de' ? ' selected' : ''; ?>>DE</option>
              <option value="ru"<?php echo $config_current_lang === 'ru' ? ' selected' : ''; ?>>RU</option>
              <option value="zh"<?php echo $config_current_lang === 'zh' ? ' selected' : ''; ?>>ZH</option>
              <option value="fr"<?php echo $config_current_lang === 'fr' ? ' selected' : ''; ?>>FR</option>
              <option value="pt"<?php echo $config_current_lang === 'pt' ? ' selected' : ''; ?>>PT</option>
              <option value="hi"<?php echo $config_current_lang === 'hi' ? ' selected' : ''; ?>>HI</option>
              <option value="ar"<?php echo $config_current_lang === 'ar' ? ' selected' : ''; ?>>AR</option>
            </select>
          </label>
          <button type="submit" class="admin-button admin-button--primary">{change}</button>
        </form>
      </article>
    </div>
  </section>
</main>
