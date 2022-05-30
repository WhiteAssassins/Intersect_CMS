<div class="container my-5 p-5 z-depth-1 cards-novo">
<table id="dt-filter-select" class="table" cellspacing="0" width="100%">
  <thead>
    <tr>
      <th class="th-sm">{name}
      </th>
      <th class="th-sm">{timeplayed}
      </th>
      <th class="th-sm">{banned}
      </th>
      <th class="th-sm">{muted}
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
      <td><?php $time = $key['PlayTimeSeconds']/60/60 ; echo substr($time, 0, 5)." Horas" ?></td>
      <td><?php if($key['IsBanned'] == false){ echo "No";}else{ echo "Si"; }?></td>
      <td><?php if($key['IsMuted'] == false){ echo "No";}else{ echo "Si"; }?></td>
    </tr>
    <?php } ?>
  </tbody>
  <tfoot>
    <tr>
      <th>{name}
      </th>
      <th>{timeplayed}
      </th>
      <th>{banned}
      </th>
      <th>{muted}
      </th>
    </tr>
  </tfoot>
</table>
</div>