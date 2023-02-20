<?php

$sqlrequest=$sql->query("SELECT playlists FROM users WHERE nickname='{$_GET['plusr']}'");
$list=($sqlrequest->fetch_assoc())['playlists'];
$list=json_decode($list);
// echo "<pre>";
// print_r($list);
// echo "</pre>";

foreach ($list as $key=>$value){
      //seraching for right playlist in user playlists DB
      if ($key == $_GET['usrplsts']){
            //if correct playlist found
            $songs_ids="s.id=";
            foreach ($value as $song){
                  $songs_ids.="$song OR s.id=";
            }
            $left=strlen($songs_ids)-9;
            $songs=substr($songs_ids, 0, $left) ;
            $sqlrequest=$sql->query("SELECT s.id, s.performer, s.songname, s.year, s.album, a.cover FROM songs AS s JOIN albums AS a ON a.albumname=s.album AND a.performer=s.performer WHERE {$songs}");
            $songs=$sqlrequest->fetch_all();

            

            
?>
  
            <div class="playview">
                  <div>
                        <h2><?=$_GET['usrplsts']?></h2>
                        <div>
                              Playlist created by <?=$_GET['plusr']?>
                        </div>
                  </div>
                  <ul>
                  <?php
                        
                  ?>
                  </ul>
            </div>

<?php
            foreach($value as $s){ //numeris
                  foreach($songs as $data){ //pilna ingo
                        if($s != $data[0]){
                              continue;
                        }
?>
                              <div class="row">
                                    <div class="playlistBox">
                                          <div class="playlistLogo">
                                                <img  src="<?=$data[5]?>" alt="song album" />
                                                <?=$data[4]?>
                                                <?=$data[3]?>
                                          </div>
                                          <div class="play_button">
                                                <span class="material-symbols-outlined">
                                                      stars
                                                </span>
                                                <span class="material-symbols-outlined">
                                                      play_circle
                                                </span>
                                          </div>
                                    </div>
                                    <div class="playlistName">
                                          <?=$data[1]?> - <?=$data[2]?>
                                    </div>
                              </div>
<?php
                        
                  }
            }

      }


      
      // else{
      //       echo "Sorry, can't find such playlist.";
      // }
}
?>