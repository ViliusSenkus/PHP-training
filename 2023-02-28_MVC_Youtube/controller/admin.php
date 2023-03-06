<?php

namespace Controller;

class Admin {
      
      public $thead=false;

      public static function getTable($selection){
            $admTable=$selection;
            $data=new \Model\Admin($selection);
            $thead=$data->getTableHeaders();
            $tbody=$data->get();
                        include "view/admin/admin_tables.php";
            }
            

      
      public static function getAdminEvent(){
            isset ($_POST['adm_act']) ? $action=$_POST['adm_act'] : $action=false;
            
            switch ($action){
                  case 'add':
                        $data = $_POST;
                        $postedData = new \Model\Admin($_POST['table']);
                        unset($data['adm_act']);
                        unset($data['table']);
                        unset($data['id']);
                        unset($data['date_added']);
                        $postedData->set($data);
                        break;
                  case 'del':
                        $data = $_POST;
                        $postedData = new \Model\Admin($_POST['table']);
                        // $actionData['date_added'] = getdate();
                        $postedData->delete($data['id']);
                        break;
                  case 'edit':
                        // Admin::update($data);
                        break;
                  default:
                        break;

            }
      }      
}

