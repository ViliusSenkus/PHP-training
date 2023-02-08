<form method="post">
                  <input type="number" name="sk" />
                  <button type="submit">sub</button>
            </form>
<?php echo "<pre>";
      echo "getas :";
            print_r($_GET);
      echo "<br />postas :";
            print_r($_POST);
            print_r($_SESSION); ?>