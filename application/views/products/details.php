<main class="public-page public-page--stack">
  <section class="product-detail">
    <div class="product-detail__media">
      <div class="product-detail__image-shell">
        <img src="<?php echo base_url('img/products/'); echo $products['image']; ?>" alt="<?php echo html_escape($products['name']); ?>">
      </div>
    </div>

    <div class="product-detail__summary">
      <span class="public-page__eyebrow">{productdetail}</span>
      <h1 class="product-detail__title"><?php echo $products['name']; ?></h1>
      <div class="product-detail__price">$<?php echo $products['price']; ?></div>
      <p class="product-detail__description"><?php echo $products['descrip']; ?></p>

      <dl class="product-detail__meta">
        <div>
          <dt>{atackan}</dt>
          <dd><?php echo $products['aatk']; ?></dd>
        </div>
        <div>
          <dt>{interacan}</dt>
          <dd><?php echo $products['ainterac']; ?></dd>
        </div>
      </dl>

      <form method="POST" action="<?php echo base_url('shop/shoping'); ?>" class="product-detail__purchase" id="form_buyitem">
        <?php echo cms_csrf_field(); ?>
        <input type="hidden" value="<?php echo $products['id']; ?>" name="id">

        <div class="modal-shell__field">
          <label class="modal-shell__label" for="shop_player">{player}</label>
          <div class="modal-shell__input-wrap">
            <span class="modal-shell__input-icon"><i class="fas fa-user"></i></span>
            <input id="shop_player" type="text" class="modal-shell__input" name="player" placeholder="{player}">
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
    </div>
  </section>
</main>
