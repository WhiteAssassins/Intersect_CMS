<div class="container my-5 py-5 cards-novo">
  <section class="text-center">
    <h3 class="font-weight-bold mb-5">{productdetail}</h3>
    <div class="row">
      <div class="col-lg-6">
        <div id="carousel-thumb1" class="carousel slide carousel-fade carousel-thumbnails mb-5 pb-4" data-ride="carousel">
          <div class="carousel-inner text-center text-md-left" role="listbox">        
            <div class="carousel-item active">
              <img src="<?php echo base_url('img/products/');echo $products['image']; ?>"
                alt="First slide" class="img-fluid" style="padding-left: 80px;">
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-5 text-center text-md-left">
        <h2 class="h2-responsive text-center text-md-left product-name font-weight-bold  mb-1 ml-xl-0 ml-4"><?php echo $products['name']; ?></h2>
        <h3 class="h3-responsive text-center text-md-left mb-5 ml-xl-0 ml-4">
          <span class="green-text font-weight-bold">
            <strong>$<?php echo $products['price']; ?></strong>
          </span>      
        </h3>
        <div class="font-weight-normal"> 
          <p class="ml-xl-0 ml-4"><?php echo $products['descrip']; ?>.</p>
          <p class="ml-xl-0 ml-4">
            <strong>{atackan}: </strong><?php echo $products['aatk']; ?></p>
          <p class="ml-xl-0 ml-4">
            <strong>{interacan}: </strong><?php echo $products['ainterac']; ?></p>   
          <div class="mt-5">
            <p class="grey-text">{paymentmethod}</p>
            <div class="row text-center text-md-left">
              <form method="POST" action="<?php echo base_url('shop/shoping'); ?>">
              <div class="col-md-4 col-12 ">
                <div class="form-group">
                  <input type="hidden" value="<?php echo $products['id']; ?>" name="id">
                  <input class="form-check-input" name="billing" type="radio" id="radio100" value="paypal">
                  <label for="radio100" class="form-check-label dark-grey-text">Paypal</label>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <input class="form-check-input" name="billing" type="radio" id="radio102" value="qvapay">
                  <label for="radio102" class="form-check-label dark-grey-text">QvaPay</label>
                </div>
              </div>
            </div>
            <div class="row mt-3 mb-4">
              <div class="col-md-12 text-center text-md-left text-md-right">
              <a href="<?php echo base_url('shop'); ?>" type="button" class="btn btn-primary btn-rounded">{return}</a>
                <button type="submit" class="btn btn-primary btn-rounded">
                  <i class="fas fa-cart-plus mr-2" aria-hidden="true"></i> {buy}</button>
              </div>
            </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>