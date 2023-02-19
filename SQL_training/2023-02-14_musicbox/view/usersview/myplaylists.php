<div class="my-playlists">
Your playlists:
<?php 
// paimam pirmą dainą iš keikvieno playlisto
// surandame ją dainų sąraše,
// nuskaitom atlikėją ir albumą,
// surandam albumo viršelį albumų sąraše,

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
      <div class="playlist-box">
            <div class="playlist-logo">
                  <img  src=<?=$albumpicture?> alt="album cover" />
            </div>
            <div class="playlist-name">
                  <?=$key?>
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