<main>
<?php 

//Login Setup forms /////////////////////////////
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

// Further body (allways visible. Diference depend on user log and plan status).
      
      //Admin///////////////

if (!empty($_SESSION) && $_SESSION['user'] != ""){
      if($_SESSION['user']=="admin"){
            include "admin.php";

       //Connected user////

      }else{
      include "user.php";
      }

      //Not Connected
      
}else{
      echo "<h2>Our music selection</h2>";
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