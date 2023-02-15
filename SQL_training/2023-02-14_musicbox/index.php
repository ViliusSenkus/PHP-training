<?php

session_start();

//connecting to dataBase

try{
      $sql= new mysqli('localhost', 'root', '', 'musicbox');
}catch(Exception $error){
      echo "Service is not avialable at a moment <br />";
      echo $error;
      exit;
}

//sign up /////////////////////////////////////////////////

if (isset($_POST['user']) && isset($_POST['password']) && isset($_POST['mail']) && $_GET['action'] == "sign" ){
      //form validation - something entered
      if ($_POST['user'] == ""){
            echo "No user name is selected";
      }
      if ($_POST['password'] == ""){
            echo "No password is selected";
      }
      if ($_POST['mail'] == ""){
            echo "No email address";
      }
      //validation of password strengh could be added
      //email address validation needed
      
      //check DB for new user name aviability and/or addin new user to DB
      $searchfor=$_POST['user'];
      $newuser=$sql->query("SELECT nickname FROM users WHERE nickname='{$searchfor}' ");
      if ($newuser->num_rows > 0){
            echo "user name is taken by someone else";
      }else{
            $newpsw=md5($_POST['password']);
            $newmail=$_POST['mail'];
            if ($sql->query("INSERT INTO users (nickname, email, plan, password) VALUES ('$searchfor', '$newmail', 'basic', '$newpsw')")){
                  $_SESSION['user']= $_POST['user'];
            }else{
                  echo "Something went wrong, try one more time";
                  header('Location: ./');
            };
      }
}

//login /////////////////////////////////////////////////

if (  isset($_GET['action'])&&
      $_GET['action'] == "login" && 
      isset($_POST['user']) &&
      isset($_POST['password']) &&
      $_POST['user'] != "" &&
      $_POST['password'] != ""){
            $usr=$_POST['user'];
            $psw=md5($_POST['password']);
            $result=$sql->query("SELECT * FROM users WHERE nickname='$usr' and password='$psw'");
            $res=$result->fetch_assoc()['nickname'];
            if($res === $_POST['user'] ){
                  $_SESSION['user']= $_POST['user'];
                  header('Location: ./');
            }
}

//logoff ///////////////////////////////////////////

if (  isset($_GET['action'])&&
      $_GET['action'] == "logof") {
            // $_SESSION['user']="";
            session_destroy();
            header('Location: ./');
      }

include('view/header.php');

include('view/main.php');
include('view/sidebar.html');
echo "<hr />";
include('view/footer.html');

//add song ///////////////////////////////////////////////////

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
};
?>