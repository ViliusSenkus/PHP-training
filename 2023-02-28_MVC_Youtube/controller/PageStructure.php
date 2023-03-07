<?php

namespace Controller;

class PageStructure{

      public $videoList = [];

      public static function getHeader(){
            include "view/header.php";
      }     
      
      public static function getSidebarMenu(){
            $sidebar = new \Model\Elements\Sidebar();
            $sidebar = $sidebar->get();
            include "view/sidebar.php";
      }        
          

      /*
      Pagal gautą $_GET parametrą suformuoja informaciją pagrindiniame lange atvaizduojamam turiniui ir nukreipia/prideda atitinkamą view/$_GET['page'].php failą.:
            Jeigu GET admimview - nukreipiama i 
      */
            
      public static function mainSpace($part="main"){
            
            // if'as skirtas administratoriaus langu keitimui
            if(isset($_GET['adminview'])){
                  $admin = new Admin();
                  return $admin -> getTable($_GET['adminview']);
            }
            
            //
            $actualbar = self::getActualBar();
            $videoList = new \Model\Video();        

            if(isset($_GET['category'])){
                  $videoList=$videoList->video_by_category();
            }else{
                   $videoList = $videoList->get();
            }
            
            include "view/".$part.".php";
            

            
      }
  
      public static function getActualBar(){
            $actualbar = new \Model\Categories();
            $actualbar = $actualbar->get();
            return $actualbar;
      }
}
                  
?>