<?php

namespace Controller;

class Admin {
      
      public $thead=false;
      public $options=false;

      public static function getTable($selection){

            //kodas kategorijų susigražinimui į $options masyvą
            $options= new \Model\Categories();
            $options=$options->get();

            //Pagrindinis kodas
            $admTable=$selection;
            $data=new \Model\Admin($selection);
            $thead=$data->getTableHeaders();
            $tbody=$data->get();
                        include "view/admin/admin_tables.php";
            }
            
      
      public static function getAdminEvent(){
            isset ($_POST['adm_act']) ? $action=$_POST['adm_act'] : $action=false;
            isset ($_GET['adm_act']) ? $action=$_GET['adm_act'] : $action;

            if($action){
                  $postedData = new \Model\Admin($_GET['adminview']);
                  $data = $_POST;
            }
            
            switch ($action){
                  case 'add':
                        unset($data['adm_act']);
                        unset($data['table']);
                        unset($data['id']);
                        unset($data['date_added']);
                        $postedData->set($data);
                        break;
                  case 'del':
                        $id = $_GET['id'];
                        $postedData->delete($id);
                        break;
                  case 'edit':
                        $id=$data['id'];
                        unset($data['adm_act']);
                        unset($data['table']);
                        unset($data['id']);
                        unset($data['date_added']);
                        $postedData->update($id, $data);
                        break;
                  default:
                        break;

            }
      }      
}

