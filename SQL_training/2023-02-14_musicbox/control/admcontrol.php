<?php

if (isset($_GET['del']) and $_GET['del']=="song"){
      $delid=$_GET['id'];
      $sql->query("DELETE FROM songs WHERE id='$delid'");
}

if (isset($_GET['del']) and $_GET['del']=="user"){
      $delid=$_GET['id'];
      $sql->query("DELETE FROM users WHERE id='$delid'");
}

?>