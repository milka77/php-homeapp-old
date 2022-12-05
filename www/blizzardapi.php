<?php include('includes/header.php'); ?>
<?php require_once('blizzard_access_token.php');?>

<?php
  


  $token = generateAccessToken($CLIENT_ID, $CLIENT_SECRET);
  
  $api_url = 'https://eu.api.blizzard.com/profile/wow/character/ragnaros/milkaah/character-media?namespace=profile-eu&locale=en_US&access_token='.$token;
  $data = json_decode(file_get_contents($api_url), true);
  

?>

  <div class="container  mt-5">
  <h1 class="text-center ">Blizzard APi</h1>
  <h4 class="text-center ">Get the character media images from Blizzard API</h4>
      
      <img src="<?php echo $data['assets'][0]['value']; ?>" alt="">
      <img src="<?php echo $data['assets'][1]['value']; ?>" alt="">
      <img src="<?php echo $data['assets'][2]['value']; ?>" alt="">
      <img src="<?php echo $data['assets'][3]['value']; ?>" alt="">
  </div>


<!-- End of .container-fluid from header.php -->
</div> 

<?php include('includes/footer.php'); ?>