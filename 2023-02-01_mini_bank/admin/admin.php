<?php 
session_start();
$num = 0;

//Tikriname ar puslapį pasiekinėja adminas. jeigu ne - gražiname į pirmą puslapį.
if ( !isset($_SESSION["admin"]) || $_SESSION["admin"] != true){
      header('Location: /My_Projects/2023-02-01_mini_bank/index.php');
      }


//tikriname pridedamą informaciją. Šitoje vietoje, kad pridėjus iš karto būtų atvazduojama lentelėje
// duomenų į JSON įrašymas
if(isset($_POST) and count($_POST)>0){
      $user = array(
            "id" => $_POST["id"],
            "psw" => $_POST["psw"],
            "account" => $_POST["iban"],
            "name" => $_POST["name"],
            "surname" => $_POST["surname"],
            "ammount" => $_POST["sum"]
      );
      
      $jsonData = file_get_contents("db.json");
      $clientsArray = json_decode($jsonData, true);
      $clientsArray[] = $user;
      $jsonArray = json_encode($clientsArray);
      file_put_contents("db.json", $jsonArray);
      header('Location : /MY_PROJECTS/2023-02-01_mini_bank/admin/admin.php');
}

//eilutės trynimas
if (isset($_GET['delete']) && $_GET['delete'] !=""){
      $jsonData = file_get_contents("db.json");
      $clientsArray = json_decode($jsonData, true);
      unset($clientsArray[$_GET['delete']]);
      $jsonArray = json_encode($clientsArray);
      file_put_contents("db.json", $jsonArray);
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
<?php // Atsijungimas iš admino
      if (isset($_GET["log"]) && $_GET["log"] != ""){
      $_SESSION["admin"] = false;
      header('Location: /My_Projects/2023-02-01_mini_bank/index.php');
      }
      echo "<pre> SESSION duomenys: ";
echo(__FILE__);
echo "</pre>";
      

?>
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

foreach($clientsArray as $key => $data){ 
      $disable="disabled";
      if (isset($_GET['edit']) && $_GET['edit'] != "") {
            if ($_GET['edit'] == $key) {
                  $disable = "";
            }
      }?>
    <tr>
            <td>
                  <?= $key ?>
            </td>
            <td>
                  <input type="text" name="<?= $data['id'] ?>" value="<?= $data['id'] ?>" <?= $disable ?>/>
            </td>
            <td>
                  <input type="text" name="<?= $data['psw'] ?>" value="<?= $data['psw'] ?>" <?= $disable ?> />
            </td>
            <td>
                  <input type="text" name="<?= $data['account'] ?>" value="<?= $data['account'] ?>" disabled />
            </td>
            <td>
                  <input type="text" name="<?= $data['name'] ?>" value="<?= $data['name'] ?>" disabled />
            </td>
            <td>
                  <input type="text" name="<?= $data['surname'] ?>" value="<?= $data['surname'] ?>" disabled />
            </td>
            <td>
                  <input type="text" name="<?= $data['ammount'] ?>" value="<?= $data['ammount'] ?>" disabled />
            </td>

            <td>
                  <a href="?edit=<?=$key?> ">Edit</a>
                  <a href="?delete=<?=$key?> ">Delete</a>
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
                              <input type="number" name="sum" />
                        </div>
                        <button type="submit">Add new client</button>
                  </form>
            </div>

      </main>

      <footer class="container">

      </footer>
</body>
</html>
