<main class="admin-shell admin-shell--page">
  <section class="admin-section admin-section--tight">
    <div class="admin-editor">
      <div class="admin-editor__header">
        <div>
          <span class="admin-section__eyebrow">{admin_sidebar_content}</span>
          <h2 class="admin-panel__title">{news}</h2>
        </div>
      </div>
      <form class="admin-editor__form" action="<?php echo base_url('admin/editnewss'); ?>" method="POST">
        <?php echo cms_csrf_field(); ?>
        <input type="hidden" name="id" value="<?php echo $news_id; ?>">
        <div class="admin-editor__grid">
          <input type="text" class="form-control" placeholder="{title}" value="<?php echo $news_title_value; ?>" name="title">
          <input type="text" class="form-control" placeholder="{description}" value="<?php echo $news_description_value; ?>" name="descrip">
        </div>
        <textarea id="tiny" name="txt" placeholder="{textnews}"><?php echo $news_text_value; ?></textarea>
        <div class="admin-editor__actions">
          <button type="submit" class="admin-button admin-button--primary">{edit}</button>
          <a href="<?php echo base_url('admin/news'); ?>" class="admin-button admin-button--ghost">{return}</a>
        </div>
      </form>
    </div>
  </section>
</main>
