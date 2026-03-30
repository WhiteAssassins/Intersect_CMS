<?php
if (isset($sms) && $tipo == 'error') {
    echo '<div class="alert alert-info text-center">' . $sms . '</div>';
}
if (isset($error)) {
    echo '<div class="alert alert-info text-center">' . $error . '</div>';
}

function renderCommandSelectOptions($options, $placeholder)
{
    echo '<option value="" selected disabled>' . htmlspecialchars($placeholder, ENT_QUOTES, 'UTF-8') . '</option>';

    if (empty($options)) {
        return;
    }

    foreach ($options as $option) {
        echo '<option value="' . htmlspecialchars($option['value'], ENT_QUOTES, 'UTF-8') . '">'
            . htmlspecialchars($option['label'], ENT_QUOTES, 'UTF-8')
            . '</option>';
    }
}
?>

<main class="admin-shell admin-shell--page admin-shell--commands">
  <div class="container my-1 px-0">
    <section class="command-overview">
      <div class="command-overview__hero">
        <span class="admin-section__eyebrow">{admin_sidebar_system}</span>
        <h1 class="command-overview__title">{commands}</h1>
        <p class="command-overview__text">{admin_metrics_text}</p>
      </div>

      <div class="command-overview__meta">
        <article class="command-stat">
          <span class="command-stat__label">{playersonline}</span>
          <strong class="command-stat__value"><?php echo (int) $command_player_count; ?></strong>
        </article>
        <article class="command-stat">
          <span class="command-stat__label">{maps}</span>
          <strong class="command-stat__value"><?php echo (int) $command_map_count; ?></strong>
        </article>
        <article class="command-stat">
          <span class="command-stat__label">{commands}</span>
          <strong class="command-stat__value">9</strong>
        </article>
      </div>
    </section>

    <section class="command-group">
      <div class="command-group__header">
        <span class="command-group__eyebrow">{message}</span>
        <h2 class="command-group__title">{commands}</h2>
      </div>

      <div class="command-grid command-grid--messages">
        <article class="command-card command-card--feature">
          <div class="command-card__icon"><i class="fas fa-paper-plane"></i></div>
          <div class="command-card__copy">
            <h3>{globalmessage}</h3>
          </div>
          <form method="POST" action="<?php echo base_url('admin/global'); ?>" id="form_global" class="command-form">
            <?php echo cms_csrf_field(); ?>
            <input type="text" class="form-control command-form__input" name="txt" placeholder="{message}" required>
            <button class="admin-button admin-button--primary command-form__button" type="submit">{globalmessage}</button>
          </form>
        </article>

        <article class="command-card">
          <div class="command-card__icon"><i class="fas fa-at"></i></div>
          <div class="command-card__copy">
            <h3>{directmessage}</h3>
          </div>
          <form method="POST" action="<?php echo base_url('admin/direct'); ?>" id="form_direct" class="command-form">
            <?php echo cms_csrf_field(); ?>
            <select class="form-control command-form__select" name="user" <?php echo empty($command_player_options) ? 'disabled' : ''; ?> required>
              <?php renderCommandSelectOptions($command_player_options, '{user}'); ?>
            </select>
            <input type="text" class="form-control command-form__input" name="txt" placeholder="{message}" required>
            <button class="admin-button admin-button--ghost command-form__button" type="submit" <?php echo empty($command_player_options) ? 'disabled' : ''; ?>>{directmessage}</button>
          </form>
        </article>

        <article class="command-card">
          <div class="command-card__icon"><i class="fas fa-map-marked-alt"></i></div>
          <div class="command-card__copy">
            <h3>{mapmessage}</h3>
          </div>
          <form method="POST" action="<?php echo base_url('admin/proximity'); ?>" id="form_proximity" class="command-form">
            <?php echo cms_csrf_field(); ?>
            <select class="form-control command-form__select" name="map" <?php echo empty($command_map_options) ? 'disabled' : ''; ?> required>
              <?php renderCommandSelectOptions($command_map_options, '{maps}'); ?>
            </select>
            <input type="text" class="form-control command-form__input" name="txt" placeholder="{message}" required>
            <button class="admin-button admin-button--ghost command-form__button" type="submit" <?php echo empty($command_map_options) ? 'disabled' : ''; ?>>{mapmessage}</button>
          </form>
        </article>

        <article class="command-card command-card--muted">
          <div class="command-card__icon"><i class="fas fa-terminal"></i></div>
          <div class="command-card__copy">
            <h3>{consolecommand}</h3>
          </div>
          <form method="POST" action="<?php echo base_url('admin/global'); ?>" id="form_cmd" class="command-form">
            <?php echo cms_csrf_field(); ?>
            <input type="text" class="form-control command-form__input" name="txt" placeholder="/{command}" disabled>
            <button class="admin-button admin-button--ghost command-form__button" type="button" disabled>{consolecommand}</button>
          </form>
        </article>
      </div>
    </section>

    <section class="command-group">
      <div class="command-group__header">
        <span class="command-group__eyebrow">{admin_sidebar_community}</span>
        <h2 class="command-group__title">{admin_sidebar_community}</h2>
      </div>

      <div class="command-grid">
        <article class="command-card command-card--warning">
          <div class="command-card__icon"><i class="fas fa-user-slash"></i></div>
          <div class="command-card__copy">
            <h3>{ban}</h3>
          </div>
          <form method="POST" action="<?php echo base_url('admin/ban'); ?>" id="form_ban" class="command-form">
            <?php echo cms_csrf_field(); ?>
            <select class="form-control command-form__select" name="user" <?php echo empty($command_player_options) ? 'disabled' : ''; ?> required>
              <?php renderCommandSelectOptions($command_player_options, '{user}'); ?>
            </select>
            <input type="text" class="form-control command-form__input" name="reason" placeholder="{reason}" required>
            <input type="text" class="form-control command-form__input" name="time" placeholder="{duration}" required>
            <button class="admin-button admin-button--danger command-form__button" type="submit" <?php echo empty($command_player_options) ? 'disabled' : ''; ?>>{ban}</button>
          </form>
        </article>

        <article class="command-card command-card--warning">
          <div class="command-card__icon"><i class="fas fa-volume-mute"></i></div>
          <div class="command-card__copy">
            <h3>{mute}</h3>
          </div>
          <form method="POST" action="<?php echo base_url('admin/mute'); ?>" id="form_mute" class="command-form">
            <?php echo cms_csrf_field(); ?>
            <select class="form-control command-form__select" name="user" <?php echo empty($command_player_options) ? 'disabled' : ''; ?> required>
              <?php renderCommandSelectOptions($command_player_options, '{user}'); ?>
            </select>
            <input type="text" class="form-control command-form__input" name="reason" placeholder="{reason}" required>
            <input type="text" class="form-control command-form__input" name="time" placeholder="{duration}" required>
            <button class="admin-button admin-button--danger command-form__button" type="submit" <?php echo empty($command_player_options) ? 'disabled' : ''; ?>>{mute}</button>
          </form>
        </article>

        <article class="command-card">
          <div class="command-card__icon"><i class="fas fa-user-check"></i></div>
          <div class="command-card__copy">
            <h3>{unban}</h3>
          </div>
          <form method="POST" action="<?php echo base_url('admin/unban'); ?>" id="form_unban" class="command-form">
            <?php echo cms_csrf_field(); ?>
            <select class="form-control command-form__select" name="user" <?php echo empty($command_player_options) ? 'disabled' : ''; ?> required>
              <?php renderCommandSelectOptions($command_player_options, '{user}'); ?>
            </select>
            <button class="admin-button admin-button--ghost command-form__button" type="submit" <?php echo empty($command_player_options) ? 'disabled' : ''; ?>>{unban}</button>
          </form>
        </article>

        <article class="command-card">
          <div class="command-card__icon"><i class="fas fa-volume-up"></i></div>
          <div class="command-card__copy">
            <h3>{unmute}</h3>
          </div>
          <form method="POST" action="<?php echo base_url('admin/unmute'); ?>" id="form_unmute" class="command-form">
            <?php echo cms_csrf_field(); ?>
            <select class="form-control command-form__select" name="user" <?php echo empty($command_player_options) ? 'disabled' : ''; ?> required>
              <?php renderCommandSelectOptions($command_player_options, '{user}'); ?>
            </select>
            <button class="admin-button admin-button--ghost command-form__button" type="submit" <?php echo empty($command_player_options) ? 'disabled' : ''; ?>>{unmute}</button>
          </form>
        </article>
      </div>
    </section>

    <section class="command-group">
      <div class="command-group__header">
        <span class="command-group__eyebrow">{admin_sidebar_world}</span>
        <h2 class="command-group__title">{admin_sidebar_world}</h2>
      </div>

      <div class="command-grid command-grid--actions">
        <article class="command-card command-card--feature">
          <div class="command-card__icon"><i class="fas fa-route"></i></div>
          <div class="command-card__copy">
            <h3>{teleport}</h3>
          </div>
          <form method="POST" action="<?php echo base_url('admin/tp'); ?>" id="form_tp" class="command-form">
            <?php echo cms_csrf_field(); ?>
            <select class="form-control command-form__select" name="user" <?php echo empty($command_player_options) ? 'disabled' : ''; ?> required>
              <?php renderCommandSelectOptions($command_player_options, '{user}'); ?>
            </select>
            <select class="form-control command-form__select" name="map" <?php echo empty($command_map_options) ? 'disabled' : ''; ?> required>
              <?php renderCommandSelectOptions($command_map_options, '{maps}'); ?>
            </select>
            <button class="admin-button admin-button--primary command-form__button" type="submit" <?php echo empty($command_player_options) || empty($command_map_options) ? 'disabled' : ''; ?>>{teleport}</button>
          </form>
        </article>

        <article class="command-card">
          <div class="command-card__icon"><i class="fas fa-sign-out-alt"></i></div>
          <div class="command-card__copy">
            <h3>{kickuser}</h3>
          </div>
          <form method="POST" action="<?php echo base_url('admin/kick'); ?>" id="form_kick" class="command-form">
            <?php echo cms_csrf_field(); ?>
            <select class="form-control command-form__select" name="user" <?php echo empty($command_player_options) ? 'disabled' : ''; ?> required>
              <?php renderCommandSelectOptions($command_player_options, '{user}'); ?>
            </select>
            <button class="admin-button admin-button--ghost command-form__button" type="submit" <?php echo empty($command_player_options) ? 'disabled' : ''; ?>>{kickuser}</button>
          </form>
        </article>

        <article class="command-card command-card--warning">
          <div class="command-card__icon"><i class="fas fa-skull-crossbones"></i></div>
          <div class="command-card__copy">
            <h3>{Kill}</h3>
          </div>
          <form method="POST" action="<?php echo base_url('admin/kill'); ?>" id="form_kill" class="command-form">
            <?php echo cms_csrf_field(); ?>
            <select class="form-control command-form__select" name="user" <?php echo empty($command_player_options) ? 'disabled' : ''; ?> required>
              <?php renderCommandSelectOptions($command_player_options, '{user}'); ?>
            </select>
            <button class="admin-button admin-button--danger command-form__button" type="submit" <?php echo empty($command_player_options) ? 'disabled' : ''; ?>>{Kill}</button>
          </form>
        </article>
      </div>
    </section>
  </div>
</main>
