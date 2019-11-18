<?php
session_start();
include ("config.php");

if($_SERVER["REQUEST_METHOD"] == "POST")
{
	$event_id = $_POST["event_id"];
	//echo $_POST["event_id"];
  $sql = "SELECT event_name, description, date, start, end FROM event WHERE event_id = '$event_id' ";
  $result = $db->query($sql);
  if($result->num_rows == 1)
  {
	  $row = $result->fetch_assoc();
	  $_SESSION["eventid"]=$event_id;
    $_SESSION["event_name"] = $row["event_name"];
    $_SESSION["description"] = $row["description"];
    $_SESSION["date"] = $row["date"];
    $_SESSION["start"] = $row["start"];
    $_SESSION["end"] = $row["end"];
    header("Location:http://157.245.128.154/eventdetails.php");
  }
  else
  {
    echo "we could not find the event that you have selected ";
  }


}
 ?>
