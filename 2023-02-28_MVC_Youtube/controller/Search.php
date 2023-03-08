<?php

namespace Controller;

// čia turi būti paimamas tekstas kuris apdirbamas ir saveikoje su modeliais duoda rezultata - video sarasa, kuris po to perduodamas (includinama į f-ją) į ekraną atvaizdavimui (per foreach'ą).

class Search{

      public $searchResult=[];
      public static function search($text){
            $text = trim($text);
            $text = stripslashes($text);
            $text = htmlspecialchars($text);

         
            $videos= new \Model\Video();
            $videos=$videos->search($text);

            if(!$videos){
                 include 'view\main\searchResultNo.php';
            }else{
                  include 'view\main\searchResult.php';
            }
      }
      
}