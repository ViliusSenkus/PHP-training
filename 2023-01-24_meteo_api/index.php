<?php
      if (!is_dir("meteo")){
      mkdir("meteo");
      }


     echo '<script>
                              const a = "https://api.meteo.lt/v1/places/vilnius/forecasts/long-term";

                              fetch(a)
                              .then(res=>res.json())
                              .then(res=>{
                                    console.log(res);
                                    document.write(res.forecastTimestamps[0].airTemperature);
                                    }
                              
                              );
                        </script>';


      if(!is_file('meteo/meteo.txt')){
            file_put_contents('meteo/meteo.txt', 'Tai yra iš PHP įdėtas tekstas, pridedamas kai failas sukuriamas pirmą kartą');
      }

      // file_put_contents('meteo/meteo.txt', 'pridedu dar teksto');
      file_put_contents('meteo/meteo.txt', " dar biski tekso",FILE_APPEND )
?>