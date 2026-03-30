<div class="container my-5 z-depth-1 px-0 rounded" >
<section class="white-text p-4 rounded cards-novo" >
  
  <h3 class="text-center font-weight-bold mb-4 pb-2">{statistics}</h3>

  <div class="row" >

    <div class="col-md-4 mb-4 ">
      <div class="row">
        <div class="col-6 pr-0">
        <h4 class="display-4 text-right"><span class="d-flex justify-content-end"><span  class="count2" data-from="0" data-to="<?php echo $home_uptime_hours; ?>" data-time="1000">0</span>H</span></h4>
        </div>

        <div class="col-6">
          <p class="text-uppercase font-weight-normal mb-1">{onlinetime}</p>
          <p class="mb-0"><i class="fas fa-clock fa-2x mb-0"></i></p>
        </div>
      </div>
    </div>

    <div class="col-md-4 mb-4">
      <div class="row">
        <div class="col-6 pr-0" >
          <h4 class="display-4 text-right mb-0 count1" data-from="0" data-to="<?php echo $home_online_count; ?>" data-time="1000">1</h4>
        </div>

        <div class="col-6">
          <p class="text-uppercase font-weight-normal mb-1">{useronline}</p>
          <p class="mb-0"><i class="fas fa-user fa-2x mb-0"></i></p>
        </div>
      </div>
    </div>

    <div class="col-md-4 mb-4" >
      <div class="row" >
        <div class="col-6 pr-0" >
          <h4 class="display-4 text-right"><span class="d-flex justify-content-end"><span class="count-up" data-from="0" data-to="<?php echo $home_total_users; ?>" data-time="500"></span></span></h4>
        </div>

        <div class="col-6">
          <p class="text-uppercase font-weight-normal mb-1">{usersregistered}</p>
          <p class="mb-0"><i class="fas fa-user-plus fa-2x mb-0"></i></p>
        </div>
      </div>
    </div>

  </div>

</section>


</div>
    
  
<div class="container my-5 p-5 z-depth-1 unique-color-dark cards-novo">


  <section class="text-center white-text">

    <h2 class="font-weight-bold mb-4 pb-2 text-uppercase">{features}</h2>
    <p class="lead mx-auto mb-5"><?php echo $home_menu_header; ?></p>

    <div class="row">

      <div class="col-md-4 mb-4">

        <i class="<?php echo $home_menu1_icon; ?> fa-3x purple-text"></i>
        <h5 class="font-weight-bold my-4 text-uppercase"><?php echo $home_menu1_header; ?></h5>
        <p class="mb-md-0 mb-5"><?php echo $home_menu1_text; ?>
        </p>

      </div>
      <div class="col-md-4 mb-4">

        <i class="<?php echo $home_menu2_icon; ?> fa-3x purple-text"></i>
        <h5 class="font-weight-bold my-4 text-uppercase"><?php echo $home_menu2_header; ?></h5>
        <p class="mb-md-0 mb-5"><?php echo $home_menu2_text; ?>
        </p>

      </div>
      <div class="col-md-4 mb-4">

        <i class="<?php echo $home_menu3_icon; ?> fa-3x purple-text"></i>
        <h5 class="font-weight-bold my-4 text-uppercase"><?php echo $home_menu3_header; ?></h5>
        <p class="mb-0"><?php echo $home_menu3_text; ?>
        </p>

      </div>

    </div>

  </section>


</div>



    </div>
    
  </section>

</div>


            













