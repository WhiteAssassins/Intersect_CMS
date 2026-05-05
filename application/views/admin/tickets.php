<?php
$ticketCount = is_array($admin_feedback_rows) ? count($admin_feedback_rows) : 0;
$assignedCount = 0;
$openCount = 0;

if ($ticketCount > 0) {
    foreach ($admin_feedback_rows as $row) {
        if (!empty($row['admin'])) {
            $assignedCount++;
        }

        $statusValue = strtolower(trim((string) ($row['status'] ?? '')));
        if (!in_array($statusValue, array('closed', 'resolved', 'done'), true)) {
            $openCount++;
        }
    }
}
?>

<main class="admin-shell admin-shell--page">
  <section class="admin-section">
    <div class="admin-section__heading">
      <div>
        <span class="admin-section__eyebrow">{admin_sidebar_community}</span>
        <h2 class="admin-section__title">{tickets}</h2>
      </div>
      <p class="admin-section__text">{admin_metrics_text}</p>
    </div>

    <div class="admin-overview-grid">
      <article class="admin-overview-stat">
        <span class="admin-overview-stat__label">{tickets}</span>
        <strong class="admin-overview-stat__value"><?php echo $ticketCount; ?></strong>
      </article>
      <article class="admin-overview-stat">
        <span class="admin-overview-stat__label">{status}</span>
        <strong class="admin-overview-stat__value"><?php echo $openCount; ?></strong>
      </article>
      <article class="admin-overview-stat">
        <span class="admin-overview-stat__label">{admin}</span>
        <strong class="admin-overview-stat__value"><?php echo $assignedCount; ?></strong>
      </article>
    </div>

    <div class="admin-panel">
      <div class="admin-panel__header">
        <div>
          <span class="admin-section__eyebrow">{tickets}</span>
          <h3 class="admin-panel__title">{title}</h3>
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
                    <strong><?php echo html_escape($row['title']); ?></strong>
                    <div class="admin-table__meta"><?php echo html_escape($row['type']); ?></div>
                    <div class="admin-table__meta"><?php echo nl2br(html_escape($row['text']), false); ?></div>
                  </td>
                  <td><?php echo html_escape($row['user']); ?></td>
                  <td><?php echo html_escape($row['email']); ?></td>
                  <td><?php echo html_escape($row['status']); ?></td>
                  <td><?php echo html_escape($row['admin']); ?></td>
                </tr>
              <?php } ?>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </section>
</main>
