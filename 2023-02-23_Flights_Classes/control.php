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

switch($action){
      case "flt_add":
            $data->setFlight($_POST['from'], $_POST['to'], $_POST['f_num'], $_POST['f_date']);
            header('Location: ./');
            break;
      case "f_edit":
            $data->editFlight($_POST['from'], $_POST['to'],$_POST['f_num'], $_POST['f_date'],$_POST['key']);
            header('Location: ./');
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
            $data->editPassenger($_POST['name'], $_POST['surname'],$_POST['f_id'], $_POST['key']);
            header('Location: ./');
            break;
      case "p_del":
            $data->delPassenger($_GET['id']);
            header('Location: ./');
            break;
      case "f_from_sort_up":
            $flights=usort($data->flights, fn ($a, $b) => $a['f_from']<=>$b['f_from']);
            // $data->sortFligthsFrom();
            // header('Location: ./');
            break;
      case "f_from_sort_down":
            $flights=usort($data->flights, fn ($a, $b) => $b['f_from']<=>$a['f_from']);
            // $data->sortFligthsFrom('DESC');
            // header('Location: ./');
            break;
      case "f_to_sort_up":
            $flights=usort($data->flights, fn ($a, $b) => $a['f_to']<=>$b['f_to']);
            // $data->sortFligthsTo();
            // header('Location: ./');
            break;
      case "f_to_sort_down":
            $flights=usort($data->flights, fn ($a, $b) => $b['f_to']<=>$a['f_to']);
            // $data->sortFligthsTo('DESC');
            // header('Location: ./');
            break;
      case "p_name_sort_up":
            $passengers=usort($data->passengers, fn ($a, $b) => $a['first_name']<=>$b['first_name']);
            // $data->sortFligthsFrom();
            // header('Location: ./');
            break;
      case "p_name_sort_down":
            $passengers=usort($data->passengers, fn ($a, $b) => $b['first_name']<=>$a['first_name']);
            // $data->sortFligthsFrom('DESC');
            // header('Location: ./');
            break;
      case "p_last_sort_up":
            $passengers=usort($data->passengers, fn ($a, $b) => $a['last_name']<=>$b['last_name']);
            // $data->sortFligthsTo();
            // header('Location: ./');
            break;
      case "p_last_sort_down":
            $passengers=usort($data->passengers, fn ($a, $b) => $b['last_name']<=>$a['last_name']);
            // $data->sortFligthsTo('DESC');
            // header('Location: ./');
            break;
      default:
            break;
}     
?>