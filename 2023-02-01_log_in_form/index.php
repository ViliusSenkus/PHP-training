<?php
session_start();

// echo "<pre> SESSION duomenys: ";
// print_r($_SESSION);
// echo "<br/> POST duomenys: ";
// print_r($_POST);
// echo "</pre>";
// ?>

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
      include("viewer/header.php");  

      if (isset($_GET["file"]) && $_GET["file"] != ""){
            $file = $_GET["file"];
      }else{
            $file = "";
      }

      switch ($file) {
            case "card":
                  include("viewer/card.php");
                  break;
            case "loan":
                  include("viewer/loan.php");
                  break;
            case "pension":
                  include("viewer/pension.php");
                  break;
            case "ebank":
                  include("viewer/login.php");
                  break;
            default:
                  include("viewer/login.php");
      }

      include("viewer/footer.php");
      ?>

</body>

</html>