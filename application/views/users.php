<div class="container my-5 p-5 z-depth-1 cards-novo">
<table id="dt-filter-select" class="table" cellspacing="0" width="100%">
  <thead>
    <tr>
      <th class="th-sm">Nombre
      </th>
      <th class="th-sm">Genero
      </th>
      <th class="th-sm">Nivel
      </th>
      <th class="th-sm">Experiencia
      </th>
      <th class="th-sm">Estado
      </th>
    </tr>
  </thead>
  <tbody>
  <?php 
            $users= $this->Apiusers->user();
            $datos = json_encode($users['Values'], True);
            $datos2 = json_decode($datos, True);
            foreach ($datos2 as $key) {              
        ?>

    <tr>
    <?php $a = $key['Power']; 
    ?>
      <td><?php echo $key['Name']; ?></td>
      <td><?php echo $a['Editor'];?></td>
      <td><?php echo $key['Power']['Ban']; ?></td>
      <td><?php echo $key['Exp']; ?></td>
      <td><?php if($key['Dead'] == false){ echo "Vivo";}else{ echo "Muerto"; } ?></td>
    </tr>
    <?php } ?>
  </tbody>
  <tfoot>
    <tr>
      <th>Nombre
      </th>
      <th>Genero
      </th>
      <th>Nivel
      </th>
      <th>Experiencia
      </th>
      <th>Estado
      </th>
    </tr>
  </tfoot>
</table>
</div>