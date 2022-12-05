<?php include('includes/header.php'); ?>
<?php require_once('blizzard_access_token.php');?>
<?php 
  $realm = '';
  $guild = '';
  
  if(isset($_POST['submit'])) {
    $realm = $_POST['realm-name'];

    $guild = strtolower($_POST['guild-name']);
    $guild = str_replace(' ', '-', $guild);
    $guild = urlencode($guild);

    $token = generateAccessToken($CLIENT_ID, $CLIENT_SECRET);

    $guild_api_url = 'https://eu.api.blizzard.com/data/wow/guild/' . $realm . '/' . $guild . '?namespace=profile-eu&locale=en_US&access_token=' . $token;
    
    try {
      $guild_data = json_decode(file_get_contents($guild_api_url), true);
            
      // Get The Guild Roster 
      $roster_url = $guild_data['roster']['href'] .'&access_token='. $token;
      $roster_data = json_decode(file_get_contents($roster_url), true);
      }
    
      finally {
        $error = 'No Records Found';
      }


  };
    

?>

<div class="container  mt-5">
 <h1 class="text-center ">Blizzard APi - Guild</h1>

  <form action="blizzardapi-guild.php" method="POST">
    <div class="row pt-3">
      <div class="col-4">
        <div class="form-group">
          <select class="form-control" name="realm-name">
            <option value="">Select Realm</option>
            <option value="ragnaros">Ragnaros</option>
            <option value="bloodscalp">Bloodscalp</option>
            <option value="arathor">Arathor</option>
          </select>
        </div>
      </div>

      <div class="col-4">
        <div class="form-group">
          <input type="text" class="form-control" id="guild-name" name="guild-name" placeholder="enter a guild name">
        </div>
      </div>

      <div class="col-4 mt-">
        <button type="submit" name="submit" class="btn btn-dark"> Search</button>
      </div>
    </div>
  
  </form>

  <div class="row">
    <div class="col">
      <p>Example Guild names: Ragnaros-EU "Artum Inferniti, Spártai Kemálok, Infinite Cooldown"</p>
      <p>Example Guild names: Bloodcalp-EU "Ministry of Silly Wipes, Hollands Bier Team"</p>
      <p>Example Guild names: Arathor-EU "BSC, United by Fate, Order of the Silver Dawn"</p>
    </div>
  </div>


  <div class="results pb-5">
  
    <?php 
      if(!empty($guild_data)) {
        echo '<h1 class="text-center">'.$guild_data['name'].'</h1>';
        echo '<h3 class="text-center">'.$guild_data['realm']['name'].'-EU - '.$guild_data['faction']['name'].'</h3>';
        echo '<p class="text-center">'.count($roster_data['members']).'Members</p>';
      }
    ?>
    
          
    <table class="table table-sm">
      <thead>
        <th>Name</th>
        <th>Level</th>
        <th>Rank</th>
      </thead>
      <tbody>


      <?php
      if(!empty($guild_data)) {
        for($i=0; $i < count($roster_data['members']); $i++) {
          // $class_api_url = $roster_data['members'][$i]['character']['playable_class']['key']['href'] . '?namespace=static-eu&locale=en_US' . $api_token;
          // echo $class_api_url;
          // $class_data = json_decode(file_get_contents($class_api_url), true);

          echo
          '<tr>
            <td>'.$roster_data['members'][$i]['character']['name'].'</td>
            <td>'.$roster_data['members'][$i]['character']['level'].'</td>
            <td>'.$roster_data['members'][$i]['rank'].'</td>
          </tr>';
        }
      }
      ?>
        </tbody>
    </table>
  </div>
</div>


<!-- End of .container-fluid from header.php -->
</div> 

<?php include('includes/footer.php'); ?>