<?php

$letters = 'ABCDEFGHIJKLMNOPQRSTUVYXYZ';
$three_letters = "";


for ($i = 1; $i <= 3; $i++) {
      $letter = $letters[rand(0, (strlen($letters) - 1))];
      $three_letters .= $letter;  
}
 
file_put_contents('skaicius.txt', $three_letters);

echo "į sakicius.txt faila pridėta reikšmė $three_letters";