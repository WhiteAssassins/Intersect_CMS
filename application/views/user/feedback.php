<main class="userpanel-shell">
  <section class="userpanel-workspace">
    <div class="container">
      <div class="userpanel-section-heading">
        <div>
          <span class="userpanel-card__eyebrow">{feedback}</span>
          <h1 class="userpanel-card__title">{createticket}</h1>
        </div>
        <button class="admin-button admin-button--primary btn_modal_newticket" type="button">{createticket}</button>
      </div>

      <div class="userpanel-overview-grid">
        <article class="userpanel-stat">
          <span class="userpanel-stat__label">{userpanel_open_label}</span>
          <strong class="userpanel-stat__value"><?php echo (int) $open_ticket_count; ?></strong>
        </article>
        <article class="userpanel-stat">
          <span class="userpanel-stat__label">{userpanel_closed_label}</span>
          <strong class="userpanel-stat__value"><?php echo (int) $closed_ticket_count; ?></strong>
        </article>
        <article class="userpanel-stat">
          <span class="userpanel-stat__label">{email}</span>
          <strong class="userpanel-stat__value userpanel-stat__value--compact"><?php echo html_escape($feedback_email !== '' ? $feedback_email : '--'); ?></strong>
        </article>
      </div>

      <div class="userpanel-grid">
        <article class="userpanel-card">
          <div class="userpanel-card__header">
            <span class="userpanel-card__icon"><i class="fas fa-life-ring"></i></span>
            <div>
              <span class="userpanel-card__eyebrow">{userpanel_open_label}</span>
              <h2 class="userpanel-card__title">{feedback}</h2>
            </div>
          </div>

          <div class="userpanel-ticket-list">
            <?php if (empty($open_tickets)) { ?>
              <div class="userpanel-ticket userpanel-ticket--empty">{emptyTable}</div>
            <?php } else { ?>
              <?php foreach ($open_tickets as $ticket) { ?>
                <article class="userpanel-ticket">
                  <div class="userpanel-ticket__top">
                    <strong><?php echo html_escape($ticket['title']); ?></strong>
                    <span class="userpanel-ticket__status"><?php echo html_escape($ticket['status']); ?></span>
                  </div>
                  <div class="userpanel-ticket__meta">
                    <span><?php echo html_escape($ticket['type']); ?></span>
                    <span>{admin}: <?php echo html_escape($ticket['admin'] !== '' ? $ticket['admin'] : '--'); ?></span>
                  </div>
                  <p><?php echo nl2br(htmlspecialchars($ticket['text'], ENT_QUOTES, 'UTF-8')); ?></p>
                </article>
              <?php } ?>
            <?php } ?>
          </div>
        </article>

        <article class="userpanel-card">
          <div class="userpanel-card__header">
            <span class="userpanel-card__icon"><i class="fas fa-check-circle"></i></span>
            <div>
              <span class="userpanel-card__eyebrow">{userpanel_closed_label}</span>
              <h2 class="userpanel-card__title">{feedback}</h2>
            </div>
          </div>

          <div class="userpanel-ticket-list">
            <?php if (empty($closed_tickets)) { ?>
              <div class="userpanel-ticket userpanel-ticket--empty">{emptyTable}</div>
            <?php } else { ?>
              <?php foreach ($closed_tickets as $ticket) { ?>
                <article class="userpanel-ticket">
                  <div class="userpanel-ticket__top">
                    <strong><?php echo html_escape($ticket['title']); ?></strong>
                    <span class="userpanel-ticket__status userpanel-ticket__status--closed"><?php echo html_escape($ticket['status']); ?></span>
                  </div>
                  <div class="userpanel-ticket__meta">
                    <span><?php echo html_escape($ticket['type']); ?></span>
                    <span>{admin}: <?php echo html_escape($ticket['admin'] !== '' ? $ticket['admin'] : '--'); ?></span>
                  </div>
                  <p><?php echo nl2br(htmlspecialchars($ticket['text'], ENT_QUOTES, 'UTF-8')); ?></p>
                </article>
              <?php } ?>
            <?php } ?>
          </div>
        </article>
      </div>
    </div>
  </section>
</main>
