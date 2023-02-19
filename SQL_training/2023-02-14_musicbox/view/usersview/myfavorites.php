<?php 

// this file contains process to display favorites user songs, order of songs displayd according it's storage in database file.

//logicall flow of code below:
// - requesting and filtering the favorites song id from each user favorites (at users DB file);
// - finding song according id in songs DB file;
// - requesting of performer and album in songs DB file;
// - requesting an album cover in albums DB file.
// - pricessing front end output

      $user=$_SESSION['user'];
      $sqlrequest=$sql->query("SELECT favorites FROM users WHERE nickname='$user'");
      $json=$sqlrequest->fetch_all();
      $favorites=json_decode($json[0][0]);

      foreach ($favorites as $key=>$value){ //kiekvienas įrašas su dainos nr, atlikėju ir pavadinumu
            $sqlrequest=$sql->query("SELECT * FROM songs WHERE id=$value[0]");
            $songinfo=$sqlrequest->fetch_row();
            $lookforperformer=$songinfo[1];
            $lookforsong=$songinfo[2];
            
            if ($songinfo[4] != null){
                  $lookforalbum=$songinfo[4];
                  $sqlrequest=$sql->query("SELECT cover FROM albums
                                          WHERE performer='$lookforperformer'
                                          AND albumname='$lookforalbum'");
                  $albumpicture=$sqlrequest->fetch_assoc()['cover'];
            }else{
                  $albumpicture="content/img/logo.png" ;
            }
            
?>
      <div class="playlistBox">
            <div class="playlistLogo">
                  <img  src=<?=$albumpicture?> alt="album cover" />
            </div>
            <div class="playlistName">
                  <div>
                        <span><?=$value[1]?></span>
                        <br />
                        <span style="font-style:italic; font-size:var(--size3);"><?=$value[2]?></span>
                  </div>
                  <div class="play_button">
                        <a href="./?usrplsts=<?=$key?>"> <!--nukreipimui į playlisto puslapį -->
                              <span class="material-symbols-outlined">
                                    play_circle
                              </span>
                        </a>
                  </div>
            </div>
      </div>
<?php
      }
?>