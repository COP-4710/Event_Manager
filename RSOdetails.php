<?php
session_start();
include("config.php");


 $sql = "SELECT username FROM personalInfo WHERE userid = {$_SESSION['userid_admin']}";
$result = $db->query($sql);
$row = $result->fetch_assoc();
$admin = $row['username'];
?>

<!DOCTYPE html>
<html lang =\"en\">

<head>
<title>
Event Details
</title>
<style>
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
</style>
</head>
<body>
    <h2>
     <?php echo $_SESSION["name"]; ?>
    </h2>
    <h2>
	University: <?php echo $_SESSION['university']; ?>
    </h2>
	<p>Organization administrator admin: <?php echo $admin; ?> </p>
	<p>Email: <?php echo $_SESSION['email']; ?>
    <p>
        <?php echo $_SESSION["description"]; ?>
    </p></br>
<?php if( $_SESSION['userid'] == $_SESSION['userid_admin'])
        {
	     echo "<form action='RSOform.php' method='post'>
		     <button name='createEvent' type='submit'>Create RSO Event</button>
			</form>";
	 } ?>
</body>
</html>
