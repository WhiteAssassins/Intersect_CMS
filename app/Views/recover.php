<div class="container" style="padding-top: 100px;">
<div class="jumbotron text-center cards-novo">
  <p class=" my-4 font-weight-bold"> {recoverpassword}</p>
  <div class="row d-flex justify-content-center">
    <div class="col-xl-7 pb-2">
    <form method="POST" action="<?php echo base_url('recover/rec'); ?>" class="form-admin">
                        <div class="md-form mb-4">
                        <input type="text" id="prefixInside" class="form-control" name="user" placeholder="{user}">
                        </div>
                        <button type="submit" class="btn btn-outline-primary waves-effect">{recover}</button>
                        <a href="<?php echo base_url(); ?>" type="button" class="btn btn-outline-blue btn-rounded my-4 waves-effect">{return}</a>
                        </form>
    </div>
  </div>
  <div class="pt-2">
  </div>
  </div>
</div>