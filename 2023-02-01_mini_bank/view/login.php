<?php

$Client = array(
      "id" => "65451351",
      "psw" => "1234",
      "account" => " LT5515615616515615",
      "name" => "Motiejus",
      "surname" => "Aleksandravičius",
      "ammount" => 9.99
);

//tikriname ar suvesti formos duomenys
if (
      isset($_POST["id"]) &&
      isset($_POST["psw"]) &&
      $_POST["id"] != "" &&
      $_POST["psw"] != ""
) {
      // jeigu duomenys suvesti tikriname ar jie atitinka vartotoją. Atitikus pririšame prie sesijos.
      if ($_POST["id"] == $Client["id"] && $_POST["psw"] == $Client["psw"]) {
            $_SESSION["clientID"] = $Client["id"];
            $_SESSION["clientPsw"] = $Client["psw"];
            $_SESSION["connected"] = true;
      } else {
            $_SESSION["clientID"] = "";
            $_SESSION["clientPsw"] = "";
            $_SESSION["connected"] = false;
      }
} ?>




<div class="container account
      <?php
      if (isset($_SESSION["connected"]) && $_SESSION["connected"] === true) {
            echo "d-block";
      } else {
            echo "d-none";
      }
      ?>
      ">
      <h3 class="text-end me-5">
            <?= $Client['name'] . " " . $Client['surname'] ?>
      </h3>
      <div class="text-center">
            <table class="table w-50 text-center table-bordered border-success mx-auto my-4">
                  <thead>
                        <tr>
                              <th class="w-75">Sąskaitos numeris</th>
                              <th>Sąskaitos likutis</th>
                        </tr>
                  </thead>
                  <tbody>
                        <tr class="table-success">
                              <td class="text-start">
                                    <?= $Client["account"] ?>
                              </td>
                              <td class="text-end">
                                    <?= $Client["ammount"] ?>€
                              </td>
                        </tr>
                  </tbody>
            </table>
      </div>
</div>


<div class="form-signin w-50 m-auto 
      <?php
      if (isset($_SESSION["connected"]) && $_SESSION["connected"] == true) {
            echo "d-none";
      } else {
            echo "d-block";
      }
      ?>
      ">
      <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <h3 class="mb-3 fw-normal">įveskite prisijungimo duomenis</h3>

            <div class="form-floating mb-1">
                  <input type="text" class="form-control" id="floatingInput" name="id">
                  <label for="floatingInput">Your ID</label>
            </div>
            <div class="form-floating mb-1">

                  <input type="password" class="form-control" id="floatingPassword" name="psw">
                  <label for="floatingPassword">Password</label>
            </div>

            <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button> <!-- čia reikia į get'ą perduoti log=on -->
      </form>
</div>