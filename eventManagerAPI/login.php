<?php

$inData = getRequestInfo();
$conn = new mysqli("localhost", "debian-sys-maint", "d197cf7871616e0bcada971f428d1f69d5164d01474837e7", "event_manager");


// error call if database does not connect properly
if ($conn->connect_error)
{
    $object->err = "Could not connect to database";
    returnWithError($object->err);
}

else
{
  //echo "Hooray";
  $email = $inData["email"];
  $username = $inData["username"];
  //echo $username;
  $password = $inData["password"];
  $sql = "SELECT userid, username, email FROM login WHERE username = '$username' and password = '$password' ";
  $result = $conn->query($sql);
  if ($result->num_rows > 0)
  {
    $row = $result->fetch_assoc();
    $uname = $row["username"];
    $pword = $row["password"];
    $userid = $row["userid"];
    //$arr = array('userid' => "$userid", 'password' =>  "$pword", 'username' => "$uname");
    echo json_encode($row);

    returnWithInfo(json_encode($row));
  }
  
  else
  {
    $object->err = "No account with the uname = " . $username .  " and password =  " . $password;    
    returnWithError($object->err);
  }


}

function returnWithError( $err )
{
    sendResultInfoAsJson(json_encode($err));
}

function getRequestInfo()
{
    return json_decode(file_get_contents('php://input'), true);
}

function sendResultInfoAsJson( $obj )
{
    header('Content-type: application/json');
    echo $obj;
}

?>
