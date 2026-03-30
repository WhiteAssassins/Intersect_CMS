<div class="container my-5 p-5 z-depth-1 cards-novo">
<table id="dt-filter-select" class="table nowrap" cellspacing="0" width="100%">
  <thead>
    <tr>
      <th class="th-sm">{name}
      </th>
      <th class="th-sm">{class}
      </th>
      <th class="th-sm">{gender}
      </th>
      <th class="th-sm">{exp}
      </th>
      <th class="th-sm">{map}
      </th>
    </tr>
  </thead>
  <tbody>
  <?php foreach ($online_player_rows as $row) { ?>
    <tr>
      <td><?php echo $row['name']; ?></td>
      <td><?php echo $row['class_name']; ?></td>
      <td><?php echo $row['gender_label']; ?></td>
      <td><?php echo $row['exp']; ?></td>
      <td><?php echo $row['map_name']; ?></td>
    </tr>
    <?php } ?>
  </tbody>
  <tfoot>
    <tr>
      <th>{name}
      </th>
      <th>{class}
      </th>
      <th>{gender}
      </th>
      <th>{exp}
      </th>
      <th>{map}
      </th>
    </tr>
  </tfoot>
</table>
</div>
