<?php 
            $nombre = $this->session->userdata('user');
            $this->db->like('user',$nombre);
            $resultado = $this->db->get('users');
            $rest = $resultado->result_array(); 
?>
<div class="container" style="padding-top: 100px;">
<div class="jumbotron text-center cards-novo">
  <h2 class="card-title h2">Pago Completado Con Exito</h2>
  <div class="row d-flex justify-content-center">
    <div class="col-xl-7 pb-2">
      <br>
    <h4 class="text-center font-weight-bold mb-4 pb-2">Saldo Total: $<?php echo $rest[0]['balance']; ?></h4>
    <a href="<?php echo base_url('userpanel'); ?>" type="button" class="btn btn-primary btn-rounded">{return}</a>
    </div>
  </div>
  <div class="pt-2">
  </div>
  </div>
</div>