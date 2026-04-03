<main class="public-page public-page--stack">
  <section class="public-page__header">
    <span class="public-page__eyebrow">{updates}</span>
    <h1 class="public-page__title">{changelog}</h1>
  </section>

  <?php if (empty($changelog_rows)) { ?>
    <section class="public-empty">
      <p>{emptyTable}</p>
    </section>
  <?php } else { ?>
    <section class="changelog-tree">
      <?php foreach ($changelog_rows as $item) { ?>
        <?php $isLeft = ($item['alignment'] ?? 'right') === 'left'; ?>
        <article class="changelog-node changelog-node--<?php echo $isLeft ? 'left' : 'right'; ?><?php echo !empty($item['is_featured']) ? ' changelog-node--accent' : ''; ?>">
          <?php if ($isLeft) { ?>
            <div class="changelog-node__card">
              <div class="changelog-node__card-top">
                <span class="changelog-node__release"><?php echo html_escape($item['version'] ?? ''); ?></span>
                <span class="changelog-node__build">Build #<?php echo (int) ($item['id'] ?? 0); ?></span>
              </div>
              <h2 class="changelog-node__title"><?php echo html_escape($item['headline'] ?? ''); ?></h2>
              <ul class="changelog-node__list">
                <?php foreach (($item['changes'] ?? array()) as $change) { ?>
                  <li><?php echo html_escape($change); ?></li>
                <?php } ?>
              </ul>
            </div>
          <?php } else { ?>
            <div class="changelog-node__spacer"></div>
          <?php } ?>

          <div class="changelog-node__center">
            <span class="changelog-node__dot"></span>
            <span class="changelog-node__sequence"><?php echo str_pad((string) ($item['sequence'] ?? 0), 2, '0', STR_PAD_LEFT); ?></span>
          </div>

          <?php if (!$isLeft) { ?>
            <div class="changelog-node__card">
              <div class="changelog-node__card-top">
                <span class="changelog-node__release"><?php echo html_escape($item['version'] ?? ''); ?></span>
                <span class="changelog-node__build">Build #<?php echo (int) ($item['id'] ?? 0); ?></span>
              </div>
              <h2 class="changelog-node__title"><?php echo html_escape($item['headline'] ?? ''); ?></h2>
              <ul class="changelog-node__list">
                <?php foreach (($item['changes'] ?? array()) as $change) { ?>
                  <li><?php echo html_escape($change); ?></li>
                <?php } ?>
              </ul>
            </div>
          <?php } else { ?>
            <div class="changelog-node__spacer"></div>
          <?php } ?>
        </article>
      <?php } ?>
    </section>
  <?php } ?>
</main>
