<?php
session_start();
$num = 0;
$clientsArray = array();
//Tikriname ar puslapį pasiekinėja adminas. jeigu ne - gražiname į pirmą puslapį.
if (!isset($_SESSION["admin"]) || $_SESSION["admin"] != true) {
      header('Location: /My_Projects/2023-02-01_mini_bank/index.php');
}


//tikriname pridedamą/keičiamą informaciją. 
//Po to iš karto duomenų į JSON įrašymas šitoje vietoje, kad būtų atvazduojama lentelėje žemiau 
if (isset($_POST) and count($_POST) > 0) {
      $jsonData = file_get_contents("db.json");
      $clientsArray = json_decode($jsonData, true);

      //keitimas
      if (isset($_POST["idNew"])) {
            $editedUser = array(
                  "id" => $_POST["idNew"],
                  "psw" => $_POST["pswNew"],
                  "iban" => $_POST["ibanNew"],
                  "name" => $_POST["nameNew"],
                  "surname" => $_POST["surnameNew"],
                  "balance" => $_POST["balanceNew"]
            );
            $clientsArray[$_POST["key"]] = $editedUser;

      } elseif ($_POST['id'] != "") {
            $user = $_POST;
            $clientsArray[] = $user;
      }
      $clientsArray = array_values($clientsArray);
      $jsonArray = json_encode($clientsArray);
      file_put_contents("db.json", $jsonArray);
      header('Location: admin.php');
}

//eilutės trynimas
if (isset($_GET['delete']) && $_GET['delete'] != "") {
      $jsonData = file_get_contents("db.json");
      $clientsArray = json_decode($jsonData, true);
      unset($clientsArray[$_GET['delete']]);
      $clientsArray = array_values($clientsArray);
      $jsonArray = json_encode($clientsArray);
      file_put_contents("db.json", $jsonArray);

}

// Atsijungimas iš admino
if (isset($_GET["log"]) && $_GET["log"] != "") {
      $_SESSION["admin"] = false;
      header('Location: ../index.php');
}
?>

<!DOCTYPE html>
<html lang="en" />

<head>
      <meta charset="UTF-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <link rel="stylesheet" href="admin.css" />
      <link rel="icon" href="logo.png" />
      <title>Admin Panel</title>
</head>

<body>
      <header class="container">
            <h2>Wellcome to admin panel, Master</h2>
            <nav>
                  <a href="#data">Information</a>
                  <a href="#newClient">Add client</a>
                  <a href="?log=off">Log off</a>
            </nav>
      </header>

      <main class="container">
            <div id="data">
                  <table>
                        <theader>
                              <tr>
                                    <th>Serial No.</th>
                                    <th>ID</th>
                                    <th>Password</th>
                                    <th>Account number (IBAN)</th>
                                    <th>Name</th>
                                    <th>Surname</th>
                                    <th>Sum on account</th>
                                    <th>Actions</th>
                              </tr>
                        </theader>
                        <tbody>

                              <?php
                              //duomenų iš JSON nuskaitymas
                              $jsonData = file_get_contents("db.json");
                              $clientsArray = json_decode($jsonData, true);

                              foreach ($clientsArray as $key => $data) {

                                    //eilutės aktyvavimas editinimui
                                    $disable = "disabled";
                                    if (isset($_GET['edit']) && $_GET['edit'] != "") {
                                          if ($_GET['edit'] == $key) {
                                                ?>
                                                <form method='POST'>
                                                      <tr>
                                                            <td>
                                                                  <input type="hidden" name="key" value="<?= $key ?>" />
                                                                  <?= $key ?>
                                                            </td>
                                                            <td>
                                                                  <input type="text" name="idNew" value="<?= $data['id'] ?>"
                                                                        state="required" required />
                                                            </td>
                                                            <td>
                                                                  <input type="text" name="pswNew" value="<?= $data['psw'] ?>"
                                                                        state="required" required />
                                                            </td>
                                                            <td>
                                                                  <input type="text" name="ibanNew" value="<?= $data['iban'] ?>"
                                                                        state="required" required />
                                                            </td>
                                                            <td>
                                                                  <input type="text" name="nameNew" value="<?= $data['name'] ?>"
                                                                        state="required" required />
                                                            </td>
                                                            <td>
                                                                  <input type="text" name="surnameNew" value="<?= $data['surname'] ?>"
                                                                        state="required" required />
                                                            </td>
                                                            <td>
                                                                  <input type="text" name="balanceNew" value="<?= $data['balance'] ?>"
                                                                        state="required" required />
                                                            </td>

                                                            <td style="background-color: #efefef;">
                                                                  <button type="submit">
                                                                        Submit
                                                                  </button>
                                                            </td>
                                                      </tr>
                                                </form>

                                                <?php
                                                continue;
                                          }
                                    } ?>


                                    <tr>
                                          <td>
                                                <?= $key ?>
                                          </td>
                                          <td>
                                                <?= $data['id'] ?>
                                          </td>
                                          <td>
                                                <?= $data['psw'] ?>
                                          </td>
                                          <td>
                                                <?= $data['iban'] ?>
                                          </td>
                                          <td>
                                                <?= $data['name'] ?>
                                          </td>
                                          <td>
                                                <?= $data['surname'] ?>
                                          </td>
                                          <td>
                                                <?= $data['balance'] ?>
                                          </td>

                                          <td>
                                                <a href="?edit=<?= $key ?> ">Edit</a>
                                                <a href="?delete=<?= $key ?> ">Delete</a>
                                          </td>
                                    </tr>

                              <?php } ?>



                        </tbody>
                  </table>
            </div>
            <div class="newClient" is="newClient">
                  <form method="post">
                        <div class="field">
                              <label>id</label>
                              <input type="text" name="id" />
                        </div>
                        <div class="field">
                              <label>password</label>
                              <input type="text" name="psw" />
                        </div>
                        <div class="field">
                              <label>iban</label>
                              <input type="text" name="iban" />
                        </div>
                        <div class="field">
                              <label>name</label>
                              <input type="text" name="name" />
                        </div>
                        <div class="field">
                              <label>surname</label>
                              <input type="text" name="surname" />
                        </div>
                        <div class="field">
                              <label>Account sum</label>
                              <input type="number" name="balance" />
                        </div>
                        <button type="submit">Add new client</button>
                  </form>
            </div>

      </main>

      <footer class="container">

      </footer>
</body>

</html>