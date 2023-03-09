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

//pridedamas sidebaras.
PageStructure::getSidebarMenu();

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

/* !!!!!!!!!!!!!!
cai reikia ideti modeli arba kontroleri gaunanti reikiama info apie prisijungusi vartotoja
!!!!!!!!!!!!!! */


      switch ("$page") { // puslapiai turi skirtis priklausomai nuo pasirinkto side-menu punkto
            case "video":
                  PageStructure::mainSpace("video");
                  break;
            case "search":
                  if($_GET['serach_query'])
                        Search::search($_GET['serach_query']);
                  break;
            case "user":
                  $action="none";
                  if(isset($_GET['act']))
                        $action=$_GET['act'];
                        
                        $categories=new Categories();
                        $categories=$categories->get();

                  switch ("$action"){
                        case "addvid":
                              include 'view/user/addvideo.php';
                              break;
                        default:
                              User::rooter();
                              break;
                  }      
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