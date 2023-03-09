<?php

namespace Controller;

class User{
      
      public static function getUserAction(){
            isset($_POST['userAction']) ? $action=$_POST['userAction'] : $action=false;
            $data = $_POST;
            
            echo"<pre>";
            print_r($_POST);
            echo "</pre>";
          
            switch ($action){
                  case 'userAddVideo':
                        unset($data['userAction']);
                        $data['user']=$_SESSION['id'];

                        $videoData=$data;
                        unset($videoData['category']);
                        $video=new \Model\Video();
                        $video->set($videoData);
                        
                        $vidId=(mysqli_insert_id($video::$db));
                       

                        foreach ($data['category'] as $cat)
                              \Model\Video::$db->query("INSERT INTO links__video_category (video_id, category_id) VALUES ('$vidId','$cat')");                       
                        
                        break;
                  default:
                        break;

            }

      }
}
?>