<main class="public-page public-page--stack">
  <section class="public-page__header">
    <span class="public-page__eyebrow">{lastnews}</span>
    <h1 class="public-page__title">{news}</h1>
  </section>

  <?php if (empty($news_items)) { ?>
    <section class="public-empty">
      <p>{emptyTable}</p>
    </section>
  <?php } else { ?>
    <section class="news-grid">
      <?php foreach ($news_items as $item) { ?>
        <article class="news-tile">
          <a href="<?php echo $item['url']; ?>" class="news-tile__media">
            <img src="<?php echo $item['image_url']; ?>" alt="<?php echo html_escape($item['title']); ?>">
          </a>
          <div class="news-tile__body">
            <span class="news-tile__eyebrow">{news}</span>
            <h2 class="news-tile__title">
              <a href="<?php echo $item['url']; ?>"><?php echo $item['title']; ?></a>
            </h2>
            <p class="news-tile__text"><?php echo $item['description']; ?></p>
          </div>
        </article>
      <?php } ?>
    </section>
  <?php } ?>
</main>
