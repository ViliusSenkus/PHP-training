<?php
if (isset ($_SESSION['user']) && $_SESSION['user']!="" && isset($_GET['userdat']) && $_GET['userdat'] != ""){
      echo "add to playlist";
      print_r($songdata);
     }
     


//adding song to favorites

if (isset($_GET['fav']) && $_GET['fav'] != ""){
      $songid=$_GET['fav'];
      $nickname=$_SESSION['user'];
      $sqlrequest=(($sql->query("SELECT * FROM songs WHERE id='$songid'"))->fetch_all())[0];

      echo "<br />songid - ".$songid;
      echo "<br />nikas - ".$nickname;

      if($sqlrequest[8]){
            $favList=json_decode($sqlrequest[8], true);
            $favList[]=$songid;
      }else{
            $favList=array($songid);      
      }
      echo "<br />po ifo <br />";
      print_r($favList);
            
      echo "<br /> Favlistas po pridejimo";
      print_r($favList);
      $json=json_encode($favList);
      echo "<br />json - ".$json;
      $sqlrequest=$sql->query("UPDATE users SET favorites='$json' WHERE nickname='$nickname'");  
      
      echo "added to favorites";
}

    

?>