<?php
session_start();
include ("config.php");
if($_SERVER["REQUEST_METHOD"] == "POST")
{
  $event_name = $_POST["event_name"];
  $date = $_POST["date"];
  $description = $_POST["description"];
  $start = $_POST["start"];
  $end = $_POST["end"];
  $location_name = $_POST["location_name"];
  $longitude  = 1;
  $latitude =1;
  $sql = "INSERT INTO `location` (event_name, start, end, date, location_name,longitude, latitude) VALUES ('$event_name','$start','$end','$date','$location_name', '$longitude', '$latitude')";
  $result = $db->query($sql);
  $sql2 = "SELECT event_name, start, end, date, location_name FROM location WHERE event_name ='$event_name'";
  $result2 = $db->query($sql2);
  if($result2->num_rows > 0 )
  {
    $sql3 = "INSERT INTO `Private_event` (university, event_name, date, description, start, end) VALUES ('{$_SESSION["university"]}','$event_name', '$date', '$description', '$start','$end')";
    $result3 = $db->query($sql3);
    $sql4 = "SELECT event_name, start, end, date, description FROM event WHERE event_name = '$event_name'";
    $result4 = $db->query($sql4);
    if($result4->num_rows >0)
    {
      header("Location:http://157.245.128.154/eventpage.php");
    }
    else
    {
      echo "event inserting failed";
    }

  }
  else
  {
    echo "time conflicts or event name conflict";
    //header("Location:http://157.245.128.154/eventpage.php");
  }


}
?>
<!DOCTYPE html>
<html lang = "en-US">
 <head>
  <title>Create Public Event</title>
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
 <section>
  <div class='window'>
  <form action='createPrivateEvent.php' method='post'>
  <p>Event Name:</p>
   <textarea name='event_name'>Type Name here</textarea>
   <p>Event date</p>
    <input type="date" name='date' />
    </br>
    <p>Event start and end time</p>
    <input type="time" name='start' /> <p> - </p> <input type="time" name='end' />
    </br>
    <p>Event Description</p>
    <textarea name='description'>Event Description</textarea>
    </br>
    <p>Event Location Address</p>
    <textarea name='location_name'>Event Location</textarea>
    </br>
    <button name='submit' type='submit'>Create Event</button>
    </form>
    </br>
  </div>
  </section>
 </body>
</html>
