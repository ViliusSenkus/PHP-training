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
                        Admin::set($data);
                        break;
                  case 'del':
                        Admin::del($data);
                        break;
                  case 'edit':
                        Admin::update($data);
                        break;
                  default:
                        break;

            }
      }      
}

