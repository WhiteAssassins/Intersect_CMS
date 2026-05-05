<main class="admin-shell admin-shell--page">
  <section class="admin-section admin-section--tight">
    <div class="admin-editor">
      <div class="admin-editor__header">
        <div>
          <span class="admin-section__eyebrow">{admin_sidebar_content}</span>
          <h2 class="admin-panel__title">{news}</h2>
          <p class="admin-section__text">{admin_editnews_text}</p>
        </div>
      </div>
      <form class="admin-editor__form" action="<?php echo base_url('admin/editnewss'); ?>" method="POST">
        <?php echo cms_csrf_field(); ?>
        <input type="hidden" name="id" value="<?php echo (int) $news_id; ?>">
        <div class="admin-form-section">
          <div class="admin-form-section__heading">
            <h3>{admin_editnews_summary_title}</h3>
            <p>{admin_editnews_summary_text}</p>
          </div>
          <div class="admin-editor__grid">
            <label class="admin-form-group">
              <span class="admin-form-group__label">{title}</span>
              <input type="text" class="form-control" placeholder="{title}" value="<?php echo html_escape($news_title_value); ?>" name="title">
            </label>
            <label class="admin-form-group">
              <span class="admin-form-group__label">{description}</span>
              <input type="text" class="form-control" placeholder="{description}" value="<?php echo html_escape($news_description_value); ?>" name="descrip">
            </label>
          </div>
        </div>
        <div class="admin-form-section">
          <div class="admin-form-section__heading">
            <h3>{admin_editnews_content_title}</h3>
            <p>{admin_editnews_content_text}</p>
          </div>
          <textarea id="tiny" name="txt" placeholder="{textnews}"><?php echo html_escape($news_text_value); ?></textarea>
        </div>
        <div class="admin-editor__actions">
          <button type="submit" class="admin-button admin-button--primary">{edit}</button>
          <a href="<?php echo base_url('admin/news'); ?>" class="admin-button admin-button--ghost">{return}</a>
        </div>
      </form>
    </div>
  </section>
</main>
