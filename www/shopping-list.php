<?php

include('includes/header.php');
require_once('../db_config.php');


// Add new item to the shopping list
if(isset($_POST['add-task'])) {
  $newItem = $_POST['addItem'];
  $id = NULL;

  $query = "INSERT INTO shoppinglist (id, items)
            VALUES(:id, :items)";
  $result = $db_connection->prepare($query);
  $result->execute([
    'id' => $id,
    'items' => $newItem
  ]);
  $rowsAdded = $result->rowCount();

  //db connection close
  $db_connection = NULL;

  echo "Item added succesfully.";
}

// Items in the shopping list
$queryItems = "SELECT * FROM shoppinglist";
$items = $db_connection->query($queryItems);

?>

<div class="container mt-3">
  <h1 class="text-center">Shopping List</h1>
  <hr>
  <div class="row ">
    <div class="col-sm-12 col-md-6 mx-auto">
    
      
      <div class="add-task-form text-center">
        <form method="POST" id="add-task">
          <input class="addItem" type="text" name="addItem" required>
          <input class="btn btn-success" type="submit" name="add-task" value="Add Item">
        </form>
      </div>
     
      
        
      
      <table class="table">
        <thead>
          <th>Item name</th>
          <th class="text-right">Done</th>
          
        </thead>

        <tbody>
          <?php
          foreach($items as $item) {
          ?>
            <tr>
              <td><?php echo $item['items']; ?></td>
              <td class="text-right"><input type="checkbox" name="done" id=""></td>
            </tr>
          <?php
          }
          ?>
        </tbody>
      </table>
    </div>
    
  
  </div>

</div>