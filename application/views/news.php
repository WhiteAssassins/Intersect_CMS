<div class="container mt-5 cards-novo">
  <section class="text-center">
    <h3 class="font-weight-bold mb-5" style="padding-top:40px ;">{lastnews}</h3>
    <div class="row">
    <?php foreach ($news_items as $item) { ?>
      <div class="col-lg-4 col-md-12 mb-lg-0 mb-4">
        <div class="card hoverable cards-novo" style="     margin-bottom: 40px;">
          <a href="<?php echo $item['url']; ?>" class="white-text">
          <img class="card-img-top" src="<?php echo $item['image_url']; ?>" alt="Card image cap">
          </a>
          <div class="card-body ">
           <a href="<?php echo $item['url']; ?>" class="white-text"> <p class="card-title text-uppercase font-small mt-1 mb-3"><?php echo $item['title']; ?></p></a>
            <p class="mb-2"><?php echo $item['description']; ?></p>
          </div>
        </div>
      </div>  
<?php } ?>
    </div>
  </section>
</div>
