<div class="container" style="padding-top: 100px;">
<div class="jumbotron text-center cards-novo">
  <div class="row d-flex justify-content-center">
    <div class="col-xl-7 pb-2">
      <h4 class="text-center font-weight-bold mb-4 pb-2">{balanceavailable}: <?php echo $panel_balance; ?></h4>
      <div class="mt-5">
        <form method="POST" action="<?php echo base_url('userpanel/rechargin'); ?>">
          <?php echo cms_csrf_field(); ?>
          <div class="md-form mb-4">
                    <i class="fas fa-dollar-sign"></i>
                    <input type="number" step="0.01" min="0.01" id="prefixInside" class="form-control" name="cant" placeholder="0.01" required>
                </div>
            <p class="grey-text">{paymentmethod}</p>
            <div class="row text-center text-md-left">
              <div class="col-md-4">
                <div class="form-group">
                  <input class="form-check-input" name="billing" type="radio" id="radio102" value="qvapay" checked>
                  <label for="radio102" class="form-check-label dark-grey-text">QvaPay</label>
                </div>
              </div>
            </div>
            <div class="row mt-3 mb-4">
              <div class="col-md-12 text-center text-md-left text-md-right">
              <a href="<?php echo base_url('userpanel'); ?>" type="button" class="btn btn-primary btn-rounded">{return}</a>
                <button type="submit" class="btn btn-primary btn-rounded"> {recharge}</button>
              </div>
            </div>
            </form>
          </div>
    </div>
  </div>
  <div class="pt-2">
  </div>
  </div>
</div>
