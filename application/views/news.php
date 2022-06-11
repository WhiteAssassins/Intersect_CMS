<div class="container mt-5 cards-novo">
  <section class="text-center">
    <h3 class="font-weight-bold mb-5" style="padding-top:40px ;">{lastnews}</h3>
    <div class="row">
    <?php 
            $resultado = $this->db->get('news');
            $rest = $resultado->result_array(); 
            foreach (array_reverse($rest) as $key) {    
              if($key['status'] == 1){ 
        ?>
      <div class="col-lg-4 col-md-12 mb-lg-0 mb-4">
        <div class="card hoverable cards-novo" style="     margin-bottom: 40px;">
          <a href="<?php echo base_url('news/'); echo $key['url_slug']; ?>" class="white-text">
          <img class="card-img-top" src="<?php echo base_url('img/news/'); echo $key['img']; ?>" alt="Card image cap">
          </a>
          <div class="card-body ">
           <a href="<?php echo base_url('news/'); echo $key['url_slug']; ?>" class="white-text"> <p class="card-title text-uppercase font-small mt-1 mb-3"><?php echo $key['title']; ?></p></a>
            <p class="mb-2"><?php echo $key['descrip']; ?></p>
          </div>
        </div>
      </div>  
<?php 
              }
} ?>
    </div>
  </section>
</div>