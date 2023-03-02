<?php

namespace Controller;
class PageStructure{
            public static function getSidebarMenu(){
            $sidebar = new \Model\Elements\Sidebar();
            $sidebar = $sidebar->get();
            include "view/sidebar.php";
      }        
      public static function mainSpace($part="main"){
            include "view/".$part.".php";
            self::getActualBar();
      }

    

      public static function getActualBar(){
            $actualbar = new \Model\Categories();
            $actualbar = $actualbar->get();
      }
}
                  
?>