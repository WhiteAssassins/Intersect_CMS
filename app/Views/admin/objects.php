<div class="container my-5 p-5 z-depth-1 cards-novo">
<table id="dt-filter-select" class="table" cellspacing="0" width="100%">
  <thead>
    <tr>
      <th class="th-sm">{key}
      </th>
      <th class="th-sm">{name}
      </th>
     
    </tr>
  </thead>
  <tbody>
  <?php 
            $objects = $this->Apiobjects->object();
            $datos = json_encode($objects['entries'], True);
            $datos2 = json_decode($datos, True);
            foreach ($datos2 as $key) {              
        ?>

    <tr>
      <td>
        <?php 
        echo $key['Key']; 
       // print_r($datos);
        ?>
      </td>
      <td><?php echo $key['Value']['Name'] ?></td>
    </tr>
    <?php } ?>
  </tbody>
  <tfoot>
    <tr>
      <th>{key}
      </th>
      <th>{name}
      </th>
     
    </tr>
  </tfoot>
</table>
</div>