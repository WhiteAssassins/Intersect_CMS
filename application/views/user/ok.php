<div class="container" style="padding-top: 100px;">
<div class="jumbotron text-center cards-novo">
  <h2 class="card-title h2">{rechargeok}</h2>
  <div class="row d-flex justify-content-center">
    <div class="col-xl-7 pb-2">
      <br>
    <h4 class="text-center font-weight-bold mb-4 pb-2">{balanceavailable}: $<?php echo isset($balance_available) ? $balance_available : '0.00'; ?></h4>
    <a href="<?php echo base_url('userpanel'); ?>" type="button" class="btn btn-primary btn-rounded">{return}</a>
    </div>
  </div>
  <div class="pt-2">
  </div>
  </div>
</div>
