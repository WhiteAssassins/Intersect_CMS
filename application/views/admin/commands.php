<?php
    if(isset($sms) && $tipo == 'error'){
        echo '<div class="alert alert-info text-center">'.$sms.'</div>';
    };
    if(isset($error)){
        echo '<div class="alert alert-info text-center">'.$error.'</div>';
    };
?>
<div class="container my-1">

<div class="container my-1 px-0 rounded">
<div class="row">
<div class="col-lg-3 col-md-6 mb-4">
<div class="media white z-depth-1 rounded cards-novo">
  <div class="media-body p-1">
  <div class="md-form "> 
                        <form method="POST" action="<?php base_url('admin/direct'); ?>" id="form_direct" class="form-admin">
                        <h4 class="text-center font-weight-bold mb-4 pb-2">{directmessage}</h4>
                        <input type="text" id="prefixInside" class="form-control" name="user" placeholder="{userorplayer}">
                        <br>
                        <input type="text" id="prefixInside" class="form-control" name="txt" placeholder="{message}">
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
                        <form method="POST" action="<?php base_url('admin/proximity'); ?>" id="form_proximity" class="form-admin">
                        <h4 class="text-center font-weight-bold mb-4 pb-2">{mapmessage}</h4>
                        <input type="text" id="prefixInside" class="form-control" name="map" placeholder="{mapid}">
                        <br>
                        <input type="text" id="prefixInside" class="form-control" name="txt" placeholder="{message}">
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
                       <h4 class="text-center font-weight-bold mb-4 pb-2">{globalmessage}</h4>                          
                        <form method="POST" action="<?php base_url('admin/global'); ?>" id="form_global" class="form-admin">
                        <input type="text" id="prefixInside" class="form-control" name="txt" placeholder="{message}">
                        </form>
                    </div>
  </div>
</div>
</div>
<div class="col-lg-3 col-md-6 mb-4">
<div class="media white z-depth-1 rounded cards-novo">
  <div class="media-body p-1">
  <div class="md-form "> 
                        <form method="POST" action="<?php base_url('admin/global'); ?>" id="form_cmd" class="form-admin">
                        <h4 class="text-center font-weight-bold mb-4 pb-2">{consolecommand} (Disabled)</h4>
                        
                        <input type="text" id="prefixInside" class="form-control" name="txt" placeholder="/{command}">
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
                        <form method="POST" action="<?php base_url('admin/ban'); ?>" id="form_ban" class="form-admin">
                        <h4 class="text-center font-weight-bold mb-4 pb-2">{ban}</h4>
                        <input type="text" id="prefixInside" class="form-control" name="user" placeholder="{user}">
                        <br>
                        <input type="text" id="prefixInside" class="form-control" name="reason" placeholder="{reason}">
                        <br>
                        <input type="text" id="prefixInside" class="form-control" name="time" placeholder="{duration}">
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
                       <h4 class="text-center font-weight-bold mb-4 pb-2">{mute}</h4>                          
                        <form method="POST" action="<?php base_url('admin/mute'); ?>" id="form_mute" class="form-admin">
                        <input type="text" id="prefixInside" class="form-control" name="user" placeholder="{user}">
                        <br>
                        <input type="text" id="prefixInside" class="form-control" name="reason" placeholder="{reason}">
                        <br>
                        <input type="text" id="prefixInside" class="form-control" name="time" placeholder="{duration}">
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
                        <form method="POST" action="<?php base_url('admin/unban'); ?>" id="form_unban" class="form-admin">
                        <h4 class="text-center font-weight-bold mb-4 pb-2">{unban}</h4>
                        <input type="text" id="prefixInside" class="form-control" name="user" placeholder="{user}">
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
                        <form method="POST" action="<?php base_url('admin/unmute'); ?>" id="form_unmute" class="form-admin">
                        <h4 class="text-center font-weight-bold mb-4 pb-2">{unmute}</h4>
                        
                        <input type="text" id="prefixInside" class="form-control" name="user" placeholder="{user}">
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
                       <h4 class="text-center font-weight-bold mb-4 pb-2">{teleport}</h4>                          
                        <form method="POST" action="<?php base_url('admin/tp'); ?>" id="form_tp" class="form-admin">
                        <input type="text" id="prefixInside" class="form-control" name="user" placeholder="{user}">
                        <br>
                        <input type="text" id="prefixInside" class="form-control" name="map" placeholder="{mapid}">
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
                        <form method="POST" action="<?php base_url('admin/kick'); ?>" id="form_kick" class="form-admin">
                        <h4 class="text-center font-weight-bold mb-4 pb-2">{kickuser}</h4>
                        <input type="text" id="prefixInside" class="form-control" name="user" placeholder="{user}">
                        </form>
                    </div>
  </div>
</div>

</div>





<div class="col-lg-3 col-md-6 mb-4">

<div class="media white z-depth-1 rounded cards-novo">
  <div class="media-body p-1">
  <div class="md-form "> 
                        <form method="POST" action="<?php base_url('admin/kill'); ?>" id="form_kill" class="form-admin">
                        <h4 class="text-center font-weight-bold mb-4 pb-2">{Kill}</h4>
                        <input type="text" id="prefixInside" class="form-control" name="user" placeholder="{user}">
                        </form>
                    </div>
  </div>
</div>

</div>
</div>
</div>
</div>