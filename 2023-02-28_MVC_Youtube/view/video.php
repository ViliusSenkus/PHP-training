<style>
      .video-categories-list{
            display: inline-block;
            padding:2px 5px;
            background-color: #f1f1f1;
            border-radius: 5px;
            margin: 5px;
            text-decoration: none;
            color: #5d5d5d;
      }
      #add-comment:hover{
            cursor: pointer;
      }
      #comment-form form{
            display:flex;
            flex-direction: column;
            width: 450px;
      }
      #comment-form form input{
            width:450px;
            margin-bottom: 5px;
      }
      #comment-form form textarea{
            resize: none;
            padding: 10px;
            height: 100px;
            width: 450px;
      }
      #comment-form form button{
            margin:10px;
            align-self: center;
            width:150px;
            padding: 2px 0;
      }
      .user-coment{
            margin : 5px;
            padding: 5px;
            box-shadow: inset 0 0 5px grey;
      }
      .comment-data{
            width:100px;
      }
      .coment-text{
            margin:1px;
            padding:5px;
            background-color: #f1f1f1;
            width:100%
      }


</style>


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
            
            <div>
                  <?php
                        foreach ($videoList['categories'] as $v) :
                  ?>
                        <a class='video-categories-list' href="?category=<?=$v['id']?>">
                              <span >
                                    <?=$v['category']?>
                              </span>
                        </a> 
                  <?php
                        endforeach;
                  ?>
            </div>      


            <h3>Video description</h3>
            <div class="video-description">
                  
                  <span>
                        description
                  </span>
            </div>

            <h3>Comments</h3>
            
                  <span id="add-comment" class="material-symbols-outlined">
                        add_comment
                  </span>
                  
                  <div id="comment-form">
                        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                              
                              <?php
                                    if (!isset($_SESSION['id'])){
                              ?>
                                    <label>
                                          Name:
                                    </label>
                                    <input type="text" name="commenter" />
                                    
                              <?php
                                    }else{
                                          $userId=$_SESSION['id'];
                                          $user=$_SESSION['user'];
                              ?>
                                    <input type="text" name="commenter" value="<?=$userId?>" hidden />
                                    <input type="text" name="registered" value="1" hidden />
 
                                    <div class="user-logo">
                                          <img src="content/avatars/<?=$_SESSION['avatar']?>" alt="user logo">
                                          <h4>
                                                <?=$user?>
                                          </h4>
                                    </div>    
                              <?php
                                    }
                              ?>
                              <label>
                                    Comment:
                              </label>
                              <textarea name="comment" maxlength="200" wrap="hard"></textarea>

                              <input type="text" name="act" value="new_commnet" hidden />
                              <input type="text" name="video_id" value="<?=$videoList['video']['id']?>" hidden />
                              <button type="submit">Comment</button>
                        </form>

                  </div>
            
            <div class="video-coments">
                  
<?php     
            foreach($videoList['comments']as $k=>$v) :
?>
                  <div class="user-coment">
                        <div class="user-logo">
                              <img src="content/avatars/<?=$v['avatar']?>" alt='commenter logo' />
                        </div>
                        <div class="comment-data">
                              <h5><?=$v['commenter']?></h5>
                              <h6><?=$v['date_added']?></h6>

                        </div>
                        <div class="coment-text">
                              
                              <span><?=$v['comment']?></span>
                        </div>
                  </div>


                  <!-- 
    [id] => 2
    [video_id] => 1
    [commenter] => user
    [registered] => 1
    [comment] => Nesamone kažkokia, strikalioja po scena, bėgioja kaip 
nuplyšusi.
    [date_added] => 2023-03-08 17:41:38
    [avatar] => Avatar-2.png
                   -->
            
<?php
            endforeach;
?>
            </div>


      </div>

      <div class="side-videos">
            VideoList aside
      </div>
</div>
</main>