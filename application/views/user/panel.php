<?php 
            $nombre = $this->session->userdata('user');
            $this->db->like('user',$nombre);
            $resultado = $this->db->get('users');
            $rest = $resultado->result_array(); 
?>
<div class="container" style="padding-top: 100px;">
<div class="jumbotron text-center cards-novo">
  <h2 class="card-title h2"><?php echo $rest[0]['user']; ?></h2>
  <div class="row d-flex justify-content-center">
    <div class="col-xl-7 pb-2">
      <br>
    <h4 class="text-center font-weight-bold mb-4 pb-2">Saldo Disponible: <?php echo $rest[0]['balance']; ?><a href="<?php echo base_url('userpanel/recharge'); ?>"><span class="badge badge-success ml-2"><i class="fas fa-plus"></i></span></a></h4>
    
    </div>
  </div>
  <div class="pt-2">
  </div>
  </div>
</div>