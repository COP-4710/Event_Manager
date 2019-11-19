<?php
session_start();
include("config.php");

if ($_SERVER['REQUEST_METHOD'] == $_POST)
{
	$name = $_POST['name'];
	$description = $_POST['description'];
	$email = $_POST['email'];
	$userid_admin = $_SESSION['userid'];
	$active = 0;
	$university = $_SESSION['university'];

	$sql = "INSERT INTO RSOs (university, name, email, description, userid_admin, active) VALUES('$university' , '$name' , '$email' , '$description' , '$userid_admin' , '$active')";
	$result = $db->query($sql);
	$sql2 = "SELECT * FROM RSOs WHERE university = '$university' , userid_admin = '$userid' , name = '$name' , email = '$email' , description = '$description' , active = '$active'";
	$result2 = $db->query($sql2);

	if ($result2->num_rows > 0)
	{
		$row = $result2->fetch_assoc();
		$_SESSION['name'] = $row['name'];
		$_SESSION['university'] =  $row['university'];
                $_SESSION['email'] = $row['email'];
		$_SESSION['description'] = $row['description'];
		$_SESSION['userid_admin'] = $row['userid_admin'];

		header("Location: http://157.245.128.154/RSOdetails.php");
	}
	else
	{
	 echo "RSO machine broke";
	}
}
?>
