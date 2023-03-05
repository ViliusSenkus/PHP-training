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
            

      // @ia pasigaunam adm_act eventa ir issisaukiam pridejimo f-ja is modelio.
      // pati pradzia(iniciacija) turi buti index faile.
}

