<main class="admin-shell admin-shell--page">
  <section class="admin-section admin-section--tight">
    <div class="admin-editor">
      <div class="admin-editor__header">
        <div>
          <span class="admin-section__eyebrow">{admin_sidebar_content}</span>
          <h2 class="admin-panel__title">{editproduct}</h2>
          <p class="admin-section__text">{admin_editproduct_text}</p>
        </div>
      </div>
      <form class="admin-editor__form" action="<?php echo base_url('admin/editproducts'); ?>" method="POST">
        <?php echo cms_csrf_field(); ?>
        <input type="hidden" name="id" value="<?php echo (int) $product_id; ?>">
        <div class="admin-form-section">
          <div class="admin-form-section__heading">
            <h3>{admin_editproduct_basic_title}</h3>
            <p>{admin_editproduct_basic_text}</p>
          </div>
          <div class="admin-editor__grid">
            <label class="admin-form-group">
              <span class="admin-form-group__label">{name}</span>
              <input type="text" class="form-control" placeholder="{name}" value="<?php echo html_escape($product_name_value); ?>" name="name">
            </label>
            <label class="admin-form-group">
              <span class="admin-form-group__label">{description}</span>
              <input type="text" class="form-control" placeholder="{description}" value="<?php echo html_escape($product_description_value); ?>" name="descrip">
            </label>
            <label class="admin-form-group">
              <span class="admin-form-group__label">{price}</span>
              <input type="text" class="form-control" placeholder="{price}" value="<?php echo html_escape($product_price_value); ?>" name="price">
            </label>
            <label class="admin-form-group">
              <span class="admin-form-group__label">{ingameid}</span>
              <input type="text" class="form-control" placeholder="{ingameid}" value="<?php echo html_escape($product_ingame_id_value); ?>" name="ingameid">
            </label>
          </div>
        </div>
        <div class="admin-form-section">
          <div class="admin-form-section__heading">
            <h3>{admin_editproduct_animation_title}</h3>
            <p>{admin_editproduct_animation_text}</p>
          </div>
          <div class="admin-editor__grid">
            <label class="admin-form-group">
              <span class="admin-form-group__label">{atackan}</span>
              <input type="text" class="form-control" placeholder="{atackan}" value="<?php echo html_escape($product_attack_animation_value); ?>" name="aatk">
            </label>
            <label class="admin-form-group">
              <span class="admin-form-group__label">{interacan}</span>
              <input type="text" class="form-control" placeholder="{interacan}" value="<?php echo html_escape($product_interaction_animation_value); ?>" name="ainterac">
            </label>
          </div>
        </div>
        <div class="admin-editor__actions">
          <button type="submit" class="admin-button admin-button--primary">{edit}</button>
          <a href="<?php echo base_url('admin/shop'); ?>" class="admin-button admin-button--ghost">{return}</a>
        </div>
      </form>
    </div>
  </section>
</main>
