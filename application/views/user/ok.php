<div class="container" style="padding-top: 100px;">
<div class="jumbotron text-center cards-novo">
  <h2 class="card-title h2">{rechargeok}</h2>
  <div class="row d-flex justify-content-center">
    <div class="col-xl-7 pb-2">
      <br>
    <h4 class="text-center font-weight-bold mb-4 pb-2">{balanceavailable}: $<?php echo isset($balance_available) ? $balance_available : '0.00'; ?></h4>
    <?php if (!empty($credited_user)) { ?>
    <p class="mb-2 text-muted">{user}: <strong><?php echo html_escape($credited_user); ?></strong></p>
    <?php } ?>
    <?php if (!empty($payment_amount) && $payment_amount !== '0.00') { ?>
    <p class="mb-2 text-muted">{price}: <strong>$<?php echo html_escape($payment_amount); ?></strong></p>
    <?php } ?>
    <?php if (!empty($payment_status_value)) { ?>
    <p class="mb-4 text-muted text-uppercase">{status}: <strong><?php echo html_escape($payment_status_value); ?></strong></p>
    <?php } ?>
    <a href="<?php echo base_url('userpanel'); ?>" type="button" class="btn btn-primary btn-rounded">{return}</a>
    </div>
  </div>
  <div class="pt-2">
  </div>
  </div>
</div>
