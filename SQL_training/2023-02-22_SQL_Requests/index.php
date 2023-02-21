
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

<h1>SQL DB "world" filtering</h1>

<div>
      <ul>Lentelėje "city" filtruojami:
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
      </ul>

      <ul>Lentelėje "country" filtruojama:
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
      </ul>

      <ul>Bonus
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