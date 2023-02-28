<?php
include "model/Database.php";
include "model/Video.php";

$data=new Database();
$video=new Video();

// print_r ($video->set(["name"=>"Seco'nd entry", "video_url"=>"none at a mo'ment", "thumb_url"=>"no'ne yet"])->get());
print_r ($video->update(8, ["name"=>"Updated", "video_url"=>"none's", "thumb_url"=>"non's"])->get());
?>