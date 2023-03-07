<main>

<?php
      include 'view/main/actual.php';
?>

<div class="video-page">



      <div class="video-box">

      <?php
            foreach($videoList as $key=>$value) :
                  if ($_GET['id'] != $value['id'])
                        continue;
      ?>
            <h2>
                  <?=$value['name']?>;
            </h2>
            
            <iframe src="<?=$value['video_url']?>">
                  
            </iframe>
            
            <div class="video-actions">
                  <div>
                        <img src="content/avatars/..." alt="user logo" />
                        User name
                        subscribers number
                        subscribe
                  </div>
                  <div>
                        Like
                        Add to playlist
                        Add to waiting list
                  </div>
            </div>
            
            <div class="video-stat">
                  views, date added
                  description
            </div>

      <?php
            endforeach;
      ?>

            <div class="video-coments">
                  <div>
                        Add coment
                  </div>
                  <div class="user-coment">
                        <div>
                              <img src="content/avatars/..." alt="commenter logo" />
                        </div>
                        <div>
                              <h6>name</h6>
                              <span>Komment</span>
                        </div>
                  </div>
            </div>


      </div>
      <div class="side-videos">

      </div>
</div>

<?php

      echo"<pre>";
      print_r($videoList);
?>
</main>