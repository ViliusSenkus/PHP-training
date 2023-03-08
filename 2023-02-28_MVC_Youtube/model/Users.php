<?php 

namespace Model;

class Users extends Database{
      
      public $table="users";

      public static function getAvatar($id){
            $avatar=self::$db->query("SELECT avatar FROM users WHERE id = '$id'")->fetch_all(MYSQLI_ASSOC)[0]['avatar'];
            return $avatar;
      }
      public static function getName($id){
            $name=self::$db->query("SELECT nickname FROM users WHERE id = '$id'")->fetch_all(MYSQLI_ASSOC)[0]['nickname'];
            return $name;
      }

      
}

?>