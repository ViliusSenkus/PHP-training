<h2><?=$_SESSION['user']?></h2>

<?php
include "recent.php";  //list of recently added songs by admin

?>


<div>
      <ul>
      <h2> Your playlists </h2>
            <?php
            $user=$_SESSION['user'];
            $sqlrequest=$sql->query("SELECT playlists FROM users WHERE nickname='$user'");
            $playlist=$sqlrequest->fetch_all();

            if(empty($playlist)){
                  $json=json_decode($playlist);
                  print_r($playlist);
            }else{
                  echo "You do not have any Playlists.<br /> Start to create one by pushing + sign next to the song you like.";

                  //cia reikia paliesti foreach'a kiekvienam playlistui patalpinti i <li>
            }
            ?>
      </ul>
</div>

<?php 
for($i=1; $i<3; $i++){
      ?>
      <div class="row">
      <?php
      for($z=1; $z<5; $z++){
      ?>
           <div class="album_box">
           </div>
      <?php
      }
}
      ?>
      </div>