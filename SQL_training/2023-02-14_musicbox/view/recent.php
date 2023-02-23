
<iframe name="video"></iframe>

<h2>Our most recently added music tracks</h2>
            <div class="row">
<?php
      $counter=0;
      for($i=1; $i<4; $i++){
            $sqlrequest = $sql->query("SELECT MAX(id)-$counter FROM `songs`");
            $maxid=$sqlrequest->fetch_row()[0];
            $sqlrequest = $sql->query("SELECT MIN(id) FROM `songs`");
            $minid=$sqlrequest->fetch_row()[0];
            $sqlsong = $sql->query("SELECT * FROM songs WHERE id = $maxid");
            $songdata=$sqlsong->fetch_row();
            if ($songdata){
                  if ($songdata[0]==$minid){
                        $counter--;
                  } 
                  ?>
                  <div class="album_box">
                        <?php
                        //$songdata[4] - albumas
                        //$songdata[1] - atlikejas
                        //$songdata[2] - daina
                        //$songdata[6] - nuoroda
                        $sqlrequest=$sql->query("SELECT cover FROM albums WHERE albumname='$songdata[4]'");
                        if ($sqlrequest->num_rows > 0){
                              $albumcover=$sqlrequest->fetch_row()[0];
                        }else{
                              $albumcover="https://f4.bcbits.com/img/a3440516125_16.jpg";
                        }
                  ?>
                        <img class='albumcover' src='<?=$albumcover?>' alt='album' />
                        <div class="performer">
                              <?=$songdata[1]?>
                        </div>
                        <div class="song">
                              <?=$songdata[2]?>
                        </div>

      <!-- Loged in users part below -->

                        <?php
                              if(!empty($_SESSION) && $_SESSION['user'] != ""){
                                    
                                    // check if favorite is added and assigning variable
                                    $usr=$_SESSION['user'];
                                    $sqlrequest=$sql->query("SELECT favorites FROM users WHERE nickname='$usr'");
                                    $favorites=($sqlrequest->fetch_row())[0];
                                    if ($favorites != null){
                                    $favList=json_decode($favorites, true);
                                          $style="";
                                          foreach($favList as $k=>$v){
                                                if ($v[0]==$songdata[0]){
                                                      $style="style='color:#f4e412'";
                                                      break;
                                                }
                                          }
                                    }


                              
                        ?>
                        <div class="play_button">
                              
                              <span class="material-symbols-outlined">
                                    <a href="<?=$songdata[6]?>" target="video">
                                          play_circle
                                    </a>
                              </span>
                              <span class="material-symbols-outlined">
                                    <a href="./?userad=<?=$songdata[0]?>">
                                          add_circle
                                    </a>
                              </span>
                              <span class="material-symbols-outlined">
                                    <a href="./?fav=<?=$songdata[0]?>" <?=$style?>>
                                          stars
                                    </a>
                              </span>
                        </div>
                  <?php
                                    } $counter++;
                  ?>
                        </div>
                  <?php
            }else{
                  $z--;
                  $counter++;
            }
      }
      ?>
       </div>


    



       