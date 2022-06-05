<?php 
            $nombre = $this->session->userdata('user');
            $this->db->like('user',$nombre);
            $resultado = $this->db->get('users');
            $rest = $resultado->result_array(); 
?>
<div class="container" style="padding-top: 50px;">
<div class="jumbotron text-center cards-novo">
  <h2 class="card-title h2"><?php echo $rest[0]['user']; ?></h2>
  <div class="row d-flex justify-content-center">
    <div class="col-xl-7 pb-2">
      <br>
    <h4 class="text-center font-weight-bold mb-4 pb-2">{balanceavailable}: <?php echo $rest[0]['balance']; ?><a href="<?php echo base_url('userpanel/recharge'); ?>"><span class="badge badge-success ml-2"><i class="fas fa-plus"></i></span></a></h4>
            <form method="POST"  action="<?php echo base_url('userpanel/changepassword'); ?>"  class="form-admin" id="form_changepassword">
                <h4 class="text-center font-weight-bold mb-4 pb-2">Cambiar Contraseña</h4>
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
 
  <?php 
            //get the user operative system, ip and location
            $os = $this->agent->platform();
            $ip = $this->input->ip_address();
            $browser = $this->agent->browser();
            $browser_version = $this->agent->version();
            //echo all
            echo '<br><div class="text-left">';
            echo '<p class="text-left">OS: '.$os.'</p>';
            echo '<p class="text-left">IP: '.$ip.'</p>';
            echo '<p class="text-left">{browser}: '.$browser.'</p>';
            echo '</div>';



            ?>

  </div>
</div>