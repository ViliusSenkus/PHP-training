<?php

      namespace View\Main;

?>

<div class="actual-cat">
      <nav>
            <ul>

<?php

      foreach($actualbar as $a) :
            if ($a['actual']===1) :

?>
                  <li>
                        <a href="?category=<?=$a['id']?>"><?=$a['category']?></a>
                  </li>
                  
<?php

                  endif;
            endforeach;

?>
                  <li>
                        <a href="?category=">Kategorija</a>
                  </li>
                  List of actual categories - set by admin;
            </ul>
      </nav>
</div>