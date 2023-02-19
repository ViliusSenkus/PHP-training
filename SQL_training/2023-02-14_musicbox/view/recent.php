<h2>Our most recently added music tracks</h2>
            <div class="row">
<?php
      $counter=0;
      for($i=1; $i<5; $i++){
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

      <!-- Nuo čia tik prisijungusiems vartotojams -->

                        <?php
                              if(!empty($_SESSION) && $_SESSION['user'] != ""){
                        ?>
                        <div class="play_button">
                              <a href="<?=$songdata[6]?>" target="blank">
                                    <span class="material-symbols-outlined">
                                          play_circle
                                    </span>
                              </a>
                              <a href="./?userad=<?=$songdata[0]?>">
                                    <span class="material-symbols-outlined">
                                          add_circle
                                    </span>
                              </a>
                              <a href="./?fav=<?=$songdata[0]?>">
                                    <span class="material-symbols-outlined">
                                          stars
                                    </span>
                              </a>
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