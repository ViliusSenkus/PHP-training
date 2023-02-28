<?php

class Video extends Database{

      private $table="videos";

      // public function __construct(){
      //       parent::__construct();
      // }     
      
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

      public function update(){
            
      }
}

?>