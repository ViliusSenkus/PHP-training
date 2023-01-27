<?php

$folderData = scandir(".");
// echo '<pre>';
// print_r($folderData);
// echo '</pre>';


//ikonų sudėjimui iš interneto "https://img.icons8.com/external-fauzidea-flat-fauzidea/32/null/external-php-file-file-extension-fauzidea-flat-fauzidea.png", "r");

?>



<!DOCTYPE html>
<html lang="en">

<head>
      <meta charset="UTF-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <link rel="icon" href="content/saule.png" />
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
      <link href="https://fonts.googleapis.com/css2?family=Libre+Franklin:wght@200;400;600&display=swap"
            rel="stylesheet">
      <link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="stylesheet" href="content/style.css" />
      <title>Document</title>
</head>

<body>
      <div class="container">
            <header>
                  <h1>My PHP projects' files explorer</h1>
                  <div>Build to meet CRUD functionality</div>
                  <nav>
                        <ul>
                              <li>New Directory</li>
                              <li>New File</li>
                        </ul>
                  </nav>
            </header>

            <main>
                  <div>Direktorija kurioje esame ir kelias iki jos</div>
                  <table>
                        <thead>
                              <th>O</th>
                              <th>Name</th>
                              <th>Size</th>
                              <th>Modified</th>
                              <th>Actions</th>
                        </thead>
                        <tbody>
                              <?php foreach ($folderData as $data) { ?>
                                    <tr>
                                          <td>
                                                <input type="checkbox" name="check">
                                          </td>
                                          <td name="name">
                                                <?php
                                                if (is_dir($data)) { ?>
                                                      <div class="icon">
                                                            <img src="https://img.icons8.com/emoji/32/null/file-folder-emoji.png"
                                                                   />
                                                      </div>
                                                      <?php
                                                      echo $data;
                                                } else {
                                                      $explode = explode(".", $data);
                                                      $extention = $explode[count($explode) - 1];
                                                      if (is_file("content/icons/" . $extention . ".png")) {
                                                            $icon = "content/icons/" . $extention . ".png";
                                                      } else {
                                                            $icon = "content/icons/none.png";
                                                      }
                                                      ?>
                                                      <div class="icon">
                                                            <img src="<?php echo $icon ?>"  />
                                                      </div>
                                                      <?php echo $data;
                                                } ?>

                                          </td>
                                          <td name="size">Dydis</td>
                                          <td name="modified">Data</td>
                                          <td name="action">Mygtukai</td>
                                    </tr>
                              <?php } ?>
                        </tbody>
                  </table>
            </main>

            <footer>
                  <div>
                        <ul>Resources:
                              <li><a href=https://fonts.google.com />Google fonts</a></li>
                              <li>Personal images</li>
                        </ul>
                        <ul>Technologies
                              <li>HTML5</li>
                              <li>CSS3</li>
                              <li>PHP</li>
                        </ul>
                  </div>
            </footer>

      </div>
</body>

</html>