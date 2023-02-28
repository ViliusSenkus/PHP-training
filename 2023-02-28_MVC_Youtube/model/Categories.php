<?php
class Categories extends Database{
      private $table="categories";

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
