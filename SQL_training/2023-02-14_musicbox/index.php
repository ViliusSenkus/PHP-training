<?php
session_start();

//connecting to dataBase

try{
      $sql= new mysqli('localhost', 'root', '', 'musicbox');
}catch(Exception $error){
      include 'view/blank.html';
      echo "Service is not avialable at a moment <br />";
      echo $error;
      exit;
}

//Admin Forms processing file
include "control/admforms.php";


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

if (  isset($_GET['action'])&& $_GET['action'] == "logof") {
            // $_SESSION['user']="";
            session_destroy();
            header('Location: ./');
      }




//page parts collection
include('view/header.php');
include('view/sidebar.html');
include('view/main.php');

// including user actions - to show notification when some icon is clicked.
// notification appears before footer (change position if noptification needed in other place); 
include "control/usercontrol.php";

include('view/footer.html');







?>

