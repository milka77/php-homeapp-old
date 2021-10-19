<?php

require_once('../db_config.php');

if(isset($_POST['submit'])){
  //Variables - getting data from the form
  $foodType = ($_POST['food-type']);
  $id = NULL;
  $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
  $ingredients = filter_var($_POST['ingredients'], FILTER_SANITIZE_STRING);
   

  if($foodType == 'soup') {

    //database query
    $query = "INSERT INTO soups (id, name, ingredients)
              VALUES(:id, :name, :ingredients)";
    $result = $db_connection->prepare($query);
    $result->execute([
      'id'  => $id,
      'name' => $name,
      'ingredients' => $ingredients
    ]);
    $rowsAdded = $result->rowCount();
    
    //Closing DB connection
    $db_connection = NULL;

    echo "Your new Soup was added to the database!";
  
  } else {


    //database query
    $query = "INSERT INTO diners (id, name, ingredients)
              VALUES(:id, :name, :ingredients)";
    $result = $db_connection->prepare($query);
    $result->execute([
      'id'  => $id,
      'name' => $name,
      'ingredients' => $ingredients
    ]);
    $rowsAdded = $result->rowCount();
    
    //Closing DB connection
    $db_connection = NULL;

    echo "Your new Dinner was added to the database!";
  
  }

}


$filtered = str_replace(", ", ",", $ingredients);
echo $filtered . "<br>";
$pieces = preg_split("/[,]+/", $filtered);

echo "<pre>";
print_r($pieces);

?>