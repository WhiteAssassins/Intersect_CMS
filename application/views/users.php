<div class="container my-5 p-5 z-depth-1 cards-novo">
<table id="dt-filter-select" class="table" cellspacing="0" width="100%">
  <thead>
    <tr>
      <th class="th-sm">Nombre
      </th>
      <th class="th-sm">Tiempo Jugado
      </th>
      <th class="th-sm">Baneado
      </th>
      <th class="th-sm">Muteado
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
      <td><?php echo $key['Name']; ?></td>
      <td><?php echo $key['PlayTimeSeconds']/60 ." Minutos"; ?></td>
      <td><?php if($key['IsBanned'] == false){ echo "No";}else{ echo "Si"; }?></td>
      <td><?php if($key['IsMuted'] == false){ echo "No";}else{ echo "Si"; }?></td>
    </tr>
    <?php } ?>
  </tbody>
  <tfoot>
    <tr>
      <th>Nombre
      </th>
      <th>Tiempo Jugado
      </th>
      <th>Baneado
      </th>
      <th>Muteado
      </th>
    </tr>
  </tfoot>
</table>
</div>