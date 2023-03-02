<?php
namespace View;
?>

<div class="cover"></div>
<sidebar>
      <nav>
            <div class="block side">
                  <div class="spread_menu">
                        <div class="spread_line"></div>
                        <div class="spread_line"></div>
                        <div class="spread_line"></div>
                  </div>
                  <div><a href="./"><img src="content/img/linktube_s.png"></a></div>
            </div>
            <ul>

<?php
            $hr="Main";
            foreach($sidebar as $s) :
                  if ($hr != $s['category']) :
?>
                  </ul>
            <hr>
                  <ul>
                        <span><?=$s['category']?></span>
<?php
                        $hr=$s['category'];
                  endif;
?>
            
                  <a class="sidebar_button" href="?page=<?=$s['page-link']?>">
                        <li>
                              <div class="block">
                                    <?=$s['icon']?>
                                    <span class="side-menu"><?=$s['name']?><span>
                              </div>
                        </li>
                  </a>
            
            
          
<?php
            endforeach;
?>
            </ul>
      </nav>      
</sidebar>

