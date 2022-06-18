<?php
$resultadochangelog = $this->db->get('changelog');
$restchangelog = $resultadochangelog->result_array();
?>
<div class="container">
<div class="row">
  <div class="col-md-12">
    <div class="timeline-main">
      <!-- Timeline Wrapper -->
      <ul class="stepper stepper-vertical timeline timeline-basic pl-0">
      <?php                        
                                     foreach (array_reverse($restchangelog) as $key) { 
                                       
                                 ?>      
        <li <?php if($key['type'] == 0){}else{ echo 'class="timeline-inverted"';} ?>>
          <a href="#!">
            <span class="circle info-color z-depth-1-half"><i class="far fa-check" aria-hidden="true"></i></span>
          </a>
          <div class="step-content z-depth-1 <?php if($key['type'] == 0){ echo "ml-2";}else{ echo 'mr-xl-2';}  ?> p-4 cards-novo">
            <h4 class="font-weight-bold"> <?php echo $key['title']; ?></h4>
            <p class="mt-4"><?php echo $key['txt']; ?></p>
          </div>
        </li>
        <?php } ?>
      </ul>
    </div>
  </div>
</div>
</div>