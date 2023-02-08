<?php

      //Enabling data base
      // !!!!!!!!!!!!!!!!!!!!! Should  transform in to MySQL DB !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
      $JSONmessages = 'data/messages.json';
      $JSONusers = 'data/users.json';
      if (!file_exists($JSONmessages) || !file_exists($JSONusers)){
            file_put_contents($JSONmessages, "");
            file_put_contents($JSONusers, "");
      }

      /*
            -----------------Description of variables:-------------------
            $messages - extracted json object gathered all messages info
            $users - extracted json object gathered al users info
            $_SESSION['user'] - connected user;
            $_SESSION['log'] - boolean showing if user is connected (true-connected, false-disconnected);
            $_GET['new'] - identifier to show  form. Value - "new".
            $_GET['log'] - identifier to show user log in or new user creation form. Values: 
                                                                              "log" - for login;
                                                                              "new" - for new user creation;
            $_POST['newName'] - newly created user name
            $_POST['newPassword'] - newly created user pasword
            $_POST['logUser'] - Logging in name
            $_POST['logPsw'] - Logging in password

      
            ----------------All activities goes in to this section---------------
      
            //pradžioje kintamieji gali neegzistuoti
            
      */
      
      //Log in check///////////////////////////////////////////////////

      if (isset(  $_POST['logUser']) &&
                  $_POST['logUser'] != "" &&
            isset($_POST['logPsw']) &&
                  $_POST['logPsw'] != ""){
                  
                  foreach ($users as $value){
                        if ($_POST['logUser']===$value['user'] && $_POST['logPsw']===$value['psw']){
                              $_SESSION['user']=$_POST['logUser'];
                              $_SESSION['log']=true;
                        header('Location: ./');
                        }
                  }
            
      }
      
      //New user creation////////////////////////////////////////////
      if (isset($_POST['newName']) &&
            $_POST['newName'] != "" &&
      isset($_POST['newPassword']) &&
            $_POST['newPassword'] != ""){
            //reikia pridėti validaciją ir pasikartojimų negalėjimą.
            $newUser = array(
                  'user' => $_POST['newName'],
                  'psw' => $_POST['newPassword']
            );
            header('Location: ./');
      }

      //duomenų nuskaitymas iš JSON:
      $json = file_get_contents($JSONmessages);
      $messages = json_decode($json);
      $json = file_get_contents($JSONusers);
      $users = json_decode($json);

      $_SESSION['user'] = "";
      $_SESSION['log'] = false;
?>

<!DOCTYPE html>
<html lang="en">
<head>
      <meta charset="UTF-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
      <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;300;600;900&display=swap" rel="stylesheet" />
      <link rel="icon" href="content/logo.png" />
      <link rel="stylesheet" href="content/style.css" />
      <title>OneForFourNet</title>
</head>
<body>
      <header>
            <?php
                 include("content/header.php");
            ?>
      </header>
      <main>
            <form method="post">
                  <input type="number" name="sk" />
                  <button type="submit">sub</button>
            </form>
            

            <?php
            //reikalingas patikrinimas ar yra nors vienas įrašas ir jeigu yra rodyti main.php, jeigu nėra pasisveikinimo puslapį.
           
            $jsonMsg = file_get_contents("data/messages.json");
            echo "va".$jsonMsg;
            // $clientsArray = json_decode($jsonData, true);
            // if (is_file("data/messeges.json") and isset($_SESSION[$user])){
            //       include("content/main/main.php");
            // }else{
            //       //reikia stilizuoti ir padaryti gražiai
            //       echo "Sveiki atvykę į 144net svetainę, jūs galite tapti pirmu registruotu vartotoju";
            // }
            
            ?>
      </main>
      <footer>
            <?php
            include("content/footer.php");
            ?>
      </footer>

      <?php echo "<pre>";
      echo "getas :";
            print_r($_GET);
      echo "<br />postas :";
            print_r($_POST);
            print_r($_SESSION); ?>
</body>
</html>