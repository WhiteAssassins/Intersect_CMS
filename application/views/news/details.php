<main class="public-page public-page--stack">
  <article class="article-page">
    <div class="article-page__media">
      <img src="<?php echo base_url('img/news/' . ($newss['img'] ?? '')); ?>" alt="<?php echo html_escape($newss['title'] ?? ''); ?>">
    </div>
    <div class="article-page__content">
      <span class="public-page__eyebrow">{news}</span>
      <h1 class="article-page__title"><?php echo html_escape($newss['title'] ?? ''); ?></h1>
      <p class="article-page__meta">{writedby} <strong><?php echo html_escape($newss['admin'] ?? ''); ?></strong>, <?php echo html_escape($newss['date'] ?? ''); ?></p>
      <div class="article-page__body">
        <?php echo cms_render_rich_text($newss['txt'] ?? ''); ?>
      </div>
      <a href="<?php echo base_url('news'); ?>" class="admin-button admin-button--ghost">{return}</a>
    </div>
  </article>
</main>
