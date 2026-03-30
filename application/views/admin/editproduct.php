<main class="admin-shell admin-shell--page">
  <section class="admin-section admin-section--tight">
    <div class="admin-editor">
      <div class="admin-editor__header">
        <div>
          <span class="admin-section__eyebrow">{admin_sidebar_content}</span>
          <h2 class="admin-panel__title">{editproduct}</h2>
        </div>
      </div>
      <form class="admin-editor__form" action="<?php echo base_url('admin/editproducts'); ?>" method="POST">
        <?php echo cms_csrf_field(); ?>
        <input type="hidden" name="id" value="<?php echo $product_id; ?>">
        <div class="admin-editor__grid">
          <input type="text" class="form-control" placeholder="{name}" value="<?php echo $product_name_value; ?>" name="name">
          <input type="text" class="form-control" placeholder="{description}" value="<?php echo $product_description_value; ?>" name="descrip">
          <input type="text" class="form-control" placeholder="{price}" value="<?php echo $product_price_value; ?>" name="price">
          <input type="text" class="form-control" placeholder="{atackan}" value="<?php echo $product_attack_animation_value; ?>" name="aatk">
          <input type="text" class="form-control" placeholder="{interacan}" value="<?php echo $product_interaction_animation_value; ?>" name="ainterac">
          <input type="text" class="form-control" placeholder="Ingame ID" value="<?php echo $product_ingame_id_value; ?>" name="ingameid">
        </div>
        <div class="admin-editor__actions">
          <button type="submit" class="admin-button admin-button--primary">{edit}</button>
          <a href="<?php echo base_url('admin/shop'); ?>" class="admin-button admin-button--ghost">{return}</a>
        </div>
      </form>
    </div>
  </section>
</main>
