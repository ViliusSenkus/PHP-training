<?php
$x = 5;
function showX($num1, $num2)
{
      $num1 += $num2;
      return $num1;
}
if (isset($_GET['add'])) {
      $num = intval($_GET['add']);
      $x = showX($x, $num);
}
echo "x lygus $x";
?>

<form method="get">
      <input type="number" name="add" />
      <button>spausk</button>
</form>





<?php

if (isset($_GET['y'])) {
      z();
}
function z()
{
      static $z = 0;
      $z += 1;
      echo $z;
      $z += 1;
      echo $z;
}
?>

<form method="get">
      <input type="text" name="y" value="y" />
      <button>spausk</button>
</form>

<?php
function myTest()
{
      static $x = 0;
      echo $x;
      $x++;
}

myTest();
myTest();
myTest();
z();




echo "<p><br />" . $_SERVER['QUERY_STRING'] ." - Returns the query string if the page is accessed via a query string <br />";
echo $_SERVER['HTTP_HOST'] . " - Returns the Host header from the current request<br /";
echo $_SERVER['HTTP_REFERER'] . " - Returns the complete URL of the current page (not reliable because not all user-agents support it)<br />";
echo $_SERVER['SCRIPT_FILENAME'] . " - Returns the absolute pathname of the currently executing script<br />";

echo "<pre>";
var_dump($_SERVER);
echo "</pre>";

echo $_SERVER['PHP_SELF'];
?>