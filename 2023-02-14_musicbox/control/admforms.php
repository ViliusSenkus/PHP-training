<?php
//data recieved from admin forms is processed here

// SONG----------------------------------
if (isset ($_SESSION['user']) && $_SESSION['user']=="admin" && isset($_POST['song']) && $_POST['song']=="new"){

      $performer=$_POST['performer'];
      $songname=$_POST['songname'];
      $musicstyle=$_POST['musicstyle'];
      $album=$_POST['album'];
      $year=$_POST['year'];
      $youtube=$_POST['youtube'];
      $songtype=$_POST['songtype'];

      if($sql->query("INSERT INTO songs (performer, songname, musicstyle, album, year, youtube, songtype) VALUES ('$performer', '$songname', '$musicstyle', '$album', '$year', '$youtube', '$songtype')")){
      echo "<h2 style='color:red'>Song added successfully</h2>";
      }
}

// ALBUM---------------------------------
if (isset ($_SESSION['user']) && $_SESSION['user']=="admin" && isset($_POST['album']) && $_POST['album']=="new"){

      
      $year=$_POST['year'];
      $album=$_POST['albumname'];
      $performer=$_POST['performer'];
      $albumpic=$_POST['albpic'];

      if($sql->query("INSERT INTO albums (year, albumname,	performer,	cover) VALUES ('$year', '$album', '$performer',  '$albumpic')")){
      echo "<h2 style='color:red'>Album info added</h2>";
      }
}

// PERFORMER------------------------------
if (isset ($_SESSION['user']) && $_SESSION['user']=="admin" && isset($_POST['perf']) && $_POST['perf']=="new"){


      $performer=$_POST['performer'];
      $photo=$_POST['perfpic'];

      if($sql->query("INSERT INTO performer (performername,	performerpicture) VALUES ('$performer', '$photo')")){
      echo "<h2 style='color:red'>Performer added</h2>";
      }
}


?>