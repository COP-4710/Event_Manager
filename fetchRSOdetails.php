<?php
session_start();
include ("config.php");

if($_SERVER["REQUEST_METHOD"] == "POST")
{
        $RSO = $_POST["RSO"];
        //echo $_POST["event_id"];
  $sql = "SELECT university, description, name, email, userid_admin, active FROM RSOs WHERE RSO = '$RSO' ";
  $result = $db->query($sql);
  if($result->num_rows == 1)
  {
          $row = $result->fetch_assoc();
          $_SESSION["RSO"]=$RSO;
    $_SESSION["name"] = $row["name"];
    $_SESSION["description"] = $row["description"];
    $_SESSION["email"] = $row["email"];
    $_SESSION["userid_admin"] = $row["userid_admin"];
    $_SESSION["university"] = $row["university"];
    $_SESSION["active"] = $row["active"];
    header("Location:http://157.245.128.154/RSOdetails.php");
  }
  else
  {
    echo "we could not find the event that you have selected ";
  }


}
 ?>
~       
