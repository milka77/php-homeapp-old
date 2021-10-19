<?php

include('includes/header.php');
require_once('../db_config.php');

//Electricity readings
$query = "SELECT * FROM readings_elect ORDER BY id DESC";
$electricitys = $db_connection->query($query);

//Gas readings
$gasQuery = "SELECT * FROM readings_gas ORDER BY id DESC";
$gases = $db_connection->query($gasQuery);

?>

  <div class="container mt-3">
    <div class="row">
      <div class="col-12">
        <h1 class="text-center">Meter Readings</h1>
        
        <hr>
      </div>
      <div class="col-6">
        <div class="text-center">
          <h3>Electicity</h3>
          <small>SN: A03M141173</small>
        </div>
        <table class="table">
          <thead>
            <th>Reading Date</th>
            <th>Reading Value</th>
            <th>Difference</th>
            <th>Edit</th>
          </thead>
          <tbody>
            
            <?php
            foreach($electricitys as $electricity) {
            ?>
              <tr class="meter-row">
                <td><?php echo $electricity['date']; ?></td>
                <td class="text-center"><?php echo $electricity['reading']; ?></td>
                <td class="text-center"><?php if($electricity['difference'] == 0){
                    echo "N/A";
                  } else {
                    echo $electricity['difference'];
                  } ?>
                </td>
                <td class="text-center"><a href="readings-update.php?id=<?php echo $electricity['id']?>&meter-type=<?php echo 'elect' ?>" class="edit-link"><i class="fas fa-edit"></i></a></td>
              </tr>
            <?php
            }
            ?>


          </tbody>
        </table>
      </div>

      <div class="col-6">
        <div class="text-center">
          <h3>Gas</h3>
          <small>SN: 048481</small>
        </div>
        <table class="table">
          <thead>
            <th>Reading Date</th>
            <th>Reading Value</th>
            <th>Difference</th>
            <th>Edit</th>
          </thead>
          <tbody>
            
            <?php
            foreach($gases as $gas) {
            ?>
              <tr class="meter-row">
                <td><?php echo $gas['date']; ?></td>
                <td class="text-center"><?php echo $gas['reading']; ?></td>
                <td class="text-center"><?php if($gas['difference'] == 0){
                    echo "N/A";
                  } else {
                    echo $gas['difference'];
                  } ?>
                </td>
                <td class="text-center"><a href="readings-update.php?id=<?php echo $gas['id']?>&meter-type=<?php echo 'gas' ?>" class="edit-link"><i class="fas fa-edit"></i></a></td>
              </tr>
            <?php
            }
            ?>

          </tbody>
        </table>
      </div>

    </div>
  </div>


<!-- End of .container-fluid-->
</div>
</body>
</html>