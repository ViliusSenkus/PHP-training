<!DOCTYPE html>
<html lang="en">
<head>
      <meta charset="UTF-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <meta author="Vilius Senkus" />

      <link rel="stylesheet" href="content/style.css" />
      <linl rel="icon" href="content/img/logo-min.png" />
      <title>MusicBox</title>
</head>
<body>
      <header>
            <div class="logo">
                  <img src="content/img/logo.png" alt="spotivil" />
                  <h1>Spotify type web page<br />
                        <span> for music playlists creation<span>
                  </h1>
            </div>
            <nav>
                  <ul>
                  <?php
                     if (!empty($_SESSION) && $_SESSION['user'] != ""){?>
                        
                        <a href="./?action=logof" />
                              <li>
                                Log Off  
                              </li>
                        </a>
                  <?php 
                  }elseif(isset($_GET['action']) && $_GET['action']=='login'){
                        
                  }else{
                  ?>
                        <a href="./?action=login" />
                              <li>
                                Log In   
                              </li>
                        </a>
                  <?php
                  }
                  if (isset($_GET['action']) && $_GET['action']=='sign'){
                        
                  }else{
                  ?>
                        <a href="./?action=sign" />
                              <li>
                                Sign up    
                              </li>
                        </a>
                  <?php
                  }
                  ?>
                        
                  </ul>
            </nav>
      </header>