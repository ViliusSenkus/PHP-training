<?php
//rooteriukas isskirtso uzklausas


include "model/Database.php";
include "model/Video.php";
include "model/Categories.php";

include "view/header.html";
include "view/sidebar.html";

include "controller/PageStructure.php";


$page=isset($_GET['page']) ? $_GET['page'] : "";

      switch ("$page") {
            case "video":
                  PageStructure::mainTag("video");
                  break;
            default:
                  PageStructure::mainTag();
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