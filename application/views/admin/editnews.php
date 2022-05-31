<?php 
            $this->db->like('id',$id);
            $resultado = $this->db->get('news');
            $rest = $resultado->result_array();  
            foreach ($rest as $key) {              
        ?>
    <div class="row">
      <div class="col-md-6 mx-auto ">
        <div class="card  cards-novo">
          <div class="card-body">
            <form class="text-center" style="color: #757575;" action="<?php echo base_url('admin/editnewss'); ?>" method="POST">
              <h3 class="font-weight-bold my-4 pb-2 text-center ">{news}</h3>
                <input type="hidden" name="id" value="<?php echo $key['id']; ?>">
              <input type="text" class="form-control mb-4" placeholder="{title}" value="<?php echo $key['title']; ?>" name="title">
              <input type="text"class="form-control" placeholder="{description}" value="<?php echo $key['descrip']; ?>" name="descrip">
              <br>
              <textarea id="tiny" name="txt" placeholder="{textnews}"><?php echo $key['txt']; ?></textarea>
              <div class="text-center">
                <button type="submit" class="btn btn-outline-orange btn-rounded my-4 waves-effect">{edit}</button>
                <a href="<?php echo base_url('admin/news'); ?>" type="button" class="btn btn-outline-blue btn-rounded my-4 waves-effect">{return}</a>
              </div>
            </form>
            <?php } ?>
          </div>
        </div>
      </div>
    </div>



