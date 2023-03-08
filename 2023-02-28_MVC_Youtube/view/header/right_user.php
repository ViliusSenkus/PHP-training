<?php

namespace View\Header;
$avatar=$_SESSION['avatar'];

?>
<div>
      <span class="material-symbols-outlined">
            notifications_active
      </span>
    
</div>
<div class="avatar">
      <img src="content/avatars/<?=$avatar?>" alt="logo"/>
      <div><?=$_SESSION['user']?></div>
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