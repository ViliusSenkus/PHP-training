<?php
class Clas{

      static public $s;
      function go(){
            self::$s="nogo";
            echo "go <br/>";
            return $this;
      }
}

$object= new Clas();

$object->go();

print_r($object::$s);



// echo "<p><br />" . $_SERVER['QUERY_STRING'] ." - Returns the query string if the page is accessed via a query string <br />";
// echo $_SERVER['HTTP_HOST'] . " - Returns the Host header from the current request<br /";
// echo $_SERVER['HTTP_REFERER'] . " - Returns the complete URL of the current page (not reliable because not all user-agents support it)<br />";
// echo $_SERVER['SCRIPT_FILENAME'] . " - Returns the absolute pathname of the currently executing script<br />";

// echo "<pre>";
// var_dump($_SERVER);
// echo "</pre>";

// echo $_SERVER['PHP_SELF'];

class Naujas{
      public static $spalva = "red";
      public $dydis="S";
      function rodyk(){
            echo "<br />".self::$spalva." ".$this->dydis;
      }
}
echo "<br /> Klasių atvaizdavimas <br/>";
$megztinis=new Naujas;
$marskiniai=new Naujas;


echo "<pre>";
print_r($megztinis);
echo "<br />";
print_r($marskiniai);
$marskiniai->dydis="M";
$marskiniai->rodyk();

$marskiniai::$spalva="zalia";
$marskiniai->rodyk();
$megztinis->rodyk();



        $image_url = "https://cdn.lorem.space/images/shoes/.cache/600x900/alexander-rotker-l8p1aWZqHvE-unsplash.jpg";  //URL

        $url_pathinfo = pathinfo($image_url);  
        $image_name = $url_pathinfo['filename'].'.'.$url_pathinfo['extension']; //FILE NAME

        $image_path = $_SERVER ['DOCUMENT_ROOT'].$image_name;
            echo "<br /> Serveris: <br/>";
        file_put_contents ($image_path, file_get_contents($image_url));


?>