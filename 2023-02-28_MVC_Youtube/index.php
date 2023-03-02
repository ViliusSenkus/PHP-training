<?php

use Controller\PageStructure;

spl_autoload_register(function($class){
      if(is_file($class.'.php'))
            include $class.'.php';
});
include "view/header.html";

PageStructure::getSidebarMenu();
$page=isset($_GET['page']) ? $_GET['page'] : "";

      switch ("$page") {
            case "video":
                  PageStructure::mainSpace("video");
                  break;
            default:
                  PageStructure::mainSpace();
                  break;
      }

?>

<script>
      document.querySelector("sidebar").addEventListener("click", ()=>{
            document.querySelector("sidebar").style.transform="translate(-250px, 0)";
            document.querySelector(".cover").style.display="none";
      });
      document.querySelector(".cover").addEventListener("click", ()=>{
            document.querySelector("sidebar").style.transform="translate(-250px, 0)";
            document.querySelector(".cover").style.display="none";
      });
      document.querySelector("#spread_menu").addEventListener("click", ()=>{
            document.querySelector("sidebar").style.transform="translate(250px, 0)";
            document.querySelector(".cover").style.display="block";
      });
</script>

      </body>
</html>