<?php 
$resultadolog = $this->db->get('logs');
$restlog = $resultadolog->result_array();
?>
<div class="container my-5 py-5">

<div class="card card-cascade narrower cards-novo">


  <div
    class="view view-cascade gradient-card-header blue-gradient narrower py-2 mx-4 mb-3 justify-content-between align-items-center ">

    

   <center> <a href="#"  class="white-text mx-3">{logs}</a></center>

    
  </div>

  <div class="px-4 ">

    <div class="table-wrapper">
      <table class="table table-hover mb-0">

        <thead>
          <tr>
          
            <th class="th-lg">
              <a>{admin}
                <i class="fas fa-sort ml-1"></i>
              </a>
            </th>
            <th class="th-lg">
              <a>{user}
                <i class="fas fa-sort ml-1"></i>
              </a>
            </th>
            <th class="th-lg">
              <a>{action}
                <i class="fas fa-sort ml-1"></i>
              </a>
            </th>
            <th class="th-lg">
              <a>{date}
                <i class="fas fa-sort ml-1"></i>
              </a>
            </th>
          </tr>
        </thead>
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
      </table>
    </div>

  </div>

</div>
</div>