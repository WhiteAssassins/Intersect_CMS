<main class="admin-shell admin-shell--page">
  <section class="admin-section admin-section--tight">
    <div class="admin-editor">
      <div class="admin-editor__header">
        <div>
          <span class="admin-section__eyebrow">{admin_sidebar_content}</span>
          <h2 class="admin-panel__title">{news}</h2>
          <p class="admin-section__text">Actualiza el titulo, resumen y cuerpo completo de la publicacion manteniendo el mismo slug y registro existente.</p>
        </div>
      </div>
      <form class="admin-editor__form" action="<?php echo base_url('admin/editnewss'); ?>" method="POST">
        <?php echo cms_csrf_field(); ?>
        <input type="hidden" name="id" value="<?php echo $news_id; ?>">
        <div class="admin-form-section">
          <div class="admin-form-section__heading">
            <h3>Resumen</h3>
            <p>Define lo que vera el usuario en las listas y en la cabecera del articulo.</p>
          </div>
          <div class="admin-editor__grid">
            <label class="admin-form-group">
              <span class="admin-form-group__label">{title}</span>
              <input type="text" class="form-control" placeholder="{title}" value="<?php echo $news_title_value; ?>" name="title">
            </label>
            <label class="admin-form-group">
              <span class="admin-form-group__label">{description}</span>
              <input type="text" class="form-control" placeholder="{description}" value="<?php echo $news_description_value; ?>" name="descrip">
            </label>
          </div>
        </div>
        <div class="admin-form-section">
          <div class="admin-form-section__heading">
            <h3>Contenido</h3>
            <p>Este bloque controla el texto completo que se mostrara en el detalle de la noticia.</p>
          </div>
          <textarea id="tiny" name="txt" placeholder="{textnews}"><?php echo $news_text_value; ?></textarea>
        </div>
        <div class="admin-editor__actions">
          <button type="submit" class="admin-button admin-button--primary">{edit}</button>
          <a href="<?php echo base_url('admin/news'); ?>" class="admin-button admin-button--ghost">{return}</a>
        </div>
      </form>
    </div>
  </section>
</main>
