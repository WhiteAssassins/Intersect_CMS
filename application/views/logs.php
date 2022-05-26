<?php 
$resultadolog = $this->db->get('logs');
$restlog = $resultadolog->result_array();
?>
<div class="container my-5 py-5">

<div class="card card-cascade narrower cards-novo">

  <!--Card image-->
  <div
    class="view view-cascade gradient-card-header blue-gradient narrower py-2 mx-4 mb-3 justify-content-between align-items-center ">

    

   <center> <a href="#"  class="white-text mx-3">Logs</a></center>

    
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
              <a>Administrador
                <i class="fas fa-sort ml-1"></i>
              </a>
            </th>
            <th class="th-lg">
              <a>Usuario
                <i class="fas fa-sort ml-1"></i>
              </a>
            </th>
            <th class="th-lg">
              <a>Accion
                <i class="fas fa-sort ml-1"></i>
              </a>
            </th>
            <th class="th-lg">
              <a>Fecha
                <i class="fas fa-sort ml-1"></i>
              </a>
            </th>
          </tr>
        </thead>
        <!--Table head-->

        <!--Table body-->
        <tbody>
        <?php 
                                     
                                      foreach (array_reverse($restlog) as $key) { 
                                        
                                  ?>
          <tr>
            <td><?php echo $key['admin']; ?></td>
            <td><?php echo $key['user']; ?></td>
            <td><?php echo $key['action']; ?></td>
            <td><?php echo $key['time']; ?></td>
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