<?php
session_start();

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
				<form action = \"eventsRedirect.php \" method=\"post\">
					<button name=\"option-button\" type=\"submit\" value=\"1\">Return to Event page</button>
				</form>
			</div>
			<div class=\"userBox\">
				<div class=\"content\">
					<h1>Student Organizations</h1>
					<p>To the left you can see the registered student organizations here on campus, if you would like to create another student organization
					, Click the Create RSO button featured below, your friends will be able to see the RSO appear in the event feed to the left. In order to make an event,
					you need at least 5 other people to sign up for your RSO. After that, you should see a event creation button appear on the RSO listing. </p>
					<form action=\"createEvent.php\" method = \"post\">
						<button type=\"submit\">Create Public Event</button>
						</form>
				        <form action=\"logout.php\" method = \"post\">
						 <button type=\"submit\">Logout</button>
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

	$sql ="SELECT *FROM RSOs WHERE university = '{$_SESSION["university"]} ' ORDER BY name ASC";
	$result = mysqli_query($conn, $sql);


	$_SESSION["RSO"] = $result;
	while($_SESSION["RSO"] = $result->fetch_assoc())
{
	//echo $_SESSION["events"]["event_name"];
	$university = $_SESSION["RSO"]["university"];
	echo"<li>
                                                                <div class=\"time\">
                                                                        <h2>  $university <h2>
                                                                </div>
                                                                        <div class = \"details\">
                                                                        <h3>{$_SESSION["RSO"]["name"]}</h3>
                                                                        <p>{$_SESSION["RSO"]["description"]} this is the RSO id: {$_SESSION["RSO"]["userid_admin"]}
                                                                        </p>
									<sript></script>
									<form action=\"fetchRSOdetails.php\" method=\"post\">
										<button name=\"RSO\" type=\"submit\" value=\"{$_SESSION["RSO"]["RSO"]}\">Details</button>
									</form>";
					$sql5 = "SELECT * FROM RSOmembers WHERE userid = '{$_SESSION["userid"]}' and RSO = '{$_SESSION["RSO"]["RSO"]}'";
	$result5 = $conn->query($sql5);
	if (!$result5) {
    echo "<p>hello there! </p>";
}


								if ($result5->num_rows == 0) {      
									echo"<form action='joinRSO.php' method='post'>
									<button name='RSO' type='submit' value='{$_SESSION["RSO"]["RSO"]}'>Join</button></form>";}
                    echo                                          "  </div>
                                                </li>";

}
echo					"</ul>
					</div>

			</section>


	</body>
</html>";
?>
