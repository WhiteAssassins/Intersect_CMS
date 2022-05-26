<?php 
$resultadonews = $this->db->get('products');
$restnews = $resultadonews->result_array();
?>





<div class="modal fade" id="modal_addproduct" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content cards-novo">
        <div class="modal-header text-center">
            <h4 class="modal-title w-100 font-weight-bold">Añadir nuevo Producto</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body mx-3">
            <form action="<?php echo base_url('admin/addproduct'); ?>" method="post"  enctype="multipart/form-data">
                <div class="md-form mb-5">
                    
                    <input type="text" id="defaultForm-email" class="form-control validate" name="name">
                    <label for="defaultForm-email">Nombre</label>
                </div>

                <div class="md-form mb-4">
                   
                    <input type="text" id="defaultForm-pass" class="form-control validate" name="descrip">
                    <label for="defaultForm-pass">Descripción</label>
                </div>
                <div class="md-form mb-4">
                   
                   <input type="text" id="defaultForm-pass" class="form-control validate" name="price">
                   <label for="defaultForm-pass">Precio</label>
               </div>
               <div class="md-form mb-4">
                   
                   <input type="text" id="defaultForm-pass" class="form-control validate" name="aatk">
                   <label for="defaultForm-pass">Animación Ataque</label>
               </div>
               <div class="md-form mb-4">
                   
                   <input type="text" id="defaultForm-pass" class="form-control validate" name="ainterac">
                   <label for="defaultForm-pass">Animación Interacción</label>
               </div>
                
        </div>
        <div class="md-form mb-4">

<div class="file-field">
    <a class="btn-file-c btn-floating blue-gradient mt-0 float-left">
        <i class="fas fa-paperclip" aria-hidden="true"></i>
        <input type="file" name="archivo">
    </a>
    <div class="file-path-wrapper">
        <input class="file-path validate" type="text" placeholder="Foto del Producto">
    </div>
</div>
</div>
                <div class="modal-footer d-flex justify-content-center">
                    <button class="btn purple-gradient" type="submit">Subir Noticia</button>
                </div>
                </form>
            </div>
        </div>
    </div>













<div class="container my-5 py-5">

<div class="card card-cascade narrower cards-novo">

  <!--Card image-->
  <div
    class="view view-cascade gradient-card-header blue-gradient narrower py-2 mx-4 mb-3 d-flex justify-content-between align-items-center">

    <div>
          <button type="button" class="btn btn-outline-white btn-rounded btn-sm px-2 waves-effect waves-light btn_modal_addproduct " >
            <i class="fas fa-plus mt-0"></i>
          </button>
          <a href="#" style="padding-left: 400px;"  class="white-text mx-3">Productos</a>
        </div>
        

    
  </div>
  <!--/Card image-->

  <div class="px-4 ">

    <div class="table-wrapper">
      <!--Table-->
      <table class="table table-hover mb-0">

        <!--Table head-->
        <thead>
          <tr>
          
            <th class="th-lg">
              <a>Nombre
                <i class="fas fa-sort ml-1"></i>
              </a>
            </th>
            <th class="th-lg">
              <a>Precio
                <i class="fas fa-sort ml-1"></i>
              </a>
            </th>
            <th class="th-lg">
              <a>Descripción
                <i class="fas fa-sort ml-1"></i>
              </a>
            </th>
            <th class="th-lg">
              <a>A.Ataque
                <i class="fas fa-sort ml-1"></i>
              </a>
            </th>
            <th class="th-lg">
              <a>A.Interacción
                <i class="fas fa-sort ml-1"></i>
              </a>
            </th>
            <th class="th-lg">
              <a>Acción
                <i class="fas fa-sort ml-1"></i>
              </a>
            </th>
          </tr>
        </thead>
        <!--Table head-->

        <!--Table body-->
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

                </div>
            </td>
          </tr>
        
          <?php
                            }
                        ?>  
        </tbody>
        <!--Table body-->
      </table>
      <!--Table-->
    </div>

  </div>

</div>
</div>