<select name="categories">

<?php

      foreach($options as $k=>$v) :
            
//  echo"<pre>";
//  print_r($v);
 
?>
      <option value="<?=$v['id']?>"> <?=$v['category']?> </option>"
      
<?php
     endforeach; 
?>
</select>