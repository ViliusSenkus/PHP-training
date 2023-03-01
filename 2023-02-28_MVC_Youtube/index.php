<?php
include "model/Database.php";
include "model/Video.php";
include "model/Categories.php";

$video=new Video();
$categories=new Categories();
 print_r ($video->get());

?>