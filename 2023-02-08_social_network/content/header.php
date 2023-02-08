<div class="header">
      <h1>
            144net<br />
            <span>One for Four social network, alows messages up to 144characters</span> 
      </h1>


<?php
      if (empty($_SESSION['user']) || $_SESSION['log']===false) {
            ?>
            <form>
                  <ul>
                        <li>
                              <a href="?log=new">
                                    Sign In
                              </a>
                        </li>
                        <li>
                              <a href="?log=log">
                                    Log In
                              </a>
                        </li>
</div>                    
<div class="headform">
<?php     
                  //---------------------------SING IN arba LOG IN forma------------------------
      if (isset($_GET['log']) && $_GET['log'] != ""){
            switch ($_GET['log']) {
                        case 'new':
                        ?>
                              <form method="POST">
                                    <label>User Name</label>
                                    <input type="text" name="newName" required />
                                    <label>Password</label>
                                    <input type="text" name="newPassword" required />
                                    <button type="submit">Create new user</button>
                              </form>
                        <?php
                              break;
                        case 'log':
                              ?>
                              <form method="POST">
                                    <label>User Name</label>
                                    <input type="text" name="logUser" required />
                                    <label>Password</label>
                                    <input type="text" name="logPsw" required />
                                    <button type="submit">Log In</button>
                              </form>
                        <?php
                              break;
            }

      }

} else {
            ?>
</div>    
<?php 
      echo "prisijungęs";
      //reikia atrinkinėti kas per useris.
      } 


      
?>
