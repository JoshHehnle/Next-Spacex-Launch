<?php
/* Launchdate from UTC in Berlin*/
$date = new DateTime($launch_time_utc);
$date->setTimezone(new DateTimeZone('Europe/Berlin'));
$utc_timestamp = date_format($date, 'd.m.Y - H:i:s:u | e');
$utc_timestamp_count = date_format($date, 'M d, Y H:i');
?>

<script>
	var time = <?php echo json_encode($utc_timestamp_count); ?>;
// Set the date we're counting down to
var countDownDate = new Date(time).getTime();

// Update the count down every 1 second
var x = setInterval(function() {

  // Get today's date and time
  var now = new Date().getTime();

  // Find the distance between now and the count down date
  var distance = countDownDate - now;

  // Time calculations for days, hours, minutes and seconds
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);

  // Output the result in an element with id="launch_timer"
  document.getElementById("launch_timer").innerHTML = days + "d " + hours + "h "
  + minutes + "m " + seconds + "s ";

  // If the count down is over, write some text
  if (distance < 0) {
    clearInterval(x);
    document.getElementById("launch_timer").innerHTML = "SpaceX go for Launch!";
  }
}, 1000);
</script>
