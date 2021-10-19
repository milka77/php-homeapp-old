<?php 
include('includes/header.php');

?>
  <div class="container mt-3 w-50">
    <h1 class="text-center">Add New Food</h1>
    <hr>

    <!-- Form -->
    <form action="create-food-handler.php" method="POST">
      <div>
        <label for="food-type">Select Your Food's Type: <span class="text-danger">*</span></label>
        <select class="form-control" name="food-type" id="food-type">
          <option value="soup">Soup</option>
          <option value="diner">Diner</option>
        </select>
      </div>
      <div class="mt-2">
        <label class="" for="name">Dinner name: <span class="text-danger">*</span></label>
        <input class="form-control" type="text" name="name" id="name" required>
      </div>
      <div class="mt-2">
        <label for="ingredients">Ingredients: <span class="text-danger">*</span></label><br>
        <small>Please seperate the ingerients with a coma "," or coma and space ", ".</small>
        <textarea class="form-control" name="ingredients" id="ingredients" rows="5" required></textarea>
      </div>
      <div class="text-center pt-3">
        <input class="btn btn-success px-5" type="submit" value="Add" name="submit">
      </div>
    </form>
  </div>
  <!-- <ul> 
  <?php /*
    foreach($pieces as $piece){
      echo "<li class='shopping-list'>$piece <input type='checkbox' name='$piece' id='checkbox'></li>";
    }*/
  ?>
  </ul> -->

<!-- End of .container-fluid in header.php -->
</div>
  <!-- extra JavaScript -->
  <script>
  $(document).ready(function() {
    $('#checkbox').click(function() {
      this.addClass('text-muted');
    });

  })
</script>
</body>
</html>

