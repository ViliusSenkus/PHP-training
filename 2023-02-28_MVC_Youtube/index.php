<!DOCTYPE html>
<html lang="en">
<head>
      <meta charset="UTF-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
      <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,500;1,300&display=swap" rel="stylesheet">
      <link rel="stylesheet" href="content/style.css" />
      <title>LinkTube</title>
</head>

      <?php

      include "model/Database.php";
      include "model/Video.php";
      include "model/Categories.php";

      $video=new Video();
      $categories=new Categories();
      print_r ($video->get());

      ?>

<body>
      <header>
            <?php
                  include "view/header.html";
            ?>

      </header>
      <main>
            
      </main>
</body>
</html>