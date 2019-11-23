<?php
session_start();
include ("config.php");

if($_SERVER["REQUEST_METHOD"] == "POST")
{
  $event_id = $_SESSION["eventid"];
  $username = $_SESSION["username"];
  $description = $_POST["description"];
  $rating = $_POST["rating"];

  $sql = "INSERT INTO `commentRSO` (RSOe, username, description, rating) VALUES('$event_id', '$username', '$description', '$rating')";
  $result = $db->query($sql);
  header("Location:http://157.245.128.154/eventdetails.php");
}





?>
