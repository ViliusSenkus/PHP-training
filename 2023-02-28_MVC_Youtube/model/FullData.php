<?php 

namespace Model;

class FullData extends Database{

      //pirmo lygio lentelės su visa info
      public $categories;
      public $users;
      public $videos;

      //atrinkti kintamieji pagal vieną userį:
      public $userInfo;

      // public $likes;
      // public $pl;
      // public $comments;
      // public $video_user;
      // public $video_category;
      // public $pl_liked_user;
      // public $pl_saved_user;
      // public $video_like_user;

      public function __construct(){
            parent::__construct();
            
            $this->users=new Users();
            $this->users=$this->users->get();
            
            $videos=new Video;
            $this->videos=$videos->get();
            
            $categories=new Categories();
            $this->categories=$categories->get();
            
      }  

      public function follow(){
            if (!$_SESSION['role'] || $_SESSION['role']==0 || $_SESSION['role']==2);  //jeigu neprisijunges arba adminas
                  return;

            $id=$_SESSION['id'];
            $this->userInfo=self::$db->query("SELECT * FROM users WHERE id='$id'")->fetch_all(MYSQLI_ASSOC)[0];

            $followingList=self::$dab->query("SELECT `following` FROM links__user_follow WHERE follower='$id'");            


            
      }

}

?>