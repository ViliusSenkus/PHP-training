<h2><?=$_SESSION['user']?></h2>
<div>
      <ul>
      <?=$_SESSION['user']?>' playlists
            <?php
            $user=$_SESSION['user'];
            $playlist=$sql->query("SELECT playlists FROM users WHERE nickname='$user'");
            if($playlist==null){
                  echo "Create your playlist";
            }else{
                  $json=json_decode($playlist);
                  print_r($playlist);

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