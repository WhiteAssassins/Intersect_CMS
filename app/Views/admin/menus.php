<?php
    $conf = $this->db->get('config');
    $conf1 = $conf->result_array();
?>
<div class="container my-5 p-5 z-depth-1 unique-color-dark cards-novo">


  <section class="text-center white-text">

    <h2 class="font-weight-bold mb-4 pb-2 text-uppercase">{features}</h2>
    <a href="https://mdbootstrap.com/docs/b4/jquery/content/icons-list/index.html">{iconlist}</a>
    <h3>Example fas fa-trophy</h3>
    <form method="POST" action="<?php echo base_url('config/editmenus'); ?>" class="form-admin">
    
    <p class="lead mx-auto mb-5"><div class="md-form mb-4"><input type="text" class="form-control" placeholder="{descriptionmenu}" name="menuheader" value="<?php echo $conf1[0]['menuheader']; ?>"></div></p>

    <div class="row">

      <div class="col-md-4 mb-4">

        <div class="md-form mb-4"><input type="text" class="form-control" placeholder="{iconmenu1}" name="menu1icon" value="<?php echo $conf1[0]['menu1icon']; ?>" ></div>
        <h5 class="font-weight-bold my-4 text-uppercase"><div class="md-form mb-4"><input type="text" name="menu1header" class="form-control" placeholder="{titlemenu1}"  value="<?php echo $conf1[0]['menu1header']; ?>" ></div></h5>
        <p class="mb-md-0 mb-5"><div class="md-form mb-4"><input type="text" class="form-control" placeholder="{textmenu1}" name="menu1text" value="<?php echo $conf1[0]['menu1text']; ?>" ></div>        </p>

      </div>
      <div class="col-md-4 mb-4">

      <div class="md-form mb-4"><input type="text" class="form-control" placeholder="{iconmenu2}" name="menu2icon" value="<?php echo $conf1[0]['menu2icon']; ?>" ></div>
        <h5 class="font-weight-bold my-4 text-uppercase"><div class="md-form mb-4"><input type="text" class="form-control" name="menu2header" placeholder="{titlemenu2}"   value="<?php echo $conf1[0]['menu2header']; ?>" ></div></h5>
        <p class="mb-md-0 mb-5"><div class="md-form mb-4"><input type="text" class="form-control" placeholder="{textmenu2}" name="menu2text" value="<?php echo $conf1[0]['menu2text']; ?>" ></div>        </p>

      </div>
      <div class="col-md-4 mb-4">

      <div class="md-form mb-4"><input type="text" class="form-control" placeholder="{iconmenu3}"  name="menu3icon" value="<?php echo $conf1[0]['menu3icon']; ?>" ></div>
        <h5 class="font-weight-bold my-4 text-uppercase"><div class="md-form mb-4"><input type="text" name="menu3header"  class="form-control" placeholder="{titlemenu3}"  value="<?php echo $conf1[0]['menu3header']; ?>" ></div></h5>
        <p class="mb-0"><div class="md-form mb-4"><input type="text" class="form-control" placeholder="{textmenu3}" name="menu3text" value="<?php echo $conf1[0]['menu3text']; ?>" ></div>        </p>
     
      </div>
      
    </div>

  </section>
  <a href="<?php echo base_url('config'); ?>" type="button" class="btn btn-outline-blue btn-rounded my-4 waves-effect">{return}</a>
  <button type="submit" class="btn btn-outline-orange waves-effect">{edit}</button>
      </form>

</div>