<main class="public-page public-page--stack">
  <section class="public-page__header">
    <span class="public-page__eyebrow">{terms}</span>
    <h1 class="public-page__title">{terms}</h1>
  </section>

  <article class="article-page__content">
    <div class="article-page__body">
      <?php echo cms_render_rich_text($terms_content); ?>
    </div>
  </article>
</main>
