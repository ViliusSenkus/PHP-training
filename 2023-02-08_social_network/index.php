<?php
session_start();

      //Enabling data base
      // !!!!!!!!!!!!!!!!!!!!! Should  transform in to MySQL DB !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
      $JSONmessages = 'data/messages.json';
      $JSONusers = 'data/users.json';
      if (!file_exists($JSONmessages) || !file_exists($JSONusers)){
            file_put_contents($JSONmessages, "");
            file_put_contents($JSONusers, "");
      }
      //data reading from JSON: ////////////////////////////////
            $json = file_get_contents($JSONmessages);
            $messages = json_decode($json, true);
            $json = file_get_contents($JSONusers);
            $users = json_decode($json, true);

      //Setting initial variables:
      // $_SESSION['user'] = "";
      // $_SESSION['log'] = false;
    
      /*
            -----------------Description of variables:-------------------
            $messages - extracted json object gathered all messages info
            $users - extracted json object gathered al users info
            $_SESSION['user'] - connected user;
            $_SESSION['log'] - boolean showing if user is connected (true-connected, false-disconnected);
            $_GET['new'] - identifier to show  form. Value - "new".
            $_GET['log'] - identifier to show user log in or new user creation form. Values: 
                                                                              "log" - for login;
                                                                              "new" - for new user creation;
                                                                              "off" - to logoff;
                                                                              "txt" - for new post creation;
            $_POST['newName'] - newly created user name
            $_POST['newPassword'] - newly created user pasword
            $_POST['avatar'] - link to user avatar
            $_POST['logUser'] - Logging in name
            $_POST['logPsw'] - Logging in password

            JSON files concept:
            users:
                  user,
                  psw,
                  logo,
            messages:
                  user,
                  date,
                  topic,
                  title,
                  text,
                  likes,
                  photo.

                        
            ----------------All activities goes in to this section---------------
            
            //Log in ///////////////////////////////////////////////////
            
      */

      if (!empty($users)&&
            isset($_POST['logUser']) &&
                  $_POST['logUser'] != "" &&
            isset($_POST['logPsw']) &&
                  $_POST['logPsw'] != ""){
                  foreach ($users as $value){
                        if ($_POST['logUser']===$value['user'] && md5($_POST['logPsw'])===$value['psw']){
                              $_SESSION['user']=$_POST['logUser'];
                              $_SESSION['log']=true;
                        header('Location: ./');
                        }
                  }            
      }
      
            //New user creation//////////////////////////////////////////////

      if (isset($_POST['newName']) &&
            $_POST['newName'] != "" &&
      isset($_POST['newPassword']) &&
            $_POST['newPassword'] != ""){
            
            //!!!!!!!!!!!!!!!!!!!!!!reikia pridėti validaciją ir pasikartojimų negalėjimą.
            
            //automatic avatar adding (70 avatars avialable at page ctreation moment, no limit added).
            if (empty($users)) {
                  $x = "1";
            } else {
                  $x = count($users)+1;}
            $newUser = array(
                  'user' => $_POST['newName'],
                  'psw' => md5($_POST['newPassword']),
                  'logo' => "https://i.pravatar.cc/400?img=$x"
            );

            // 
            $users[] = $newUser;
            $json = json_encode($users);
            file_put_contents($JSONusers, $json);
            header('Location: ./');
      }

            //Lof off ////////////////////////////////////////////////
            
            if(isset($_GET['log']) && $_GET['log']==='off'){
                  $_SESSION['user'] = '';
                  $_SESSION['log'] = false;
                  header('Location: ./');
            }

            //New Post /////////////////////////////////////////////
            $mimeTypes=array(
                  "image/jpeg",
                  "image/gif",
                  "image/png",
                  "image/webp"
            );
            $pic = "data/photoLink.jpg";

            if(isset($_POST["title"]) && $_POST['title'] != ""){
                  if (  isset($_FILES['photo'])
                        && $_FILES["photo"]["tmp_name"] != ""
                        && in_array (mime_content_type($_FILES["photo"]["tmp_name"]), $mimeTypes)
                        ){
                              $newFileAddress="data/".$_FILES["photo"]["name"];
                              move_uploaded_file($_FILES["photo"]["tmp_name"], $newFileAddress);
                              header('Location: ./');
                              $pic = $newFileAddress;
                        }
                  $post = array(
                        "date" => date("Y-m-d H:i:s"),
                        "user" => $_POST['user'],
                        "topic" => $_POST['topic'],
                        "title" => $_POST['title'],
                        "text" => $_POST['text'],
                        "likes" => 0,
                        "photo" => $pic,
                        // photo adding to data folder and naming should be done.
                  );
                  $messages[]=$post;
                  $json=json_encode($messages);
                  file_put_contents($JSONmessages, $json);
                  header('Location: ./');
            }
            
            //Adding likes/////////////////////////////////////////////
            
            if (isset($_GET['like']) && $_GET['like'] == "true"){
            $messages[$_GET['post']]['likes']+=1;
            $json = json_encode($messages);
            file_put_contents($JSONmessages, $json);
            header('Location: ./');
            }
?>

<!DOCTYPE html>
<html lang="en">
<head>
      <meta charset="UTF-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
      <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;300;600;900&display=swap" rel="stylesheet" />
      <link rel="icon" href="content/logo.png" />
      <link rel="stylesheet" href="content/style.css" />
      <title>OneForFourNet</title>
</head>
<body>

      <header> 
            <?php
                 include("content/header.php");
            ?>
      </header>
      <main>
            <?php
            //reikalingas patikrinimas ar yra nors vienas įrašas ir jeigu yra rodyti main.php, jeigu nėra pasisveikinimo puslapį.
            if (isset($messages) && count($messages)>0){
                  include('content/main/main.php');
            }else{
                  echo "<h2>
                   Hallo, be the first to post on this site. Just Log in or Sign up if you allready haven't done this
                   </h2>";
            }
            
            ?>
      </main>
      <footer>
            <?php
            include("content/footer.php");
            ?>
      </footer>
</body>
</html>