<?php
session_start();
include ("config.php");
//if($_SERVER["REQUEST_METHOD"] == "POST")
//{
	//$userid = $_POST['userid'];
	$userid = 3 ;
	echo $userid ." if this prints without userif there is something wrong";
	//$RSOe = $_POST['RSOe'];
	$RSOe = 3 ;
	//$RSO = $_POST['RSO'];
	$RSO = 3;
	//$date = $_POST['date'];
	$date =" 2019-11-15";
	//$description = $_POST['description'];
	$description = "owhfowhfpiwf";
	//$event_name = $_POST['event_name'];
	$event_name = "woihfiqwehf";
	//$start = $_POST['start'];
	$start = "22:30:00";
	//$end = $_POST['end'];
	$end = "22:30:00";

	$sql = "INSERT INTO `RSO_events` (userid, RSOe, RSO, date , description, event_name, start, end) VALUES ('$userid','$RSOe','$RSO','$date', '$description', '$event_name', '$start','$end' )";
	/*if($result= $db->query($sql)=== TRUE)
	{
		echo "insert work successfully";
	}*/
	$result= $db->query($sql);

	$sql2 = "SELECT RSOe FROM RSO_events WHERE 'userid' = $userid and RSOe = '$RSOe'";
	$result2= $db->query($sql2);
	if($result2->num_rows ==1)
	{
		echo "you add the event successfully";
	}
	else
	{
		echo "sorry event was not added";
	}


//}

?>
