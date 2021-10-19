<?php

include('includes/header.php');
require_once('../db_config.php');

//Soups
$query = "SELECT * FROM soups";
$soups = $db_connection->query($query);

//Diners 
$diners_query = "SELECT * FROM diners";
$diners = $db_connection->query($diners_query);

//Get ingredients
$ingredients = "";

?>




  <div class="row mt-3">
    <div class="col-sm-12 col-md-6">
      <h1 class="text-center">Vegan Soups</h1>
      <table class="table">
        <thead>
          <th>Soup Name</th>
          <th>Ingredients</th>
          <th>Add to shopping list</th>
        </thead>
        <tbody>
          <?php 
          foreach($soups as $soup) {
          ?>
            <tr>
              <td><?php echo $soup['name']; ?></td>
              <td><?php echo $soup['ingredients']; ?></td>
              <td><a href="#" class="btn btn-outline-success">Add to shopping list</a></td>
            </tr>
          <?php 
          }
          ?>
        </tbody>
      </table>
      <hr>
    
    </div>
  

    <div class="col-sm-12 col-md-6">
      <h1 class="text-center">Vegan Dinners</h1>
      <table class="table">
        <thead>
          <th>Diner Name</th>
          <th>Ingredients</th>
          <th>Add to shopping list</th>
        </thead>
        <tbody>
          <?php 
          foreach($diners as $diner) {
          ?>
            <tr>
              <td><?php echo $diner['name']; ?></td>
              <td id="<?php echo $diner['name']; ?>">
                <?php echo $diner['ingredients']; ?>
                
              </td>
              <td><a href="#" class="btn btn-outline-success">Add to shopping list</a></td>
            </tr>
          <?php 
          }
          ?>
        </tbody>
      </table>
      <hr>
    </div>
    
  </div>

<!-- End tag for .container-fluid from header -->
</div>

<!-- extra JavaScript -->
  
</body>
</html>