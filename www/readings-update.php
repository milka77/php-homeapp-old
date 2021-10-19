<?php

include('includes/header.php');
require_once('../db_config.php');

if(!isset($_GET['id'])) {
  header('Location: readings.php');
  die();

} else {
  $id = filter_var($_GET['id'], FILTER_VALIDATE_INT);
  $updateType = filter_var($_GET['meter-type'], FILTER_SANITIZE_STRING);

  if($updateType == 'gas') {
    $updateType = 'readings_gas';

  } else if ($updateType == 'elect') {
    $updateType = 'readings_elect';
  }

  if(!$id) {
    header('Location: readings.php');
    die();

  } else {
    $updateQuery = "SELECT * FROM $updateType where id = :id LIMIT 1";
    $updateResult = $db_connection->prepare($updateQuery);
    $updateResult->execute([
      'id' => $id
    ]);
    $updateResult = $updateResult->fetch();
  }
}

?> 


<div class="container w-50 mt-5">
    <h1 class="text-center">Update Your Meter Readings</h1>
    <hr>

    <!-- Form -->
    <form action="readings-add.php" method="POST">
      <div>
        <label for="meter-type">Select Your Meter Type <span class="text-danger">*</span></label>
        <select class="form-control" name="meter-type" id="meter-type">
          <?php if($updateType == 'readings_elect') { ?>
            <option value="readings_elect" selected>Electricity</option>
            <option value="readings_gas">Gas</option>

          <?php } else { ?>
            <option value="readings_elect">Electricity</option>
            <option value="readings_gas" selected>Gas</option>

          <?php } ?>
        </select>
      </div>
      <div class="mt-2">
        <label class="" for="reading">Meter Reading: <span class="text-danger">*</span></label>
        <input class="form-control" type="number" name="reading" id="name" required value="<?php echo $updateResult['reading'] ?>"> 
      </div>
      <div class="mt-2">
        <label for="ingredients">Date of Reading: <span class="text-danger">*</span></label>
        <input class="form-control" type="date" name="date" value="<?php echo $updateResult['date'] ?>">
      </div>
      <div class="text-center pt-3 pb-3">
        <input class="btn btn-dark px-5" type="submit" value="Add" name="submit">
      </div>
    </form>
  </div>


<?php 

if(isset($_POST['submit'])) {

  $meterType = $_POST['meter-type'];
  $reading = $_POST['reading'];
  $date = $_POST['date'];

  $checkReadingLength = strlen($reading);
  
  if($checkReadingLength > 8){
    echo '<div class="container w-50 mt-3">
            <div class="alert alert-danger text-center" role="alert">
              Please check your entered meter readings is should be less than 8 digits!!
            </div>
          </div>';

  } else {
    
    // Get the last reading from the DB
    $lastReadingQuery = "SELECT * FROM $meterType ORDER BY id DESC LIMIT 1";
    $lastReading = $db_connection->query($lastReadingQuery);
    $lastReading = $lastReading->fetch(PDO::FETCH_ASSOC);

    //Counting the difference between new and last reading
    $difference = $reading - $lastReading['reading'];

    //database query
    $query = "INSERT INTO $meterType (id, reading, date, difference)
              VALUES(NULL, :reading, :date, :difference)";
    $result = $db_connection->prepare($query);
    $result->execute([
      'reading' => $reading,
      'date' => $date,
      'difference' => $difference
    ]);
    $rowsAdded = $result->rowCount();

    //Closing DB connection
    $db_connection = NULL;

    echo '<div class="container w-50">
            <div class="alert alert-success text-center" role="alert">
              Your meter reading was updated succesfuly.
            </div>
          </div>';
  }
  
}


?>
