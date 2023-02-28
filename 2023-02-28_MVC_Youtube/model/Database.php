<?php

class Database{
      //data for connection to MySQL DB
      //change when hosting

      const HOST="localhost";
      const USER="root";
      const PASSWORD="";
      const DATABASE="linktube";
      public static $db=false;

      public function __construct(){
            if(self::$db){
                  return;
            }
            try{
                  self::$db=new mysqli(self::HOST, self::USER, self::PASSWORD, self::DATABASE);
            }catch(Exception $e){
                  echo "<h2>Database is not accessable</h2><br />";
                  echo $e;
                  exit;
            }
      }

      public function showDataBase(){
            print_r(self::$db);
      }
}
?>