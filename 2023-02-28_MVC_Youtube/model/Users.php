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

      public static function followUser(){
           
            $videoId=$_GET['id'];
            $user=$_SESSION['id'];
            $videoOwner=self::$db->query("SELECT user FROM videos WHERE id='$videoId'")->fetch_all(MYSQLI_ASSOC)[0]['user'];
            $users=new Users();
            echo $user;
            echo "<br />".$videoOwner;
            $users::$db->query("INSERT INTO links__user_follow (follower, following) VALUES ('$user', '$videoOwner') ");

            // $table='links__user_follow';
            // $array=array("follower"=>"$user", "following"=>"$videoOwner");
            // print_r($array);
            // $users->set($array);
           
      }
      
}

?>