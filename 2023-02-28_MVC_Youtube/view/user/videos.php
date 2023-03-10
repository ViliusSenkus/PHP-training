<h3> My Last Videos </h3>

      <div class="row-videos">      
<?php
      $counter=0;
      foreach ($userVideoList as $video) :
?>    
            <div class="video-container">
                  
                  <div>
                        <a href="?page=video&id=<?=$video['id']?>">
                              <img class="video-thumb" src="<?=$video['thumb_url']?>" alt="" />
                        </a>
                  </div>
                
                  <dvi class="video-info">
                        <div>
                              <a href="?user=<?=$video['user']?>">
                              <?php 
                                    $users = new \Model\Users();
                                    $users = $users->get();
                                    $img="";
                                    foreach($users as $user){
                                          if ($user['id']==$video['user']){
                                          $img=$user['avatar'];
                                          break;
                                          }
                                    }
                              ?>
                                    <img class="video-user" src="content/avatars/<?=$img?>" alt="user_avatar" />
                              </a>
                        </div>
                        <div class="video-name">
                              <?=$video['name']?>
                        </div>
                  </dvi>
                  
                  <div class="video-more-info">
                        kanalas <br />
                        <div>
                              <span>perziuriu sk.</span>
                              <span>                    
                        <?php
                              $videodate = strtotime($video['date_added']);
                              $nowdate = strtotime(date('Y-m-d H:i:s'));
                              $seconds = ($nowdate-$videodate)+3600;

                              if (floor($seconds/(60*60*24*365)) >= 1){
                                    $passedTime=floor($seconds/(60*60*24*365))." years ago";
                              }elseif(floor($seconds/(60*60*24*31)) >= 1){
                                    $passedTime=floor($seconds/(60*60*24*31))." months ago";
                              }elseif(floor($seconds/(60*60*24*7)) >= 1){
                                    $passedTime=floor($seconds/(60*60*24*7))." weeks ago";
                              }elseif(floor($seconds/(60*60*24)) >= 1){
                                    $passedTime=floor($seconds/(60*60*24))." days ago";
                              }elseif(floor($seconds/(60*60)) >= 1){
                                    $passedTime=floor($seconds/(60*60))." hours ago";
                              }elseif(floor($seconds/(60)) < 60){
                                    $passedTime=floor($seconds/(60))." minutes ago";
                              }
                              
                              echo $passedTime;
                              
                        ?>
                              </span>
                        </div>
                  </div>
            </div>
     
      
<?php
      $counter++;
      if ($counter >= 8)
            break;
      endforeach;
?>
 </div>
