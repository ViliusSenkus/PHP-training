<h2><?=$_SESSION['user']?></h2>

<?php
include "recent.php";  //list of recently added songs by admin

?>


<div class="row">
<?php
      $user=$_SESSION['user'];
      $sqlrequest=$sql->query("SELECT playlists FROM users WHERE nickname='$user'");
      $json=$sqlrequest->fetch_assoc()['playlists'];
      $playlist=json_decode($json,true);


      if(empty($playlist)){
            echo "You do not have any Playlists.<br /> Start to create one by pushing + sign next to the song you like."; 
      }else{
            echo "<div><h2> Your playlists </h2>";
            include "view/usersview/myplaylists.php";
      }

      $sqlrequest=$sql->query("SELECT favorites FROM users WHERE nickname='$user'");
      $favorites=$sqlrequest->fetch_assoc()['favorites'];

      if(!$favorites){
                  echo "You do not have any Favorite song.<br /> Add one by pushing + sign next to the song you like."; 
            }else{
            echo "</div><div><h2> Your favorites</h2>";
            include "view/usersview/myfavorites.php";
            }
            
            echo "</div><div><h2> Other users playlists</h2>";
            include "view/usersview/playlists.php";
            echo "</div>";
      
?>
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