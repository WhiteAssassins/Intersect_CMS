<div class="container my-5 p-5 z-depth-1 cards-novo">
<table id="dt-filter-select" class="table" cellspacing="0" width="100%">
  <thead>
    <tr>
      <th class="th-sm">Nombre
      </th>
      <th class="th-sm">Clase
      </th>
      <th class="th-sm">Genero
      </th>
      <th class="th-sm">Experiencia
      </th>
      <th class="th-sm">Mapa
      </th>
    </tr>
  </thead>
  <tbody>
  <?php 
            $playersonline = $this->Apiplayersonline->playeronline();
            $datos = json_encode($playersonline['Values'], True);
            $datos2 = json_decode($datos, True);
            foreach ($datos2 as $key) {              
        ?>

    <tr>
      <td><?php  echo $key['Name']; ?></td>
      <td><?php  echo $key['ClassName']; ?></td>
      <td><?php if($key['Gender'] == 0){ echo "Hombre";}else{ echo "Mujer"; } ?></td>
      <td><?php  echo $key['Exp']; ?></td>
      <td><?php  echo $key['MapName']; ?></td>
    </tr>
    <?php } ?>
  </tbody>
  <tfoot>
    <tr>
      <th>Nombre
      </th>
      <th>Clase
      </th>
      <th>Genero
      </th>
      <th>Experiencia
      </th>
      <th>Mapa
      </th>
    </tr>
  </tfoot>
</table>
</div>