<div class="admin-table">
      <h2><?=$selection?> table</h2>
      <table>
            <thead>
                  <tr>
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
                        <!-- įrašo pridėjimo eilutės formavimas -->
                        <form method="POST">
                              <td colspan="2">
                                    <div class="adm_act">
                                          New entry
                                    </div>
                              </td>
                  <?php
                        foreach ($thead as $key=>$value) :
                              if ($value[0]=='id') {
                                    continue;
                              }elseif ($value[0]=='date_added'){
                                    echo "<td></td>";
                              }elseif ($value[0]=='categories'){
                                    echo "<td>";
                                    include('view/admin/categories.php');
                                    echo "</td>";
                              }else{
                  ?>
                              
                              <td>
                                    <input type="text" name="<?=$value[0]?>">
                              </td>
                  <?php
                              }
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
            // lentelės įrašų formavimas eilutė po eilutės;
      foreach ($tbody as $key=>$value) :
?>    
            <form method="POST">
                  <tr>
                        <td><?=++$key?></td>

      <?php
            $i=0;
            foreach ($value as $k=>$v) :
                  if ($k=='id' || $k=='date_added') {
      ?>
                        <td>
                              <input type="text" value="<?=$v?>" name="<?=$thead[$i][0]?>" disabled>
                        </td>
      <?php
                  }else{
      ?>          
                        <td>
                              <input type="text" value="<?=$v?>" name="<?=$thead[$i][0]?>">
                        </td>
      <?php
                  }
            $i++; //laukelių stulpeliuose pavadinimams.
            endforeach;
      ?>
                        <td class="adm_act">

                              <input type="text" name="table" value="<?=$selection?>" hidden>
                              <input type="text" name="id" value="<?=$value['id']?>" hidden>
                              <input type="text" name="adm_act" value="edit" hidden>

                              <button type="submit">
                                    <span class="material-symbols-outlined">
                                          border_color
                                    </span>
                              </button>
                              
                              <a href="?adminview=<?=$selection?>&adm_act=del&id=<?=$value['id']?>">
                                    <span class="material-symbols-outlined">
                                          delete_forever
                                    </span>
                              </a>
                              
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