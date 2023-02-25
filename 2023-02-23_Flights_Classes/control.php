<?php
//catching action:

//!!!!!!!!!!!!!!!!!!!!!Testuojant jeigu adreso laukelyje bus geto reikšmės, postas gali nerodyti ekrane.
$action="";
if (isset($_GET['act']) && $_GET['act'] !=""){
      $action=$_GET['act'];
}
if (isset($_POST['act']) && $_POST['act'] !=""){
      $action=$_POST['act']; //for switch
      
}

$data=new Avia();
$data->flights;
// $passengers=$data->getPassenger()->passengers;

switch($action){
      case "flt_add":
            $data->setFlight($_POST['from'], $_POST['to'], $_POST['f_num'], $_POST['f_date']);
            header('Location: ./');
            break;
      case "f_edit":
            break;
      case "f_del":
            $data->delFlight($_GET['id']);
            header('Location: ./');
            break;
      case "psg_add":
            $data->setPassenger($_POST['name'], $_POST['surname'], $_POST['f_id']);
            header('Location: ./');
            break;
      case "p_edit":
            break;
      case "p_del":
            $data->delPassenger($_GET['id']);
            header('Location: ./');
            break;
      case "p_sort_up":
            break;
      case "p_sort_down":
            break;
      case "f_from_sort_up":
            $data->sortFligthsFrom();
            header('Location: ./');
            break;
      case "f_from_sort_down":
            $data->sortFligthsFrom('DESC');
            header('Location: ./');
            break;
      case "f_to_sort_up":
            $data->sortFligthsTo();
            header('Location: ./');
            break;
      case "f_to_sort_down":
            $data->sortFligthsTo('DESC');
            header('Location: ./');
            break;
      default:
            break;
}     

?>