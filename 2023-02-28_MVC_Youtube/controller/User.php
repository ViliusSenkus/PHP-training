<?php

namespace Controller;

class User{
      
      public static function getUserAction(){
            isset($_POST['userAction']) ? $action=$_POST['userAction'] : $action=false;
            $data = $_POST;
          
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

      public static function rooter(){
            $subpage=false;
            
            if(isset($_GET['subpage']))
                  $subpage=$_GET['subpage'];

            switch ($subpage){
                  case "playlists":
                        echo "Page not constructed yet";
                        break;
                  case "videos":
                        echo "Page not constructed yet";
                        break;
                  case "follows":
                        echo "Page not constructed yet";
                        break;
                  case "comments":
                        echo "Page not constructed yet";
                        break;
                  default:
                        $videos = new \Model\Video;
                        $userVideoList = $videos->get();
                        
                        
                        include 'view\user\userMain.php';
                        break;
            }
      }
}
?>