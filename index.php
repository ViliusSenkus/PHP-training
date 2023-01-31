<?php
$folder = "./";
if (isset($_GET['folder'])) {

      $split = (explode("/", $_GET['folder']));

      if ($split[count($split) - 2] == ".") {
            array_splice($split, (count($split) - 3), 2);
            $folder = implode("/", $split);
      } else {
            $folder = $_GET['folder'];
      }

}

//Sorting/Ordering Folders then Files:
$folderData = scandir($folder);

if (count($folderData) > 1) {
      $filesArr = array();
      foreach ($folderData as $data) {
            if (is_dir($data)) {
                  $foldersArr[] = $data;
            } else {
                  $filesArr[] = $data;
            }
      }
      $folderData = array_merge($foldersArr, $filesArr);
}

/*
Alternative web icons:
"https://img.icons8.com/external-fauzidea-flat-fauzidea/32/null/external-php-file-file-extension-fauzidea-flat-fauzidea.png";
*/

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
                              <li name="nfo">New Directory</li>
                              <li name="nfi">New File</li>
                        </ul>
                  </nav>
            </header>

            <main>
                  <div class="new_file">
                        <form method="POST">
                              <div class="inputField">
                                    <label>File Name</label>
                                    <input type="text" name="fileName" />
                              </div>
                              <div class="inputField">
                                    <label>File content</label>
                                    <textarea type="text" name="fileContent"></textarea>
                              </div>
                              <button type="submit">Create</button>
                        </form>
                  </div>

                  <div class="new_folder">
                        <form method="POST">
                              <div class="inputField">
                                    <label>Folder Name</label>
                                    <input type="text" name="folderName" />
                              </div>
                              <button type="submit">Create</button>
                        </form>
                  </div>
                 
                  <div class="rename">
                        <form method="POST">
                              <div class="inputField">
                                    <label>New Name</label>
                                    <input type="text" name="newName" />
                              </div>
                              <button type="submit">Rename</button>
                        </form>
                  </div>

                  <?php
                  //Files and Folders creation
                  if (isset($_POST['fileName']) && $_POST['fileName'] != "") {
                        if (!isset($_POST['fileContent'])) {
                              $_POST['fileContent'] = "";
                        }
                        file_put_contents($folder . $_POST['fileName'], $_POST['fileContent']);
                        header('Location:' . $_SERVER['REQUEST_URI']);
                  }
                  if (isset($_POST['folderName']) && $_POST['folderName'] != "") {
                        mkdir($folder . $_POST['folderName']);
                        header('Location:' . $_SERVER['REQUEST_URI']);
                  }
                  ?>

                  <div>
                        You are
                        <?php
                        if ($folder == "./") {
                              echo "Home";
                        } else {
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
                                          //disabling access to higher than home folder
                                          $folder == "./" and
                                          $data === $folderData[0] or
                                          $data === $folderData[1]
                                    ) : continue;
                                    endif;
                              ?>
                                    <tr>
                                          <td>
                                                <input type="checkbox" name="check">
                                          </td>

                                          <td>
                                                <!-- deciding if $data is folder or file and performing adequate actions -->
                                                <?php
                                                if (is_dir($folder . $data)) { ?>
                                                      <div class="icon">
                                                            <img src="https://img.icons8.com/emoji/32/null/file-folder-emoji.png" />
                                                      </div>
                                                            <a href="?folder=<?= $folder.$data ?>/">
                                                                  <?php
                                                                        if($data==".")
                                                                              {echo "◄ Back";}
                                                                        else
                                                                              {echo $data;}
                                                                  ?>
                                                            </a>
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
                                                                  <img src="<?= $icon ?>" />
                                                            </div>
                                                            <a href="<?= $folder.$data ?>" target="_blank"><?= $data ?></a>;
                                                <?php } ?>
                                                
                                          </td>

                                          <td>
                                                <?php
                                                // counting and representing size in more acceptable format
                                                $size = filesize($folder . $data);
                                                if ($size < 1000) {
                                                      echo $size . "&nbsp;&nbsp;B";
                                                } elseif ($size >= 1000 and $size < 1000000) {
                                                      echo round(($size / 1000), 2, PHP_ROUND_HALF_UP) . " KB";
                                                } else {
                                                      echo round(($size / 1000000), 2, PHP_ROUND_HALF_UP) . " GB";
                                                }
                                                ?>

                                          </td>
                                          <td>
                                                <?php echo date("Y-m-d H:i:s", filemtime($folder . $data)); ?>
                                          </td>
                                          <td>
                                                <?php 
                                                      if (is_dir($folder.$data) || $data == basename(__FILE__)){
                                                       continue;
                                                      }
                                                
                                                ?>
                                                <a href="?delete=<?= $folder.$data ?>"><button>delete</button></a>
                                                <a href="?rename=<?= $folder.$data ?>&folder=<?= $folder?>"><button>rename</button>
                                          </td>
                                    </tr>
                              <?php } ?>
                        </tbody>
                  </table>

<?php
 //ištrynimas
 // if(isset($_GET['delete']) && $_GET['delete'] != "" ){
 //       unlink($folder.$data);
 //       header('Location:' . $_SERVER['REQUEST_URI']);
 // }

 //editinimas

?>




            </main>
                                                      <?= (basename(__FILE__));?>
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

            <script>
                  document.querySelector('[name="nfo"]').addEventListener("click", () => {
                        if (document.querySelector('.new_file').style.display = "block") {
                              document.querySelector('.new_file').style.display = "none";
                        }
                        document.querySelector('.new_folder').style.display = "block";
                  });
                  document.querySelector('[name="nfi"]').addEventListener("click", () => {
                        if (document.querySelector('.new_folder').style.display = "block") {
                              document.querySelector('.new_folder').style.display = "none";
                        }
                        document.querySelector('.new_file').style.display = "block";
                  });

            </script>

      </div>
</body>

</html>