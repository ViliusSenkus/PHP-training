<?php
//  čia turi būti apdorojama iš admino formų gauta informacija.
//  dar trūksta:
// Albumai
// atlikėjai
//playlistai (vieši)


if (isset ($_SESSION['user']) && $_SESSION['user']=="admin" && isset($_POST['song']) && $_POST['song']=="new"){

      $performer=$_POST['performer'];
      $songname=$_POST['songname'];
      $musicstyle=$_POST['musicstyle'];
      $album=$_POST['album'];
      $year=$_POST['year'];
      $youtube=$_POST['youtube'];
      $songtype=$_POST['songtype'];

      if($sql->query("INSERT INTO songs (performer, songname, musicstyle, album, year, youtube, songtype) VALUES ('$performer', '$songname', '$musicstyle', '$album', '$year', '$youtube', '$songtype')")){
      echo "Song added successfully";
      }
}
?>