<div class="container" style="padding-top: 50px;">
<div class="classic-tabs mx-2">

  <ul class="nav tabs-cyan" id="myClassicTabShadow" role="tablist">
    <li class="nav-item">
      <a class="nav-link waves-light active show" id="profile-tab-classic-shadow" data-toggle="tab" href="#profile-classic-shadow"
        role="tab" aria-controls="profile-classic-shadow" aria-selected="true">Open (<?php echo $open_ticket_count; ?>)</a>
    </li>
    <li class="nav-item">
      <a class="nav-link waves-light" id="follow-tab-classic-shadow" data-toggle="tab" href="#follow-classic-shadow"
        role="tab" aria-controls="follow-classic-shadow" aria-selected="false">Closed (<?php echo $closed_ticket_count; ?>)</a>
    </li>
    <li class="nav-item">
      <a class="nav-link waves-light btn_modal_newticket"
        role="tab" aria-controls="contact-classic-shadow" aria-selected="false">{createticket}</a>
    </li>
  </ul>

  <div class="tab-content card cards-novo" id="myClassicTabContentShadow">
    <div class="tab-pane fade active show p-4" id="profile-classic-shadow" role="tabpanel" aria-labelledby="profile-tab-classic-shadow">
      <?php if (empty($open_tickets)) { ?>
        <p class="mb-0">No open tickets.</p>
      <?php } else { ?>
        <?php foreach ($open_tickets as $ticket) { ?>
          <div class="card cards-novo mb-3">
            <div class="card-body">
              <div class="d-flex justify-content-between align-items-center mb-2">
                <h5 class="card-title mb-0"><?php echo $ticket['title']; ?></h5>
                <span class="badge badge-info"><?php echo $ticket['status']; ?></span>
              </div>
              <p class="mb-2"><strong>{admin}:</strong> <?php echo $ticket['admin'] !== '' ? $ticket['admin'] : 'Pending'; ?></p>
              <p class="mb-2"><strong>{email}:</strong> <?php echo $ticket['email']; ?></p>
              <p class="mb-2"><strong>Type:</strong> <?php echo $ticket['type']; ?></p>
              <p class="mb-0"><?php echo nl2br(htmlspecialchars($ticket['text'], ENT_QUOTES, 'UTF-8')); ?></p>
            </div>
          </div>
        <?php } ?>
      <?php } ?>
    </div>
    <div class="tab-pane fade p-4" id="follow-classic-shadow" role="tabpanel" aria-labelledby="follow-tab-classic-shadow">
      <?php if (empty($closed_tickets)) { ?>
        <p class="mb-0">No closed tickets.</p>
      <?php } else { ?>
        <?php foreach ($closed_tickets as $ticket) { ?>
          <div class="card cards-novo mb-3">
            <div class="card-body">
              <div class="d-flex justify-content-between align-items-center mb-2">
                <h5 class="card-title mb-0"><?php echo $ticket['title']; ?></h5>
                <span class="badge badge-secondary"><?php echo $ticket['status']; ?></span>
              </div>
              <p class="mb-2"><strong>{admin}:</strong> <?php echo $ticket['admin'] !== '' ? $ticket['admin'] : 'Pending'; ?></p>
              <p class="mb-2"><strong>{email}:</strong> <?php echo $ticket['email']; ?></p>
              <p class="mb-2"><strong>Type:</strong> <?php echo $ticket['type']; ?></p>
              <p class="mb-0"><?php echo nl2br(htmlspecialchars($ticket['text'], ENT_QUOTES, 'UTF-8')); ?></p>
            </div>
          </div>
        <?php } ?>
      <?php } ?>
    </div>
  </div>

</div>
</div>

<script>
$(document).ready(function() {
$('.mdb-select').materialSelect();
});
</script>
