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


<meta name="viewport" content="initial-scale=1.0, user-scalable=1">
<link rel="stylesheet" href="data/main.css">

<div class="haze">
</div>

<div id="ivgb" class="row">
  <div class="cell">
    <div id="i73e">
      <h2>Launchcountdown
      </h2>
    </div>
    <div id="ilvs">

      <?php
        if ($date_precision_def == "month") {
        	echo "<h3> Unfortunately there is no exact date yet</h3>";
          $utc_timestamp = "Unfortunately there is no exact date yet";
        } else {
          echo "<h3 id='launch_timer'></h3>";
        }
      ?>
    </div>
    <div class="row">
      <div id="ilnwe" class="cell">
      </div>
    </div>
  </div>
</div>
<div id="i8h5d">
</div>
<div id="im1vx">
  <h2 id="izpvn">Launchinfromations
  </h2>
</div>
<div id="ipvz" class="row">
  <div id="izkzx" class="cell">
    <div id="ie3yg">
      <b id="igqag">Flight Number
      </b>
    </div>
    <div id="iy6h6"><?php echo $launch_flight_number; ?>
    </div>
  </div>
  <div id="i1j02" class="cell">
    <div id="in4do">
      <b id="is2bk">Mission Name
      </b>
    </div>
    <div id="ipcdb"><?php echo $launch_misson_name; ?>
    </div>
  </div>
  <div id="i60ky" class="cell">
    <div id="i3d65">
      <b id="ifa9b">Launchtime
      </b>
    </div>
    <div id="izx4b"><?php echo $utc_timestamp; ?>
    </div>
  </div>
</div>
<div id="ix1bl">
  <h2 id="i1bsh">Payloadinformations
  </h2>
</div>
<div class="row" id="iw6pe">
  <div class="cell">
    <div id="i41u1">
      <b>Payload Type
      </b>
    </div>
    <div id="ilcig"><?php echo $payload_type; ?>
    </div>
  </div>
  <div class="cell" id="ibt9q">
    <div id="i0682">
      <b>Orbit
      </b>
    </div>
    <div id="ionu8"><?php echo $payload_orbit; ?>
    </div>
  </div>
  <div class="cell" id="ik2wi">
    <div id="i2zhg">
      <b>Customer
      </b>
    </div>
    <div id="iaq32"><?php echo $payload_customer; ?>
    </div>
  </div>
</div>
<div id="iysap" class="row">
  <h2 id="i8umx">Other Launchinfromations
    <br/>
  </h2>
  <div id="ixbo3"><?php echo $details; ?>
  </div>
</div>
