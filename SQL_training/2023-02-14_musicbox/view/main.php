<main>
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
      if($_SESSION['user']=="admin"){
            include "admin.html";
      }else{
      include "user.php";
      }
}else{
      for($i=1; $i<3; $i++){
            ?>
            <div class="row">
            <?php
            for($z=1; $z<5; $z++){
            ?>
                 <div class="album_box">
                 </div>
            <?php
            }
            ?>
            </div>
      <?php
      }
}

?>
</main>