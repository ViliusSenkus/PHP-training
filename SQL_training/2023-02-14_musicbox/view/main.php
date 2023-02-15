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
      //data preparation
    

      echo "<h2>Our most recently added music tracks</h2>";
      $counter=0;
      for($i=1; $i<3; $i++){
            ?>
            <div class="row">
            <?php
            for($z=1; $z<5; $z++){
            
                        $sqlrequest = $sql->query("SELECT MAX(id)-$counter FROM `songs`");
                        $maxid=($sqlrequest->fetch_row())[0];
                        $sqlrequest = $sql->query("SELECT MIN(id) FROM `songs`");
                        $minid=($sqlrequest->fetch_row())[0];
                        $sqlsong = $sql->query("SELECT * FROM songs WHERE id = $maxid");
                        $songdata=($sqlsong->fetch_row());
                        if ($songdata){
                              if ($songdata[0]==$minid){
                                    $counter--;
                              } 
                              ?>
                              <div class="album_box">
                               <?php
                                    echo "<pre>";
                                    print_r($songdata[0]);
                                    echo "</pre>";
                                    $counter++;                                   
                              ?>
                                    </div>
                              <?php
                        }else{
                              $z--;
                              $counter++;
                        }
            }
            ?>
            </div>
      <?php
      }
}
echo "<h2>Sign up now and enjoy melody</h2>";




?>
</main>