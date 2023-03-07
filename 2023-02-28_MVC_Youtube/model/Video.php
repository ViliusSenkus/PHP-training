<?php

namespace Model;
class Video extends Database{
      
      // public function __construct(){
      //       parent::__construct();
      // }  
      
      public $table="videos";

      // pagal pasirinktas kategorijas gražina visą video informaciją iš videos lentelės
      public function video_by_category() { 
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
}

?>