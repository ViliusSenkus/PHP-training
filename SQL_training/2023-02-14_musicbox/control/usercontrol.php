<?php

// adding to playlist

// !!!!!!!!!!!!!reikalinga padaryti forma pasirinkimui i koki playlista deti!!!!!!!!!!!!!!!!!

if (isset($_GET['userad']) && $_GET['userad'] != ""){

      $songid=$_GET['userad'];
      $nickname=$_SESSION['user'];
      $sqlrequest=($sql->query("SELECT * FROM songs WHERE id='$songid'"));
      $songdata=$sqlrequest->fetch_all()[0];
      $songname=$songdata[1]." - ".$songdata[2];
      ?>

      <!-- FORM to add song to Playlist -->
      <form method="POST">
            <input type=text value="<?=$songname?>" id="songinputname" disabled >
            <label>Select playlist to add to</label>
            <select name="plst" id="pllist">
                  <option value=favorites>Favorites</option>
                  <option name="newpl" value="new"  >New Playlist</option>
                  <option value=readSQL>readSQL</option>
            </select>
            <input type="hidden" name="songid" value='<?=$songid?>'"/>
            <div id="newplname" style="display:none">
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





//adding song to favorites

if (isset($_GET['fav']) && $_GET['fav'] != ""){
      $songid=$_GET['fav'];
      $nickname=$_SESSION['user'];
      $sqlrequest=(($sql->query("SELECT * FROM songs WHERE id='$songid'"))->fetch_all())[0];
      $songinfo=array($sqlrequest[0],$sqlrequest[1],$sqlrequest[2]);
      $sqlrequest=($sql->query("SELECT favorites FROM users WHERE nickname='$nickname'"));
      $favorites=($sqlrequest->fetch_row())[0];

      if($favorites != null){
            $favList=json_decode($favorites, true);
            $favList[]=$songinfo;
      }else{
            $favList=array($songinfo);      
      }
      $json=json_encode($favList);
      $sqlrequest=$sql->query("UPDATE users SET favorites='$json' WHERE nickname='$nickname'");  
      echo "<br />added to favorites";
}

    

?>