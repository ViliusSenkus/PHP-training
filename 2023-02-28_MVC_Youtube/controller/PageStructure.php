
      <main>

            <?php
class PageStructure{
      public $video=new Video();
      public $categories=new Categories();

                  
      function mainpage(){
            $page=isset($_GET['page']) ? $_GET['page'] : "";
            switch ("$page") {
                  case "video":
                        echo "vieno video puslapis";
                  default:
                        break;
            }
      }
}
                  
            ?>

      </main>
</body>
</html>