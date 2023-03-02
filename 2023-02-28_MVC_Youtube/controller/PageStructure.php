<?php

namespace Controller;
class PageStructure{
                  
      public static function mainSpace($part="main"){
            include "view/".$part.".php";
      }

      public static function getSidebarMenu(){
            $sidebar = new \Model\Elements\Sidebar();
            $sidebar = $sidebar->get();
            include "view/sidebar.php";
      }
}
                  
?>