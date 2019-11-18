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
  $sql = "INSERT INTO `location` (event_name, start, end, date, location_name) VALUES ('$event_names','$start','$end','$date','$location_name')";
  $result = $db->query($sql);
  $sql2 = "SELECT event_name, start, end, date, location_name FROM location WHERE('$event_names','$starts','$end','$date','$location_name')";
  $result2 = $db-query($sql2);
  if($reslut2->num_rows > 0 )
  {
    $sql3 = "INSERT INTO `event` (event_name, date, description, start, end) VALUES ('$event_name', '$date', '$description', '$start','$end')";
    $result3 = $db->query($sql3);
    $sql4 = "SELECT event_name, start, end, date, description FROM event WHERE('$event_names','$start','$end','$date','$description')";
    $result4 = $db-query($sql4);
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
<html>
 <head>
  <title>Create Public Event</title>
 </head>
 <body>
 <section>
  <div class='window'>
  <form action='createEvent.php' method='post'>
  <p>Event Name:</p>
   <textarea name='event_name'>Type Name here</textarea>
   <p>Event time</p>
    <input type="date" name='date' />
    </br>
    <input type="time" name='start' /> <p> - </p> <input type="time" name='end' />
    </br>
    <textarea name='description'>Event Description</textarea>
    </br>
    <textarea name='location_name'>Event Location</textarea>
    </br>
    <button name='submit' type='submit'>Create Event</button>
    </form>
    </br>
  </div>
  </section>
 </body>
</html>
