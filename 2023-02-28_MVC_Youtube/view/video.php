<style>
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
                              <label>
                                    Name:
                              </label>
                              <input type="text" name="comment_name" />
                              <label>
                                    Comment:
                              </label>
                              <textarea name="comment_text" maxlength="200" wrap="hard"></textarea>
                              <button type="submit">Comment</button>
                        </form>

                  </div>
            
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
<script>
      document.querySelector("#comment-form").style.display="none";
      document.querySelector("#add-comment").addEventListener('click', ()=>{
            if(document.querySelector("#comment-form").style.display=="block"){
                  document.querySelector("#comment-form").style.display="none";
            }else{
                  document.querySelector("#comment-form").style.display="block";
            };
      })
</script>