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
function z() {
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
function myTest() {
  static $x = 0;
  echo $x;
  $x++;
}

myTest();
myTest();
myTest();
z();

?>