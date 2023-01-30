<?php
$folder="./";
if (isset($_GET['folder'])) {

      $split = (explode("/", $_GET['folder']));

      if ($split[count($split)-2]=="."){
            array_splice($split,(count($split)-3),2);
            $folder = implode("/", $split);
      }else{
            $folder = $_GET['folder'];
      }

}

//Folderio duomenų paėmimas ir išrūšiavimas
$folderData = scandir($folder);
$folderData = _sortData($folderData);
function _sortData($dataArr){
      foreach ($dataArr as $data) {
            if (is_dir($data)) {
                  $foldersArr[] = $data;
            } else {
                  $filesArr[] = $data;
            }
      }
      $sortedArr = array_merge($foldersArr, $filesArr);
      return $sortedArr;
}

//ikonų sudėjimui iš interneto "https://img.icons8.com/external-fauzidea-flat-fauzidea/32/null/external-php-file-file-extension-fauzidea-flat-fauzidea.png", "r");


//failo sukūrimas
if (isset($_POST['fileName']) && $_POST['fileName'] != "") {
      file_put_contents($folder . "/" . $_POST['fileName'], $_POST['fileContent']);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
      <meta charset="UTF-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <link rel="icon" href="content/logo.png" />
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
                  <div>
                        Now you are 
                        <?php 
                        if ($folder=="./"){
                              echo "home";
                        }else{
                        echo "here: $folder";
                        }
                        ?>
                  </div>
                  <table>
                        <thead>
                              <th><input type="checkbox" disabled></th>
                              <th>Name</th>
                              <th>Size</th>
                              <th>Modified</th>
                              <th>Actions</th>
                        </thead>
                        <tbody>
                              <?php foreach ($folderData as $data) {
                                    if (
                                          //disabling possibility to go higher than home folder
                                          $folder == "./" and
                                          $data === $folderData[0] or
                                          $data === $folderData[1]
                                    ) {
                                          continue;
                                    } ?>
                                    <tr>
                                          <td>
                                                <input type="checkbox" name="check">
                                          </td>

                                          <td>    
                                    <!-- deciding if $data is folder or file and performing adequate actions -->
                                          <?php
                                                if (is_dir($folder.$data)) { ?>
                                                      <div class="icon">
                                                            <img src="https://img.icons8.com/emoji/32/null/file-folder-emoji.png" />
                                                      </div>
                                                      <a href="?folder=<?= $folder.$data ?>/"><?= $data; ?></a>
                                                      <?php

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
                                                            <img src="<?php echo $icon ?>" />
                                                      </div>
                                                      <?php echo $data;
                                                }
                                          ?>
                                          </td>

                                          <td>
                                          <?php
                                          // counting and representing size in more acceptable format
                                                $size=filesize($folder.$data);
                                                if ($size < 1000) {
                                                      echo $size."&nbsp;&nbsp;B";
                                                }elseif($size >= 1000 AND $size<1000000){
                                                      echo round(($size/1000),2,PHP_ROUND_HALF_UP)." KB";
                                                }else{
                                                      echo round(($size / 1000000),2,PHP_ROUND_HALF_UP) . " GB";
                                                }
                                          ?>
                                                      
                                          </td>
                                          <td><?php echo date("Y-m-d", filemtime($folder.$data)); ?></td>
                                          <td>
                                                <button>delete</button>
                                                <button>rename</button>
                                          </td>
                                    </tr>
                              <?php } ?>
                        </tbody>
                  </table>

                  <form method="POST">
                        <div class="inputField">
                              <label>File Name</label>
                              <input type="text" name="fileName" />
                        </div>
                        <div class="inputField">
                              <label>File content</label>
                              <textarea type="text" name="fileContent"></textarea>
                        </div>
                        <button>Create</button>
                  </form>

                  <form method="POST">
                        <div class="inputField">
                              <label>Folder Name</label>
                              <input type="text" name="folderName" />
                        </div>
                        <button>Create</button>
                  </form>
            </main>

            <footer>
                  <div>
                        <ul>Resources used:
                              <li><a href="https://fonts.google.com">Google fonts</a></li>
                              <li><a href="https://stock.adobe.com">Adobe Stock</a></li>
                        </ul>
                        <ul>Technologies implemented:
                              <li>HTML5</li>
                              <li>CSS3</li>
                              <li>PHP</li>
                        </ul>
                  </div>
            </footer>

      </div>
</body>

</html>