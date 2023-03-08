<main>

<?php
      include 'view/main/actual.php';
?>

<div class="video-page">

      <div class="video-box">

            <h2>
                  <?=$videoList['video']['name']?>;
            </h2>
            
            <iframe src="<?=$videoList['video']['video_url']?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; gyroscope" allowfullscreen></iframe>
            
            <div class="video-actions">
                  <div>
                        <div class="user-logo">
                              <img src="content/avatars/<?=$videoList['user']['avatar']?>" alt="user logo" />
                        </div>
                        
                        <div>
                              <h4>
                                    <?=$videoList['user']['nickname']?>
                              </h4>

                              <a href="#">
                                    <div class="user-action-button">
                                          follow/following/none
                                    </div>
                              </a>
                        </div>
                        
                  </div>
                  <div>
                        <a href="#">
                              <span class="material-symbols-outlined">
                                    thumb_up
                              </span>
                        </a>
                        <a href="#">
                              <span class="material-symbols-outlined">
                                    playlist_add
                              </span>
                        </a>
                        <a href="#">
                              <span class="material-symbols-outlined">
                                    hourglass_empty
                              </span>
                        </a>
                  </div>
            </div>
            
            <div class="video-stat">
                  <div>
                        views No...
                  </div>
                  <div>
                        Added on <?=$videoList['video']['date_added']?>
                  </div>
            </div>
            
            <h3>Video description</h3>
            <div class="video-description">
                  
                  <span>
                        description
                  </span>
            </div>

            <h3>Comments</h3>
            <a href="#">
                  <span class="material-symbols-outlined">
                        add_comment
                  </span>
            </a>
            <div class="video-coments">
                  
                  <div>
                        
                  </div>
                  <div class="user-coment">
                        <div >
                              <h5>name</h5>
                              <h6>Date</h6>
                              <img class="avatar" src="content/avatars/..." alt="commenter logo" />
                        </div>
                        <div>
                              
                              <span>Komment</span>
                        </div>
                  </div>
            </div>


      </div>

      <div class="side-videos">
            VideoList aside
      </div>
</div>
</main>
<?php

      echo"<pre>";
      print_r($videoList);
?>
