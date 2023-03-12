<?php

namespace Controller;

class PageStructure{

      public $videoList = [];

      public static function getHeader(){
            include "view/header.php";
            Rooter::getUserHeader();
      }     
      
      public static function getSidebarMenu(){
            $sidebar = new \Model\Elements\Sidebar();
            $sidebar = $sidebar->get();
            include "view/sidebar.php";
      }        
            
      public static function getActualBar(){
            $actualbar = new \Model\Categories();
            $actualbar = $actualbar->get();
            return $actualbar;
      }

      public static function mainSpace($part="main"){
            /*
            Pagal gautą $_GET parametrą suformuoja informaciją pagrindiniame lange atvaizduojamam turiniui ir nukreipia/prideda atitinkamą view/$_GET['page'].php failą.:
            Jeigu GET admimview - nukreipiama i admino puslapį
            */

            // if'as skirtas administratoriaus langų keitimui
            if(isset($_GET['adminview'])){
                  $admin = new Admin();
                  return $admin -> getTable($_GET['adminview']);
            }
            
            //
            $actualbar = self::getActualBar();
            $video = new \Model\Video();        

            //formuojamas video įrašų masyvas pagal pasirinktą kategoriją
            if(isset($_GET['category'])){
                  $videoList=$video->videos_by_category();
            }else{
                   $videoList = $video->get();
            }

            //formuojamas vienos dainos informacijos masyvas pagal dainos id
            if (isset($_GET['id']))
                  $videoList=$video->full_video_info($_GET['id'])[0];
            
            //jeigu vartotojas pasirinko sekti kitą vartotoją.
            if (isset($_GET['act']) && $_GET['act']=="follow")
                  \Model\Users::followUser();           

            if (isset($_POST['act']) && $_POST['act'] == "new_commnet"){
                  unset($_POST['act']);
                  $comments = new \Model\Comments();
                  $comments->set($_POST);
            }
            
            include "view/".$part.".php";      
      }
           
            
                  
                  
                  
                          

            
}
                  
?>