<?php
if (isset ($_SESSION['user']) && $_SESSION['user']!="" && isset($GET['userdat']) && $GET['userdat'] != ""){
 echo "add to playlist";
 print_r($songdata);
}

if (isset($GET['fav']) && $GET['fav'] != ""){
      echo "add to favorites";
      print_r($songdata);
}
?>