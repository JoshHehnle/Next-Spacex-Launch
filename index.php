<?php
  /* Recive the data from the SpaceX-API */
  $string = file_get_contents("https://api.spacexdata.com/v4/launches/next");
  $json_a = json_decode($string, true);

  /* Fetch the Informations from the JSON-file */
  $details = $json_a['details']; // get Details
  $payload_id = $json_a['payloads']['0']; // get the payload-id
  $launch_flight_number = $json_a['flight_number']; // get the flight number
  $launch_misson_name = $json_a['name']; // get the mission name
  $launch_time_utc = $json_a['date_utc']; // get the launchtime
  $launch_patch = $json_a['links']['patch']['small']; // get the missionpatch
  $date_precision = $json_a['date_precision']; // get the date precision

  if ($date_precision == "month") {
      $date_precision_def = "month";
  }

  /* Include the Informations about the Payload and the timer */
  include "extension/timer.php"; // Include the Timer
  include "extension/payloads.php"; // Include the payloads

  /* Check if the details variable is empty */
  if (empty($details)) {
    $details = "Unfortunately there are no more details yet";
  }
?>

<!DOCTYPE html>
<html lang="de" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title> - Upcoming Launch by SpaceX - </title>

<meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="data/main.css">
  </head>
  <body>
    <center>

    <?php
        if ($date_precision_def == "month") {
        	echo "<h2 id='launchcountdown'>Launchcountdown</h2>
                <h3> Unfortunately there is no exact date yet</h3>";
          $utc_timestamp = "Unfortunately there is no exact date yet";      
        } else {
          echo "<h2 id='launchcountdown'>Launchcountdown</h2>
                <h3 id='launch_timer'></h3>";
        }
      ?>

      <br><br><br><br>

      <!-- Display the Payloadinformations -->
      <h2 id="payload">Payloadinformations</h2>
      <table>
        <tr>
          <th><b>Payload Type</b></th>
          <th>Orbit</th>
          <th>Customer</th>
        </tr>
        <tr>
          <td><?php echo $payload_type; ?></td>
          <td><?php echo $payload_orbit; ?></td>
          <td><?php echo $payload_customer; ?></td>
        </tr>
      </table>
      <br><br><br><br>

      <!-- Display the Main-launchinformations -->
      <h2 id="launchinfos">Launchinformations</h2>
      <table>
        <tr>
          <th><b>Flight Number</b></th>
          <th>Mission Name</th>
          <th>Launchtime</th>
        </tr>
        <tr>
          <td><?php echo $launch_flight_number; ?></td>
          <td><?php echo $launch_misson_name; ?></td>
          <td><?php echo $utc_timestamp; ?></td>
        </tr>
      </table>
      <br><br><br><br>

      <!-- Display the other Launchinformations -->
      <h2 id="other">Other Launchinformations</h2>
      <p><?php echo $details; ?></p>
    </center>
  </body>
</html>
