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
      }
      public function addFlight($from, $to, $fl_num, $fl_date ){
            $this->flights=self::$db->query("INSERT INTO flights(f_from, f_to, flight_number, flight_date) VALUES ($from, $to, $fl_num, $fl_date)");
            return $this;
      }
      public function getFlights(){
            $this->flights=self::$db->query("SELECT * FROM flights")->fetch_all(MYSQLI_ASSOC);
            return $this;
      }
      function sortFligthsFrom($sorttype="ASC"){
            $this->flights=self::$db->query("SELECT * FROM flights ORDER BY f_from $sorttype");
            return $this;
      }
      function sortFligthsTo($sorttype="ASC"){
            $this->flights=self::$db->query("SELECT * FROM flights ORDER BY f_to $sorttype");
            return $this;
      }
      function passangersInFlight($fl_num){
            $this->passengers=self::$db->query("SELECT * FROM passengers WHERE flight_id='$fl_num'");
            return $this;
      }
      function passengerFlightData($name, $surname){
            $this->flightdata=self::$db->query("SELECT f.*, p.* FROM flights AS f JOIN passengers AS p ON p.flight_id = f.flight_number WHERE p.first_name='$name' AND p.last_name='$surname'");
            return $this;
      }

}

$object=new Avia();
print_r($object->getFlights());
print_r($object->flights);
exit();
?>
