<div class="header">
      <h1>
            144net<br />
            <span><strong>One for Four </strong></span>
      </h1>
      <ul>

<?php
// -----------------------------------Veiksmai kai vartotojas neprisijungęs------------------------
      if (!isset($_SESSION) || empty($_SESSION['user']) || $_SESSION['log']===false) {
?>
            <li id="new">
                  <a href="?log=new">
                        Sign Up
                  </a>
            </li>
            <li id="log">
                  <a href="?log=log">
                        Log In
<?php
// --------------------------------Veiksmai kai vartotojas prisijungęs------------------------------
} else {?>
            <li>
                  <a href="?log=off">
                        Log Off
                  </a>
            </li>
            <li>
                  <a href="?log=txt">
                        New Post
<?php } ?>
                  </a>
            </li>
      </ul>
</div>
<div id="advert" style="letter-spacing: -1px;">A social network that allows you to post messages of up to 144 characters to the world.</div>
      
      





<div class="headform">
      <form method="post">
            
<?php     
                  //---------------------------SING IN and LOG IN forms------------------------
      if (isset($_GET['log']) && $_GET['log'] != ""){
            switch ($_GET['log']) {
                        case 'new': //form for new user
                        ?>      
                              <label>User Name</label>
                              <input type="text" name="newName" required />
                              <label>Password</label>
                              <input type="text" name="newPassword" required />
                              <div>
                                    Notice: avatar will be appointed to you automatically
                              </div>
                              <button type="submit">Create new user</button>
                        <?php
                              break;
                        case 'log': //form to log in
                              ?>
                              <label>User Name</label>
                              <input type="text" name="logUser" required />
                              <label>Password</label>
                              <input type="text" name="logPsw" required />
                              <button type="submit">Log In</button>
                        <?php
                              break;
                        case 'txt': //form for new post
                        ?>
                              <label>Headline</label>
                              <input type="text" name="title" required/>
                              <label>Subject of the entry</label>
                              <input type="text" name="topic" />
                              <label>Picture</label>
                              <input type="file" name="photo" />
                              <label>Post text here</label>
                              <textarea type="text" name="text" required>
                                    Up to 144 characters of text goes here
                              </textarea>
                              <button type="submit">Announce to the world</button>
                              <input type="hidden" name="user" value="<?=$_SESSION['user']?>" />
                              <?php break;
                        default:
                              die();
            }

      }?>
      </form>
</div>