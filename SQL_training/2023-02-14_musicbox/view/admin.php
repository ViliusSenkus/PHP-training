<h2>Jūs esate admino puslapyje</h2>

<nav>
      <ul>
            <a href="./?act=song">
                  <li>New song</li>
            </a>
            <a href="./?act=album">
                  <li>New Album</li>
            </a>
            <a href="./?act=perform">
                  <li>New Performer</li>
            </a>
            <a href="./?act=pllist">
                  <li>New Playlist</li>
            </a>
      </ul>
</nav>

<?php
      if (isset($_GET['act']) && $_GET['act'] !=""){
            $case=$_GET['act'];

            switch ($case){
                  case "song":
                        include "form/admin/song.html";
                        break;
                  case "album":
                        include "form/admin/album.html";
                        break;
                  case "perform":
                        include "form/admin/performer.html";
                        break;
                  case "pllist":
                        include "form/admin/playlists.html";
                        break;
                  default:
                        die();
            }
      }

      $sqlrequest=$sql->query("SELECT * FROM songs");
      $songs=$sqlrequest->fetch_all(MYSQLI_ASSOC);

      function performerPic($performerName, $albumName=""){
            global $sql;
            $sqlrequest=$sql->query("SELECT performerpicture  FROM performer WHERE performername = '$performerName'");
            $performer=$sqlrequest->fetch_all();
                  if($albumName == ""){
                       $coverpic = "./content/img/logo.png";
                  }else{
                        $sqlrequest=$sql->query("SELECT cover  FROM albums WHERE performer = '$performerName' AND albumname='$albumName'");
                       $coverpic=$sqlrequest->fetch_all();
                       if(!empty($coverpic)){
                        $coverpic=$coverpic[0][0];
                       }else{
                        $coverpic="./content/img/logo.png";
                       }
                  }
            if (!$performer){
                  $performer = "./content/img/logo.png";
            }else{
                  $performer = $performer[0][0];
            }

            $result=array($performer, $coverpic);
            return $result;
      }
      // function albumPic($albumName){
      //       global $sql;
      //       $sqlrequest=$sql->query("SELECT cover  FROM performer WHERE performername = '$performerName'");
      //       $performer=$sqlrequest->fetch_all();
      //       if (!$performer){
      //             return "./content/img/logo.png";
      //       }
      //       return $performer[0][0];
      // }
?>
<h2> List of songs </h2>
<table class="admin_table">
      <thead>
            <th>#</th>
            <th>Song name</th>
            <th>Performer</th>
            <th>Performer picture</th>
            <th>Album </th>
            <th>Album picture</th>
            <th>Year</th>
      </thead>
      <tbody>
            
            <?php
            foreach ($songs as $k=>$v){
                  $performer=performerPic($v['performer'])[0];
                  $cover=performerPic($v['performer'], $v['album'])[1];
                  ?>
            <tr>
                  <td><?= $k ?></td>
                  <td><?= $v['songname'] ?></td>
                  <td><?= $v['performer'] ?></td>
                  <td>
                       <img src="<?=$performer?>" alt="<?=$v['performer']?>" />
                  </td>
                  <td><?= $v['album'] ?></td>
                  <td>
                        <img src="<?=$cover?>" alt="<?=$v['album']?>" />      
                  </td>
                  <td><?= $v['year'] ?></td>
            </tr>

            <?php
            }

            ?>
      </tbody>
</table>

<?php
      $sqlrequest=$sql->query("SELECT * FROM users");
      $usersdata=$sqlrequest->fetch_all(MYSQLI_ASSOC);
?>
<h2> List of users </h2>



<table class="admin_table">
      <thead>
            <th>#</th>
            <th>User name</th>
            <th>eMail</th>
            <th>Sign date</th>
            <th>Plan</th>
            <th>Expire</th>
      </thead>
      <tbody>
      <?php
      foreach ($usersdata as $k=>$v){
      ?>
            <tr>
                  <td><?=$k?></td>
                  <td><?=$v['nickname']?></td>
                  <td><?=$v['email']?></td>
                  <td><?=$v['signdate']?></td>
                  <td><?=$v['plan']?></td>
                  <td><?=$v['expires']?></td>
            </tr>
      <?php
      }
      ?>
      </tbody>
</table>
     

<?php

$sqlrequest=$sql->query("SELECT playlists, nickname FROM users WHERE playlists != ''");
$allplaylists=$sqlrequest->fetch_all();

$sqlrequest=$sql->query("SELECT * FROM songs");
$json=$sqlrequest->fetch_all();

?>

      <h2> All Playlists </h2>
      <table class="admin_table">
            <thead>
                  <th>#</th>
                  <th>Name</th>
                  <th>Number of songs</th>
                  <th>User</th>
            </thead>
            <tbody>
<?php

foreach($allplaylists as $value){
      
     $plists=json_decode($value[0], true);
    
      foreach ($plists as $k=>$v){
            $sqlrequest=$sql->query("SELECT * FROM songs WHERE id=$v[0]");
            $songinfo=$sqlrequest->fetch_row();
            $lookforperformer=$songinfo[1];
            $lookforsong=$songinfo[2];
            $lookforalbum=$songinfo[4];
            $sqlrequest=$sql->query("SELECT cover FROM albums WHERE performer='$lookforperformer'     AND albumname='$lookforalbum'");
            $albumpicture=$sqlrequest->fetch_assoc()['cover'];
  
?>


            <tr>
                  <td><?=$k?></td>
                  <td><?=$v[0]?></td>
                  <td><?=count($v[0])?></td>
                  <td><?=$v[1]?></td>
            </tr>

<?php
            }
      }
?>
      </tbody>
</table>