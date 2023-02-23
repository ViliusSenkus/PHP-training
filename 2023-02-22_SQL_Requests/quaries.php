<?php
      
      if (isset($_GET['v']) and $_GET['v'] != ""){
            
            $v=$_GET['v'];
            switch ($v){
                  case 1:
                        $result=sql("city", "Name", "Name NOT LIKE '%h%' ");
                        $result=$result->fetch_all();
                        $head=['City Name'];
                        break;
                  case 2:
                        $result=sql("city", "Name", "Name LIKE '%c%' ");
                        $result=$result->fetch_all();
                        $head=['City Name'];
                        break;
                  case 3:
                        $result=sql("city", "Name", "CountryCode LIKE 'LTU' ");
                        $result=$result->fetch_all();
                        $head=['City Name'];
                        break;
                  case 4:
                        $result=sql("city", "Name", "Population >= 1000000");
                        $result=$result->fetch_all();
                        $head=['City Name'];
                        break;
                  case 5:
                        $result=sql("city", "Name", "id < 300 AND Population > 200000");
                        $result=$result->fetch_all();
                        $head=['City Name'];
                        break;
                  case 6:
                        $result=sql("country", "GovernmentForm", "LifeExpectancy > 72 AND SurfaceArea <= 30000 AND Population > 5000000");
                        $result=$result->fetch_all();
                        $head=['GovernmentForm'];
                        break;
                  case 7:
                        $result=sql("country", "Name", "Continent NOT LIKE 'Asia' AND SurfaceArea <= 10000");
                        $result=$result->fetch_all();
                        $head=['Countries'];
                        break;
                  case 8:
                        $result=sql("country", "Name, LocalName, HeadOfState, Population", "IndepYear LIKE 1991");
                        $result=$result->fetch_all();
                        $head=['Countries name', 'Local name', 'Governor', 'Population'];
                        break;
                  case 9:
                        $result=DB->query("SELECT c.Name, l.Language
                                          FROM country AS c
                                          JOIN countrylanguage AS l
                                          ON c.Code = l.CountryCode
                                          WHERE c.Population >=10000000");
                        $result=$result->fetch_all();
                        $head=['Countries name', 'Language'];
                        break;
                  default:
                        break;
            }

      }

function sql($table, $columns='*', $condition=''){
      $query=DB->query("SELECT {$columns} FROM {$table} WHERE {$condition}");
      return $query;
}

function table($row=1, $col=1, $colName=[], $values=[[]]){
      for ($i=0; $i<$row; $i++){
            if ($i==0){
                  echo "<thead>";
            }else if($i==1){
                  echo "<tbody>";
            }
            echo "<tr>";

            for($z=0; $z<$col; $z++){
                  if ($i==0){
                       echo "<th>$colName[$z]</th>";
                  }else{
                        $y=$i-1;
                        echo "<td>".$values[$y][$z]."</td>";
                  }
            }
            echo "</tr>";
            if ($i==0){
                  echo "</thead>";
            }else if($i != 0 && $i==($row-1)){
                  echo "</tbody>";
            }
      }

}

if(isset($result)){

      $row=count($result);
      $col=count($result[0]);
      foreach($result as $value){
            $res[]=$value;
      }
      echo "<table>";
      table($row, $col, $head, $res);
      echo "</table>";
}

?>