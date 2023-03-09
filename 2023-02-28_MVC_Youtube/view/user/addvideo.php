<style>
      .cats{
            display: flex;
            flex-direction: row;
            justify-content: start;
      }
      .checkbox{
            padding:3px 10px;
            margin:5px;
            background-color: #f1f1f1;
            border-radius: 5px;
      }
</style>
<div>
      <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <label>Video name:</label>
            <input type="text" name="name" />
            <label>Video URL:</label>
            <input type="text" name="video_url" />
            <label>Video image URL:</label>
            <input type="text" name="thumb_url" />
            
            <div>
                  <h4>Choose Categories</h4>
                  <div class="cats">
            <?php
                  $counter=0;
                  foreach ($categories as $cat) :
            ?>          
                        <div class="checkbox"> 
                              <input type="checkbox" name="category[]" value="<?=$cat['id']?>"/>
                              <span><?=$cat['category']?></span>
                        </div> 
                        
            <?php
                  $counter++;
                  if($counter==10)
                        break;
                  endforeach;    
            ?>
            </div>
            Kategorijos....
            <input type="text" name="user" value="<?$_SESSION['id']?>"hidden/>
            <input type="text" name="userAction" value="userAddVideo" hidden/>
            <button type="submit">Add</button>
      <form>
</div>