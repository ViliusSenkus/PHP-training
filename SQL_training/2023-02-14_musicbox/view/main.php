<?php 

if (  isset($_GET['action']) &&
      $_GET['action'] !="" &&
      empty($_SESSION)){
      
      $choise = $_GET['action'];

      switch ($choise) { 
            case 'login': 
                  include "form/login.html";
                  break;
            case 'sign':
                  include "form/sign.html";
                  break;
            default: 
                 break;     
      }
}

if (!empty($_SESSION) && $_SESSION['user'] != ""){
      echo "<div>Jūs prisijungėte sėkmingai</div>";
}