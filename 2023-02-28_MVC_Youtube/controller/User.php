<?php

namespace Controller;

class User{
      
      public static function getUserAction(){
            isset($_POST['userAction']) ? $action=$_POST['userAction'] : $action=false;
                    
            switch ($action){
                        case 'userAddVideo':
                              // priskiriame gautus doumenis kintamajam lengvesniam naudojimui.
                              $data = $_POST;
                              if (  $data['name'] == "" ||
                                    $data['video_url'] == "" ||
                                    $data['thumb_url'] == "" ||
                                    $data['video_url'] == ""
                              ){
                                    echo "Not all needed data added";
                                    return;
                              }

                              // atmetam nebereikalingus duomenis
                              unset($data['userAction']);
                              $data['user']=$_SESSION['id'];

                              // formatuojamės duomenis reikalingus DB video lentelei ir įdedame
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

                                    // tikriname gal tokia kategorija jau egzistuoja:
                                    $check=$category::$db->query("SELECT * FROM categories WHERE category='$v'")->fetch_all(MYSQLI_ASSOC)[0];

                                    if (isset($check) && $check!=[]){
                                          array_push($data['category'], $check['id']);
                                          continue;
                                    }

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

            $categories=new \Model\Categories();
            $categories=$categories->get();

            include 'view\user\menu.html';
            
            if(isset($_GET['subpage']))
                  $subpage=$_GET['subpage'];
            
            if(isset($_GET['act']))
                  $subpage=$_GET['act'];

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
                  case "addvid":
                        include 'view\user\addvideo.php';
                        break;
                  default:
                        $videos = new \Model\Video;
                        $userVideoList = $videos->get();                        
                        
                        include 'view/user/history.html';
                        include 'view/user/videos.php';
                        include 'view/user/follows.html';
                        break;
            }

            include 'view\user\footer.html';
      }
}
?>