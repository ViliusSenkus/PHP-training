<?php

namespace Model;

class Comments extends Database{
      public $table="comments";
      public $comments;



      public function commentsByVideos($id){
            $this->comments=self::$db->query("SELECT * FROM comments WHERE video_id='$id'")->fetch_all(MYSQLI_ASSOC);

            return $this->comments;
      }

     
}
