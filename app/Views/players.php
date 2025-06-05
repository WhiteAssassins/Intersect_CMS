<div class="container my-5 p-5 z-depth-1 cards-novo">
<table id="dt-filter-select" class="table  nowrap" cellspacing="0" width="100%">
  <thead>
    <tr>
      <th class="th-sm">{name}
      </th>
      <th class="th-sm">{gender}
      </th>
      <th class="th-sm">{level}
      </th>
      <th class="th-sm">{exp}
      </th>
      <th class="th-sm">{status}
      </th>
    </tr>
  </thead>
  <tbody>
  <?php 
            $players = $this->Apiplayers->player();
            $datos = json_encode($players['Values'], True);
            $datos2 = json_decode($datos, True);
            foreach ($datos2 as $key) {              
        ?>

    <tr>
      <td><?php echo $key['Name']; ?></td>
      <td><?php if($key['Gender'] == 0){ echo "Hombre";}else{ echo "Mujer"; } ?></td>
      <td><?php echo $key['Level']; ?></td>
      <td><?php echo $key['Exp']; ?></td>
      <td><?php if($key['Dead'] == false){ echo "Vivo";}else{ echo "Muerto"; } ?></td>
    </tr>
    <?php } ?>
  </tbody>
  <tfoot>
    <tr>
      <th>{name}
      </th>
      <th>{gender}
      </th>
      <th>{level}
      </th>
      <th>{exp}
      </th>
      <th>{status}
      </th>
    </tr>
  </tfoot>
</table>
</div>