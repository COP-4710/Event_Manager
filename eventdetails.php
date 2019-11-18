<?php
session_start();
include("config.php");
?>

<!DOCTYPE html>
<html lang =\"en\">

<head>
<title>
Event Details
</title>
<style>
       /* Set the size of the div element that contains the map */
      #map {
        height: 400px;  /* The height is 400 pixels */
        width: 400px;  /* The width is the width of the web page */
       }
    </style>
</head>
<body>
    <h2>
     <?php echo $_SESSION["event_name"]; ?>
    </h2>
    <h2>
	  <?php echo $_SESSION["start"]; ?> - <?php echo $_SESSION["end"]; ?>
    </h2>
    </br>
    <p>
      Location: <?php echo $_SESSION["event_name"]; ?>
    </p>
     </br>
    <p>
        <?php echo $_SESSION["description"]; ?>
    </p></br>
<ul>
<?php
// Need to modify variables here
$sql ="SELECT *FROM comment where eventid = '{$_SESSION["eventid"]}' ORDER BY timestamp ASC";
$result =$db->query($sql);
while($_SESSION['comments'] = $result->fetch_assoc()){
	echo "	<li>
	<input type='hidden' name='commentid' value={$_SESSION['comments']['commentid']}>
	<h3>{$_SESSION['comments']['username']} </h3>
	<h4>{$_SESSION['comments']['rating']} </h4>
	<p>{$_SESSION['comments']['description']}</p>
	</li>";
}
?>
</ul>
     <form action = 'makecomment.php' method='post'>
   	     <!--<input type='hidden' name='uid' value='Anonymous'>-->
   	     <textarea name='description'>Type comment here</textarea>
	     <select name="rating"> 
		<option value="1">Rating 1</option>
		<option value="2">Rating 2</option>
		<option value="3">Rating 3</option>
		<option value="4">Rating 4</option>
		<option value="5">Rating 5</option>
	     </select>
	     <button name='submit' type='submit'>Comment</button>
     </form> 
    <div id="map"></div>
    <script>
// Initialize and add the map
function initMap() {
  // The location of Uluru
  var uluru = {lat: -25.344, lng: 131.036};
  // The map, centered at Uluru
  var map = new google.maps.Map(
      document.getElementById('map'), {zoom: 8, center: uluru});
  // The marker, positioned at Uluru
  var marker = new google.maps.Marker({position: uluru, map: map});
}
    </script>
    <!--Load the API from the specified URL
    * The async attribute allows the browser to render the page while the API loads
    * The key parameter will contain your own API key (which is not needed for this tutorial)
    * The callback parameter executes the initMap() function
    -->
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAvv1p-Vio3fDx_nIWCsBCMRWLcf0wH5hE&callback=initMap">
    </script>
<!--This is for a map-->
<script>
</script>
</body>
</html>
