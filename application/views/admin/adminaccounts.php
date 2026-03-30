<div class="modal fade" id="modal_addadminaccount" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content cards-novo">
        <div class="modal-header text-center modal-shell__header">
            <span class="modal-shell__badge"><i class="fas fa-user-shield"></i></span>
            <h4 class="modal-title w-100 font-weight-bold">{addadminaccount}</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body mx-3 modal-shell__body">
              <form action="<?php echo base_url('admin/adminadd'); ?>" method="post" enctype="multipart/form-data" class="modal-shell__form">
                  <?php echo cms_csrf_field(); ?>
                <div class="md-form mb-5">
                    <input type="text" class="form-control validate" name="user">
                    <label>{user}</label>
                </div>
                <div class="md-form mb-4">
                    <input type="text" class="form-control validate" name="pass">
                    <label>{password}</label>
                </div>
                <div class="md-form mb-4">
                    <input type="text" class="form-control validate" name="pass1">
                    <label>{confirmpassword}</label>
                </div>
                <div class="md-form mb-4">
                    <input type="email" class="form-control validate" name="email">
                    <label>{email}</label>
                </div>
                <div class="modal-footer d-flex justify-content-center modal-shell__footer">
                    <button class="btn btn-outline-info waves-effect modal-shell__submit" type="submit">{addadminaccount}</button>
                </div>
                </form>
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
