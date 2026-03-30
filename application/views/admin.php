<?php
    if(isset($sms) && $tipo == 'error'){
        echo '<div class="alert alert-info text-center">'.$sms.'</div>';
    };
    if(isset($error)){
        echo '<div class="alert alert-info text-center">'.$error.'</div>';
    };
?>
<div class="container my-1" id="admin">
  <section>
    <div class="row">
      <div class="col-lg-3 col-md-6 mb-4 ">
        <div class="media white z-depth-1 rounded cards-novo">
          <i class="fas fa-user fa-lg blue z-depth-1 p-4 rounded-left text-white mr-3"></i>
          <div class="media-body p-1">
            <p class="text-uppercase text-muted mb-1"><small>{usersregistered}</small></p>
            <h5 class="font-weight-bold mb-0"><?php echo $dashboard_total_users; ?></h5>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 mb-4">
        <div class="media white z-depth-1 rounded cards-novo">
          <i class="fas fa-user-plus fa-lg deep-purple z-depth-1 p-4 rounded-left text-white mr-3"></i>
          <div class="media-body p-1">
            <p class="text-uppercase text-muted mb-1"><small>{useronline}</small></p>
            <h5 class="font-weight-bold mb-0"><?php echo $dashboard_online_count; ?></h5>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 mb-4">
        <div class="media white z-depth-1 rounded cards-novo">
          <i class="fas fa-id-badge fa-lg teal z-depth-1 p-4 rounded-left text-white mr-3"></i>
          <div class="media-body p-1">
            <p class="text-uppercase text-muted mb-1"><small>{totalplayers}</small></p>
            <h5 class="font-weight-bold mb-0"><?php echo $dashboard_total_players; ?></h5>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 mb-4">

        <div class="media white z-depth-1 rounded cards-novo">
          <i class="fas fa-server fa-lg pink z-depth-1 p-4 rounded-left text-white mr-3"></i>
          <div class="media-body p-1">
            <p class="text-uppercase text-muted mb-1"><small>{cps}</small></p>
            <h5 class="font-weight-bold mb-0"><?php echo $dashboard_cps; ?></h5>
          </div>
        </div>
      </div>
    </div>
  </section>
















  <section>
    <div class="row">
      <div class="col-lg-3 col-md-6 mb-4 ">
        <div class="media white z-depth-1 rounded cards-novo">
          <i class="fas fa-microchip fa-lg blue z-depth-1 p-4 rounded-left text-white mr-3"></i>
          <div class="media-body p-1">
            <p class="text-uppercase text-muted mb-1"><small>{ram}</small></p>
            <h5 class="font-weight-bold mb-0"><?php echo $ram_used_gb; ?>/<?php echo $ram_total_gb; ?>GB</h5>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 mb-4">
        <div class="media white z-depth-1 rounded cards-novo">
          <i class="fas fa-hdd fa-lg deep-purple z-depth-1 p-4 rounded-left text-white mr-3"></i>
          <div class="media-body p-1">
            <p class="text-uppercase text-muted mb-1"><small>{hdd}</small></p>
            <h5 class="font-weight-bold mb-0"><?php echo $disk_used_gb; ?>/<?php echo $disk_total_gb; ?>GB</h5>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 mb-4">
        <div class="media white z-depth-1 rounded cards-novo">
          <i class="fas fa-server fa-lg teal z-depth-1 p-4 rounded-left text-white mr-3"></i>
          <div class="media-body p-1">
            <p class="text-uppercase text-muted mb-1"><small>{cpu}</small></p>
            <h5 class="font-weight-bold mb-0"><?php echo $cpu_load_percent; ?>%</h5>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 mb-4">

        <div class="media white z-depth-1 rounded cards-novo">
          <i class="fas fa-code-branch fa-lg pink z-depth-1 p-4 rounded-left text-white mr-3"></i>
          <div class="media-body p-1">
            <p class="text-uppercase text-muted mb-1"><small>{version}</small></p>
            <h5 class="font-weight-bold mb-0"><?php echo $dashboard_version; ?></h5>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>














<div class="container my-5 py-5">


  <!--Section: Block Content-->
  <section>

    <div class="card" style="background-color: #181C30;">
      <div class="card-body">

        <canvas id="lineChart" class="mb-4" height="100"></canvas>

        <!--Grid row-->
        <div class="row text-center text-white">

          <!--Grid column-->
         
          <!--Grid column-->

          <!--Grid column-->
          
          <!--Grid column-->

          <!--Grid column-->
         
          <!--Grid column-->

        </div>
        <!--Grid row-->

      </div>
    </div>


  </section>
  <!--Section: Block Content-->


</div>































</div>

