<?php
    if(isset($sms) && $tipo == 'error'){
        echo '<div class="alert alert-info text-center">'.$sms.'</div>';
    };
    if(isset($error)){
        echo '<div class="alert alert-info text-center">'.$error.'</div>';
    };
?>
<div class="container my-3">
  <section>
    <div class="row">
      <div class="col-lg-3 col-md-6 mb-4 ">
        <div class="media white z-depth-1 rounded cards-novo">
          <i class="fas fa-user fa-lg blue z-depth-1 p-4 rounded-left text-white mr-3"></i>
          <div class="media-body p-1">
            <p class="text-uppercase text-muted mb-1"><small>Usuarios Registrados</small></p>
            <h5 class="font-weight-bold mb-0"><?php 
        $user = $this->Apiusers->user();
           echo $user['Total']; 
           ?></h5>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 mb-4">
        <div class="media white z-depth-1 rounded cards-novo">
          <i class="fas fa-user-plus fa-lg deep-purple z-depth-1 p-4 rounded-left text-white mr-3"></i>
          <div class="media-body p-1">
            <p class="text-uppercase text-muted mb-1"><small>Usuarios Online</small></p>
            <h5 class="font-weight-bold mb-0"><?php $serverstats = $this->Apiserverstats->serverinfo();  echo $serverstats['onlineCount']; ?></h5>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 mb-4">
        <div class="media white z-depth-1 rounded cards-novo">
          <i class="fas fa-id-badge fa-lg teal z-depth-1 p-4 rounded-left text-white mr-3"></i>
          <div class="media-body p-1">
            <p class="text-uppercase text-muted mb-1"><small>Personajes Totales</small></p>
            <h5 class="font-weight-bold mb-0"><?php $players = $this->Apiplayers->player();  echo $players['Total']; ?></h5>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 mb-4">

        <div class="media white z-depth-1 rounded cards-novo">
          <i class="fas fa-server fa-lg pink z-depth-1 p-4 rounded-left text-white mr-3"></i>
          <div class="media-body p-1">
            <p class="text-uppercase text-muted mb-1"><small>CPS Server</small></p>
            <h5 class="font-weight-bold mb-0"><?php $serverstats = $this->Apiserverstats->serverinfo();  echo $serverstats['cps']; ?></h5>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
<div class="container my-1 px-0 rounded">
<div class="row">
<div class="col-lg-3 col-md-6 mb-4">
<div class="media white z-depth-1 rounded cards-novo">
  <div class="media-body p-1">
  <div class="md-form "> 
                        <form method="POST" action="<?php echo base_url('admin/direct'); ?>" id="form_direct" class="form-admin">
                        <h4 class="text-center font-weight-bold mb-4 pb-2">Mensaje Directo</h4>
                        <input type="text" id="prefixInside" class="form-control" name="user" placeholder="Usuario o Personaje">
                        <br>
                        <input type="text" id="prefixInside" class="form-control" name="txt" placeholder="Mensaje">
                        <button  style="display:none" type="submit"></button>
                        </form>
                    </div>
  </div>
</div>
</div>
<div class="col-lg-3 col-md-6 mb-4">
<div class="media white z-depth-1 rounded cards-novo">
  <div class="media-body p-1">
  <div class="md-form "> 
                        <form method="POST" action="<?php echo base_url('admin/proximity'); ?>" id="form_proximity" class="form-admin">
                        <h4 class="text-center font-weight-bold mb-4 pb-2">Mensaje a Mapa</h4>
                        <input type="text" id="prefixInside" class="form-control" name="map" placeholder="ID Mapa">
                        <br>
                        <input type="text" id="prefixInside" class="form-control" name="txt" placeholder="Mensaje">
                        <button  style="display:none" type="submit"></button>
                        </form>
                    </div>
  </div>
</div>
</div>
<div class="col-lg-3 col-md-6 mb-4">
<div class="media white z-depth-1 rounded cards-novo">
  <div class="media-body p-1">
  <div class="md-form "> 
                       <h4 class="text-center font-weight-bold mb-4 pb-2">Mensaje Global</h4>                          
                        <form method="POST" action="<?php echo base_url('admin/global'); ?>" id="form_global" class="form-admin">
                        <input type="text" id="prefixInside" class="form-control" name="txt" placeholder="Mensaje">
                        </form>
                    </div>
  </div>
</div>
</div>
<div class="col-lg-3 col-md-6 mb-4">
<div class="media white z-depth-1 rounded cards-novo">
  <div class="media-body p-1">
  <div class="md-form "> 
                        <form method="POST" action="<?php echo base_url('admin/global'); ?>" id="form_cmd" class="form-admin">
                        <h4 class="text-center font-weight-bold mb-4 pb-2">Comando Consola (Disabled)</h4>
                        
                        <input type="text" id="prefixInside" class="form-control" name="txt" placeholder="/Comando">
                        </form>
                    </div>
  </div>
</div>
</div>
</div>
</div>
<div class="container my-1 px-0 rounded">
<div class="row">
<div class="col-lg-3 col-md-6 mb-4">
<div class="media white z-depth-1 rounded cards-novo">
  <div class="media-body p-1">
  <div class="md-form "> 
                        <form method="POST" action="<?php echo base_url('admin/ban'); ?>" id="form_ban" class="form-admin">
                        <h4 class="text-center font-weight-bold mb-4 pb-2">Banear</h4>
                        <input type="text" id="prefixInside" class="form-control" name="user" placeholder="Usuario">
                        <br>
                        <input type="text" id="prefixInside" class="form-control" name="reason" placeholder="Razon">
                        <br>
                        <input type="text" id="prefixInside" class="form-control" name="time" placeholder="Duracion (Dias)">
                        <button  style="display:none" type="submit"></button>
                        </form>
                    </div>
  </div>
</div>
</div>
<div class="col-lg-3 col-md-6 mb-4">
<div class="media white z-depth-1 rounded cards-novo">
  <div class="media-body p-1">
  <div class="md-form "> 
                       <h4 class="text-center font-weight-bold mb-4 pb-2">Mutear</h4>                          
                        <form method="POST" action="<?php echo base_url('admin/mute'); ?>" id="form_mute" class="form-admin">
                        <input type="text" id="prefixInside" class="form-control" name="user" placeholder="Usuario o Personaje">
                        <br>
                        <input type="text" id="prefixInside" class="form-control" name="reason" placeholder="Razon">
                        <br>
                        <input type="text" id="prefixInside" class="form-control" name="time" placeholder="Duracion (Dias)">
                        <button  style="display:none" type="submit"></button>
                        </form>
                    </div>
  </div>
</div>
</div>
<div class="col-lg-3 col-md-6 mb-4">
<div class="media white z-depth-1 rounded cards-novo">
  <div class="media-body p-1">
  <div class="md-form "> 
                        <form method="POST" action="<?php echo base_url('admin/unban'); ?>" id="form_unban" class="form-admin">
                        <h4 class="text-center font-weight-bold mb-4 pb-2">Desbanear</h4>
                        <input type="text" id="prefixInside" class="form-control" name="user" placeholder="Usuario">
                        <button  style="display:none" type="submit"></button>
                        </form>
                    </div>
  </div>
</div>
</div>
<div class="col-lg-3 col-md-6 mb-4">
<div class="media white z-depth-1 rounded cards-novo">
  <div class="media-body p-1">
  <div class="md-form "> 
                        <form method="POST" action="<?php echo base_url('admin/unmute'); ?>" id="form_unmute" class="form-admin">
                        <h4 class="text-center font-weight-bold mb-4 pb-2">Desmutear</h4>
                        
                        <input type="text" id="prefixInside" class="form-control" name="user" placeholder="Usuario">
                        <button  style="display:none" type="submit"></button>
                        </form>
                    </div>
  </div>
</div>
</div>
</div>
</div>











































<div class="container my-1 px-0 rounded">
<div class="row">



<div class="col-lg-3 col-md-6 mb-4">

<div class="media white z-depth-1 rounded cards-novo">
  <div class="media-body p-1">
  <div class="md-form "> 
                       <h4 class="text-center font-weight-bold mb-4 pb-2">Teletransportar</h4>                          
                        <form method="POST" action="<?php echo base_url('admin/tp'); ?>" id="form_tp" class="form-admin">
                        <input type="text" id="prefixInside" class="form-control" name="user" placeholder="Usuario">
                        <br>
                        <input type="text" id="prefixInside" class="form-control" name="map" placeholder="Id Mapa">
                        <button  style="display:none" type="submit"></button>
                        </form>
                    </div>
  </div>
</div>

</div>







<div class="col-lg-3 col-md-6 mb-4">

<div class="media white z-depth-1 rounded cards-novo">
  <div class="media-body p-1">
  <div class="md-form "> 
                        <form method="POST" action="<?php echo base_url('admin/kick'); ?>" id="form_kick" class="form-admin">
                        <h4 class="text-center font-weight-bold mb-4 pb-2">Kick User</h4>
                        <input type="text" id="prefixInside" class="form-control" name="user" placeholder="Usuario">
                        </form>
                    </div>
  </div>
</div>

</div>





<div class="col-lg-3 col-md-6 mb-4">

<div class="media white z-depth-1 rounded cards-novo">
  <div class="media-body p-1">
  <div class="md-form "> 
                        <form method="POST" action="<?php echo base_url('admin/kill'); ?>" id="form_kill" class="form-admin">
                        <h4 class="text-center font-weight-bold mb-4 pb-2">Asesinar</h4>
                        <input type="text" id="prefixInside" class="form-control" name="user" placeholder="Usuario">
                        </form>
                    </div>
  </div>
</div>

</div>



















</div>
</div>

