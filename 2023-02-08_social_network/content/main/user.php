<div id="bigPicture"></div>
<?php

$json = file_get_contents($JSONmessages);
$messages = json_decode($json, true);
$json = file_get_contents($JSONusers);
$users = json_decode($json, true);
rsort($messages);
$json = json_encode($messages);
file_put_contents($JSONmessages, $json);

foreach($messages as $key=>$value){
?>

<article>
      <div class="box">
            <div class="article_name">
                  <div class="avatar">
                        <div class="postUser">
                              <?php 
                              foreach ($users as $usr){
                                    if ($usr['user']===$value['user']){
                                          $avatar = $usr['logo'];
                                          break;
                                    }
                              }
                              ?>
                              <img src="<?=$avatar?>" alt="unknown" />
                        </div>
                        <h4>
                              <?=$value['user']?>
                        </h4>
                  </div>
                  <h3>
                        <?=$value['title']?>
                  </h3>
                  <div class="main_info">
                     
                        <div>
                              <div>
                                    <?=$value['topic']?>
                              </div>
                              <div>
                                    <?=$value['date']?>
                              </div>
                        </div>
                  </div>
            </div>
            <div class="article_content">
                  <div class="article_photo">
                        <img class="resize" src='<?=$value['photo']?>' alt="nuotrauka" />
                  </div>
                  <div>
                        <?=nl2br($value['text'])?>
                  </div>
            </div>
            <div class="article_footer">
                  <a href="?like=true&post=<?=$key?>">
                        <img src="content/main/like128.png" alt="likes">
                        <span><?=$value['likes']?><span>
                  </a>
            </div>
      </div>
</article>

      <?php if($key >= 10){
            break;
      }
}
?>