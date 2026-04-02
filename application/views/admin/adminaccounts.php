<div class="modal fade" id="modal_addadminaccount" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content cards-novo">
        <div class="modal-header text-center modal-shell__header">
            <span class="modal-shell__badge"><i class="fas fa-user-shield"></i></span>
            <span class="modal-shell__eyebrow">{admin_sidebar_community}</span>
            <h4 class="modal-title w-100 font-weight-bold">{addadminaccount}</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
              <form action="<?php echo base_url('admin/adminadd'); ?>" method="post" enctype="multipart/form-data" class="modal-shell__form">
                  <?php echo cms_csrf_field(); ?>
        <div class="modal-body modal-shell__body">
                <div class="modal-shell__grid">
                    <div class="modal-shell__field">
                        <label class="modal-shell__label" for="adminaccount_user">{user}</label>
                        <div class="modal-shell__input-wrap">
                            <span class="modal-shell__input-icon"><i class="fas fa-user-shield"></i></span>
                            <input id="adminaccount_user" type="text" class="modal-shell__input" name="user">
                        </div>
                    </div>
                    <div class="modal-shell__field">
                        <label class="modal-shell__label" for="adminaccount_email">{email}</label>
                        <div class="modal-shell__input-wrap">
                            <span class="modal-shell__input-icon"><i class="fas fa-envelope"></i></span>
                            <input id="adminaccount_email" type="email" class="modal-shell__input" name="email">
                        </div>
                    </div>
                    <div class="modal-shell__field">
                        <label class="modal-shell__label" for="adminaccount_pass">{password}</label>
                        <div class="modal-shell__input-wrap">
                            <span class="modal-shell__input-icon"><i class="fas fa-lock"></i></span>
                            <input id="adminaccount_pass" type="password" class="modal-shell__input" name="pass">
                        </div>
                    </div>
                    <div class="modal-shell__field">
                        <label class="modal-shell__label" for="adminaccount_pass_confirm">{confirmpassword}</label>
                        <div class="modal-shell__input-wrap">
                            <span class="modal-shell__input-icon"><i class="fas fa-shield-alt"></i></span>
                            <input id="adminaccount_pass_confirm" type="password" class="modal-shell__input" name="pass1">
                        </div>
                    </div>
                </div>
        </div>
                <div class="modal-footer d-flex justify-content-center modal-shell__footer">
                    <button class="admin-button admin-button--primary modal-shell__submit" type="submit">{addadminaccount}</button>
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
          <span class="admin-section__eyebrow">{admin_sidebar_community}</span>
          <h2 class="admin-panel__title">{adminaccounts}</h2>
        </div>
        <button type="button" class="admin-button admin-button--primary btn_modal_addadminaccount">
          <i class="fas fa-plus"></i>
          <span>{addadminaccount}</span>
        </button>
      </div>
      <div class="admin-table-wrap">
        <table class="table table-hover mb-0 admin-table">
          <thead>
            <tr>
              <th>{id}</th>
              <th>{name}</th>
              <th>{email}</th>
              <th>{action}</th>
            </tr>
          </thead>
          <tbody>
            <?php if (empty($admin_account_rows)) { ?>
              <tr>
                <td colspan="4" class="admin-empty">{emptyTable}</td>
              </tr>
            <?php } else { ?>
              <?php foreach ($admin_account_rows as $row) { ?>
                <tr>
                  <td><?php echo $row['id']; ?></td>
                  <td><?php echo $row['user']; ?></td>
                  <td><?php echo $row['email']; ?></td>
                  <td>
                    <div class="admin-actions">
                      <form method="POST" action="<?php echo base_url('admin/deladminaccount'); ?>">
                        <?php echo cms_csrf_field(); ?>
                        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                        <button class="admin-icon-btn admin-icon-btn--danger" type="submit" aria-label="{action}">
                          <i class="fas fa-trash"></i>
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
