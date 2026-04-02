<main class="public-page public-page--stack">
  <section class="public-page__header">
    <span class="public-page__eyebrow">{recoverpassword}</span>
    <h1 class="public-page__title">{recover}</h1>
  </section>

  <section class="public-empty">
    <?php if (!empty($recover_message)) { ?>
      <div class="alert <?php echo $recover_message_type === 'success' ? 'alert-success' : 'alert-info'; ?> mb-4">
        <?php echo html_escape($recover_message); ?>
      </div>
    <?php } ?>

    <form method="POST" action="<?php echo base_url('recover/rec'); ?>" class="form-admin">
      <?php echo cms_csrf_field(); ?>
      <div class="modal-shell__field">
        <label class="modal-shell__label" for="recover_user">{user}</label>
        <div class="modal-shell__input-wrap">
          <span class="modal-shell__input-icon"><i class="fas fa-user"></i></span>
          <input id="recover_user" type="text" class="modal-shell__input" name="user" placeholder="{user}" required>
        </div>
      </div>

      <div class="product-detail__actions">
        <button type="submit" class="admin-button admin-button--primary">{recover}</button>
        <a href="<?php echo base_url(); ?>" class="admin-button admin-button--ghost">{return}</a>
      </div>
    </form>
  </section>
</main>
