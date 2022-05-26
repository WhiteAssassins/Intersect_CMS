<div class="container mt-5 cards-novo">


  <!--Section: Content-->
  <section class="text-center">

    <!-- Section heading -->
    <h3 class="font-weight-bold mb-5" style="padding-top:40px ;">Ultimas Noticias</h3>

  	<!-- Grid row -->
    <div class="row">



    <?php 
            $resultado = $this->db->get('news');
            $rest = $resultado->result_array(); 
                
    
            
            foreach ($rest as $key) {              
        ?>
      <!-- Grid column -->
      <div class="col-lg-4 col-md-12 mb-lg-0 mb-4">

        <!-- Card -->
        <div class="card hoverable cards-novo" style="     margin-bottom: 40px;">

          <!-- Card image -->
          <a href="<?php echo base_url('news/'); echo $key['url_slug']; ?>" class="white-text">
          <img class="card-img-top" src="<?php echo base_url('img/news/'); echo $key['img']; ?>" alt="Card image cap">
          </a>
          <!-- Card content -->
          <div class="card-body ">

            <!-- Title -->
           <a href="<?php echo base_url('news/'); echo $key['url_slug']; ?>" class="white-text"> <p class="card-title text-uppercase font-small mt-1 mb-3"><?php echo $key['title']; ?></p></a>
            <!-- Text -->
            <p class="mb-2"><?php echo $key['descrip']; ?></p>

          </div>

        </div>
        <!-- Card -->

      </div>
      <!-- Grid column -->

    
<?php } ?>
      



    </div>
    <!-- Grid row -->

  </section>
  <!--Section: Content-->


</div>