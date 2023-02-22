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
<h2> List of songs </h2>
<table>
      <thead>
            <th>#</th>
            <th>Song name</th>
            <th>Performer</th>
            <th>Performer picture</th>
            <th>Album name</th>
            <th>Album picture</th>
            <th>Year</th>
      </thead>
      <tbody>
            <tr>
                  <td></td>
            </tr>
      </tbody>
</table>

<h2> List of users </h2>
<table>
      <thead>
            <th>#</th>
            <th>User name</th>
            <th>eMail</th>
            <th>Sign date</th>
            <th>Plan</th>
            <th>Expire</th>
            <th>Favorites</th>
      </thead>
      <tbody>
            <tr>
                  <td></td>
            </tr>
      </tbody>
</table>

<h2> List of Playlists <h2>
<table>
      <thead>
            <th>#</th>
            <th>Name</th>
            <th>Number of songs</th>
            <th>User</th>
      </thead>
      <tbody>
            <tr>
                  <td></td>
            </tr>
      </tbody>
</table>