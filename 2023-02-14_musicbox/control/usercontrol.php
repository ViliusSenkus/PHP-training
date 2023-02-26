<?php

// adding to playlist

if (isset($_GET['userad']) && $_GET['userad'] != ""){

      $songid=$_GET['userad'];
      $nickname=$_SESSION['user'];
      $sqlrequest=($sql->query("SELECT * FROM songs WHERE id='$songid'"));
      $songdata=$sqlrequest->fetch_all()[0];
      $songname=$songdata[1]." - ".$songdata[2];
      //getting list of user playlists:
      $sqlrequest=($sql->query("SELECT playlists FROM users WHERE nickname='$nickname'"));
      $json=json_decode(($sqlrequest->fetch_assoc())['playlists'], true);
      ?>

      <!-- FORM to add song to Playlist -->
      <form method="POST">
            <input type=text value="<?=$songname?>" id="songinputname" disabled >
            <label>Select playlist to add to</label>
            <select name="plst" id="pllist">
                  <option name="newpl" value="new"  >New Playlist</option>
                  <?php 
                  //list of user playlists in the "add to playlist" drop down menu
                     foreach ($json as $key=>$value){
                  ?>
                         <option value="<?=$key?>"><?=$key?></option>
                  <?php
                        }
                  ?>
                 
            </select>
            <input type="hidden" name="songid" value='<?=$songid?>'"/>
            <div id="newplname">
                  <label>Give name to new playlist</label>
                  <input type="text" name="userplalist" />
            </div>                  
            <button type="submit">Add</button>
      </form>
      <script>
            let selection = document.querySelector('#pllist');
            selection.onchange = function(){
                  let option = selection.children[selection.selectedIndex].value;
                  if (option=="new"){
                        document.querySelector('#newplname').style.display="flex";
                  }else{
                        document.querySelector('#newplname').style.display="none";
                  }
            }
      </script>

      
<?php
}





// Adding/Removing Favorites

if (isset($_GET['fav']) && $_GET['fav'] != ""){
      
      $songid=$_GET['fav'];
      $nickname=$_SESSION['user'];
      if (!isset($_GET['act'])){
      $sqlrequest=(($sql->query("SELECT * FROM songs WHERE id='$songid'"))->fetch_all())[0];
      $songinfo=array($sqlrequest[0],$sqlrequest[1],$sqlrequest[2]);
      }
      $sqlrequest=($sql->query("SELECT favorites FROM users WHERE nickname='$nickname'"));
      $favorites=($sqlrequest->fetch_row())[0];
      
      // Add to favorites
      if($favorites != null && !isset($_GET['act'])){ //check if favorites allready added
            $favList=json_decode($favorites, true);
            $favList[]=$songinfo;
      }
      if ($favorites == null && !isset($_GET['act'])){
            $favList=array($songinfo);      
      }

      if (isset($_GET['act']) && $_GET['act'] !=""){ //remove if condition true
            $favList=json_decode($favorites, true);
            // echo "<pre>";
            // print_r($favList);
            // die();

            \array_splice($favList,$songid,1);
      }

   
      $json=json_encode($favList);
      echo $json;
      $sqlrequest=$sql->query("UPDATE users SET favorites='$json' WHERE nickname='$nickname'");
}





//deleting from playlists:
if (isset($_GET['usract']) and $_GET['usract']=="del"){
      $playlist=$_GET['playlist'];
      $songid=$_GET['song'];
      $user=$_SESSION['user'];

      $sqlrequest=$sql->query("SELECT playlists FROM users WHERE nickname='$user'");
      $list=json_decode($sqlrequest->fetch_assoc()['playlists'], true);

      foreach($list[$playlist] as $key=>$value){
            if ($value==$songid){
                  $delid=$key;
                  break;
            }
      }
      \array_splice($list[$playlist],$delid,1);
      if (count($list[$playlist])==0){
            unset($list[$playlist]);
      }

      $json=json_encode($list);


      $sql->query("UPDATE users SET playlists='$json' WHERE nickname='$user'");

      header("Location:./?usrplsts='$playlist'");
}

//deleting playlists:
if (isset($_GET['usract']) and $_GET['usract']=="delpl"){
      $playlist=$_GET['playlist'];

      $user=$_SESSION['user'];

      $sqlrequest=$sql->query("SELECT playlists FROM users WHERE nickname='$user'");
      $list=json_decode($sqlrequest->fetch_assoc()['playlists'], true);
      unset($list[$playlist]);
      $json=json_encode($list);
      $sql->query("UPDATE users SET playlists='$json' WHERE nickname='$user'");
      header("Location:./");
}



?>

