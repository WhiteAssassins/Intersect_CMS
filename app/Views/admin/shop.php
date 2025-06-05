<?php 
$resultadonews = $this->db->get('products');
$restnews = $resultadonews->result_array();
?>
<div class="modal fade" id="modal_addproduct" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content cards-novo">
        <div class="modal-header text-center">
            <h4 class="modal-title w-100 font-weight-bold">{addproduct}</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body mx-3">
            <form action="<?php echo base_url('admin/addproduct'); ?>" method="post"  enctype="multipart/form-data">
                <div class="md-form mb-5">
                    
                    <input type="text" id="defaultForm-email" class="form-control validate" name="name">
                    <label for="defaultForm-email">{name}</label>
                </div>

                <div class="md-form mb-4">
                   
                    <input type="text" id="defaultForm-pass" class="form-control validate" name="descrip">
                    <label for="defaultForm-pass">{description}</label>
                </div>
                <div class="md-form mb-4">
                   
                   <input type="text" id="defaultForm-pass" class="form-control validate" name="price">
                   <label for="defaultForm-pass">{price}</label>
               </div>
               <div class="md-form mb-4">
                   
                   <input type="text" id="defaultForm-pass" class="form-control validate" name="aatk">
                   <label for="defaultForm-pass">{atackan}</label>
               </div>
               <div class="md-form mb-4">
                   
                   <input type="text" id="defaultForm-pass" class="form-control validate" name="ainterac">
                   <label for="defaultForm-pass">{interacan}</label>
               </div>
               <div class="md-form mb-4">
                   
                   <input type="text" id="defaultForm-pass" class="form-control validate" name="ingameid">
                   <label for="defaultForm-pass">{ingameid}</label>
               </div>
                
        </div>
        <div class="md-form mb-4">
<div class="file-field">
    <a class="btn-file-c btn-floating blue-gradient mt-0 float-left">
        <i class="fas fa-paperclip" aria-hidden="true"></i>
        <input type="file" name="archivo">
    </a>
    <div class="file-path-wrapper">
        <input class="file-path validate" type="text" placeholder="{productpic}">
    </div>
</div>
</div>
                <div class="modal-footer d-flex justify-content-center">
                    <button class="btn btn-outline-info waves-effect" type="submit">{addproduct}</button>
                </div>
                </form>
            </div>
        </div>
    </div>
<div class="container my-5 py-5">
<div class="card card-cascade narrower cards-novo">
  <div
    class="view view-cascade gradient-card-header blue-gradient narrower py-2 mx-4 mb-3 d-flex justify-content-between align-items-center">
    <div>
          <button type="button" class="btn btn-outline-white btn-rounded btn-sm px-2 waves-effect waves-light btn_modal_addproduct " >
            <i class="fas fa-plus mt-0"></i>
          </button>
          <a href="#" style="padding-left: 400px;"  class="white-text mx-3">{products}</a>
        </div>
  </div>
  <div class="px-4 ">
    <div class="table-wrapper">
      <table class="table table-hover mb-0">
        <thead>
          <tr>
            <th class="th-lg">
              <a>{name}
                <i class="fas fa-sort ml-1"></i>
              </a>
            </th>
            <th class="th-lg">
              <a>{price}
                <i class="fas fa-sort ml-1"></i>
              </a>
            </th>
            <th class="th-lg">
              <a>{description}
                <i class="fas fa-sort ml-1"></i>
              </a>
            </th>
            <th class="th-lg">
              <a>{atackan}
                <i class="fas fa-sort ml-1"></i>
              </a>
            </th>
            <th class="th-lg">
              <a>{interacan}
                <i class="fas fa-sort ml-1"></i>
              </a>
            </th>
            <th class="th-lg">
              <a>{action}
                <i class="fas fa-sort ml-1"></i>
              </a>
            </th>
          </tr>
        </thead>
        <tbody>

        <?php 
                                     
           foreach (array_reverse($restnews) as $key) { 
                                        
         ?>

          <tr>
            <td><?php echo $key['name']; ?></td>
            <td>$<?php echo $key['price']; ?></td>
            <td><?php echo $key['descrip']; ?></td>
            <td><?php echo $key['aatk']; ?></td>
            <td><?php echo $key['ainterac']; ?></td>
            <td>
                <div class="row">
                <form method="POST" action="<?php echo base_url('admin/delproduct'); ?>">
                <label class="badge badge-danger">
                    <input type="hidden" name="id" value="<?php echo $key['id']; ?>">
                    <button style=" background-color: transparent;  border: 1px;" type="submit">
                    <span class="fa fa-trash">
                </button>
                </label>
                </form>
                         
               
                <form method="POST" action="<?php echo base_url('admin/editproduct'); ?>" style="padding-left: 10px;">
                <label class="badge badge-warning">
                    <input type="hidden" name="id" value="<?php echo $key['id']; ?>">
                    <button style=" background-color: transparent;  border: 1px;" type="submit">
                    <span class="fas fa-pen">
                </button>
                </label>
                </form>

                <?php if($key['status'] == 1){ ?>
                  <form method="POST" action="<?php echo base_url('admin/statusproduct'); ?>" style="padding-left: 10px;">
                <label class="badge badge-danger">
                    <input type="hidden" name="id" value="<?php echo $key['id']; ?>">
                    <button style=" background-color: transparent;  border: 1px;" type="submit">
                    <span class="fas fa-eye">
                </button>
                </label>
                </form>

                  <?php }else{?>

                    <form method="POST" action="<?php echo base_url('admin/statusproduct'); ?>" style="padding-left: 10px;">
                <label class="badge badge-success">
                    <input type="hidden" name="id" value="<?php echo $key['id']; ?>">
                    <button style=" background-color: transparent;  border: 1px;" type="submit">
                    <span class="fas fa-eye">
                </button>
                </label>
                </form>

                    <?php }?>

                </div>
            </td>
          </tr>
        
          <?php
                            }
                        ?>  
        </tbody>
      </table>
    </div>
  </div>
</div>
</div>