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
            $json=$sqlrequest->fetch_all();

      //       $playlist=json_decode($json, true);
      //  print_r($playlist);
      //  echo gettype($playlist);
            //pridėjus kelis playlistus pridedamas dar vienas [] nurodys į playlisto numerį sąraše.


            if(empty($playlist[0])){
                 echo "You do not have any Playlists.<br /> Start to create one by pushing + sign next to the song you like."; 
            }else{
                  
                  foreach ($playlist[0] as $song){
                        echo "<br />".$song;
                  }

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