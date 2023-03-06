<?php
      
      namespace View; 

?>

<main>

<?php
      
      include "view/main/actual.php";
       // echo "<pre>";
       // print_r($videoList);
?>
      <div class="row-videos">      
<?php

      foreach ($videoList as $video) :
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
                                    <img class="video-user" src="content/avatars/Avatar-<?=$video['user']?>.png" ald="user_avatar" />
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
                              $seconds = ($nowdate-$videodate+(2*60*60));

                              $secs = floor($seconds % 60);
                              $mins = floor($seconds /60 % 60);
                              $hours = floor($seconds / (60*60*24));
                              $days = floor($seconds / (24 * 60 * 60) % 60);
                              
                              if ($days>1){
                                    echo "$days d ago";
                              }elseif($hours>1){
                                    echo "$hours h ago";
                              }elseif($mins>1)
                                    echo "$mins min ago";
                              else{
                                    echo "$secs s ago";
                              }
                        ?>
                              </span>
                        </div>
                  </div>
            </div>
     
      
<?php
      endforeach;
?>
 </div>


      <h4> other views to show instead of this one (main): </h4>
            <ul>Like:
                  <li>video - for one video play</li>
                  <li>shorts - for short video list - how are they played directly or in separate window?</li> others from sidemenu;
            </ul>
         
</main>