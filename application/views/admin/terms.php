<main class="admin-shell admin-shell--page">
  <section class="admin-section admin-section--tight">
    <div class="admin-editor admin-editor--wide">
      <div class="admin-editor__header">
        <div>
          <span class="admin-section__eyebrow">{admin_sidebar_system}</span>
          <h2 class="admin-panel__title">{editterms}</h2>
        </div>
      </div>
      <form class="admin-editor__form" action="<?php echo base_url('config/changeterms'); ?>" method="POST">
        <?php echo cms_csrf_field(); ?>
        <input type="hidden" name="id" value="<?php echo $config_id; ?>">
        <textarea id="tiny" name="terms" placeholder="{textterms}"><?php echo $config_content; ?></textarea>
        <div class="admin-editor__actions">
          <button type="submit" class="admin-button admin-button--primary">{edit}</button>
          <a href="<?php echo base_url('config'); ?>" class="admin-button admin-button--ghost">{return}</a>
        </div>
      </form>
    </div>
  </section>
</main>
