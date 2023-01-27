<?php

if (is_file('skaicius.txt')) {
      $compare = file_get_contents('skaicius.txt');
      echo "<h3>turima reikšmė - $compare </h3>";
} else {
      echo "Failas su reikšme dar nesukurtas";
      die();
}

$letters = 'ABCDEFGHIJKLMNOPQRSTUVYXYZ';
$three_letters = "";



echo " <ul style='list-style: number'>";

while ($compare != $three_letters) {
      $three_letters = "";
      for ($i = 1; $i <= 3; $i++) {
            $letter = $letters[rand(0, (strlen($letters) - 1))];
            $three_letters .= $letter;

      }

      echo "<li>" . $three_letters . "</li>";
}
echo "</ul><h3>Radau $three_letters </h3>";





