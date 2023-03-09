<?php

namespace View\Header;
$avatar=$_SESSION['avatar'];

?>
<div>
      <span class="material-symbols-outlined">
            notifications_active
      </span>
    
</div>

<!-- DEV: Nepridetas funkcionalumas - paspaudus ant user logo turi atsirasti userio meniu -->
<div class="avatar" id="header-avatar">
      <img src="content/avatars/<?=$avatar?>" alt="logo"/>
      <div><?=$_SESSION['user']?></div>
      <div id="user-menu" style="display:none;">
            <ul>
                  <li>
                        <a href="?page=user">
                              User page
                        </a>
                  </li>
                  <li>
                        <a href="?page=user&act=addvid">
                              Add video
                        </a>
                  </li>
            </ul>
            
      </div>
</div>
<div>
      <a href="?log=off">
            <span class="material-symbols-outlined">
                  settings_power
            </span>
      </a>
</div>



<!-- headerio uždatymui reikalingi elementai žemiau: -->
            </div>
      </div>
</header>