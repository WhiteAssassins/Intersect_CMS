<main class="public-page public-page--stack">
  <section class="public-page__header">
    <span class="public-page__eyebrow">{legalnotice}</span>
    <h1 class="public-page__title">{legalnotice}</h1>
  </section>

  <article class="article-page__content">
    <div class="article-page__body">
      <?php echo cms_render_rich_text($legal_content); ?>
    </div>
  </article>
</main>
