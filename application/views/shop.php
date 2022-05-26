<div class="container my-5 cards-novo" style="padding-top: 50px; color:white;">

  <!-- Section: Block Content -->
  <section>

    <h3 class="font-weight-bold text-center  mb-4">Tienda</h3>

    <!-- Carousel Wrapper -->
    <div id="multi-item-example" class="carousel slide carousel-multi-item" data-ride="carousel">
      <!-- Controls -->
      <div class="controls-top mb-4">
        <a class="btn-floating primary-color" href="#multi-item-example" data-slide="prev">
          <i class="fas fa-chevron-left"></i>
        </a>
        <a class="btn-floating primary-color" href="#multi-item-example" data-slide="next">
          <i class="fas fa-chevron-right"></i>
        </a>
      </div>
      <!-- Controls -->
   
      <!-- Slides -->
      <div class="carousel-inner" role="listbox">
        <!-- First slide -->
        <div class="carousel-item pt-3 active">
        <?php 
            $resultado = $this->db->get('products');
            $rest = $resultado->result_array(); 
                
    
            
            foreach ($rest as $key) {              
        ?>

          <div class="col-md-4 mb-4">
            <!-- Card -->
            <div class="card card-ecommerce cards-novo">
              <!-- Card image -->
              <div class="view overlay">
                <img src="<?php echo base_url('img/products/');echo $key['image']; ?>" class="img-fluid"
                  alt="">
                <a>
                  <div class="mask rgba-white-slight"></div>
                </a>
              </div>
              <!-- Card image -->
              <!-- Card content -->
              <div class="card-body">
                <!-- Category & Title -->
                <h5 class="card-title mb-1">
                  <strong>
                    <a href="<?php echo base_url('products/'); echo $key['url_slug']; ?>" class="white-text"><?php echo $key['name']; ?></a>
                  </strong>
                </h5>
               
                <!-- Rating -->
                
                <!-- Card footer -->
                <div class="card-footer pb-0">
                  <div class="row mb-0">
                    <span class="float-left">
                      <strong><?php echo $key['price']; ?>$</strong>
                    </span>
                    <span class="float-right">
                      <a class="" data-toggle="tooltip" data-placement="top" title="Add to Cart">
                        <i class="fas fa-shopping-cart ml-3"></i>
                      </a>
                    </span>
                  </div>
                </div>
              </div>
              <!-- Card content -->
            </div>
            <!-- Card -->
          </div>
          <?php } ?>
         
         
        
        
      </div>
      <!-- Slides -->
    </div>
    <!-- Carousel Wrapper -->

  </section>
  <!-- Section: Block Content -->






  



</div>