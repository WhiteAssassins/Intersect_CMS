<div class="modal fade" id="modal_newchangelog" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content cards-novo">
            <div class="modal-header text-center modal-shell__header">
                <span class="modal-shell__badge"><i class="fas fa-stream"></i></span>
                <span class="modal-shell__eyebrow">{admin_sidebar_content}</span>
                <h4 class="modal-title w-100 font-weight-bold">{addchangelog}</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
                <form action="<?php echo base_url('admin/addchangelog'); ?>" method="post" class="modal-shell__form">
                    <?php echo cms_csrf_field(); ?>
            <div class="modal-body modal-shell__body">
                    <div class="modal-shell__field">
                        <label class="modal-shell__label" for="changelog_title">{title}</label>
                        <div class="modal-shell__input-wrap">
                            <span class="modal-shell__input-icon"><i class="fas fa-heading"></i></span>
                            <input id="changelog_title" type="text" class="modal-shell__input" name="title">
                        </div>
                    </div>
                    <div class="modal-shell__field modal-shell__field--full">
                        <label class="modal-shell__label" for="changelog_text">{description}</label>
                        <textarea id="changelog_text" class="modal-shell__textarea" rows="6" name="text"></textarea>
                    </div>
            </div>
                    <div class="modal-footer d-flex justify-content-center modal-shell__footer">
                        <button class="admin-button admin-button--primary modal-shell__submit" type="submit">{addchangelog}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php $changelogCount = is_array($admin_changelog_rows) ? count($admin_changelog_rows) : 0; ?>

<main class="admin-shell admin-shell--page">
  <section class="admin-section">
    <div class="admin-section__heading">
      <div>
        <span class="admin-section__eyebrow">{admin_sidebar_content}</span>
        <h2 class="admin-section__title">{changelog}</h2>
      </div>
      <button type="button" class="admin-button admin-button--primary btn_modal_newchangelog">
        <i class="fas fa-plus"></i>
        <span>{addchangelog}</span>
      </button>
    </div>

    <div class="admin-overview-grid">
      <article class="admin-overview-stat">
        <span class="admin-overview-stat__label">{changelog}</span>
        <strong class="admin-overview-stat__value"><?php echo $changelogCount; ?></strong>
      </article>
      <article class="admin-overview-stat">
        <span class="admin-overview-stat__label">{title}</span>
        <strong class="admin-overview-stat__value admin-overview-stat__value--compact"><?php echo $changelogCount > 0 ? html_escape($admin_changelog_rows[0]['title']) : '--'; ?></strong>
      </article>
      <article class="admin-overview-stat">
        <span class="admin-overview-stat__label">{status}</span>
        <strong class="admin-overview-stat__value admin-overview-stat__value--compact"><?php echo $changelogCount > 0 ? '{changelog_state_live}' : '{changelog_state_empty}'; ?></strong>
      </article>
    </div>

    <div class="admin-feed">
      <?php if (empty($admin_changelog_rows)) { ?>
        <div class="admin-panel admin-empty-block">
          <p class="mb-0">{emptyTable}</p>
        </div>
      <?php } else { ?>
        <?php foreach ($admin_changelog_rows as $row) { ?>
          <article class="admin-feed__item">
            <div class="admin-feed__marker"></div>
            <div class="admin-feed__card">
              <div class="admin-feed__content">
                <h3><?php echo $row['title']; ?></h3>
                <p><?php echo $row['text']; ?></p>
              </div>
              <form method="POST" action="<?php echo base_url('admin/delchangelog'); ?>">
                <?php echo cms_csrf_field(); ?>
                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                <button class="admin-icon-btn admin-icon-btn--danger" type="submit" aria-label="{action}">
                  <i class="fas fa-trash"></i>
                </button>
              </form>
            </div>
          </article>
        <?php } ?>
      <?php } ?>
    </div>
  </section>
</main>
