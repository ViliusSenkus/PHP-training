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
            $json=$sqlrequest->fetch_assoc()['playlists'];
            $playlist=json_decode($json,true);


            if(empty($playlist)){
                 echo "You do not have any Playlists.<br /> Start to create one by pushing + sign next to the song you like."; 
            }else{
                  include "view/usersview/myplaylists.php";

// čia reikia keisti kodą ir dėti include userviews/userplaylists.html fialą!!!!!!!!!!!!!!!!!!!!!
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