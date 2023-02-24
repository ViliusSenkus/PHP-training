<?php
//catching action:

//!!!!!!!!!!!!!!!!!!!!!Testuojant jeigu adreso laukelyje bus geto reikšmės, postas gali nerodyti ekrane.
$action="";
if (isset($_GET['act']) && $_GET['act'] !=""){
      $action=$_GET['act'];
}
if (isset($_POST['act']) && $_POST['act'] !=""){
      $action=$_POST['act']; //for switch
      $from=$_POST['from'];
      $to=$_POST['to'];
      $f_num=$_POST['f_num'];
      $f_date=$_POST['f_date'];
}

$data=new Avia();


switch($action){
      case "flt_add":
            $data->addFlight($from, $to, $f_num, $f_date);
            print_r($data);
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