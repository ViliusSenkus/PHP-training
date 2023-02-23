<?php 
// this file contains process to display connected user playlists, order of playlists displayd according it's storage in database file.

//logicall flow of code below:
// - requesting and filtering the first song id from each user playlist (at users DB file);
// - finding song according id in songs DB file;
// - requesting of performer and album in songs DB file;
// - requesting an album cover in albums DB file.
// - pricessing front end output

      $sqlrequest=$sql->query("SELECT * FROM songs");
      $json=$sqlrequest->fetch_all();
      $lenght=count($json);
      foreach ($playlist as $key=>$value){ //playlistų pavadinimai su dainų numeriais
            // pirmos dainos playliste numeris - $value[0];
            $sqlrequest=$sql->query("SELECT * FROM songs WHERE id=$value[0]");
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
                        <span class="material-symbols-outlined">
                              <a href="./?usract=delpl&playlist=<?=$key?>">
                                    delete
                              </a>
                        </span>                     
                        <span class="material-symbols-outlined">
                              <a href="./?usrplsts=<?=$key?>&plusr=<?=$_SESSION['user']?>&playview=playview"">  
                                    play_circle
                              </a>
                        </span>
                       
                  </div>
            </div>
      </div>

<?php
      }
?>