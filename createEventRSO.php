<?php
session_start();
include ("config.php");
if($_SERVER["REQUEST_METHOD"] == "POST")
{
	$userid = $_SESSION['userid'];
	//$userid = 3 ;
	//echo $userid ." if this prints without userif there is something wrong";
	//$RSOe = $_POST['RSOe'];
	//$RSOe = 3 ;
	$RSO = $_SESSION['RSO'];
	//$RSO = 3;
	$date = $_POST['date'];
	//$date =" 2019-11-15";
	$description = $_POST['description'];
	//$description = "owhfowhfpiwf";
	$event_name = $_POST['event_name'];
	//$event_name = "woihfiqwehf";
	$start = $_POST['start'];
	//$start = "22:30:00";
	$end = $_POST['end'];
	//$end = "22:30:00";
	$location_name = $_POST["location_name"];
	$longitude = 1;
	$latitude = 1;

	$sql4 = "INSERT INTO `location` (event_name, start, end, date, location_name,longitude, latitude) VALUES ('$event_name','$start','$end','$date','$location_name', '$longitude', '$latitude')";
	$result4=$db->query($sql4);
	$sql3 = "SELECT event_name, start, end, date, location_name FROM location WHERE event_name ='$event_name'";
	$result3 = $db->query($sql3); 
	if($result3->num_rows == 1)
	{
		$sql = "INSERT INTO `RSO_events` (userid, RSO, date , description, event_name, start, end) VALUES ('$userid','$RSO','$date', '$description', '$event_name', '$start','$end' )";
		if($result= $db->query($sql)=== TRUE)
		{
			echo "insert work successfully";
		}
			//$result= $db->query($sql);

		$sql2 = "SELECT event_name FROM RSO_events WHERE userid ='$userid' ";
		$result2= $db->query($sql2);
		if($result2->num_rows > 0)
		{
			echo "you add the event successfully";
			header("Location: http://157.245.128.154/RSOdetails.php");
		}		
		else
		{	
			echo "sorry event was not added";
		}		

	}
	else
	{
		echo "conflicting time with another event"; 
	}
}	

?>
