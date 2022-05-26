<div class="container mt-5  cards-novo">


  <!--Section: Content-->
  <section class="mx-md-5 dark-grey-text">

  	<!-- Grid row -->
    <div class="row">

      <!-- Grid column -->
      <div class="col-md-12">

        <!-- Card -->
        <div class="card card-cascade wider reverse">

          <!-- Card image -->
          <div class="view view-cascade overlay " style="margin-top: 40px;">
            <img class="card-img-top" src="https://mdbootstrap.com/img/Photos/Slides/img%20(142).jpg" alt="Sample image" >
            <a href="#!">
              <div class="mask rgba-white-slight"></div>
            </a>
          </div>

          <!-- Card content -->
          <div class="card-body card-body-cascade text-center  cards-novo" style="margin-top: 4px;">

            <!-- Title -->
            <h3 class="font-weight-bold"><a><?php echo $newss['title']; ?></a></h3>
            <!-- Data -->
            <p>Escrito por <a><strong><?php echo $newss['admin']; ?></strong></a>, <?php echo $newss['date']; ?></p>
           

          </div>
          <!-- Card content -->

        </div>
        <!-- Card -->

        <!-- Excerpt -->
        <div class="mt-5 white-text">

        <?php echo $newss['txt']; ?>
          

        </div>
        <a href="<?php echo base_url('news'); ?>" class="btn btn-outline-primary btn-rounded waves-effect">Volver</a>
      </div>
      <!-- Grid column -->

    </div>
    <!-- Grid row -->

    <hr class="mb-5 mt-4">

  </section>
  <!--Section: Content-->


</div>