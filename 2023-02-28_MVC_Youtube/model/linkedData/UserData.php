<?php

namespace Model\LinkedData;

class UserData{

      public $userdata;

      private $userId;

      public function __construct($usrID){
           if(!$usrID)
            return;
            //čia reikia sudėti visas žemiau esančias f-jas, kad gauti pilną prisijungusio vartotojo info ir pateikti kaip $userdata kitnamaji i puslapi apdorojimui
      }

      public static function getUser(){
            // isset($_SESSION['role']) ? $_SESSION['role'] : $user=0;
            // $_SESSION['role']=$user;
      }
}