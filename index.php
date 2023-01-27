<?php

echo '<pre>';
print_r($_GET);
echo '</pre>';

//nuoroda į kitą folderį gaunama iš <a href>.
$folder = ".";
$dabartinisFolder = ".";

if (isset($_GET['folder'])) {
      $folder .= "/" . $_GET['folder'];
      echo "sujungtas foldertis - $folder \n";
}

function _currentFolder($data)
{
      //gaunam eilutę /My_Projects/?folder=...esamo folderio pavadinimas
      $fullCurrentFolder = $_SERVER['REQUEST_URI'];  

      //gaunam esamo folderio pavadinimą paskutiniame masyvo elemente (sąlyga, kad folderio pavadinimas neturi ženklo "=")
      $currentFolderArray = explode('=', $fullCurrentFolder);
      $currentFolder = $currentFolderArray[count($currentFolderArray) - 1];

      //pasiimam kelią iki dabartinio folderio:
            //susiskaldom elementą pagal  "/" taip atskirdami folderius
      $way = explode("/", $currentFolder[0]);
            //atmetam pirmus elementus, kadangi My_Projects turi pakeisti "."
      array_splice($way, 0, 1);
      $string=implode("/", $way);

      $dabartinisFolder = $string.$data;
      return $dabartinisFolder;
}

echo "mes esame cia " . _currentFolder($folder);



//failo sukūrimas
if (isset($_POST['fileName']) && $_POST['fileName'] != "") {
      file_put_contents($folder . "/" . $_POST['fileName'], $_POST['fileContent']);
}


$folderData = scandir($folder);
$folderData = _sortData($folderData);
function _sortData($dataArr)
{ //folderių ir failų sudėjimas iš eilės
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


//perdaryti į du masyvus - vienas folderių kitas failų, kad atvaizduoti iš eilės.
// echo '<pre>';
// print_r($folderData);
// echo '</pre>';
// foreach ($folderData as $value) {
//       if (is_dir($folder."/" . $value)) {
//             echo "<br /> folderis - " . $value;
//       } else {
//             echo "<br /> failas   - " . $value;
//       }
// }
// reikia išėjus iš pagrindinio folderio pridėti esamą kelią prieš GET.

//ikonų sudėjimui iš interneto "https://img.icons8.com/external-fauzidea-flat-fauzidea/32/null/external-php-file-file-extension-fauzidea-flat-fauzidea.png", "r");

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
                  <div>Direktorija kurioje esame ir kelias iki jos</div>
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
                                          //possibility to go higher than project is hidden
                                          $currentFolder == "/My_Projects/" and
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
                                                <?php

                                                if (is_dir($folder . "/" . $data)) { ?>
                                                      <div class="icon">
                                                            <img src="https://img.icons8.com/emoji/32/null/file-folder-emoji.png" />
                                                      </div>
                                                      <a href="?folder=<?php echo $data ?>"><?php echo $data; ?></a>
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
                                                } ?>

                                          </td>
                                          <td>Dydis</td>
                                          <td>Data</td>
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

      <?php
      echo '<pre>';
      print_r($_SERVER);
      echo '</pre>';
      ?>
</body>

</html>