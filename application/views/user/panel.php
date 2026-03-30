<div class="container" style="padding-top: 50px;">
<div class="jumbotron text-center cards-novo">
  <h2 class="card-title h2"><?php echo $panel_username; ?></h2>
  <div class="row d-flex justify-content-center">
    <div class="col-xl-7 pb-2">
      <br>
    <h4 class="text-center font-weight-bold mb-4 pb-2">{balanceavailable}: <?php echo $panel_balance; ?><a href="<?php echo base_url('userpanel/recharge'); ?>"><span class="badge badge-success ml-2"><i class="fas fa-plus"></i></span></a></h4>
                <form method="POST"  action="<?php echo base_url('userpanel/changepassword'); ?>"  class="form-admin" id="form_changepassword">
                  <?php echo cms_csrf_field(); ?>
                <h4 class="text-center font-weight-bold mb-4 pb-2">{changepassword}</h4>
                <div class="md-form mb-4">
                    <input type="password" id="prefixInside" class="form-control" name="oldpassword" placeholder="{oldpassword}" required>
                </div>
                <div class="md-form mb-4">
                    <input type="password" id="prefixInside" class="form-control" name="newpassword" placeholder="{newpassword}" required>
                </div>
                <div class="md-form mb-4">
                    <input type="password" id="prefixInside" class="form-control" name="confirmnewpassword" placeholder="{confirmnewpassword}"  required>
                </div>
                <button type="submit" class="btn btn-outline-info waves-effect" style="margin-left: 65px;">{change}</button>
                <button type="reset" class="btn btn-outline-warning waves-effect" style="margin-left: 65px;">{reset}</button>
            </form>
    </div>
  </div>
 
  <br><div class="text-left">
    <p class="text-left">OS: <?php echo $panel_os; ?></p>
    <p class="text-left">IP: <?php echo $panel_ip; ?></p>
    <p class="text-left">{browser}: <?php echo $panel_browser; ?></p>
  </div>

  </div>
</div>
