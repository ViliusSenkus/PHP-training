<?php 

namespace Model;

class FullData extends Database{

      private $categories;
      private $likes;
      private $pl;
      private $users;
      private $videos;
      private $comments;
      private $video_user;
      private $video_category;
      private $pl_liked_user;
      private $pl_saved_user;
      private $video_like_user;

      public function __construct(){
            parent::__construct();
            
            $this->users=new Users();
            $this->users=$this->users->get();
            
            $videos=new Video;
            $this->videos=$videos->get();
            
            $categories=new Categories();
            $this->categories=$categories->get();
            
            // $comments=new Comments();
            // $this->comments=$comments->get();
      }  

      public function funkcija(){
            print_r($comments);
      }

}

?>