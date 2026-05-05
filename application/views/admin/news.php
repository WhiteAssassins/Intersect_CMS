<div class="modal fade" id="modal_addnews" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content cards-novo">
        <div class="modal-header text-center modal-shell__header">
            <span class="modal-shell__badge"><i class="fas fa-newspaper"></i></span>
            <span class="modal-shell__eyebrow">{admin_sidebar_content}</span>
            <h4 class="modal-title w-100 font-weight-bold">{addnews}</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
            <form action="<?php echo base_url('admin/addnews'); ?>" method="post" enctype="multipart/form-data" class="modal-shell__form">
                <?php echo cms_csrf_field(); ?>
        <div class="modal-body modal-shell__body">
                <div class="modal-shell__grid">
                    <div class="modal-shell__field">
                        <label class="modal-shell__label" for="news_title">{title}</label>
                        <div class="modal-shell__input-wrap">
                            <span class="modal-shell__input-icon"><i class="fas fa-heading"></i></span>
                            <input id="news_title" type="text" class="modal-shell__input" name="title">
                        </div>
                    </div>
                    <div class="modal-shell__field">
                        <label class="modal-shell__label" for="news_description">{description}</label>
                        <div class="modal-shell__input-wrap">
                            <span class="modal-shell__input-icon"><i class="fas fa-align-left"></i></span>
                            <input id="news_description" type="text" class="modal-shell__input" name="descrip">
                        </div>
                    </div>
                </div>
                <div class="modal-shell__field modal-shell__field--full">
                    <label class="modal-shell__label" for="tiny">{textnews}</label>
                    <textarea id="tiny" name="txt" class="modal-shell__textarea" rows="7"></textarea>
                </div>
                <div class="modal-shell__field modal-shell__field--full">
                    <label class="modal-shell__label" for="news_image">{newspic}</label>
                    <input id="news_image" type="file" class="modal-shell__file" name="archivo" accept="image/*">
                </div>
        </div>
                <div class="modal-footer d-flex justify-content-center modal-shell__footer">
                    <button class="admin-button admin-button--primary modal-shell__submit" type="submit">{uploadnews}</button>
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
          <h2 class="admin-panel__title">{news}</h2>
        </div>
        <button type="button" class="admin-button admin-button--primary btn_modal_addnews">
          <i class="fas fa-plus"></i>
          <span>{addnews}</span>
        </button>
      </div>
      <div class="admin-table-wrap">
        <table class="table table-hover mb-0 admin-table">
          <thead>
            <tr>
              <th>{title}</th>
              <th>{description}</th>
              <th>{date}</th>
              <th>{action}</th>
            </tr>
          </thead>
          <tbody>
            <?php if (empty($admin_news_rows)) { ?>
              <tr>
                <td colspan="4" class="admin-empty">{emptyTable}</td>
              </tr>
            <?php } else { ?>
              <?php foreach ($admin_news_rows as $row) { ?>
                <tr>
                  <td><?php echo html_escape($row['title']); ?></td>
                  <td><?php echo html_escape($row['description']); ?></td>
                  <td><?php echo html_escape($row['date']); ?></td>
                  <td>
                    <div class="admin-actions">
                      <form method="POST" action="<?php echo base_url('admin/delnews'); ?>">
                        <?php echo cms_csrf_field(); ?>
                        <input type="hidden" name="id" value="<?php echo (int) $row['id']; ?>">
                        <button class="admin-icon-btn admin-icon-btn--danger" type="submit" aria-label="{action}">
                          <i class="fas fa-trash"></i>
                        </button>
                      </form>

                      <form method="POST" action="<?php echo base_url('admin/editnews'); ?>">
                        <?php echo cms_csrf_field(); ?>
                        <input type="hidden" name="id" value="<?php echo (int) $row['id']; ?>">
                        <button class="admin-icon-btn admin-icon-btn--warning" type="submit" aria-label="{edit}">
                          <i class="fas fa-pen"></i>
                        </button>
                      </form>

                      <form method="POST" action="<?php echo base_url('admin/statusnews'); ?>">
                        <?php echo cms_csrf_field(); ?>
                        <input type="hidden" name="id" value="<?php echo (int) $row['id']; ?>">
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
