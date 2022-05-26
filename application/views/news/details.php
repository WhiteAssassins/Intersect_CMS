<div class="container mt-5  cards-novo">
  <section class="mx-md-5 dark-grey-text">
    <div class="row">
      <div class="col-md-12">
        <div class="card card-cascade wider reverse">
          <div class="view view-cascade overlay " style="margin-top: 40px;">
            <img class="card-img-top" src="<?php echo base_url('img/news/'); echo $newss['img']; ?>" alt="Sample image" >
            <a href="#!">
              <div class="mask rgba-white-slight"></div>
            </a>
          </div>
          <div class="card-body card-body-cascade text-center  cards-novo" style="margin-top: 4px;">
            <h3 class="font-weight-bold"><a><?php echo $newss['title']; ?></a></h3>
            <p>Escrito por <a><strong><?php echo $newss['admin']; ?></strong></a>, <?php echo $newss['date']; ?></p>
          </div>
        </div>
        <div class="mt-5 white-text">
        <?php echo $newss['txt']; ?>
        </div>
        <a href="<?php echo base_url('news'); ?>" class="btn btn-outline-primary btn-rounded waves-effect">Volver</a>
      </div>
    </div>
    <hr class="mb-5 mt-4">
  </section>
</div>