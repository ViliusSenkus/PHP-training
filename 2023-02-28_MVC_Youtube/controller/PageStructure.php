<?php

namespace Controller;
class PageStructure{
            public static function getSidebarMenu(){
            $sidebar = new \Model\Elements\Sidebar();
            $sidebar = $sidebar->get();
            include "view/sidebar.php";
      }        
            public static function getHeader(){
            include "view/header.php";
      }        
      public static function mainSpace($part="main"){
            $actualbar = self::getActualBar();
            include "view/".$part.".php";
            
      }
  
      public static function getActualBar(){
            $actualbar = new \Model\Categories();
            $actualbar = $actualbar->get();
            return $actualbar;
      }
}
                  
?>