<div class="admin-table">
      <h2>Users CRUD table</h2>
      <table>
            <thead>
                  <tr>
                        <th>#</th>
<?php
      echo"<pre>";
      print_r($thead);
      foreach ($thead as $v) : 
?>
                        <th><?=$v[0]?></th>
<?php
      endforeach;
?>
                        <th>Actions</th>
                  </tr>
            </thead>
            <tbody>
<?php
      foreach ($tbody as $key=>$value) :
?>
                  <tr>
                        <td><?=++$key?></td>

      <?php
            foreach ($value as $v) :
      ?>
                        <td><?=$v?></td>
      <?php
            endforeach;
      ?>
                        <td>delete</td>
                  </tr>
<?php
      endforeach;
?>
            </tbody>
      </table>

</div>