<?php

namespace Controller;

class Rooter{

      public static function getUser(){
            isset($_GET['user']) ? $user=$_GET['user'] : $user=0;
            $_SESSION['user']=$user;
      }

      public static function getUserHeader(){
            $user=$_SESSION['user'];

            switch ($user){
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
            
      }
}

      
?>