<main class="public-page public-page--stack">
  <section class="public-page__header">
    <span class="public-page__eyebrow">{products}</span>
    <h1 class="public-page__title">{shop}</h1>
  </section>

  <?php if (empty($shop_products)) { ?>
    <section class="public-empty">
      <p>{emptyTable}</p>
    </section>
  <?php } else { ?>
    <section class="shop-grid">
      <?php foreach ($shop_products as $product) { ?>
        <article class="shop-item">
          <a href="<?php echo $product['details_url']; ?>" class="shop-item__media">
            <img src="<?php echo $product['image_url']; ?>" alt="<?php echo html_escape($product['name']); ?>">
          </a>
          <div class="shop-item__body">
            <h2 class="shop-item__title">
              <a href="<?php echo $product['details_url']; ?>"><?php echo $product['name']; ?></a>
            </h2>
            <div class="shop-item__footer">
              <strong class="shop-item__price">$<?php echo $product['price']; ?></strong>
              <a href="<?php echo $product['details_url']; ?>" class="admin-button admin-button--primary shop-item__button">{productdetail}</a>
            </div>
          </div>
        </article>
      <?php } ?>
    </section>
  <?php } ?>
</main>
