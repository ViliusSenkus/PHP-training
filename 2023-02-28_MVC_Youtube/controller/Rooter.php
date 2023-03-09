<?php

namespace Controller;

class Rooter{

      public static function signup(){
            if (isset($_POST['signup']) && $_POST['signup']=='true'){
                  $name=$_POST['username'];
                  $password=$_POST['password'];
                  $avatar=$_POST['avatar'];
                  
                  // tikriname ar vardas neužimtas:
                  $users = new \Model\Users();
                  $usersData = $users->get();

                  foreach($usersData as $user){
                        if ($user['nickname'] == $name){
                              echo "<script>alert('Name is taken by someone else, please choose another one');</script>";;
                        return; 
                        }                      
                  }

                  //tikriname password
                  if(strlen($password)<4){
                        echo "<script>alert('Password is too short');</script>";
                        return;
                  }
                  
                  $password = md5($password);

                  $newuser=array('nickname'=>$name, 'password'=>$password, 'avatar'=>$avatar);
                  // Pastaba: $avatar=real_escape_string($avatar); eina kartu su sql uzklausa.
                 
                  //įdedame įrašą į users lentelę
                  $users->set($newuser);

                  // $_SESSION['user']=$_POST['username'];;
                  // $_SESSION['role']='1';
                  // $_SESSION['id']=$user->insert_id; //šitas nesuveikia
                  // $_SESSION['avatar']=$_POST['avatar'];

                  header("Location: ./"); 
             
                  //priskiriame vartotoją prie Sesijos ("priloginame");
            }
      }

      public static function login(){
            if (!isset($_SESSION['role']))
                  $_SESSION['role']=0;

            if (isset($_POST['login']) && $_POST['login']=='true'){
                  
                  $list=new \Model\Users();
                  $list=$list->get();
                  
                  foreach($list as $v)
                        if (  $v['nickname'] == $_POST['username'] &&
                              $v['password']==md5($_POST['password'])){

                        $_SESSION['user']=$v['nickname'];
                        $_SESSION['role']=$v['role'];
                        $_SESSION['id']=$v['id'];
                        $_SESSION['avatar']=$v['avatar'];
                        break;   
                  }
                  if($_SESSION['role']==2){
                        header("Location: ./?adminview=categories");
                  }else{
                        header("Location: ./");
                  }

            } 
      }
      
      public static function getUserHeader(){
            $role=$_SESSION['role'];

            switch ($role){
                  case 0: //unknown
                        include "view/header/right_none.php";
                        break;
                  case 1: //user
                        include "view/header/right_user.php";
                        break;
                  case 2: //admin
                        include "view/header/right_admin.php";
                        break;
                  default:
                        break;
            }
      }

      public static function isLoginNeeded(){
            if (isset($_GET['login']) && $_GET['login']=='true'){
                  include "view\login.html";
            }
            if (isset($_GET['setup']) && $_GET['setup']=='new'){
                  include "view\signup.html";
            }
      }

      public static function logoff(){
            if (isset($_GET['log']) && $_GET['log']=="off"){
            session_destroy();
            header("Location: ./");
            }
      }

}

      
?>