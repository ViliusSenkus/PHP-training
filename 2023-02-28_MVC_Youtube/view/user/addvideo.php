<style>
      #user-add-video-page{
            margin: 20px 0;
      }
      #user-add-video-page form{
            display:flex;
            flex-direction: column;
            width:600px;
      }
      #user-add-video-page input{
            padding:2px;
      }
      #user-add-video-page h4{
            margin-top:15px;
      }
      #user-add-video-page .row input{
            width: 400px;
      }
      #user-add-video-page button{
            padding: 5px;
            margin:10px;
            width:100px;
            text-align: center;
      }
      .cats{
            display: flex;
            flex-direction: row;
            justify-content: start;
            flex-wrap: wrap;
      }
      .checkbox{
            padding:3px 10px;
            margin:5px;
            background-color: #f1f1f1;
            border-radius: 5px;
      }
</style>
<div id="user-add-video-page">
      <h3>Fill in form to add a new video</h3>
      <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <label>Video name:</label>
            <input type="text" name="name" />
            <label>Video URL:</label>
            <input type="text" name="video_url" />
            <label>Video image URL:</label>
            <input type="text" name="thumb_url" />
            <div>
                  <h4>Choose Categories from the list</h4>
                  <div class="row">
                        <span>Or add new one</span>
                        <input id="new_cat_input" type="text" name="category" />
                        <span class="material-symbols-outlined">
                              add_box
                        </span>
                  </div>
                  <div class="cats">
            <?php
                  $counter=0;
                  foreach ($categories as $cat) :
                        if ($counter==0) :
            ?>
                        <input type="checkbox" name="category[]" value="<?=$cat['id']?>" checked hidden/>
            <?php
                              $counter++;      
                              continue;
                        endif;                                     
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
            <input type="text" name="user" value="<?$_SESSION['id']?>"hidden/>
            <input type="text" name="userAction" value="userAddVideo" hidden/>
            <button type="submit">Add</button>
      </form>
</div>
      

<script>
      document.querySelector("#new_cat_input").addEventListener('change', (e)=>{
            let newCat=e.target.value;
            newCat=newCat.charAt(0).toUpperCase()+newCat.slice(1);
            
            const spanNode=document.createElement("span");
            const text=document.createTextNode(newCat);
            spanNode.appendChild(text);

            document.querySelector(".cats").appendChild(document.createElement("div"));
            const allDivOfCats = document.querySelectorAll(".cats div");
            const lastDivOfCats = allDivOfCats[allDivOfCats.length-1];
            lastDivOfCats.setAttribute("class", "checkbox");

            const allDivCheck = document.querySelectorAll(".checkbox");
            const lastDivCheck = allDivCheck[(allDivCheck.length)-1];
            lastDivCheck.appendChild(document.createElement("input"));
            lastDivCheck.appendChild(spanNode);
            
            
            const allInputs=document.querySelectorAll(".checkbox input");
            console.log(allInputs);
            const lastInput=allInputs[allInputs.length-1];
            lastInput.setAttribute("type", "checkbox");
            lastInput.setAttribute("name", "new_cat[]");
            lastInput.setAttribute("value", newCat);
            lastInput.setAttribute("checked", "true");

      })
</script>
