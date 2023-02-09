<?php

$json = file_get_contents($JSONmessages);
$messages = json_decode($json);

foreach($messages as $key=>$value){
?>
<article>
      <div class="box">
            <div class="article_name">
                  <div class="avatar">
                        <img src="./content/logo.png" alt="unknown" />
                        <h4>
                              <?=$value ->user?>
                        </h4>
                  </div>
                  <div class="main_info">
                        <h3>
                              <?=$value ->title?>
                        </h3>
                        <div>
                              <div>
                                    <?=$value->topic?>
                              </div>
                              <div>
                                    <?=$value->date?>
                              </div>
                        </div>
                  </div>
            </div>
            <div class="article_content">
                  <div class="article_photo">
                        <img src="<?=$value->photo?>" alt="" />
                  </div>
                  <div>
                        <?=substr($value->text,15)?>...
                  </div>
            </div>
            <div class="article_footer">
                  <a href="?like=true&post=<?=$key?>">
                        <img src="like.png" alt="likes">
                        <?=$value->likes?>
                  </a>
</a>
            </div>
      </div>
</article>
      <?php if($key >= 5){
            break;
      }
}

?>