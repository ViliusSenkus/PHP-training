<?php 
// echo "<pre>";
// print_r ($_SESSION);
// echo "</pre>";
$jsondata = file_get_contents("admin/db.json");
$clientsArray = json_decode($jsondata, true);

foreach ($clientsArray as $key => $data){

if (isset($_SESSION["clientID"]) && $_SESSION["clientID"]===$data["id"]){
            $Client["name"] = $data["name"];
            $Client["surname"] = $data["surname"];
            $Client["iban"] = $data["iban"];
            $Client["balance"] = $data["balance"];
            $Client["key"] = $key;
}
}

?>



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
            <?php 
                 


            echo $Client['name'] . " " . $Client['surname'] ?>
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
                                    <?= $Client["iban"] ?>
                              </td>
                              <td class="text-end">
                                    <?= $Client["balance"] ?>€
                              </td>
                        </tr>
                  </tbody>
            </table>
      </div>
      <div class="text-center">
            <a type="button" href="?transfer=1">Atlikti mokėjimą</a>
<?php
      if (isset($_GET["transfer"]) && $_GET["transfer"]==1){ ?>
            <form method="POST">
                  <div class="form-floating mb-1">
                        <input type="text" class="form-control" id="rec" name="reciever" />
                        <label for="rec">Gavėjo sąskaitos numeris</label>
                  </div>
                  <div class="form-floating mb-1">
                        <input type="number" class="form-control" id="sum" name="sum" value="10.00" step="0.01"/>
                        <label for="sum">Suma</label>
                  </div>
                        <input type="hidden" name="trans" value="true" />
                        <input type="hidden" name="key" value=" <?=$Client["key"]?> " />
                  <button class="w-100 btn btn-lg btn-primary" type="submit">Patvirtinti pervedimą</button>
            </form>

<?php } ?>
            
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

            <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
      </form>
</div>