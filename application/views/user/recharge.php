<?php 
            $nombre = $this->session->userdata('user');
            $this->db->like('user',$nombre);
            $resultado = $this->db->get('users');
            $rest = $resultado->result_array(); 
?>
<div class="container" style="padding-top: 100px;">
<div class="jumbotron text-center cards-novo">
  <h2 class="card-title h2"></h2>
  <div class="row d-flex justify-content-center">
    <div class="col-xl-7 pb-2">
   
    <div class="mt-5">
        <form method="POST" action="<?php echo base_url('userpanel/rechargin'); ?>">
         <input type="hidden" name="user" value="<?php echo $nombre; ?>">
          <div class="md-form mb-4">
                    <i class="fas fa-dollar-sign"></i>
                    <input type="number" step="0.01" id="prefixInside" class="form-control" name="cant" placeholder="0.01">
                </div>
            <p class="grey-text">{paymentmethod}</p>
            <div class="row text-center text-md-left">

             
              <div class="col-md-4">
                <div class="form-group">
                  <input class="form-check-input" name="billing" type="radio" id="radio102" value="qvapay">
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