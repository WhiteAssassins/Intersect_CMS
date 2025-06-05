<div class="container my-5 cards-novo" style="padding-top: 50px; color:white;">

  <section>

    <h3 class="font-weight-bold text-center  mb-4">{shop}</h3>

    <div id="multi-item-example" class="carousel slide carousel-multi-item" data-ride="carousel">
      
      <div class="carousel-inner" role="listbox">
        <div class="carousel-item pt-3 active">
        <?php 
            $resultado = $this->db->get('products');
            $rest = $resultado->result_array();     
            foreach ($rest as $key) {         
              if($key['status'] == 1){     
        ?>
          <div class="col-md-4 mb-4">
            <div class="card card-ecommerce cards-novo">
              <div class="view overlay">
                <img src="<?php echo base_url('img/products/');echo $key['image']; ?>" class="img-fluid"
                  alt="">
                <a>
                  <div class="mask rgba-white-slight"></div>
                </a>
              </div>
              <div class="card-body">
                <h5 class="card-title mb-1">
                  <strong>
                    <a href="<?php echo base_url('products/'); echo $key['url_slug']; ?>" class="white-text"><?php echo $key['name']; ?></a>
                  </strong>
                </h5>
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
            </div>
          </div>
          <?php 
              }
        } ?>        
      </div>
    </div>
  </section>
</div>