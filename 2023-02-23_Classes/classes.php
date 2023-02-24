<?php

class Avia {
      const HOST='localhost';
      const USER='root';
      const PSW='';
      const DB='avia';

      public static $db="";

      function __constructor(){
            try{
                  self::$db=new mysqli(self::HOST, self::USER, self::PSW, self::DB);
            }catch(Exception $error){
                  echo "<h2>DB service is not avialable</h2><br />";
                  echo $error;
                  exit;
            }
      }

      function addFlight($from, $to, $fl_num, $fl_date ){
            self::$db->query("INSERT INTO flights(f_from, f_to, flight_number, flight_date) VALUES ('$from','$to','$fl_num','$fl_date')");
      }

      public $flights=[];
      public $passengers=[];
      public $flightdata=[];

      function showflights(){
            $this->flights=self::$db->query("SELECT * FROM fligths");
            return $this;
      }

      function sortfligthsfrom($sorttype="ASC"){
            $this->flights=self::$db->query("SELECT * FROM flights ORDER BY f_from $sorttype");
            return $this;
      }

      function sortfligthsto($sorttype="ASC"){
            $this->flights=self::$db->query("SELECT * FROM flights ORDER BY f_to $sorttype");
            return $this;
      }

      function passangersinflight($fl_num){
            $this->passengers=self::$db->query("SELECT * FROM passengers WHERE flight_id='$fl_num'");
            return $this;
      }

      function passengerflightdata($name, $surname){
            $this->flightdata=self::$db->query("SELECT f.*, p.* FROM flights AS f JOIN passengers AS p ON p.flight_id = f.flight_number WHERE p.first_name='$name' AND p.last_name='$surname'");
            return $this;
      }

}
?>
