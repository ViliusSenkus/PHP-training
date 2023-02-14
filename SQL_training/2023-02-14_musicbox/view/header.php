<!DOCTYPE html>
<html lang="en">
<head>
      <meta charset="UTF-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <meta author="Vilius Senkus" />

      <link rel="stylesheet" href="content/style.css" />
      <linl rel="icon" href="content/logo.png" />
      <title>MusicBox</title>
</head>
<body>
      <header>
            <h1>Spotify type music playlists web page</h1>
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
                  }else{
                  ?>
                        <a href="./?action=login" />
                              <li>
                                Log In   
                              </li>
                        </a>
                  <?php
                  }
                  ?>
                        <a href="./?action=sign" />
                              <li>
                                Sign up    
                              </li>
                        </a>
                        
                  </ul>
            </nav>
      </header>