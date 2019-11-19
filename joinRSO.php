<?php
session_start();
include("config.php");

$userid = $_SESSION["userid"];
$RSO = $_POST["RSO"]; 

$sql = "INSERT INTO RSOmembers (RSO, userid) VALUES('$RSO','$userid')";
$result = $db->query($sql);

// checking count of the RSO member size
$sql2 = "SELECT COUNT(*) FROM RSOmembers WHERE RS0 = '$RSO'";
$result2 = $db->query($sql2); 

if($result2>= 5)
{
	$sql3 = "UPDATE RSOs SET active = 1 WHERE RSO='$RSO'";
	$result3 = $db->query($sql3);
	header("Location: http://157.245.128.154/rsopage.php");
}
else
{
	header("Location:http://157.245.128.154/rsopage.php");
}	




?>
