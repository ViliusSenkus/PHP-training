<?php
session_start();
// echo "<pre> SESSION duomenys: ";
// print_r($_SESSION);
// echo "<br/> POST duomenys: ";
// print_r($_POST);
// echo "</pre>";
// 

$Client = array(
      "id" => "65451351",
      "psw" => "1234",
      "account" => " LT5515615616515615",
      "name" => "Motiejus",
      "surname" => "Aleksandravičius",
      "ammount" => 9.99
);

//tikriname ar suvesti formos duomenys
if (
      isset($_POST["id"]) &&
      isset($_POST["psw"]) &&
      $_POST["id"] != "" &&
      $_POST["psw"] != ""
) {
      if ($_POST["id"] === "admin" && $_POST["psw"] === "admin"){ 
            $_SESSION["admin"] = true;
            $_SESSION["link"] = $_SERVER['REQUEST_URI'];
            header('Location: admin/admin.php');
      } else {
            // jeigu duomenys suvesti tikriname ar jie atitinka vartotoją. Atitikus pririšame prie sesijos.
            if ($_POST["id"] == $Client["id"] && $_POST["psw"] == $Client["psw"]) {
                  $_SESSION["clientID"] = $Client["id"];
                  $_SESSION["clientPsw"] = $Client["psw"];
                  $_SESSION["connected"] = true;
            } else {
                  $_SESSION["clientID"] = "";
                  $_SESSION["clientPsw"] = "";
                  $_SESSION["connected"] = false;
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