<?php

$duomabze = new mysqli('localhost', 'root', '', 'testas');

try{
      $duomabze = new mysqli('localhost', 'root', '', 'testas');
}catch(Exception $klaida){
echo $klaida;
exit;
}




if($duomabze->connect_errno){
      echo "neprisujungta";
}else{
      echo "viskas gerai";
}


?>