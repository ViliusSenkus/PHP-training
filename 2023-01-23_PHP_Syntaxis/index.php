<?php
      //kaip html kodas
      echo '<h1>This is my first PHP app</h1>';
      // kaip funkcija
      echo('dar viena eilute');
      //dar kitaip
      print '<h2> tai yra h2 eilute<h2>';
      print ('this string is printed from function argument');
      /*
      lo
      of
      lines
      comment
      */

      //kintamasis
      $pavadinimas = '<div>tai yra pavadinimas paimtas is kintamojo</div>';
      echo $pavadinimas;
      $kintamasis=20;
      $kintamasis++;
      echo 'div'.$kintamasis.'div';

      $desimt=10;
      $trys=3;
      echo '<div>'.$desimt/$trys.'</div>';


      //masyvo atvaizdaviams
      $masyvas = array('raktinis_zodis' => 'reiksme') ;

      print_r($masyvas);
      echo '<br />';
      var_dump($masyvas);

      $kitasMasyvas = array(10,20,30);
      $darMasyvas=[11,12,13,14];
      echo '<br />';
      var_dump($kitasMasyvas);
      echo '<br />';
      var_dump($darMasyvas);

      echo '<br />';
      echo $masyvas['raktinis_zodis'];

      //istrynimas is array
      unset($darMasyvas[2]);
      echo '<br />';
      var_dump($darMasyvas);


      //pridejimas prie masyvo
      $masyvas[]='nauja reiksme';
      $masyvas['raktazodis']='reiskme su pridetu raktazodziu';
      echo '<br />';
      var_dump($masyvas);


      //for'as
      for ($i = 0; $i < 10; $i++) {
            echo $i.' ciklas sukamas <br />';
      }

      //rand
      $randomas=rand(0,200);
      echo $randomas;

?>