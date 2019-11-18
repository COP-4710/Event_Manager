<?php
session_start();
include ("config.php");
if($_SERVER["REQUEST_METHOD"] == "POST")
{echo "f	f	";
  $success = 1;
  $signupEmail = $_POST["signupEmail"];
  $username = $_POST["username"];
  $firstName = $_POST["firstName"];
  $lastName = $_POST["lastName"];
  $university = $_POST["university"];
  $signupPW = $_POST["signupPW"];
  $confirmPW  = $_POST["confirmPW"];
  if($signupPW != $confirmPW)
 { echo "what the duce";
    $_SESSION["ERROR"] = "PASSWORD DO NOT MATCH";
    header("Location:http://157.245.128.154/login.php");
  }
  $sql  = "INSERT INTO `login` (email, password) VALUES ('$signupEmail', '$signupPW')";
  $sql2 = "SELECT userid FROM login WHERE email = '$signupEmail' and password = '$signupPW' ";

  $result = $db->query($sql);
  $result2 = $db->query($sql2);
  if($result2->num_rows > 0)
  {echo "did we create a login? Yes we did";
    $row = $result2->fetch_assoc();
    $userid = $row["userid"];

    $sql3 = "INSERT INTO `personalInfo` (username, firstname, lastname, university, userid) VALUES ('$username', '$firstName', '$lastName', '$university','$userid')";
    $result3 = $db->query($sql3);
    $sql4 = "SELECT userid, username, firstname, lastname, university, userlevel FROM personalInfo WHERE userid = '$userid' ";
    $result4 = $db->query($sql4);

    if($result4->num_rows > 0)
    {
      header("Location:http://157.245.128.154/login.php");
    }
    else
    {
	    $_SESSION["ERROR"] = "INSERT PERSONAL INFO FAIL";
	    echo "INSERT FAILURE";
//	header("Location:http://157.245.128.154/login.php");
    }
  }
  else
  {
	  $_SESSION["ERROR"] = "account creation failure";
	  echo "create account error";
  //  header("Location:http://157.245.128.154/login.php");
 }
}



?>
