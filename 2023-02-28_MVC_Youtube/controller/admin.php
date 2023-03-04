<?php

namespace Controller;

class Admin {
      
      public $thead=false;

      public static function getTable($selection){

            $data=new \Model\Admin($selection);
            $thead=$data->getTableHeaders();
            $tbody=$data->get();
                        include "view/admin/admin_tables.php";
            }
    
}