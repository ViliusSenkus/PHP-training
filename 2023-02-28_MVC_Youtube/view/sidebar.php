<?php
namespace View;
?>

<div class="cover"></div>
<sidebar>
      <nav>
            <div class="block">
                  <div class="spread_menu">
                        <div class="spread_line"></div>
                        <div class="spread_line"></div>
                        <div class="spread_line"></div>
                  </div>
                  <div><a href="./"><img src="content/img/linktube_s.png"></a></div>
            </div>

<?php
            foreach($sidebar as $s) :
?>
            <ul>
                  <a class="sidebar_button" href="?page=<?=$s['page-link']?>">
                        <li>
                              <?=$s['icon'].$s['name']?>
                        </li>
                  </a>
            </ul>
            <hr>
          
<?php
      endforeach;
?>
      </nav>      
</sidebar>

