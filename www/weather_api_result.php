<?php 
  include('includes/header.php'); 
  include('../api_config.php');

  if(isset($_POST['submit'])) {
    $city = $_POST['city']; 
    
  }
  
  $weather_data = [];

  if(!empty($city)) {
    $api_url = 'https://api.openweathermap.org/data/2.5/weather?q=' . $city . '&appid=' . $openWeatherApiKey . '&units=metric';

    $weather_data = json_decode(file_get_contents($api_url), true);    
  }

  // 'echo '<pre>';
  // print_r($weather_data);'

?>

<div class="container pt-5 mt-3">
  
  <h1 class="text-center mb-4">Weather API</h1>

  <div class="row">
    <div class="col-6 mx-auto">
      <form class="my-5" action="" method="POST">
        <input class="form-control mb-2" type="text" name="city" placeholder="Enter a city name">
        <input class="btn btn-block btn-dark" type="submit" name="submit" value="Find City"> 
      </form>

    </div>
  </div>

  <?php 
  if(!empty($weather_data)) { 
    ?>
    <div class="weather_data">
      <h3>Weater in <?php echo $weather_data['name']; ?></h3>

      <table class="table">
        <thead>
          <td>City</td>
          <td>Counrty</td>
          <td>Temp</td>
          <td>Weather</td>
          <td>Wind</td>
        </thead>

        <tbody>
          <td><?= $weather_data['name']; ?></td>
          <td><?= $weather_data['sys']['country']; ?></td>
          <td><?= $weather_data['main']['temp']; ?> &#8451</td>
          <td><?= $weather_data['weather'][0]['main'] . ' (' .  $weather_data['weather'][0]['description'] . ')' . '<br>' . $weather_data['weather'][0]['icon']; ?></td>
          <td><?= $weather_data['name']; ?></td>
        </tbody>
      </table>
    </div>
    <?php
  } else {
    echo '<p class="text-center">Something went wrong</p>';
  }

  ?>
</div>

<!-- End of .container-fluid from header.php -->
</div> 

<?php include('includes/footer.php'); ?>