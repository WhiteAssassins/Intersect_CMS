<?php 
            $this->db->like('id',$id);
            $resultado = $this->db->get('news');
            $rest = $resultado->result_array(); 
           
                
    
            
            foreach ($rest as $key) {              
        ?>



<!--Section: Content-->




    <div class="row">
      <div class="col-md-6 mx-auto ">
        <!-- Material form login -->
        <div class="card  cards-novo">

          <!--Card content-->
          <div class="card-body">

            <!-- Form -->
            <form class="text-center" style="color: #757575;" action="<?php echo base_url('admin/editnewss'); ?>" method="POST">

              <h3 class="font-weight-bold my-4 pb-2 text-center ">Editar Noticia</h3>

              <!-- Name -->
                <input type="hidden" name="id" value="<?php echo $key['id']; ?>">
            
              <input type="text" class="form-control mb-4" placeholder="Titulo" value="<?php echo $key['title']; ?>" name="title">

              <!-- Email -->
              <input type="text"class="form-control" placeholder="Descripción" value="<?php echo $key['descrip']; ?>" name="descrip">

              <br>








              <textarea id="tiny" name="txt" placeholder="Texto de la Noticia"><?php echo $key['txt']; ?></textarea>









              <div class="text-center">
                <button type="submit" class="btn btn-outline-orange btn-rounded my-4 waves-effect">Editar</button>
                <a href="<?php echo base_url('admin/news'); ?>" type="button" class="btn btn-outline-blue btn-rounded my-4 waves-effect">Volver</a>
              </div>

            </form>
            <!-- Form -->
            <?php } ?>
          </div>

        </div>
        <!-- Material form login -->
      </div>
    </div>




<!--Section: Content-->




