<?php 
  include('includes/header.php'); 
  include('../api_config.php');

  if(isset($_POST['submit'])) {
    $city = $_POST['city']; 
    $api_url = 'https://api.openweathermap.org/data/2.5/weather?q=' . $city . '&appid=' . $openWeatherApiKey . '&units=metric';
    $weather_data = json_decode(file_get_contents($api_url), true);

  }

  $weather_map_url = 'https://tile.openweathermap.org/map/precipitation_new/{z}/{x}/{y}.png?appid='.$openWeatherApiKey;

?>

<div class="container pt-5 mt-3">
  
  <h1 class="text-center">Weather API</h1>


  <form class="mt-5" action="" method="POST">
    <input type="text" name="city" placeholder="Enter a city name">
    <input type="submit" name="submit" value="Find">
  </form>

  <hr/>
  <div id="openweathermap-widget-11"></div>
    <script src='//openweathermap.org/themes/openweathermap/assets/vendor/owm/js/d3.min.js'></script>
    <script>
      window.myWidgetParam ? window.myWidgetParam : window.myWidgetParam = [];
      window.myWidgetParam.push({id: 11,cityid: '2639912',appid: '9b002eaa45ff67e378f1e41da55cee7e',units: 'metric',containerid: 'openweathermap-widget-11',  });
      (function() {var script = document.createElement('script');script.async = true;script.charset = "utf-8";
      script.src = "//openweathermap.org/themes/openweathermap/assets/vendor/owm/js/weather-widget-generator.js";
      var s = document.getElementsByTagName('script')[0];s.parentNode.insertBefore(script, s);  })();</script>
  <hr/>

  <div class="weather-map">

  </div>
  
  <?php if(isset($weather_data)){
   
    echo "<div class='weather_data'>
    <h3 class='mt-5'>Current weather in " . $weather_data['name'] . "</h3>
    
  
    <table class='table'>
      <thead>
        <td>City</td>
        <td>Counrty</td>
        <td>Temp</td>
        <td>Weather</td>
        <td>Wind Speed</td>
        <td>Wind Direction</td>
      </thead>

      <tbody>
        <td>". $weather_data['name'] ."</td>
        <td>". $weather_data['sys']['country']."</td>
        <td>". intval($weather_data['main']['temp'])."</td>
        <td>". $weather_data['weather'][0]['main'] . ' (' .  $weather_data['weather'][0]['description'] . ')'."</td>
        <td>". $weather_data['wind']['speed']."</td>
        <td>". $weather_data['wind']['deg']."</td>
      </tbody>
    </table>
  </div>";
  }
  ?>
    <!-- <div class='weather-widget'>
      <span class='city-name'>" . $weather_data['name'] . ", " . $weather_data['sys']['country'] ."</span>
      <hr class='bg-white m-0'>
      </div> -->
</div>

<!-- End of .container-fluid from header.php -->
</div> 

<?php include('includes/footer.php'); ?>