<?php

include('includes/header.php');

?>
<hr>
<h1 class="text-center">Welcome</h1>
<hr>
<div class="container w-50 mb-3">
  <form action="" method="POST">
    <div class="div mb-2">
    <label class="form-label" for="name">Enter an Airport name like MAN or BUD</label>
    <input class="form-control" type="text" name="name">
    </div>
    <input class="btn btn-success" type="submit" value="Search">
  </form>
</div>


<?php

$uri = '';
if(isset($_POST['submit'])){
  $name = $_POST['name'];
  $uri = "https://airport-info.p.rapidapi.com/airport?iata=" . $name;
}


$curl = curl_init();

curl_setopt_array($curl, [
	CURLOPT_URL => $uri,
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_FOLLOWLOCATION => true,
	CURLOPT_ENCODING => "",
	CURLOPT_MAXREDIRS => 10,
	CURLOPT_TIMEOUT => 30,
	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	CURLOPT_CUSTOMREQUEST => "GET",
	CURLOPT_HTTPHEADER => [
		"x-rapidapi-host: airport-info.p.rapidapi.com",
		"x-rapidapi-key: 3a374ec67emsh257d2ea51a76ac6p18bb28jsn6c76387464ef"
	],
]);

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
	echo "cURL Error #:" . $err;
  } else {
    $data = json_decode($response);
  
    if(!empty($data)) {
      ?>
      <div class="container w-50">
        <table class="table">
          <tr>
            <th>Propery</th>
            <th>Value</th>
          </tr>
          <tr>
            <td>ID:</td>
            <td><?= $data->id; ?></td>
          </tr>
        </table>
      </div>
    
  <?php
    } else {
      echo '';
    }
  }
?>

<!-- End of .container from header.php -->
</div> 


<?php

include('includes/footer.php');

?>

