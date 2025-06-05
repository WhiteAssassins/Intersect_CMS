<?php
$resultadochangelog = $this->db->get('changelog');
$restchangelog = $resultadochangelog->result_array();
?>



<div class="modal fade" id="modal_newchangelog" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content cards-novo">
        <div class="modal-header text-center">
            <h4 class="modal-title w-100 font-weight-bold">{addchangelog}</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body mx-3">
            <form action="<?php echo base_url('admin/addchangelog'); ?>" method="post"  enctype="multipart/form-data">
                <div class="md-form mb-5">
                    
                    <input type="text" id="defaultForm-email" class="form-control validate" name="title">
                    <label for="defaultForm-email">{title}</label>
                </div>
                <div class="md-form mb-5">
                    <textarea id="form7" class="md-textarea form-control" rows="3" name="text"></textarea>
                    <label for="form7">{description}</label>
                </div>

              
                
        </div>
        
                <div class="modal-footer d-flex justify-content-center">
                    <button class="btn btn-outline-info waves-effect" type="submit">{addchangelog}</button>
                </div>
                </form>
            </div>
        </div>
    </div>













    <button type="button" class="btn btn-outline-white btn-rounded btn-sm px-2 waves-effect waves-light btn_modal_newchangelog " >
            <i class="fas fa-plus mt-0"></i>
          </button>













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
            <form method="POST" action="<?php echo base_url('admin/delchangelog'); ?>">
                <label class="badge badge-danger">
                    <input type="hidden" name="id" value="<?php echo $key['id']; ?>">
                    <button style=" background-color: transparent;  border: 1px;" type="submit">
                    <span class="fa fa-trash">
                </button>
                </label>
                </form>
          </div>
        </li>
        <?php } ?>
      </ul>
    </div>
  </div>
</div>
</div>