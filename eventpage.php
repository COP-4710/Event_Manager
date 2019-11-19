<?php
// Start session
session_start();
//$_SESSION["userid"] = 3;
if ($_POST['option-button'] != NULL)
{
	$_SESSION['option-button'] = $_POST['option-button'];
}
// accessing session data
//$_SESSION["date"] ="2019-11-8";

//$_SESSION["date"] = date("YY-MM-DD");
//echo $_SESSION["date"];
$_SESSION["username"] = "Ben";
if ($_SESSION["date"] == NULL){
$_SESSION["date"] =date("Y-m-d");
}
$conn = new mysqli("localhost", "debian-sys-maint", "d197cf7871616e0bcada971f428d1f69d5164d01474837e7", "event_manager");
if ($conn->connect_error)
{
		returnWithError( $conn->connect_error );
}

echo "<!DOCTYPE html>
<html lang =\"en\">

<head>
	<meta charset=\"utf-8\">
	<meta name=\"viewport\" content=\"width=device-width, initial-scale=1, shrink-to-fit=no\">
	<script src=\"emanager.js\"></script>
	<!--<link rel=\"stylesheet\" href=\"https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css\" integrity=\"sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO\" crossorigin=\"anonymous\"> -->

	<title>Knight Events</title>
	<link rel=\"stylesheet\" type=\"text/css\" href=\"style.css\">
	</head>
	<body>
		<section>
			<div class=\"options\">
				<form action = \" \" method=\"post\">
					<button name=\"option-button\" type=\"submit\" value=\"1\">Public Events</button>
                                        <button name=\"option-button\" type=\"submit\" value=\"3\">School Events</button>
			                <button name=\"option-button\" type=\"submit\" value=\"2\">RSO Events</button>
				</form>
			</div>
			<div class=\"userBox\">
				<div class=\"content\">
					<h1>Welcome "; echo $_SESSION['username']; echo "!</h1>
					<p>To the left are upcoming events that are happening, you may click on the options
					above the event feed to filter events between student organizations, public events, and private events that are a part of your university.</p>";
				if ($_SESSION['option-button'] == 1 && $_SESSION['userlevel'] == 3){
					echo "<form action=\"createEvent.php\" method = \"post\">";
					echo "<button type=\"submit\">Create Public Event</button>";
					echo"</form>";
						}
				if ($_SESSION['option-button'] == 3)
				{
					echo "<form action=\"createPrivateEvent.php\" method = \"post\">";
                                        echo "<button type=\"submit\">Create Private Event</button>";
                                        echo"</form>";
				}

				if($_SESSION['option-button'] == 2)
				{
					echo "<form action =\"gotoRSO.php\" method=\"post\">
						<button type=\"submit\">View Student Organizations</button>
						</form>";
				}
				        echo"<form action=\"logout.php\" method = \"post\">
						 <button type=\"submit\">Logout</button>
					 </form>
					<form action='eventdatefeed.php' method='post'>
						<input type='date' name='date' />
					</form>
					</div>
					</div>
					<div class=\"events\">
						<ul>
						<!--	<li>
									<div class=\"time\">
										<h2>24<br><span>June</span><h2>
									</div>
										<div class = \"details\">
										<h3>event_name</h3>
										<p>description
										</p>
										<sript></script>
										<a href=\"#\">View Details</a>
									</div>
							</li> -->";
	if ($_SESSION['option-button'] == 1)
{
	//$sql ="SELECT *FROM event where date = '{$_SESSION["date"]}' ORDER BY date ASC, start ASC";
	$sql ="SELECT *FROM event ORDER BY date ASC, start ASC";
	$result = mysqli_query($conn, $sql);


	$_SESSION["events"] = $result;
	while($_SESSION["events"] = $result->fetch_assoc())
{
	//echo $_SESSION["events"]["event_name"];
	$dateString = date('F d, Y', strtotime($_SESSION["events"]["date"]));
	echo"<li>
                                                                <div class=\"time\">
                                                                        <h2>  $dateString <h2>
                                                                </div>
                                                                        <div class = \"details\">
                                                                        <h3>{$_SESSION["events"]["event_name"]}</h3>
                                                                        <p>{$_SESSION["events"]["description"]} this is the event id: {$_SESSION["events"]["event_id"]}
                                                                        </p>
									<sript></script>
									<form action=\"fetcheventdetails.php\" method=\"post\"><button name=\"event_id\" type=\"submit\" value=\"{$_SESSION["events"]["event_id"]}\">Details</button></form>
                                                                      <!--  <a href=\"#\">View Details</a> -->
                                                                </div>
                                                </li>";

}
}
else if ($_SESSION['option-button'] == 2)
{	
	$sql2 = "SELECT RSO FROM RSOmembers where userid = '{$_SESSION ["userid"]}' ";
	$result2 = $conn->query($sql2);
	$_SESSION["RSOid"]= $result2;

	while($_SESSION["RSOid"]= $result2->fetch_assoc())
	{

		$sql = "SELECT *FROM RSO_events WHERE RSO = '{$_SESSION["RSOid"]["RSO"]}' ORDER BY date ASC, start ASC";//need the sql call for private events and change the variables accordingly if even needed
		$result = mysqli_query($conn, $sql);


		$_SESSION["events"] = $result;
		while($_SESSION["events"] = $result->fetch_assoc())
		{
			//echo $_SESSION["events"]["event_name"];
			$dateString = date('F d, Y', strtotime($_SESSION["events"]["date"]));
			echo"<li>
																																<div class=\"time\">
																																				<h2>  $dateString <h2>
																																</div>
																																				<div class = \"details\">
																																				<h3>{$_SESSION["events"]["event_name"]}</h3>
																																				<p>{$_SESSION["events"]["description"]} this is the event id: {$_SESSION["events"]["RSOe"]}
																																				</p>
									<sript></script>
									<form action=\"fetchRSOeventdetails.php\" method=\"post\"><button name=\"RSOe\" type=\"submit\" value=\"{$_SESSION["events"]["RSOe"]}\">Details</button></form>
																																			<!--  <a href=\"#\">View Details</a> -->
																																</div>
																								</li>";

		}
	}
}
else if ($_SESSION['option-button'] == 3)
{
	$sql = "SELECT *FROM Private_event WHERE university = '{$_SESSION["university"]}' ORDER BY date ASC, start ASC" ;//need the sql call for private events and change the variables accordingly if even needed
	$result = mysqli_query($conn, $sql);


	$_SESSION["events"] = $result;
	while($_SESSION["events"] = $result->fetch_assoc())
{
	//echo $_SESSION["events"]["event_name"];
	$dateString = date('F d, Y', strtotime($_SESSION["events"]["date"]));
	echo"<li>
																																<div class=\"time\">
																																				<h2>  $dateString <h2>
																																</div>
																																				<div class = \"details\">
																																				<h3>{$_SESSION["events"]["event_name"]}</h3>
																																				<p>{$_SESSION["events"]["description"]} this is the private event id: {$_SESSION["events"]["PRIVATEe"]}
    i/br>
																																				</p>
									<sript></script>
									<form action=\"fetchPrivateeventdetails.php\" method=\"post\"><button name=\"PRIVATEe\" type=\"submit\" value=\"{$_SESSION["events"]["PRIVATEe"]}\">Details</button></form>
																																			<!--  <a href=\"#\">View Details</a> -->
																																</div>
																								</li>";

}
}
echo					"</ul>
					</div>

			</section>


	</body>
</html>";
?>
