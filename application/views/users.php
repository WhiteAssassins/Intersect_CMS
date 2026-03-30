<div class="container my-5 p-5 z-depth-1 cards-novo">
<table id="dt-filter-select" class="table nowrap" cellspacing="0" width="100%">
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
  <?php foreach ($user_rows as $row) { ?>
    <tr>
      <td><?php echo $row['name']; ?></td>
      <td><?php echo $row['time_played_label']; ?></td>
      <td><?php echo $row['is_banned_label']; ?></td>
      <td><?php echo $row['is_muted_label']; ?></td>
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
