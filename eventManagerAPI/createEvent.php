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
  $eventname = $inData["event_name"];
  $date = $inData["date"];
  $description = $inData["description"];
  $start = $inData["start"];
  $end = $inData["end"];

  //sql command and query
  $sql  = "INSERT INTO `event` (event_name, date, description, start, end ) VALUES ('$eventname', '$date', '$description', '$start', '$end')";
  $sql2 = "SELECT event_name, date, event_id, start, end FROM login WHERE event_name = '$eventname' ";
  $result = $conn->query($sql);
  $result2 = $conn->query($sql2);
  //if there is a record found we will return json package with the searched values
  if ($result2->num_rows > 0)
  {
    //organizing all search values as an array
    $row = $result2->fetch_assoc();
    sendResultInfoAsJson(json_encode($row));
  }
  // creation of event fail
  else
  {
    $object->err = "creation of event fail";
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
