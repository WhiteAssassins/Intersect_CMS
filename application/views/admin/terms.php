<?php 
            $resultado = $this->db->get('config');
            $rest = $resultado->result_array();          
        ?>
    <div class="row">
      <div class="col-md-6 mx-auto ">
        <div class="card  cards-novo">
          <div class="card-body">
            <form class="text-center" style="color: #757575;" action="<?php echo base_url('config/changeterms'); ?>" method="POST">
              <h3 class="font-weight-bold my-4 pb-2 text-center ">{editterms}</h3>
                <input type="hidden" name="id" value="<?php echo $rest[0]['id']; ?>">
              <textarea id="tiny" name="terms" placeholder="{textterms}"><?php echo $rest[0]['terms']; ?></textarea>
              <div class="text-center">
                <button type="submit" class="btn btn-outline-orange btn-rounded my-4 waves-effect">{edit}</button>
                <a href="<?php echo base_url('config'); ?>" type="button" class="btn btn-outline-blue btn-rounded my-4 waves-effect">{return}</a>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>



