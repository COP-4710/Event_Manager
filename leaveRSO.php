<?php 

session_start();
include("config.php");

$userid = $_SESSION["userid"];
$RSO = $_SESSION["RSO"]; 

$sql = "DELETE FROM RSOmembers WHERE userid = '$userid' AND RSO = $RSO"; 
$result = $db->query($sql);
$sql2 = "SELECT COUNT(*) FROM RSOmembers WHERE RS0 = '$RSO'";
$result2 = $db->query($sql2);

if($result2< 5)
{
        $sql3 = "UPDATE RSOs SET active = 0 WHERE RSO='$RSO'";
        $result3 = $db->query($sql3);
        header("Location: http://157.245.128.154/rsopage.php");
}
else
{
        header("Location:http://157.245.128.154/rsopage.php");
}


header("Location: http://157.245.128.154/rsopage.php ");



?>
