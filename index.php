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
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <link rel="stylesheet" href="content/style.css" />
      <title>Document</title>
</head>

<?php
      // echo "<pre>";
      // print_r($_SERVER);
      // echo "</pre>";
?>

<body>
      <div class="container">
            <header>
                  <h1>My PHP projects' files explorer</h1>
                  <div>Build to meet CRUD functionality</div>
                  <nav>
                        <ul>
                              <li name="nfo">New Directory</li>
                              <li name="nfi">New File</li>
                              <li name="upl">Upload File</li>
                        </ul>
                  </nav>
            </header>

            <main>
                  <!-- DATA COLLECTION FORMS -->
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

                  <div class="upload">
                        <form method="POST" enctype="multipart/form-data">
                              <div class="inputField">
                                    <input type="file" name="newUpload" />
                              </div>
                              <button type="submit">Upload</button>
                        </form>
                  </div>

                  <?php
                  if (isset($_GET['edit']) && $_GET['edit'] !=""){?>
                  <div class="rename">
                        <form method="GET">
                              <div class="inputField">
                                    <label>New Name</label>
                                    <input type="hidden" name="folder" value="<?=$_GET["folder"]?>">
                                    <input type="hidden" name="oldName" value="<?=$_GET["edit"]?>">
                                    <input type="text" name="newName" value="<?=$_GET["edit"]?>" />
                                    
                              </div>
                              <button type="submit">Rename</button>
                        </form>
                  </div>
                  <?php } ?>

<?php



//File renaming
if (isset($_GET["newName"]) && $_GET["newName"] !="" ){

      // echo $_GET["folder"] . $_GET["oldName"];
      // echo "</br>";
      // echo $_GET["folder"] . $_GET["newName"];
      rename($_GET["folder"].$_GET["oldName"], $_GET["folder"].$_GET["newName"]);
      
      header('Location: ?folder='. $_GET["folder"]);
}

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


//Files upload
if (isset($_FILES["newUpload"]) && $_FILES["newUpload"]["tmp_name"] != "") {
      $newFileAddress=$folder.$_FILES["newUpload"]["name"];
      move_uploaded_file($_FILES["newUpload"]["tmp_name"], $newFileAddress);
      header('Location:' . $_SERVER['REQUEST_URI']);
}

//Files delete
if (isset($_GET["delete"]) && $_GET["delete"] !=""){
      if ($_GET["delete"]==basename(__FILE__)){
            exit;
      } else {
            unlink($_GET["folder"] . $_GET["delete"]);
            header('Location: ?folder=' . $_GET["folder"]);
      }
}

//table draw
if (isset($_GET['folder'])) {

      $split = (explode("/", $_GET['folder']));

      if ($split[count($split) - 2] == ".") {
            array_splice($split, (count($split) - 3), 2);
            $folder = implode("/", $split);
      } else {
            $folder = $_GET['folder'];
      }

}

//Ordering Folders then Files:
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
                                    ):
                                          continue;
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
                                                      <a href="?folder=<?= $folder . $data ?>/">
                                                            <?php
                                                            if ($data == ".") {
                                                                  echo "◄ Back";
                                                            } else {
                                                                  echo $data;
                                                            }
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
                                                      <a href="<?= $folder . $data ?>" target="_blank"><?= $data ?></a>;
                                                <?php } ?>

                                          </td>

                                          <td> <?php // File size
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

                                          <td> <?php // Modification date
                                                echo date("Y-m-d H:i:s", filemtime($folder . $data)); 
                                                ?>
                                          </td>
                                          
                                          <td> <?php // Action Icons
                                                if (is_dir($folder . $data) || $data == basename(__FILE__)) {
                                                      continue;
                                                }

                                                ?>
                                                <a href="?delete=<?= $data ?>&folder=<?= $folder ?>">
                                                      <svg name="del" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                                            <path fill="#EE6666"
                                                                  d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z" />
                                                      </svg>
                                                </a>

                                                <a href="?edit=<?= $data ?>&folder=<?= $folder ?>">
                                                      <svg name="ren" xmlns="http://www.w3.org/2000/svg"
                                                            viewBox="0 0 576 512">
                                                            <path fill="#5588EE"
                                                                  d="M0 64C0 28.7 28.7 0 64 0H224V128c0 17.7 14.3 32 32 32H384V285.7l-86.8 86.8c-10.3 10.3-17.5 23.1-21 37.2l-18.7 74.9c-2.3 9.2-1.8 18.8 1.3 27.5H64c-35.3 0-64-28.7-64-64V64zm384 64H256V0L384 128zM549.8 235.7l14.4 14.4c15.6 15.6 15.6 40.9 0 56.6l-29.4 29.4-71-71 29.4-29.4c15.6-15.6 40.9-15.6 56.6 0zM311.9 417L441.1 287.8l71 71L382.9 487.9c-4.1 4.1-9.2 7-14.9 8.4l-60.1 15c-5.5 1.4-11.2-.2-15.2-4.2s-5.6-9.7-4.2-15.2l15-60.1c1.4-5.6 4.3-10.8 8.4-14.9z" />
                                                      </svg>
                                                </a>

                                                <svg name="copy" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                      <path fill="#666666"
                                                            d="M0 448c0 35.3 28.7 64 64 64H288c35.3 0 64-28.7 64-64V384H224c-53 0-96-43-96-96V160H64c-35.3 0-64 28.7-64 64V448zm224-96H448c35.3 0 64-28.7 64-64V64c0-35.3-28.7-64-64-64H224c-35.3 0-64 28.7-64 64V288c0 35.3 28.7 64 64 64z" />
                                                </svg>
                                          </td>
                                    </tr>
                              <?php } ?>    <!--end of ForEach (table creation)-->
                        </tbody>
                  </table>
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
                              <li>JavaScript</li>
                        </ul>
                  </div>
            </footer>

            <script>
                  document.querySelector('[name="nfo"]').addEventListener("click", () => {
                        document.querySelector('.new_file').style.display = "none";
                        document.querySelector('.new_folder').style.display = "block";
                        document.querySelector('.upload').style.display = "none";

                  });
                  document.querySelector('[name="nfi"]').addEventListener("click", () => {
                        document.querySelector('.new_file').style.display = "block";
                        document.querySelector('.new_folder').style.display = "none";
                        document.querySelector('.upload').style.display = "none";

                  });
                  document.querySelector('[name="upl"]').addEventListener("click", () => {
                        document.querySelector('.new_file').style.display = "none";
                        document.querySelector('.new_folder').style.display = "none";
                        document.querySelector('.upload').style.display = "block";
                  });


            </script>

      </div>
</body>

</html>