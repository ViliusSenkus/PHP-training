<?php 

// this file contains process to display all playlists of all users, order of playlists displayd according it's storage in database file.

//logicall flow of code below:
// - requesting all users who have playlists (at users DB file);

// - requesting and filtering the first song id from each user playlist (at users DB file);
// - finding song according id in songs DB file;
// - requesting of performer and album in songs DB file;
// - requesting an album cover in albums DB file.
// - pricessing front end output

      //collecting all playlists
      $sqlrequest=$sql->query("SELECT playlists, nickname FROM users WHERE playlists != ''");
      $allplaylists=$sqlrequest->fetch_all();
      
      $sqlrequest=$sql->query("SELECT * FROM songs");
      $json=$sqlrequest->fetch_all();


      foreach($allplaylists as $value){
            if ($value[1] == $_SESSION['user']){
                  continue;
            }
           $plists=json_decode($value[0], true);
          
            foreach ($plists as $key=>$v){
                  $sqlrequest=$sql->query("SELECT * FROM songs WHERE id=$v[0]");
                  $songinfo=$sqlrequest->fetch_row();
                  $lookforperformer=$songinfo[1];
                  $lookforsong=$songinfo[2];
                  $lookforalbum=$songinfo[4];
                  $sqlrequest=$sql->query("SELECT cover FROM albums WHERE performer='$lookforperformer'     AND albumname='$lookforalbum'");
                  $albumpicture=$sqlrequest->fetch_assoc()['cover'];
                  
      ?>
            <div class="playlistBox">
                  <div class="playlistLogo">
                        <img  src=<?=$albumpicture?> alt="album cover" />
                  </div>
                  <div class="playlistName">
                        <div>
                              <?=$key?>
                        </div>
                        <div class="play_button">
                              <a href="./?usrplsts=<?=$key?>&plusr=<?=$value[1]?>&playview=playview"> <!--nukreipimui į playlisto puslapį -->
                                    <span class="material-symbols-outlined">
                                          play_circle
                                    </span>
                              </a>
                        </div>
                  </div>
            </div>

      <?php
            }
      }
?>