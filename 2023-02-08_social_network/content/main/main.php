<?php 
if(isset($_SESSION['log']) && $_SESSION['log']===true && $_SESSION['user'] !=''){
     include("user.php");
}else{
      include("incognito.php");
}
?>

<!-- čia galima sudėti bendrą dalį tiek prisijungusiam tiek ir neprisijungusiam -->