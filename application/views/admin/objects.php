<div class="container my-5 p-5 z-depth-1 cards-novo">
<table id="dt-filter-select" class="table" cellspacing="0" width="100%">
  <thead>
    <tr>
      <th class="th-sm">Key
      </th>
      <th class="th-sm">Nombre
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
      <td><?php echo $key['Key']; ?></td>
      <td><?php echo $key['Value']['Name'] ?></td>
    </tr>
    <?php } ?>
  </tbody>
  <tfoot>
    <tr>
      <th>Key
      </th>
      <th>Nombre
      </th>
     
    </tr>
  </tfoot>
</table>
</div>