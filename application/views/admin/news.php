<?php 
$resultadonews = $this->db->get('news');
$restnews = $resultadonews->result_array();
?>
<div class="modal fade" id="modal_addnews" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content cards-novo">
        <div class="modal-header text-center">
            <h4 class="modal-title w-100 font-weight-bold">Crear nueva Noticia</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body mx-3">
            <form action="<?php echo base_url('admin/addnews'); ?>" method="post"  enctype="multipart/form-data">
                <div class="md-form mb-5">                    
                    <input type="text" id="defaultForm-email" class="form-control validate" name="title">
                    <label for="defaultForm-email">Titulo</label>
                </div>
                <div class="md-form mb-4">                  
                    <input type="text" id="defaultForm-pass" class="form-control validate" name="descrip">
                    <label for="defaultForm-pass">Descripción</label>
                </div>
                <div class="md-form mb-4 pink-textarea active-pink-textarea"> 
                <textarea id="tiny" name="txt" placeholder="Texto de la Noticia"></textarea>
</div>              
        </div>
        <div class="md-form mb-4">
<div class="file-field">
    <a class="btn-file-c btn-floating blue-gradient mt-0 float-left">
        <i class="fas fa-paperclip" aria-hidden="true"></i>
        <input type="file" name="archivo">
    </a>
    <div class="file-path-wrapper">
        <input class="file-path validate" type="text" placeholder="Foto de la Noticia">
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
  <div
    class="view view-cascade gradient-card-header blue-gradient narrower py-2 mx-4 mb-3 d-flex justify-content-between align-items-center">
    <div>
          <button type="button" class="btn btn-outline-white btn-rounded btn-sm px-2 waves-effect waves-light btn_modal_addnews " >
            <i class="fas fa-plus mt-0"></i>
          </button>
          <a href="#" style="padding-left: 400px;"  class="white-text mx-3">Noticias</a>
        </div>
  </div>
  <div class="px-4 ">
    <div class="table-wrapper">
      <table class="table table-hover mb-0">
        <thead>
          <tr>
            <th class="th-lg">
              <a>Titulo
                <i class="fas fa-sort ml-1"></i>
              </a>
            </th>
            <th class="th-lg">
              <a>Descripcrión
                <i class="fas fa-sort ml-1"></i>
              </a>
            </th>
            <th class="th-lg">
              <a>Fecha
                <i class="fas fa-sort ml-1"></i>
              </a>
            </th>
            <th class="th-lg">
              <a>Accion
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
            <td><?php echo $key['title']; ?></td>
            <td><?php echo $key['descrip']; ?></td>
            <td><?php echo $key['date']; ?></td>
            <td>
                <div class="row">
                <form method="POST" action="<?php echo base_url('admin/delnews'); ?>">
                <label class="badge badge-danger">
                    <input type="hidden" name="id" value="<?php echo $key['id']; ?>">
                    <button style=" background-color: transparent;  border: 1px;" type="submit">
                    <span class="fa fa-trash">
                </button>
                </label>
                </form>


                <form method="POST" action="<?php echo base_url('admin/editnews'); ?>" style="padding-left: 10px;">
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
      </table>
    </div>
  </div>
</div>
</div>