<?php
$conn = new mysqli("localhost", "debian-sys-maint", "d197cf7871616e0bcada971f428d1f69d5164d01474837e7", "event_manager");
$inData = getRequestInfo();
if ($conn->connect_error)
{
		returnWithError( $conn->connect_error );
}
else
{
	$date = $inData["date"];
	$sql = "SELECT * FROM event where date= '$date' ORDER BY date ASC, start ASC";
		//$result = $conn->query($sql);
	$result = mysqli_query($conn, $sql);
    	$json_array = array();
	if($result->num_rows > 0 )
	{
   		while($row = mysqli_fetch_assoc($result))
    		{
      			$json_array[] = $row;
    		}
    		sendResultInfoAsJson(json_encode($json_array));
		$conn->close();
	}
	else
	{
		$object->err = "There were no events on the";
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
