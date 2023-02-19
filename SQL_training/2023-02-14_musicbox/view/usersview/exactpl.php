<div class="my-playlists">
Your playlists:
<?php 
      $sqlrequest=$sql->query("SELECT * FROM songs");
      $json=$sqlrequest->fetch_all();
      $lenght=count($json);
      foreach ($playlist as $key=>$value){ //playlistų pavadinimai su dainų numeriais
            foreach ($value as $songnumber){ //dainų konkrečiame playliste numeriai
                  for($i=0; $i<=$lenght; $i++){ //dainos numerio paieskai songs duomenų bazėje
                        if($songnumber==$json[$i][0]){
                              echo $json[1]; //atlik4jas
                              echo $json[2]; //daina
                              

                        }

         
            
//--------------------   MAŽDAUG IKI ČIA ------------------------
// --------DUOMENŲ SURINKIMAS VIRŠUJE-----------

            $x=1; //for playlist picture (to get first song picture);
            if ($x===1){
                  $song=14;
            }
      }
}
      $songs=json_decode($json,true);
      echo "<br />".$key." - ".count($value)." song(s)" ;
      print_r($value);
}

?>
      <div class="playlist-box">
            <div class="playlist-logo">
                  <img  src="" alt="" />
            </div>
            <div class="playlist-name">
                  Playlist name
            </div>
            <div class="playlist-play">
                  <a href="<?=$songdata[6]?>" target="blank">
                        <span class="material-symbols-outlined">
                              play_circle
                        </span>
                  </a>
            </div>
      </div>
</div>