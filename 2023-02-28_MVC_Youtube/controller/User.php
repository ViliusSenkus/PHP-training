<?php

namespace Controller;

class User{
      
      public static function getUserAction(){
            isset($_POST['userAction']) ? $action=$_POST['userAction'] : $action=false;
            

            // tikriname ar yra prideta nauju kategoriju:
            // if (isset($_POST['']))
          
            switch ($action){
                        case 'userAddVideo':
                              $data = $_POST;

                                    // echo"<pre>Prieš pushą: <br />";
                                    // print_r($_POST);
                                    // echo"</pre>";
                                    // exit();
                                             
                        unset($data['userAction']);
                        $data['user']=$_SESSION['id'];

                        

                        $videoData=$data;
                        unset($videoData['category']);
                        unset($videoData['new_cat']);
                        $video=new \Model\Video();
                        $video->set($videoData);
                        
                        // susirandame paskutinio pridėto video įrašo id
                        $vidId=(mysqli_insert_id($video::$db));
                        

                        //pridedame naujas kategorijas prie kategorijų sąrašo
                        foreach ($data['new_cat'] as $v){
                              $category = new \Model\Categories();
                              $category->set(["category"=>$v]);

                                         

                              // pridedam prie perduotų kategorijų, naujai sukurtų kategorijų id
                              $catId=mysqli_insert_id($category::$db);
                              array_push($data['category'], $catId);
                        }

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