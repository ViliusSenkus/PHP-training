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
          
      public static function mainSpace($part="main"){
            
            if(isset($_GET['adminview'])){
                  $admin = new Admin();
                  return $admin -> getTable($_GET['adminview']);
            }
            
            $actualbar = self::getActualBar();
            $videoList = new \Model\Video();
            $videoList = $videoList->get();
            include "view/".$part.".php";
            
            
      }
  
      public static function getActualBar(){
            $actualbar = new \Model\Categories();
            $actualbar = $actualbar->get();
            return $actualbar;
      }
}
                  
?>