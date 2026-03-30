<main class="admin-shell admin-shell--page">
  <section class="admin-section admin-section--tight">
    <div class="admin-panel">
      <div class="admin-panel__header">
        <div>
          <span class="admin-section__eyebrow">{admin_sidebar_system}</span>
          <h2 class="admin-panel__title">{logs}</h2>
        </div>
      </div>

      <div class="admin-table-wrap">
        <table class="table table-hover mb-0 admin-table">
          <thead>
            <tr>
              <th>{admin}</th>
              <th>{user}</th>
              <th>{action}</th>
              <th>{date}</th>
            </tr>
          </thead>
          <tbody>
            <?php if (empty($log_rows)) { ?>
              <tr>
                <td colspan="4" class="admin-empty">{emptyTable}</td>
              </tr>
            <?php } else { ?>
              <?php foreach ($log_rows as $row) { ?>
                <tr>
                  <td><?php echo $row['admin']; ?></td>
                  <td><?php echo $row['user']; ?></td>
                  <td><?php echo $row['action']; ?></td>
                  <td><?php echo $row['date']; ?></td>
                </tr>
              <?php } ?>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </section>
</main>
