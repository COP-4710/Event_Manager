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
  echo "Hooray";
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
