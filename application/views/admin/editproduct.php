<div class="row">
  <div class="col-md-6 mx-auto ">
    <div class="card  cards-novo">
      <div class="card-body">
        <form class="text-center" style="color: #757575;" action="<?php echo base_url('admin/editproducts'); ?>" method="POST">
          <h3 class="font-weight-bold my-4 pb-2 text-center ">{editproduct}</h3>
            <input type="hidden" name="id" value="<?php echo $product_id; ?>">
          <input type="text" class="form-control mb-4" placeholder="Titulo" value="<?php echo $product_name_value; ?>" name="name">
          <input type="text"class="form-control" placeholder="DescripciÃ³n" value="<?php echo $product_description_value; ?>" name="descrip">
          <br>
          <input type="text"class="form-control" placeholder="Precio" value="<?php echo $product_price_value; ?>" name="price">
          <br>
          <input type="text"class="form-control" placeholder="AnimaciÃ³n de Ataque" value="<?php echo $product_attack_animation_value; ?>" name="aatk">
          <br>
          <input type="text"class="form-control" placeholder="AnimaciÃ³n de interacciÃ³n" value="<?php echo $product_interaction_animation_value; ?>" name="ainterac">
          <br>
          <input type="text"class="form-control" placeholder="Ingame ID" value="<?php echo $product_ingame_id_value; ?>" name="ingameid">
          <div class="text-center">
            <button type="submit" class="btn btn-outline-orange btn-rounded my-4 waves-effect">{edit}</button>
            <a href="<?php echo base_url('admin/shop'); ?>" type="button" class="btn btn-outline-blue btn-rounded my-4 waves-effect">{return}</a>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
