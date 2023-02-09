<?php

$json = file_get_contents($JSONmessages);
$messages = json_decode($json, true);
$json = file_get_contents($JSONusers);
$users = json_decode($json, true);
rsort($messages);

foreach($messages as $key=>$value){
?>
<article>
      <div class="box">
            <div class="article_name">
                  <div class="avatar">
                        <?php 
                        foreach ($users as $usr){
                              if ($usr['user']===$value['user']){
                                    $avatar = $usr['logo'];
                                    break;
                              }
                        }
                        ?>
                        <img src="<?=$avatar?>" alt="unknown" />
                        <h4>
                              <?=$value['user']?>
                        </h4>
                  </div>
                  <div class="main_info">
                        <h3>
                              <?=$value['title']?>
                        </h3>
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
                        <img src='<?=$value['photo']?>' alt="nuotrauka" />
                  </div>
                  <div>
                        <?=$value['text']?>
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