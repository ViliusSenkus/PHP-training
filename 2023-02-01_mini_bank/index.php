<?php
session_start();

//tikriname ar suvesti formos duomenys
if (
      isset($_POST["id"]) &&
      isset($_POST["psw"]) &&
      $_POST["id"] != "" &&
      $_POST["psw"] != ""
) { $case=$_POST["id"];

      switch ($case) {
            case "admin" : 
                  if ($_POST["psw"] === "admin"){ 
                        $_SESSION["admin"] = true;
                        $_SESSION["link"] = $_SERVER['REQUEST_URI'];
                        header('Location: admin/admin.php');
                  };
                  break;
            case "" : 
                  $_SESSION["clientID"] = "";
                  $_SESSION["clientPsw"] = "";
                  $_SESSION["connected"] = false;
                  break;
            default:
                  $jsonData = file_get_contents("admin/db.json");
                  $clientsArray = json_decode($jsonData, true);

                  foreach($clientsArray as $key=>$Client){
                        if ($_POST["id"] == $Client["id"] && $_POST["psw"] == $Client["psw"]) {
                        $_SESSION["clientID"] = $Client["id"];
                        $_SESSION["clientPsw"] = $Client["psw"];
                        $_SESSION["connected"] = true;
                  } 
                  }
            }
      }
?>

<!DOCTYPE html>
<html lang="en">

<head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="description" content="">
      <meta name="author" content="Vilius Senkus, and Bootstrap contributors">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
      <title>Login Page</title>

      <style>
            footer{
                  position: fixed;
                  bottom: 0;
            }
      </style>

</head>

<body class="text-center">
      <?php 
      include("view/header.php");  

      if (isset($_GET["file"]) && $_GET["file"] != ""){
            $file = $_GET["file"];
      }else{
            $file = "";
      }

    
      

      // pervedimai
      if (isset($_POST["trans"]) and count($_POST) == 4) {
            $jsonData = file_get_contents("admin/db.json");
            $clientsArray = json_decode($jsonData, true);
            
            $senderKey = intval($_POST["key"], 10); // konvertuojam  siuntėjo key'ju
            $transferSum = 0.43+floatval($_POST["sum"]); // konvertuojam suma i skaicius ir pridedam mokescius
      
            foreach ($clientsArray as $key => $value) {
                  //tikrinam ar yra gavėjas ir užsižymim jo key'jų
                  if ($value["iban"] == $_POST["reciever"]) {
                        $recieverKey = $key;
                        break;
                  }
            }
            if (isset($recieverKey)) { 
                  //jeigu gavėjas gautas tada tikriname ar pakankamai turima pinigų pavedimui
                  if ($transferSum <= $clientsArray[$senderKey]["balance"]) {
                        echo "pries mokejima - ".$clientsArray[$senderKey]["balance"]."<br/>";
                        $clientsArray[$senderKey]["balance"] -=  $transferSum;
                        $clientsArray[$senderKey]["balance"];
                        
                        echo "yra tiek pinigu";
                  } else {
                        echo "nepakanka pinigu";
                        exit;
                  }
                  
            }
      }


      switch ($file) {
            case "card":
                  include("view/card.php");
                  break;
            case "loan":
                  include("view/loan.php");
                  break;
            case "pension":
                  include("view/pension.php");
                  break;
            case "ebank":
                  include("view/login.php");
                  break;
            default:
                  include("view/login.php");
      }

      include("view/footer.php");
      ?>

</body>

</html>