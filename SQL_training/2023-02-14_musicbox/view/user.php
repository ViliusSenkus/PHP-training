<h2><?=$_SESSION['user']?></h2>

<?php
include "recent.php";  //list of recently added songs by admin

if (isset($_GET['playview']) && $_GET['playview']=="playview"){
      include "view/usersview/playview.php";
}else{
      //everything below
?>


<div class="row">
<?php
      $user=$_SESSION['user'];
      $sqlrequest=$sql->query("SELECT playlists FROM users WHERE nickname='$user'");
      $json=$sqlrequest->fetch_assoc()['playlists'];
      $playlist=json_decode($json,true);


      if(empty($playlist)){
?>
            <div>
                  <h2>No Playlists created</h2>
                  <div>
                        Create one by pushing <br />
                        <span class="material-symbols-outlined">
                              add_circle
                        </span> <br />
                        next to the song you like.
                  </div>
            </div>
<?php 
      }else{
            echo "<div><h2> Your playlists </h2>";
            include "view/usersview/myplaylists.php";
            echo "</div>";
      }

      $sqlrequest=$sql->query("SELECT favorites FROM users WHERE nickname='$user'");
      $favorites=$sqlrequest->fetch_assoc()['favorites'];

      if(!$favorites){
?>
            <div>
                  <h2>No Favorites added</h2>
                  <div>
                        Add one by pushing <br />
                        <span class="material-symbols-outlined">
                              stars
                        </span><br />
                        next to the song you like. 
                  </div>
            </div>
                  

<?php      
      }else{
            echo "<div><h2> Your favorites</h2>";
            include "view/usersview/myfavorites.php";
            echo "</div>";
      }
            
            echo "<div><h2> Other users playlists</h2>";
            include "view/usersview/playlists.php";
            echo "</div>";
            

}
?>
</div>
