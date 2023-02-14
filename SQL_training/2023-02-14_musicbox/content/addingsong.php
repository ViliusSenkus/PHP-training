<?php
if (isset ($_SESSION['user']) && $_SESSION['user']=="admin" && $_POST['song']=="new"){
      $performer=$_POST['performer'];
      $songname=$_POST['songname'];
      $musicstyle=$_POST['musicstyle'];
      $album=$_POST['album'];
      $year=$_POST['year'];
      $youtube=$_POST['youtube'];
      $songtype=$_POST['songtype'];

      echo $performer.$songname.$musicstyle.$album.$year.$youtube.$songtype;

      $sql->query("INSERT INTO songs (performer, songname, musicstyle, album, year, youtube, songtype) VALUES ('$performer', '$songname', '$musicstyle', '$album', '$year', '$youtube', '$songtype')");
      header('Location: ../../');
}
?>