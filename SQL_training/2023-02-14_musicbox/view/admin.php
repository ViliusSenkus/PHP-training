<h2>Jūs esate admino puslapyje</h2>

<nav>
      <ul>
            <a href="./?act=song">
                  <li>New song</li>
            </a>
            <a href="./?act=album">
                  <li>New Album</li>
            </a>
            <a href="./?act=perform">
                  <li>New Performer</li>
            </a>
            <a href="./?act=pllist">
                  <li>New Playlist</li>
            </a>
      </ul>
</nav>

<?php
      if (isset($_GET['act']) && $_GET['act'] !=""){
            $case=$_GET['act'];

            switch ($case){
                  case "song":
                        include "form/admin/song.html";
                        break;
                  case "album":
                        include "form/admin/album.html";
                        break;
                  case "perform":
                        include "form/admin/performer.html";
                        break;
                  case "pllist":
                        include "form/admin/playlists.html";
                        break;
                  default:
                        die();
            }
      }

?>
