<?php

namespace View;

?>

<!DOCTYPE html>
<html lang="en">
<head>
      <meta charset="UTF-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
      <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@100; 300; 500&display=swap" rel="stylesheet">
      <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
      <link rel="stylesheet" href="content/style.css" />
      <title>LinkTube</title>
</head>
<body>
      <header>
      <div class="row">
            <div class="block">
                  <div id="spread_menu">
                        <div class="spread_line"></div>
                        <div class="spread_line"></div>
                        <div class="spread_line"></div>
                  </div>
                  <div class="block"><a href="./"><img src="content/img/linktube_s.png"></a></div>
            </div>
            <div class="block">
                  <form method="GET" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                        <div class="block">
                              <input type="text" name="page" value="search" hidden />
                              <input id="main-search" type="text" name="serach_query" placeholder="Search" />
                              
                              <button type="submit" class="material-symbols-outlined icon-back-grey">
                                    search
                              </button>
                        </div>
                  </form>
            </div>
            <div class="block">

            <!-- PASTABA: Blokas uždaromas tagais esančiaias header folderio failuose. -->
            