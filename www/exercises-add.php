<?php

include('includes/header.php');

?>

<div class="container w-50">
  <h1 class="text-center">Add New Exercise</h1>
  <hr>

  <form action="exercises-add.php" method="POST">
    
    <div class="row">
      <div class="form-group col-6">
        <label for="type">Select the exercise type: <span class="text-danger">*</span></label>
        <select class="form-control" name="type" id="type" required>
        <option value="rowing">Rowing</option>
        <option value="cycling">Cycling</option>
        </select>
      </div>

      <div class="form-group col-6">
      <label for="date">Date: <span class="text-danger">*</span></label>
      <input class="form-control" type="date" name="date" id="date" required>
      </div>
    </div>

    <div class="row">
      <div class="form-group col-6">
      <label for="duration">Enter the duration <small class="text-muted">(in mins)</small>:<span class="text-danger">*</span></label>
      <input class="form-control" type="number" name="duration" id="duration" max="9999" required>
      </div>

      <div class="form-group col-6">
        <label for="distance">Enter the distance <small class="text-muted">(in meters)</small>:<span class="text-danger">*</span></label>
        <input class="form-control" type="number" name="distance" id="distance" required>
      </div>
    </div>

    <div class="row">
      <div class="form-group col-6">
      <label for="calories">Enter calories burned:<span class="text-danger">*</span></label>
      <input class="form-control" type="number" name="calories" id="calories" required>
      </div>

      <div class="form-group col-6">
        <label for="strokes">Enter strokes <small class="text-muted">(only for rowing)</small>:</label>
        <input class="form-control" type="number" name="strokes" id="strokes">
      </div>
    </div>

    <div class="row pt-3">
      <div class="col-6 text-right">
        <a href="index.php" class="btn btn-outline-danger px-4">Cancel</a>
      </div>
      <div class="col-6 text-left">
        <input class="btn btn-success px-5" type="submit" value="Add" name="submit">
      </div>
    </div>

  </form>
</div>


<?php 

if(isset($_POST['submit'])) {
  $exerciseType = filter_var($_POST['type'], FILTER_SANITIZE_STRING);
  $date = filter_var($_POST['date'], FILTER_SANITIZE_STRING);
  $duration = filter_var($_POST['duration'], FILTER_VALIDATE_INT);
  $distance = filter_var($_POST['distance'], FILTER_VALIDATE_INT);
  $calories = filter_var($_POST['calories'], FILTER_VALIDATE_INT);
  $strokes = filter_var($_POST['strokes'], FILTER_VALIDATE_INT);

  

  echo $exerciseType . "<br>";
  echo $date . "<br>";
  echo $duration . "<br>";
  echo $distance . "<br>";
  echo $calories . "<br>";
  echo $strokes . "<br>";

}

?>