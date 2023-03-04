<?php

namespace Model;

class Admin extends Database{
      public $table=false;

      public function __construct($table_name){
            parent::__construct();
            $this->table=$table_name;
      }
}