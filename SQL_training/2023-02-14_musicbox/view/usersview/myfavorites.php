<div class="myPlaylists">
      Your favorites:
      <?php 
      // surandame favorite dainos numeri dainų sąraše,
      // nuskaitom atlikėją ir albumą,
      // surandam albumo viršelį albumų sąraše,
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
                        <img  src=<?=$albumpicture?> alt="album cover" style="width:70px;" />
                  </div>
                  <div>
                        <?=$value[1]?>
                        <br />
                        <?=$value[2]?>
                  </div>
                  <div class="playlist-play">
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