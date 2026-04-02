<div class="modal fade" id="modal_addproduct" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content cards-novo">
        <div class="modal-header text-center modal-shell__header">
            <span class="modal-shell__badge"><i class="fas fa-shopping-bag"></i></span>
            <span class="modal-shell__eyebrow">{admin_sidebar_content}</span>
            <h4 class="modal-title w-100 font-weight-bold">{addproduct}</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
            <form action="<?php echo base_url('admin/addproduct'); ?>" method="post" enctype="multipart/form-data" class="modal-shell__form">
                <?php echo cms_csrf_field(); ?>
        <div class="modal-body modal-shell__body">
                <div class="modal-shell__grid">
                    <div class="modal-shell__field">
                        <label class="modal-shell__label" for="product_name">{name}</label>
                        <div class="modal-shell__input-wrap">
                            <span class="modal-shell__input-icon"><i class="fas fa-box"></i></span>
                            <input id="product_name" type="text" class="modal-shell__input" name="name">
                        </div>
                    </div>
                    <div class="modal-shell__field">
                        <label class="modal-shell__label" for="product_description">{description}</label>
                        <div class="modal-shell__input-wrap">
                            <span class="modal-shell__input-icon"><i class="fas fa-align-left"></i></span>
                            <input id="product_description" type="text" class="modal-shell__input" name="descrip">
                        </div>
                    </div>
                    <div class="modal-shell__field">
                        <label class="modal-shell__label" for="product_price">{price}</label>
                        <div class="modal-shell__input-wrap">
                            <span class="modal-shell__input-icon"><i class="fas fa-dollar-sign"></i></span>
                            <input id="product_price" type="number" step="0.01" class="modal-shell__input" name="price">
                        </div>
                    </div>
                    <div class="modal-shell__field">
                        <label class="modal-shell__label" for="product_ingameid">{ingameid}</label>
                        <div class="modal-shell__input-wrap">
                            <span class="modal-shell__input-icon"><i class="fas fa-hashtag"></i></span>
                            <input id="product_ingameid" type="text" class="modal-shell__input" name="ingameid">
                        </div>
                    </div>
                    <div class="modal-shell__field">
                        <label class="modal-shell__label" for="product_attack">{atackan}</label>
                        <div class="modal-shell__input-wrap">
                            <span class="modal-shell__input-icon"><i class="fas fa-bolt"></i></span>
                            <input id="product_attack" type="text" class="modal-shell__input" name="aatk">
                        </div>
                    </div>
                    <div class="modal-shell__field">
                        <label class="modal-shell__label" for="product_interaction">{interacan}</label>
                        <div class="modal-shell__input-wrap">
                            <span class="modal-shell__input-icon"><i class="fas fa-hand-paper"></i></span>
                            <input id="product_interaction" type="text" class="modal-shell__input" name="ainterac">
                        </div>
                    </div>
                </div>
                <div class="modal-shell__field modal-shell__field--full">
                    <label class="modal-shell__label" for="product_image">{productpic}</label>
                    <input id="product_image" type="file" class="modal-shell__file" name="archivo" accept="image/*">
                </div>
        </div>
                <div class="modal-footer d-flex justify-content-center modal-shell__footer">
                    <button class="admin-button admin-button--primary modal-shell__submit" type="submit">{addproduct}</button>
                </div>
            </form>
            </div>
        </div>
    </div>
</div>

<main class="admin-shell admin-shell--page">
  <section class="admin-section admin-section--tight">
    <div class="admin-panel">
      <div class="admin-panel__header admin-panel__header--with-action">
        <div>
          <span class="admin-section__eyebrow">{admin_sidebar_content}</span>
          <h2 class="admin-panel__title">{products}</h2>
        </div>
        <button type="button" class="admin-button admin-button--primary btn_modal_addproduct">
          <i class="fas fa-plus"></i>
          <span>{addproduct}</span>
        </button>
      </div>
      <div class="admin-table-wrap">
        <table class="table table-hover mb-0 admin-table">
          <thead>
            <tr>
              <th>{name}</th>
              <th>{price}</th>
              <th>{description}</th>
              <th>{atackan}</th>
              <th>{interacan}</th>
              <th>{action}</th>
            </tr>
          </thead>
          <tbody>
            <?php if (empty($admin_product_rows)) { ?>
              <tr>
                <td colspan="6" class="admin-empty">{emptyTable}</td>
              </tr>
            <?php } else { ?>
              <?php foreach ($admin_product_rows as $row) { ?>
                <tr>
                  <td><?php echo $row['name']; ?></td>
                  <td>$<?php echo $row['price']; ?></td>
                  <td><?php echo $row['description']; ?></td>
                  <td><?php echo $row['attack_animation']; ?></td>
                  <td><?php echo $row['interaction_animation']; ?></td>
                  <td>
                    <div class="admin-actions">
                      <form method="POST" action="<?php echo base_url('admin/delproduct'); ?>">
                        <?php echo cms_csrf_field(); ?>
                        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                        <button class="admin-icon-btn admin-icon-btn--danger" type="submit" aria-label="{action}">
                          <i class="fas fa-trash"></i>
                        </button>
                      </form>

                      <form method="POST" action="<?php echo base_url('admin/editproduct'); ?>">
                        <?php echo cms_csrf_field(); ?>
                        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                        <button class="admin-icon-btn admin-icon-btn--warning" type="submit" aria-label="{edit}">
                          <i class="fas fa-pen"></i>
                        </button>
                      </form>

                      <form method="POST" action="<?php echo base_url('admin/statusproduct'); ?>">
                        <?php echo cms_csrf_field(); ?>
                        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                        <button class="admin-icon-btn <?php echo $row['is_visible'] ? 'admin-icon-btn--danger' : 'admin-icon-btn--success'; ?>" type="submit" aria-label="{status}">
                          <i class="fas fa-eye"></i>
                        </button>
                      </form>
                    </div>
                  </td>
                </tr>
              <?php } ?>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </section>
</main>
