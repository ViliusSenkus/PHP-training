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

      </body>
</html>