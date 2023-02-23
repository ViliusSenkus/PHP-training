<?php

class Avia {
      const HOST='localhost';
      const USER='root';
      const PSW='';
      const DB='avia';

      public $db="";

      function __constructor(){
            try{
                  $db=new mysqli(self::HOST, self::USER, self::PSW, self::DB);
            }catch(Exception $error){
                  echo "<h2>DB service is not avialable</h2><br />";
                  echo $error;
                  exit;
            }
      }

      function addFlight($from, $to, $fl_num, $fl_date ){
            $sql=$db->query("INSERT INTO flights(f_from, f_to, flight_number, flight_date) VALUES ('$from','$to','$fl_num','$fl_date')")
      }


}
?>