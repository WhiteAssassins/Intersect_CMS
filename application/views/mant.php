<div class="container" style="padding-top: 100px;">
<div class="jumbotron text-center cards-novo">
  <h2 class="card-title h2">{maintenance}</h2>
  <p class=" my-4 font-weight-bold">{maintenancemessage}</p>
  <div class="row d-flex justify-content-center">
    <div class="col-xl-7 pb-2">
    <form method="POST" action="<?php echo base_url('mant/login'); ?>" id="form_ban" class="form-admin" >
                        <h4 class="text-center font-weight-bold mb-4 pb-2">{maintenanceenter}</h4>
                        <div class="md-form mb-4">
                        <input type="text" id="prefixInside" class="form-control" name="user" placeholder="Usuario" autocomplete="new-text" >
                        <br>
                        </div>
                        <div class="md-form mb-4">
                        <input type="password" id="prefixInside" class="form-control" name="pass" placeholder="Contraseña" autocomplete="new-password" >
                        <br>
                        </div>
                        <button type="submit" class="btn btn-outline-primary waves-effect">{enter}</button>
                        </form>
    </div>
  </div>
  <div class="pt-2">
  </div>
  </div>
</div>