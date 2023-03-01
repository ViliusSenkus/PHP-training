<?php

abstract class Database{
      //data for connection to MySQL DB
      //change when hosting

      const HOST="localhost";
      const USER="root";
      const PASSWORD="";
      const DATABASE="linktube";
      public static $db=false;
      public $table = false;

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

      public function set($data){
            foreach($data as $k=>$v){
                  $v=self::$db->real_escape_string($v);
                  $data[$k] = $v;
            }
            $keys=implode(", ", array_keys($data));
            $values=implode(", ", array_fill(0, count($data), "'%s'"));

            self::$db->query(vsprintf("INSERT INTO $this->table ($keys) VALUES ($values)", $data));
            return $this;
      }

      public function get(){
           return self::$db->query("SELECT * FROM $this->table")->fetch_all(MYSQLI_ASSOC);
      }

      public function update($id, $data){
           $newData=[];
            foreach($data as $k=>$v){
                  $v=self::$db->real_escape_string($v);
                  $newData[] = $k."='$v'";
            }
            $newSqlFieldsValues=implode(', ', $newData);
            
            self::$db->query("UPDATE $this->table SET $newSqlFieldsValues WHERE id='$id'");
            return $this;
      }

      public function delete($id){
            self::$db->query("DELETE FROM $this->table WHERE id='$id'");
            return $this;
      }
}
?>