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
  section {
	width: 100%;
	height: 100vh;
	background: url(bg.jpg);
	background-size: cover;
	}
  section .window {
  color: white;
  margin: auto;
  padding: 30px;
  text-align: center;
  width: 500px;
  height: 500px;
  background-color: rgba(0,0,0,0.7);
}
 section .window ul {
 overflow-y: auto;
}
    </style>
	 <link rel=\"stylesheet\" type=\"text/css\" href=\"style.css\">
</head>
<body>
  <section>
   <div class = 'window'>
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
if ($_SESSION['option-button'] == 1){
	$sql ="SELECT *FROM comment where eventid = '{$_SESSION["eventid"]}' ORDER BY timestamp ASC";
	$result =$db->query($sql);
	while($_SESSION['comments'] = $result->fetch_assoc()){

	echo "	<li>
	<input type='hidden' name='commentid' value={$_SESSION['comments']['commentid']}>
	<h3>{$_SESSION['comments']['username']} </h3>
	<h4>{$_SESSION['comments']['rating']} </h4>
	<p>{$_SESSION['comments']['description']}</p>
	</li>"; }
	     echo "<form action = 'makecomment.php' method='post'>
             <!--<input type='hidden' name='uid' value='Anonymous'>-->
             <textarea name='description'>Type comment here</textarea>
             <select name='rating'> 
                <option value='1'>Rating 1</option>
                <option value='2'>Rating 2</option>
                <option value='3'>Rating 3</option>
                <option value='4'>Rating 4</option>
                <option value='5'>Rating 5</option>
             </select>
             <button name='submit' type='submit'>Comment</button>
     </form>";
}
	//RSO
	if ($_SESSION['option-button'] == 2){
		$sql ="SELECT *FROM commentRSO where RSOe = '{$_SESSION["eventid"]}' ORDER BY timestamp ASC";
	$result =$db->query($sql);
	while($_SESSION['comments'] = $result->fetch_assoc()){
        echo "  <li>
        <input type='hidden' name='commentid' value={$_SESSION['comments']['commentid']}>
        <h3>{$_SESSION['comments']['username']} </h3>
        <h4>{$_SESSION['comments']['rating']} </h4>
        <p>{$_SESSION['comments']['description']}</p>
	</li>"; }
	     echo "<form action = 'makecommentRSO.php' method='post'>
             <!--<input type='hidden' name='uid' value='Anonymous'>-->
             <textarea name='description'>Type comment here</textarea>
             <select name='rating'> 
                <option value='1'>Rating 1</option>
                <option value='2'>Rating 2</option>
                <option value='3'>Rating 3</option>
                <option value='4'>Rating 4</option>
                <option value='5'>Rating 5</option>
             </select>
             <button name='submit' type='submit'>Comment</button>
     </form>";
	}
//private
if ($_SESSION['option-button'] == 3)
{
	 $sql ="SELECT *FROM commentPrivate where PRIVATEe = '{$_SESSION["eventid"]}' ORDER BY timestamp ASC";
        $result =$db->query($sql);
	while($_SESSION['comments'] = $result->fetch_assoc()){
        echo "  <li>
        <input type='hidden' name='commentid' value={$_SESSION['comments']['commentid']}>
        <h3>{$_SESSION['comments']['username']} </h3>
        <h4>{$_SESSION['comments']['rating']} </h4>
        <p>{$_SESSION['comments']['description']}</p>
	</li>";}
     echo "<form action = 'makecommentPrivate.php' method='post'>
             <!--<input type='hidden' name='uid' value='Anonymous'>-->
             <textarea name='description'>Type comment here</textarea>
             <select name='rating'> 
                <option value='1'>Rating 1</option>
                <option value='2'>Rating 2</option>
                <option value='3'>Rating 3</option>
                <option value='4'>Rating 4</option>
                <option value='5'>Rating 5</option>
             </select>
             <button name='submit' type='submit'>Comment</button>
     </form>";
	
}
?>
</ul>
    <!--<div id="map"></div>
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
    </script>-->
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
</div>
</section>
</body>
</html>
