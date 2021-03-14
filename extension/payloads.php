<?php
  $get_url = "https://api.spacexdata.com/v4/payloads/$payload_id"; // get the payloaddata from the api
  $string = file_get_contents("$get_url");
  $json_a = json_decode($string, true);
  /*All payloads Variables form Json*/
  $payload_customer = $json_a['customers']['0'];
  $payload_type = $json_a['type'];
  $payload_orbit = $json_a['regime'];
?>
