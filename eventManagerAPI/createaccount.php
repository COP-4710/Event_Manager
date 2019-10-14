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
  //storing some information so that we can search with them later
  $email = $inData["email"];
  $username = $inData["username"];
  $password = $inData["password"];
  $firstname = $inData["firstname"];
  $lastname = $inData["lastname"];

  //sql command and query
  $sql  = "INSERT INTO `login` (email, username, password) VALUES ('$email', '$username', '$password')";
  $sql2 = "SELECT userid FROM login WHERE username = '$username' and password = '$password' ";

  $result = $conn->query($sql);
  $result2 = $conn->query($sql2);

  //if there is a record found we will return json package with the searched values
  if ($result->num_rows > 0)
  {
    //organizing all search values as an array
    $row = $result->fetch_assoc();
    $userid = $row["userid"];
    $sql3 = "INSERT INTO `username` (userid, firstname, lastname) VALUES ('$userid', '$firstname', '$lastname')";
    $result3 = $conn->query($sql3);
    sendResultInfoAsJson(json_encode($row));
  }

  //else we will return with an error message
  else
  {
    $object->err = "create account failure";
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
