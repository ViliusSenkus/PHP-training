<?php

try{
      $db = new mysqli('localhost', 'root', '', 'world');
      define("DB", $db);
}catch(Exception $error){
      echo "<h2>DB service is not avialable</h2><br />";
      echo $error;
      exit;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
      <meta charset="UTF-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <meta author="Vilius Senkus" />

      <link rel="stylesheet" href="style.css" />
      <title>MySQL training</title>
</head>
<body>
      <h2>Can't connect to server</h2>
</body>
</html>

<h1>SQL DB "world" filtering</h1>

<div>
      <ul>
            <span>Lentelėje "city" filtruojami:</span>
            <li>
                  <a href="./?v=1">
                        Miestai, kurių pavadinime nėra "H" raidės
                  </a>
            </li>
            <li>
                  <a href="./?v=2">
                        Miestai, kurių pavadinime yra "C" raidė
                  </a>
            </li>
            <li>
                  <a href="./?v=3">
                        Miestai, kurių šalis yra Lietuva
                  </a>
            </li>
            <li>
                  <a href="./?v=4">
                        Miestai, kurių populiacija yra didesnė arba lygi 1000000
                  </a>
            </li>
            <li>
                  <a href="./?v=5">
                        Miestai, kurių id yra mažesnis 300 ir populiacija didesnė nei 200000
                  </a>
            </li>
            <span>Lentelėje "country" filtruojama:</span>
            <li>
                  <a href="./?v=6">
                        Šalių Valdymo formą, kurių gyvenimo trukmė yra didesnė nei 72 metai, plotas maženis arba lygus 30000 kvadratinių kilometrų bei populacijos dydis didesnis nei 5000000 gyventojų.
                  </a>
            </li>
            <li>
                  <a href="./?v=7">
                        Šalys, kurios nėra Azijoje ir kurių plotas yra mažesnis 10000 kvadratinių kilometrų.
                  </a>
            </li>
            <li>
                  <a href="./?v=8">
                        Šalių tarptautinį pavadinimą, vietinį pavadinimą, Prezidentą (Monarchą) ir populiaciją, kurios paskelbė nepriklausomybę 1991-aisiais
                  </a>
            </li>
            <span>Bonus</span>
            <li>
                  <a href="./?v=9">
                        Iš lentelės "country" filtruojami šalių pavadinimai ir kalbos pavadinimai, kurių populacijos dydis yra didesnis arba lygus 10000000.
                  </a>
            </li>
      </ul>
</div>

<div>
      <?php
            include "quaries.php";
      ?>
</div>