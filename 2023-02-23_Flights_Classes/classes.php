<?php

class Avia {
      const HOST='localhost';
      const USER='root';
      const PSW='';
      const DB='avia';
      public static $db;
      public $flights;
      public $passengers;
      public $flightdata;

      public function __construct(){
            try{
                  self::$db=new mysqli(self::HOST, self::USER, self::PSW, self::DB);
            }catch(Exception $error){
                  echo "<h2>DB service is not avialable</h2><br />";
                  echo $error;
                  exit;
            }
            $this->getFlights();
            $this->getPassenger();
      }
      public function setFlight($from, $to, $fl_num, $fl_date ){
            $this->flights=self::$db->query("INSERT INTO flights (f_from, f_to, flight_number, flight_date) VALUES ('$from', '$to', '$fl_num', '$fl_date')");
            return $this;
      }
      public function getFlights(){
            $this->flights=self::$db->query("SELECT * FROM flights")->fetch_all(MYSQLI_ASSOC);
            return $this;
      }
      public function editFlight($from, $to, $fl_num, $fl_date, $id){
            $this->flights=self::$db->query("UPDATE flights SET f_from='$from', f_to='$to', flight_number='$fl_num', flight_date='$fl_date' WHERE id='$id'");
            return $this;
      }
      function sortFligthsFrom($sorttype='ASC'){
            $this->flights=self::$db->query("SELECT * FROM flights ORDER BY f_from $sorttype");
            return $this;
      }
      function sortFligthsTo($sorttype='ASC'){
            $this->flights=self::$db->query("SELECT * FROM flights ORDER BY f_to $sorttype");
            return $this;
      }
      function passangersInFlight($fl_num){
            $this->flightdata=self::$db->query("SELECT * FROM passengers WHERE flight_id='$fl_num'")->fetch_all(MYSQLI_ASSOC);
            return $this->flightdata;
      }
      function passengerFlightData($name, $surname){
            $this->flightdata=self::$db->query("SELECT f.*, p.* FROM flights AS f JOIN passengers AS p ON p.flight_id = f.flight_number WHERE p.first_name='$name' AND p.last_name='$surname'")->fetch_all(MYSQLI_ASSOC);
            return $this->flightdata;
      }
      function setPassenger($name, $surname, $f_id){
            $this->passengers=self::$db->query("INSERT INTO passengers (first_name,	last_name,	flight_id) VALUES ('$name', '$surname', '$f_id')");
            return $this;
      }
      function getPassenger(){
            $this->passengers=self::$db->query("SELECT * FROM passengers")->fetch_all(MYSQLI_ASSOC);
            return $this;
      }
      public function editPassenger($name, $surname, $f_id, $id){
            $this->passengers=self::$db->query("UPDATE passengers SET first_name='$name', last_name='$surname', flight_id='$f_id' WHERE id='$id'");
            return $this;
      }
      function delPassenger($id){
            $this->passengers=self::$db->query("DELETE FROM passengers WHERE id='$id'");
            return $this;
      }
      function delFlight($id){
            $this->flights=self::$db->query("DELETE FROM flights WHERE id='$id'");
            return $this;
      }
}

?>
