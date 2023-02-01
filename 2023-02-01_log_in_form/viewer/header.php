<header class="container">
      <div class="d-flex flex-row justify-content-between m-2">
            <h1>Mano Bankas</h1>
            <nav class="navbar">
                  <div class="container-fluid">
                        <a class="navbar-brand" href="?<?='file=card' ?>">Kortelė</a>
                        <a class="navbar-brand" href="?<?='file=loan' ?>">Paskolos</a>
                        <a class="navbar-brand" href="?<?='file=pension' ?>">Pensija</a>
                        <a class="navbar-brand" href="?<?='file=ebank' ?>">Internetinė bankininkystė</a>
                  </div>
            </nav>
            <?php

           
            //MYGTUKAS - NUORODA

            if (isset($_SESSION["connected"]) && $_SESSION["connected"] === true) {
                  echo  '<a href="?log=off" type="button" class="btn btn-outline-danger m-3">Atsijungti';
                  
                  // echo '<button type="button" class="btn btn-outline-danger m-3">Atsijungti';
            } else {
                  echo  '<a href="?log=on" type="button" class="btn btn-outline-success m-3">Prisijungti';
                  
                  // echo '<button type="button" class="btn btn-outline-success m-3">Prisijungti';
            }
            
            if (isset($_GET['log']) && $_GET['log']=="off"){
                  session_destroy();
                  header('Location:./' );
            }

            ?>
            <!-- </button> -->
            </a>
      </div>
      <hr>
</header>