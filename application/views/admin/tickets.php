<main class="admin-shell admin-shell--page">
  <section class="admin-section admin-section--tight">
    <div class="admin-panel">
      <div class="admin-panel__header">
        <div>
          <span class="admin-section__eyebrow">{admin_sidebar_community}</span>
          <h2 class="admin-panel__title">{tickets}</h2>
        </div>
      </div>
      <div class="admin-table-wrap">
        <table class="table table-hover mb-0 admin-table">
          <thead>
            <tr>
              <th>{title}</th>
              <th>{user}</th>
              <th>{email}</th>
              <th>{status}</th>
              <th>{admin}</th>
            </tr>
          </thead>
          <tbody>
            <?php if (empty($admin_feedback_rows)) { ?>
              <tr>
                <td colspan="5" class="admin-empty">{emptyTable}</td>
              </tr>
            <?php } else { ?>
              <?php foreach ($admin_feedback_rows as $row) { ?>
                <tr>
                  <td>
                    <strong><?php echo $row['title']; ?></strong>
                    <div class="admin-table__meta"><?php echo $row['type']; ?></div>
                  </td>
                  <td><?php echo $row['user']; ?></td>
                  <td><?php echo $row['email']; ?></td>
                  <td><?php echo $row['status']; ?></td>
                  <td><?php echo $row['admin']; ?></td>
                </tr>
              <?php } ?>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </section>
</main>
