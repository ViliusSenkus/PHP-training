<?php
//catching action:
$action="";
if (isset($_POST['act']) && $_POST['act'] !=""){
      $action=$_POST['act'];
}

//!!!!!!!!!!!!!!!!!!!!!Testuojant jeigu adreso laukelyje bus geto reikšmės, postas gali nerodyti ekrane.

if (isset($_GET['act']) && $_GET['act'] !=""){
      $action=$_GET['act'];
}

$data=new Avia();

switch($action){
      case "flt_add":
            $data->addFlight($_POST['from'], $_POST['to'],$_POST['f_num'], $_POST['f_date']);
            break;
      case "f_edit":
            break;
      case "f_del":
            break;
      case "psg_add":
            break;
      case "p_edit":
            break;
      case "p_del":
            break;
      default:
            break;
}     

?>