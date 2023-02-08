<?php 
// tikrinti ar yra prisijungimas ir atvaiztuoti puslapį: incognito.php arba user.php 
if($_SESSION['log']===true && $_SESSION['user'] !=''){
     include("user.php");
}else{
      include("incognito.php");
}
?>

<!-- čia galima sudėti bendrą dalį tiek prisijungusiam tiek ir neprisijungusiam -->