<?php
session_start();
include ("config.php");
?>

<!DOCTYPE html>
<html lang = "en-US">
 <head>
  <title>Create RSO Event</title>
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
  <form action='createEventRSO.php' method='post'>
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
