<?php 
require_once('../bliz_api_config.php');

function generateAccessToken($CLIENT_ID, $CLIENT_SECRET) {
  
  $params = array(
    'grant_type' => 'client_credentials'
  );
  $tokenUri = 'https://oauth.battle.net/token';

  $ch = curl_init();

  curl_setopt( $ch, CURLOPT_USERPWD, $CLIENT_ID.':'.$CLIENT_SECRET);
  curl_setopt( $ch, CURLOPT_URL, $tokenUri );
  curl_setopt( $ch, CURLOPT_POSTFIELDS, http_build_query( $params ));
  curl_setopt( $ch, CURLOPT_POST, 1);
  curl_setopt( $ch, CURLOPT_SSL_VERIFYHOST, false);
  curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER, false);
  curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true);

  $response = curl_exec( $ch );
  curl_close( $ch );

  $accesTokenResponse = json_decode( $response, true );

  return $accesTokenResponse['access_token'];
};

?>