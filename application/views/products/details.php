<main class="public-page public-page--stack">
  <section class="product-detail">
    <div class="product-detail__media">
      <div class="product-detail__image-shell">
        <img src="<?php echo base_url('img/products/' . ($products['image'] ?? '')); ?>" alt="<?php echo html_escape($products['name'] ?? ''); ?>">
      </div>
    </div>

    <div class="product-detail__summary">
      <span class="public-page__eyebrow">{productdetail}</span>
      <h1 class="product-detail__title"><?php echo html_escape($products['name'] ?? ''); ?></h1>
      <div class="product-detail__price">$<?php echo number_format((float) ($products['price'] ?? 0), 2, '.', ''); ?></div>
      <p class="product-detail__description"><?php echo cms_render_multiline($products['descrip'] ?? ''); ?></p>

      <dl class="product-detail__meta">
        <div>
          <dt>{atackan}</dt>
          <dd><?php echo html_escape($products['aatk'] ?? ''); ?></dd>
        </div>
        <div>
          <dt>{interacan}</dt>
          <dd><?php echo html_escape($products['ainterac'] ?? ''); ?></dd>
        </div>
      </dl>

      <?php if ($this->session->userdata('login')) { ?>
        <form method="POST" action="<?php echo base_url('shop/shoping'); ?>" class="product-detail__purchase" id="form_buyitem">
          <?php echo cms_csrf_field(); ?>
          <input type="hidden" value="<?php echo (int) ($products['id'] ?? 0); ?>" name="id">

          <div class="modal-shell__field">
            <label class="modal-shell__label" for="shop_player">{player}</label>
            <div class="modal-shell__input-wrap">
              <span class="modal-shell__input-icon"><i class="fas fa-user"></i></span>
              <input id="shop_player" type="text" class="modal-shell__input" name="player" placeholder="{player}" required>
            </div>
          </div>

          <div class="product-detail__actions">
            <a href="<?php echo base_url('shop'); ?>" class="admin-button admin-button--ghost">{return}</a>
            <button type="submit" class="admin-button admin-button--primary">
              <i class="fas fa-cart-plus" aria-hidden="true"></i>
              <span>{buy}</span>
            </button>
          </div>
        </form>
      <?php } else { ?>
        <div class="product-detail__purchase">
          <p class="product-detail__description">{productdetail_login_required}</p>
          <div class="product-detail__actions">
            <a href="<?php echo base_url('shop'); ?>" class="admin-button admin-button--ghost">{return}</a>
            <button type="button" class="admin-button admin-button--primary btn_modal_login">
              <i class="fas fa-sign-in-alt" aria-hidden="true"></i>
              <span>{login}</span>
            </button>
          </div>
        </div>
      <?php } ?>
    </div>
  </section>
</main>
