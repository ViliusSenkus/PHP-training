<?php

namespace Model;
class Video extends Database{
      
      // public function __construct(){
      //       parent::__construct();
      // }  
      
      public $table="videos";

      // pagal pasirinktas kategorijas gražina visą video informaciją iš videos lentelės
      public function videos_by_category() { 
            $videosInCategory="";
            $category=$_GET['category'];
            if ($category==1){
                  $list=self::$db->query("SELECT DISTINCT video_id FROM links__video_category")->fetch_all(MYSQLI_ASSOC);
            
            }else{
                  $list=self::$db->query("SELECT DISTINCT video_id FROM links__video_category WHERE category_id='$category'")->fetch_all(MYSQLI_ASSOC);
            }

            foreach($list as $k=>$v){
                  if ($k==0){
                        $videosInCategory.="id='".$v['video_id']."'";
                  }else{
                        $videosInCategory.=" OR id='".$v['video_id']."'";
                  }
            }

            $fullcategorisedvideoinfo = self::$db->query("SELECT * FROM videos WHERE $videosInCategory")->fetch_all(MYSQLI_ASSOC);

            return ($fullcategorisedvideoinfo);      
      }

      public function full_video_info($id){

            $videoInfo=self::$db->query("SELECT * FROM videos WHERE id='$id'")->fetch_all(MYSQLI_ASSOC)[0];        
            $user=$videoInfo['user'];
            $userInfo=self::$db->query("SELECT * FROM users WHERE id='$user'")->fetch_all(MYSQLI_ASSOC)[0];
            $categories=self::$db->query("SELECT DISTINCT category_id FROM links__video_category WHERE video_id='$id'");
            foreach($categories as $v){
                  $catId=$v['category_id'];
                  $catName=self::$db->query("SELECT * FROM categories WHERE id='$catId'")->fetch_all(MYSQLI_ASSOC)[0];
                  $catNames[]=$catName;
            }

            $comments = new \Model\Comments();
            $comments=$comments->commentsByVideos($id);
            
            $comentedUser= new Users();
            foreach($comments as $k=>$v){
                  if ($v['registered']=="1"){
                        $commenterId=$v['commenter'];
                        $comments[$k]=array(
                              'video_id' => $v['video_id'],
                              'comment' => $v['comment'],
                              'date_added' => $v['date_added'],
                              'commenter' => $comentedUser->getName($commenterId),
                              'avatar' =>  $comentedUser->getAvatar($commenterId)
                        );   
                  } else {
                        $comments[$k]=array(
                              'video_id' => $v['video_id'],
                              'comment' => $v['comment'],
                              'date_added' => $v['date_added'],
                              'commenter' => $v['commenter'],
                              'avatar' =>  "Avatar-0.png"
                        );   
                        

                  }
            }



            $data[]=array(
                  "video"=>$videoInfo,
                  "user"=>$userInfo,
                  "categories"=>$catNames,
                  "comments"=>$comments
            );

            return $data;            
      }

      public function search($text){
            $result = self::$db->query("SELECT * FROM videos WHERE name like '%$text%' ")->fetch_all(MYSQLI_ASSOC);
            return $result;
      }
}

?>