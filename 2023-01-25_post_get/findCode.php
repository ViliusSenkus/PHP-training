<?php

$code = $_POST["psw"];
$letters = "AĄBCČDEĘĖFGHIĮYJKLMNOPRSŠTUŲŪVZŽWXQaąbcčdeęėfghiįyjklmnoprsštuųūvzžwxq0123456789/*-+=_-&^%$#@~`,.:;?!'][()}{| ";

if (strlen($code) < 1) {
      echo "spaltažodis neįvestas";
      die();
}

for ($y = 0; $y < strlen($code); $y++) {
      $counter = 0;
      for ($i = 0; $i < strlen($letters); $i++) {
            if ($code[$y] == $letters[$i]) {
                  $counter++;
            }
      }
      if ($counter == 0) {
            echo "slaptažodyje yra neatpažįstamyu simbolių";
            die();
      }
}

echo "įvestas slaptažodis tinkamas apdorojimui";

//sisteminga paieška
$guess = "";
echo "<div style='display:flex; flex-direction:row; justify-content: center;'>";
echo " <div style='width:300px;'><h2>ieškoma sistemingai</h2> <ul style='list-style: number'>";

for ($z = 0; $z < strlen($code); $z++) {
      for ($i = 0; $i < strlen($letters); $i++) {
            if ($code[$z] == $letters[$i]) {
                  echo "Atitikimas - " . $letters[$i];
                  $guess .= $letters[$i];
                  break;
            }
            echo "<li>" . $guess . " - " . $letters[$i] . "</li>";
      }
      echo "------<br />";
}
echo "</ul><h3>Radau $guess </h3></div>";



//atsitiktinė paieška


$three_letters = "";

echo " <div style='width:300px;'><h2>ieškoma spėjant</h2> ";
if (strlen($code)>3){
      echo "Perdaug simbolių kad ieškoti atsitiktiniu būdu";
      die();
}
echo "<ul style='list-style: number'>";

while ($code != $three_letters) {
      $three_letters = "";
      for ($i = 1; $i <= strlen($code); $i++) {
            $letter = $letters[rand(0, (strlen($letters) - 1))];
            $three_letters .= $letter;

      }

      echo "<li>" . $three_letters . "</li>";
}
echo "</ul><h3>Radau $three_letters </h3></div></div>";

?>