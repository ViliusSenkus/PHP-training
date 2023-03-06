<?php

session_start();

// namespace vartojimo sutrumpinimui

use Controller\PageStructure;
use Controller\Rooter;
use Controller\Admin;

//funkcija automatiškai iš sirtingų failų užkrauna bet kurioje kodo vietoje iškviečiamą klasę
spl_autoload_register(function($class){
      if(is_file($class.'.php'))
            include $class.'.php';
});

// tikrinamas log in ir sign up statusas, jeigu prisijungta praeinama toliau.
Rooter::logoff();
Rooter::signup();
Rooter::login();

//nustatome koks vartotojas prisijungęs. Atliekama prieš viso turinio užkrovimą, kad atvaizduotyi teisingą/reikiamą turinį.
Rooter::getUser();


//pridedamas headeris.
PageStructure::getHeader();

//pridedamas sidebaras.
PageStructure::getSidebarMenu();


                        echo "index.php faile (~33 eilute) pagautas veiksmas su tokiais kintamaisais: <br />";
                        echo "<pre> session - ";
                        print_r($_SESSION);
                        echo "<br />GETas - ";
                        print_r($_GET);
                        echo "<br />POSTas - ";
                        print_r($_POST);
                        echo "</pre>";


//ADMIN CRUD veiksmai:
Admin::getAdminEvent();

//nustatomas koks turinys bus pagrindiniame naršyklės plote.
$page=isset($_GET['page']) ? $_GET['page'] : "";

      switch ("$page") {
            case "video":
                  PageStructure::mainSpace("video");
                  break;
            default:
                  PageStructure::mainSpace();
                  break;
      }


// jeigu buvo iškviestas login puspalis, atvaizduojame login formą:
Rooter::isLoginNeeded();
?>


<script>
      // skriptas šoninio meniu atsiradimui ir paslėpimui
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