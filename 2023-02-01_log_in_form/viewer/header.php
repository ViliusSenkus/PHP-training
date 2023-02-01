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
            if (isset($_SESSION["connected"]) && $_SESSION["connected"] === true) {
                  echo '<button type="button" class="btn btn-outline-danger m-3">Atsijungti';
            } else {
                  echo '<button type="button" class="btn btn-outline-success m-3">Prisijungti';
            }
            ?>
            </button>
      </div>
      <hr>
</header>