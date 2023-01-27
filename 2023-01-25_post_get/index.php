<!DOCTYPE html>
<html lang="en">

<head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Data transfer PHP</title>
</head>

<body>
      <h1>Eiluičių generatorius</h1>

      <div style="margin: 50px auto;">
            <h2>Nuorodos į namų darbų failą</h2>
            <a href='save.php'>Generate and save new string</a><br />
            <a href='catch.php'>Try to regenerate string</a></br>
      </div>
      <div style="margin: 50px auto;">
            <h2>Interaktyvus kodų generatorius su paieška</h2>

                  <form method="POST" action="findCode.php">
                        <div>
                              <label>Slaptažodis</label>
                              <input type="text" name="psw" />
                              <input type="submit" />
                        </div>
                  </form>
      </div>
      <div style="margin: 50px auto;">

            <h2>$_SERVER, $_GET, $_POST, fopen(), fwrite(), fread(), fclose() PHP Funkcijos</h2>

            <div>Į adreso laukelį prie dabartinio adreso pridėk: "/?code=..." vietoje taškų įrašydamas bet kokius
                  simbolius ir atnaujink naršyklę.</div>

            <?php
            {
                  echo "we provide name to address bar " . htmlspecialchars($_POST["code"]) . " as a code. <br />";
                  echo "you entered " . htmlspecialchars($_GET["code"]) . " as a code. <br />";
                  echo $_SERVER['PHP_SELF']."<br />";
                  $open= fopen("failas.txt", "a+");
                  $value = fread($open, filesize("failas.txt"));
                  fwrite($open, "pridedamas tekstas\n");
                  fclose($open);
                  $other=str_replace("\n", "<br />", $value, );
                  echo $other;
                  print($other);
                  
            }
            ?>
            </script>
      </div>
</body>

</html>