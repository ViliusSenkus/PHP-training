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
      include "recent.php";
      echo "<h2>Sign up now and enjoy melody</h2>";
}

?>

</main>