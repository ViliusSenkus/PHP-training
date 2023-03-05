<div class="admin-table">
      <h2><?=$selection?> table</h2>
      <table>
            <thead>
                  <tr>
                        <th>#</th>
<?php
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
                  <tr>
                        <td></td>
                        <!-- sitoje vietoje reikia prideti prasukima pagal lenteles stulpeliu skaiciu priklausomai nuo pasirinktos lenteles, kad sudeti tisinga skaiciu td->input arba add padaryti gale o input laukelius parodyti tik paspaudus add -->
                        <td>
                              <a href="?adm_act=add&id=<?=$value['id']?>">
                                    <div class="adm_act">
                                          Add
                                    </div>
                              </a>
                        </td>
                  </tr>
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
                        <td class="adm_act">
                              <a href="?adm_act=edit&entry=<?=$key?>&id=<?=$value['id']?>">
                                    <span class="material-symbols-outlined">
                                          border_color
                                    </span>
                              </a>
                              <a href="?adm_act=del&id=<?=$value['id']?>">
                                    <span class="material-symbols-outlined">
                                          delete_forever
                                    </span>
                              </a>
                        </td>
                  </tr>
<?php
      endforeach;
?>
            </tbody>
      </table>

</div>