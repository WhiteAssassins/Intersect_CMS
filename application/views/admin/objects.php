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
  <?php foreach ($admin_object_rows as $objectRow) { ?>
    <tr>
      <td><?php echo $objectRow['key']; ?></td>
      <td><?php echo $objectRow['name']; ?></td>
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
