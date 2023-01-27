const a = "https://api.meteo.lt/v1/places/vilnius/forecasts/long-term";

fetch(a)
.then(res=>res.json())
.then(res=>{
      console.log(res);
      document.querySelector('div').innerHTML=res.forecastTimestamps[0].airTemperature;
      }

);