<?php

      echo '<h1>2023-01-23 Namų darbai</h1>';

      echo '<h2>1 užduotis</h2>
            <div> sugeneruotas masyvas </div><br />';
      
            for ($i=0; $i<30; $i++ ){
            $array[] = rand(5, 25);
      }

      var_dump($array);

      echo '<br /><br /><div> išskleistas masyvas </div><br />';

      for ($i = 0; $i < 30; $i++){
            echo ($i . '-' . $array[$i] . '<br />');
      }
      
      echo '<h2>2 užduotis</h2>
            <div> sugeneruotas raidžių masyvas </div><br />';

      $letters = ['A', 'B', 'C', 'D'];

      for($i=0; $i<200; $i++){
            $letter_array[] = $letters[rand(0, 3)];
      }

      $count = 0;
      for($i=0; $i<200; $i++){
            print $letter_array[$i];
            $count++;
            if ($count==20){
            echo '<br />';
            $count = 0;
            }
      }
      

      echo '<h2>3 užduotis</h2>
            <div style="margin-bottom:5px;"> trys raidžių masyvai </div>
                  <div style="display:flex; flex-direction:row; justify-content: space-around;">';

      for ($i = 0; $i < 200; $i++){
            $array1[] = $letters[rand(0, 3)];
            $array2[] = $letters[rand(0, 3)];
            $array3[] = $letters[rand(0, 3)];
      }

      echo '<div>';
      $count = 0;
      for($i=0; $i<200; $i++){
            print $array1[$i];
            $count++;
            if ($count==20){
            echo '<br />';
            $count = 0;
            }
      }
      echo '</div><div style="color:red;">';
      $count = 0;
      for($i=0; $i<200; $i++){
            print $array2[$i];
            $count++;
            if ($count==20){
            echo '<br />';
            $count = 0;
            }
      }
      echo '</div><div>';
      $count = 0;
      for($i=0; $i<200; $i++){
            print $array3[$i];
            $count++;
            if ($count==20){
            echo '<br />';
            $count = 0;
            }
      }
      echo '</div>';
      echo '</div>';

      echo '<div style="margin:10px;">Sujungtas masyvas</div>';

      for($i=0; $i<200; $i++){
            $jointArea[]=$array1[$i].$array2[$i].$array3[$i];
      }

      $counter = 0;
      for($i=0; $i<200; $i++){
            echo $jointArea[$i];
            echo ' - ';
            $counter++;
            if ($counter==20){
                  echo '<br />';
                  $counter=0;
            }
      }
      
      echo '<h2>4 užduotis</h2>
            Paprastas kvadratas <br /><br />
                  <div style=" font-size: 10px; margin:0; line-height:5px; display:flex; flex-direction:row; justify-content: space-between"><div>';

      $dydis = 100;

      for($y=0; $y<$dydis; $y++){
            for ($x=0; $x<$dydis; $x++){
                  echo '*';
            }
            echo '<br />';
      }

      echo '</div><div>';

      for($y=0; $y<$dydis; $y++){
            for ($x=0; $x<$dydis; $x++){
                  if ($x===$y || (($dydis-1)-$x)===$y){
                        echo '<span style="color:red">*</span>';
            } else {
                  echo '*';}
            }
            echo '<br />';
      }

      echo '</div></div>';
?>
