<?php
use Model\Categories;

session_start();

// namespace vartojimo sutrumpinimui

use Controller\PageStructure;
use Controller\Rooter;
use Controller\Admin;
use Model\LinkedData\UserData;
use Controller\Search;
use Controller\User;


//funkcija automatiškai iš sirtingų failų užkrauna bet kurioje kodo vietoje iškviečiamą klasę
spl_autoload_register(function($class){
      if(is_file($class.'.php'))
            include $class.'.php';
});

// tikrinamas log in ir sign up statusas, jeigu prisijungta praeinama toliau.
Rooter::logoff(); //jeigu atsijunginėjama nuo vartotojo - sunaikinama sesija.
Rooter::signup();
Rooter::login();
                       
//nustatome koks vartotojas prisijungęs. Atliekama prieš viso turinio užkrovimą, kad atvaizduoti teisingą/reikiamą turinį.
UserData::getUser(); 
//Čia(aukščiau) turi būti paduodami visi įmanomi prisujungusio vartotojo duomenys viename kintamajame


//pridedamas headeris.
PageStructure::getHeader();



                                                            // echo "<br />";
                                                            // echo "<pre> session - ";
                                                            // print_r($_SESSION);
                                                            // echo "<br />GETas - ";
                                                            // print_r($_GET);
                                                            // echo "<br />POSTas - ";
                                                            // print_r($_POST);
                                                            // echo "</pre>";

//ADMIN CRUD veiksmai:
Admin::getAdminEvent();

//USER'io veiksmai iš jo puslapio
User::getUserAction();

//nustatomas koks turinys bus pagrindiniame naršyklės plote.
$page=isset($_GET['page']) ? $_GET['page'] : "";

      switch ("$page") { // puslapiai turi skirtis priklausomai nuo pasirinkto side-menu punkto
            case "video":
                  PageStructure::mainSpace("video");
                  break;
            case "search":
                  if($_GET['serach_query'])
                        Search::search($_GET['serach_query']);
                  break;
            case "user":                       
                  User::rooter();
                  break;
            case "music":
                  header("Location: ./?category=4");
                  break;
            case "movies":
                  header("Location: ./?category=5");
                  break;
            case "programming":
                  header("Location: ./?category=6");
                  break;
            case "shorts":
            case "library":
            case "liked":
            case "later":
            case "playlists":
            case "history":
            case "popular":
                  include 'view/main/notice.html';
                  break;                  
            default:
                  PageStructure::mainSpace();
                  break;
      }


// jeigu buvo iškviestas login puspalis, atvaizduojame login formą:
Rooter::isLoginNeeded();

//pridedamas sidebaras.
PageStructure::getSidebarMenu();
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


      function showHide(click, show){

      document.querySelector(`${show}`).style.display="none";
      document.querySelector(`${click}`).addEventListener('click', ()=>{
            if(document.querySelector(`${show}`).style.display=="block"){
                  document.querySelector(`${show}`).style.display="none";
            }else{
                  document.querySelector(`${show}`).style.display="block";
            };
      })
      }

      showHide("#header-avatar", "#user-menu");
      showHide("#add-comment", "#comment-form");
</script>

      </body>
</html>