<main class="admin-shell admin-shell--page">
  <section class="admin-section admin-section--tight">
    <div class="admin-panel">
      <div class="admin-panel__header">
        <div>
          <span class="admin-section__eyebrow">{admin_sidebar_world}</span>
          <h2 class="admin-panel__title">{maps}</h2>
        </div>
      </div>
      <div class="admin-table-wrap">
        <table class="table table-hover mb-0 admin-table">
          <thead>
            <tr>
              <th>{key}</th>
              <th>{name}</th>
            </tr>
          </thead>
          <tbody>
            <?php if (empty($admin_map_rows)) { ?>
              <tr><td colspan="2" class="admin-empty">{emptyTable}</td></tr>
            <?php } else { ?>
              <?php foreach ($admin_map_rows as $mapRow) { ?>
                <tr>
                  <td><?php echo $mapRow['key']; ?></td>
                  <td><?php echo $mapRow['name']; ?></td>
                </tr>
              <?php } ?>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </section>
</main>
