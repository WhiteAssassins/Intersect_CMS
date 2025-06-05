<?php 
$resultadonews = $this->db->get('users');
$restnews = $resultadonews->result_array();
?>
<div class="modal fade" id="modal_addadminaccount" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content cards-novo">
        <div class="modal-header text-center">
            <h4 class="modal-title w-100 font-weight-bold">{addadminaccount}</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body mx-3">
            <form action="<?php echo base_url('admin/adminadd'); ?>" method="post"  enctype="multipart/form-data">
                <div class="md-form mb-5">                    
                    <input type="text" id="defaultForm-email" class="form-control validate" name="user">
                    <label for="defaultForm-email">{user}</label>
                </div>
                <div class="md-form mb-4">                  
                    <input type="text" id="defaultForm-pass" class="form-control validate" name="pass">
                    <label for="defaultForm-pass">{password}</label>
                </div>
                <div class="md-form mb-4">                  
                    <input type="text" id="defaultForm-pass" class="form-control validate" name="pass1">
                    <label for="defaultForm-pass">{confirmpassword}</label>
                </div>
                <div class="md-form mb-4">                  
                    <input type="email" id="defaultForm-pass" class="form-control validate" name="email">
                    <label for="defaultForm-pass">{email}</label>
                </div>
                  
        </div>
        
                <div class="modal-footer d-flex justify-content-center">
                    <button class="btn btn-outline-info waves-effect" type="submit">{addadminaccount}</button>
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
          <button type="button" class="btn btn-outline-white btn-rounded btn-sm px-2 waves-effect waves-light btn_modal_addadminaccount " >
            <i class="fas fa-plus mt-0"></i>
          </button>
          <a href="#" style="padding-left: 400px;"  class="white-text mx-3">{adminaccounts}</a>
        </div>
  </div>
  <div class="px-4 ">
    <div class="table-wrapper">
      <table class="table table-hover mb-0">
        <thead>
          <tr>
            <th class="th-lg">
              <a>{id}
                <i class="fas fa-sort ml-1"></i>
              </a>
            </th>
            <th class="th-lg">
              <a>{name}
                <i class="fas fa-sort ml-1"></i>
              </a>
            </th>
            <th class="th-lg">
              <a>{email}
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
            <td><?php echo $key['id']; ?></td>
            <td><?php echo $key['user']; ?></td>
            <td><?php echo $key['email']; ?></td>
            <td>
                <div class="row">
                <form method="POST" action="<?php echo base_url('admin/deladminaccount'); ?>">
                <label class="badge badge-danger">
                    <input type="hidden" name="id" value="<?php echo $key['id']; ?>">
                    <button style=" background-color: transparent;  border: 1px;" type="submit">
                    <span class="fa fa-trash">
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