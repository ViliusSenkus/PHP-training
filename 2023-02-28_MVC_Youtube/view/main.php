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
                              $seconds = ($nowdate-$videodate);

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
                              }elseif(floor($seconds/(60)) < 1){
                                    $passedTime=floor($seconds/(60))." minutes ago";
                              }
                              
                              echo $passedTime;
                              
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