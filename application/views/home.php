<?php
    $conf = $this->db->get('config');
    $conf1 = $conf->result_array();
?>
<div class="container my-5 z-depth-1 px-0 rounded">
<section class="white-text p-4 rounded cards-novo">
  
  <h3 class="text-center font-weight-bold mb-4 pb-2">{statistics}</h3>

  <div class="row">

    <div class="col-md-4 mb-4 ">
      <div class="row">
        <div class="col-6 pr-0">
        <h4 class="display-4 text-right"><span class="d-flex justify-content-end"><span class="count2" data-from="0" data-to="<?php 
        $serverstats = $this->Apiserverstats->serverinfo();
          $uptime = $serverstats['uptime']/1000/60/60 ;
           echo $uptime; 
           ?>" data-time="1000">0</span>H</span></h4>
        </div>

        <div class="col-6">
          <p class="text-uppercase font-weight-normal mb-1">{onlinetime}</p>
          <p class="mb-0"><i class="fas fa-clock fa-2x mb-0"></i></p>
        </div>
      </div>
    </div>

    <div class="col-md-4 mb-4">
      <div class="row">
        <div class="col-6 pr-0">
          <h4 class="display-4 text-right mb-0 count1" data-from="0" data-to="<?php $serverstats = $this->Apiserverstats->serverinfo();  echo $serverstats['onlineCount']; ?>" data-time="1000">1</h4>
        </div>

        <div class="col-6">
          <p class="text-uppercase font-weight-normal mb-1">{useronline}</p>
          <p class="mb-0"><i class="fas fa-user fa-2x mb-0"></i></p>
        </div>
      </div>
    </div>

    <div class="col-md-4 mb-4">
      <div class="row">
        <div class="col-6 pr-0">
          <h4 class="display-4 text-right"><span class="d-flex justify-content-end"><span class="count-up" data-from="0" data-to="<?php 
        $user = $this->Apiusers->user();
           echo $user['Total']; 
           ?>" data-time="500"></span></span></h4>
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
    <p class="lead mx-auto mb-5"><?php echo $conf1[0]['menuheader']; ?></p>

    <div class="row">

      <div class="col-md-4 mb-4">

        <i class="<?php echo $conf1[0]['menu1icon']; ?> fa-3x purple-text"></i>
        <h5 class="font-weight-bold my-4 text-uppercase"><?php echo $conf1[0]['menu1header']; ?></h5>
        <p class="mb-md-0 mb-5"><?php echo $conf1[0]['menu1text']; ?>
        </p>

      </div>
      <div class="col-md-4 mb-4">

        <i class="<?php echo $conf1[0]['menu2icon']; ?> fa-3x purple-text"></i>
        <h5 class="font-weight-bold my-4 text-uppercase"><?php echo $conf1[0]['menu2header']; ?></h5>
        <p class="mb-md-0 mb-5"><?php echo $conf1[0]['menu2text']; ?>
        </p>

      </div>
      <div class="col-md-4 mb-4">

        <i class="<?php echo $conf1[0]['menu3icon']; ?> fa-3x purple-text"></i>
        <h5 class="font-weight-bold my-4 text-uppercase"><?php echo $conf1[0]['menu3header']; ?></h5>
        <p class="mb-0"><?php echo $conf1[0]['menu3text']; ?>
        </p>

      </div>

    </div>

  </section>


</div>

<!--SECTION FEATURES FIN-->



<!--SECTION PASOS-->

 <!--
<div class="container z-depth-1 my-5 pt-5 pb-3 px-5 cards-novo"> -->

  <!-- Section -->
  <!--
  <section  class="white-text">
    
    <style>
      .fa-play:before {
        margin-left: .3rem;
      }

      /* Steps */
      .step {
        list-style: none;
        margin: 0;
      }

      .step-element {
        display: flex;
        padding: 1rem 0;
      }

      .step-number {
        position: relative;
        width: 7rem;
        flex-shrink: 0;
        text-align: center;
      }

      .step-number .number {
        color: #bfc5ca;
        background-color: #eaeff4;
        font-size: 1.5rem;
      }

      .step-number .number {
        width: 48px;
        height: 48px;
        line-height: 48px;
      }

      .number {
        display: inline-flex;
        justify-content: center;
        align-items: center;
        width: 38px;
        border-radius: 10rem;
      }

      .step-number::before {
        content: '';
        position: absolute;
        left: 50%;
        top: 48px;
        bottom: -2rem;
        margin-left: -1px;
        border-left: 2px dashed #eaeff4;
      }

      .step .step-element:last-child .step-number::before {
        bottom: 1rem;
      }
    </style>

    <div class="modal fade" id="modal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
      aria-hidden="true">
      <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="embed-responsive embed-responsive-16by9 z-depth-1-half">
            <iframe id="player" class="embed-responsive-item" src="https://www.youtube.com/embed/7MUISDJ5ZZ4" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
          </div>
        </div>
      </div>
    </div>

    <h3 class="font-weight-bold text-center  pb-2">Tres Sencillos Pasos</h3>
    <hr class="w-header my-4">
  

    <div class="row align-items-center">

      <div class="col-lg-6 mb-4">
        <div class="view z-depth-1-half rounded">
          <img class="rounded img-fluid" src="https://mdbootstrap.com/img/Photos/Horizontal/Work/12-col/img%20(6).jpg" alt="Video title">
        </div>
      </div>

      <div class="col-lg-6 mb-4">

        <ol class="step pl-0">
          <li class="step-element pb-0">
            <div class="step-number">
              <span class="number">1</span>
            </div>
            <div class="step-excerpt">
              <h6 class="font-weight-bold  mb-3">Registrese</h6>
              <p>Para poder Jugar usted necesitara registrarse en nuestra web. Puede hacerlo tocando el boton "Registrarse" en la esquina superior derecha.</p>
            </div>
          </li>
          <li class="step-element pb-0">
            <div class="step-number">
              <span class="number">2</span>
            </div>
            <div class="step-excerpt">
              <h6 class="font-weight-bold  mb-3">Descargue el juego</h6>
              <button class="btn purple-gradient">Descargar</button>
            </div>
          </li>
          <li class="step-element pb-0">
            <div class="step-number">
              <span class="number">3</span>
            </div>
            <div class="step-excerpt">
              <h6 class="font-weight-bold  mb-3">Entre al Servidor</h6>
              <p >Ejecute su cliente y entre a su cuenta. Y luego el ultimo y el mas importante !Disfrute.</p>
            </div>
          </li>
        </ol>

      </div>

    </div>
    
  </section>

-->
</div>


            


<!--SECTION PASOS FIN-->











