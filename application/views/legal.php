<?php 
    $conf = $this->db->get('config');
    $conf1 = $conf->result_array();
?>
<div class="container" style="padding-top: 100px;">
<div class="jumbotron text-center cards-novo">
  <h2 class="card-title h2">Terminos Legales</h2>
  <p class=" my-4 font-weight-bold"><?php echo $conf1[0]['legal']; ?></p>
  <div class="row d-flex justify-content-center">
    <div class="col-xl-7 pb-2">
    </div>
  </div>
  <div class="pt-2">
  </div>
  </div>
</div>