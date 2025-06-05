<?php 
            $this->db->like('id',$id);
            $resultado = $this->db->get('products');
            $rest = $resultado->result_array(); 
            foreach ($rest as $key) {              
        ?>
    <div class="row">
      <div class="col-md-6 mx-auto ">
        <div class="card  cards-novo">
          <div class="card-body">
            <form class="text-center" style="color: #757575;" action="<?php echo base_url('admin/editproducts'); ?>" method="POST">
              <h3 class="font-weight-bold my-4 pb-2 text-center ">{editproduct}</h3>
                <input type="hidden" name="id" value="<?php echo $key['id']; ?>">
              <input type="text" class="form-control mb-4" placeholder="Titulo" value="<?php echo $key['name']; ?>" name="name">
              <input type="text"class="form-control" placeholder="Descripción" value="<?php echo $key['descrip']; ?>" name="descrip">
              <br>
              <input type="text"class="form-control" placeholder="Precio" value="<?php echo $key['price']; ?>" name="price">
              <br>
              <input type="text"class="form-control" placeholder="Animación de Ataque" value="<?php echo $key['aatk']; ?>" name="aatk">
              <br>
              <input type="text"class="form-control" placeholder="Animación de interacción" value="<?php echo $key['ainterac']; ?>" name="ainterac">
              <br>
              <input type="text"class="form-control" placeholder="Ingame ID" value="<?php echo $key['ingameid']; ?>" name="ingameid">
              <div class="text-center">
                <button type="submit" class="btn btn-outline-orange btn-rounded my-4 waves-effect">{edit}</button>
                <a href="<?php echo base_url('admin/shop'); ?>" type="button" class="btn btn-outline-blue btn-rounded my-4 waves-effect">{return}</a>
              </div>
            </form>
            <?php } ?>
          </div>
        </div>
      </div>
    </div>