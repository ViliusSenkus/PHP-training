

<?php
if(isset($_GET['plusr']) && $_GET['plusr']==$_SESSION['user']){
      $selfdel=true;
}else{
      $selfdel=false;
}


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
            $sqlrequest=$sql->query("SELECT s.id, s.performer, s.songname, s.year, s.album, a.cover, s.youtube FROM songs AS s JOIN albums AS a ON a.albumname=s.album AND a.performer=s.performer WHERE {$songs}");
            $songs=$sqlrequest->fetch_all(); //array of playlist songs with all possible info
?>
  
            <div class="playview">
                  <div>
                        <h2><?=$_GET['usrplsts']?></h2>
                        <div>
                              Playlist created by <?=$_GET['plusr']?>
                        </div>
                  </div>
                  <div>
                        <form>
                              <button type="submit">Return</button>
                        </form>
                  </div>
            </div>

<?php
            foreach($value as $s){ //cycling through songs in playlist
                  foreach($songs as $data){ //cycling throug all songs in playlist
                        if($s != $data[0]){
                              continue;
                        }
?>
                              <div class="albumBox" style="justify-content:start;">
                                          <div class="album_logo">
                                                <img  src="<?=$data[5]?>" alt="song album" />
                                          </div>
                                          <div class="song_Name">
                                                <span><?=$data[1]?></span>
                                                <span><?=$data[2]?></span>
                                          </div>
                                          <div class="album_Name">
                                                <span><?=$data[4]?></span>
                                                <span><?=$data[3]?></span>
                                          </div>
                                          <div class="play_button">
<?php
                                          if ($selfdel==true){
?>
                                                      <span class="material-symbols-outlined">
                                                            <a href="./?usract=del&playlist=<?=$_GET['usrplsts']?>&song=<?=$data[0]?>">
                                                                  delete
                                                            </a>
                                                      </span>
<?php                                     } 
                                          $usr=$_SESSION['user'];
                                          $sqlrequest=$sql->query("SELECT favorites FROM users WHERE nickname='$usr'");
                                          $favorites=($sqlrequest->fetch_row())[0];
                                          if ($favorites != null){
                                          $favList=json_decode($favorites, true);
                                                $style="";
                                                foreach($favList as $k=>$v){ //cycling through favorites
                                                      if ($v[0]==$data[0]){
                                                            $style="style='color:#f4e412'";
                                                            break;
                                                      }else{
                                                      $style="style='color:white'";
                                                      }
                                                }
 }
?>                                                      
                                                      <span class="material-symbols-outlined">
                                                            <a href="./?fav=<?=$data[0]?>" <?=$style?>>
                                                                  stars
                                                            </a>
                                                      </span>
                                                      <span class="material-symbols-outlined">
                                                            <a href="<?=$data[6]?>" target="video">
                                                                  play_circle
                                                            </a>
                                                      </span>
                                          </div>
                                    </div>
                              </div>
<?php
                        
                  }
            }

      }
}
if (isset($_GET['vsrc']) && $_GET['vsrc'] !=""){
      $link=$_GET['vsrc'];
}
?>


<iframe name="video">
</iframe>