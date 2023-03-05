<div class="admin-table">
      <h2><?=$selection?> table</h2>
      <table>
            <thead>
                  <tr>
                        <!-- sitoje vietoje reikia prideti prasukima pagal lenteles stulpeliu skaiciu priklausomai nuo pasirinktos lenteles, kad sudeti tisinga skaiciu td->input arba add padaryti gale o input laukelius parodyti tik paspaudus add -->
                        <th>#</th>
<?php
      // Prie kiekvieno stulpelio reikia prideti sortinima Up/Down
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
                        <form method="POST">
                              <td>
                                    <div class="adm_act">
                                          New
                                    </div>
                              </td>
                  <?php
                        foreach ($thead as $key=>$value) :
                  ?>
                              <td>
                                    <input type="text" name="<?=$value[0]?>">
                              </td>
                  <?php
                        endforeach;
                  ?>
                              <td>
                                    <input type="text" name="table" value="<?=$selection?>" hidden>
                                    <input type="text" name="adm_act" value="add" hidden>
                                    <button type="submit" class="add">
                                          <span class="material-symbols-outlined">
                                                person_add
                                          </span>
                                    </buton>
                              </td>
            
                  
                        
                        </form>
                  </tr>
<?php
      foreach ($tbody as $key=>$value) :
?>    
            <form method="POST">
                  <tr>
                        <td><?=++$key?></td>

      <?php
            $i=0;
            foreach ($value as $v) : 
      ?>
                        <td>
                              <input type="text" value="<?=$v?>" name="<?=$thead[$i][0]?>">
                        </td>
      <?php
            $i++; //laukelių stulpeliuose pavadinimams.
            endforeach;
      ?>
                        <td class="adm_act">
                              <input type="text" name="table" value="<?=$selection?>" hidden>
                              <input type="text" name="id" value="<?=$value['id']?>" hidden>
                              <input type="text" name="adm_act" value="del" hidden>
                              <!-- aukštesnėje eilutėje reikia prideti ir edit reiksme -->
                              <!-- žemiau reikia pakeisti į mygtuką arba palikti kaip yra -->
                              <a href="?adminview=<?=$selection?>&adm_act=edit&entry=<?=$key?>&id=<?=$value['id']?>">
                                    <span class="material-symbols-outlined">
                                          border_color
                                    </span>
                              </a>
                              <button type="submit">
                                    <span class="material-symbols-outlined">
                                          delete_forever
                                    </span>
                              </button>
                        </td>
                  </tr>
            </form>
<?php
      endforeach;
?>
            </tbody>
      </table>
      <!-- cia galima prideti lenteles pildymo notes. Pvz.: useriui - koks skaiciukas kokia role ir pan.-->
</div>

<!-- 
      !!!!!! INSTRUCTIONS !!!!!!
      
      ALL tables:
            1. do not enter or edit id


      USER table:
            1. roles: 0-undefined, 1-registered user, 2-admin.
-->