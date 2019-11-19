<?php
session_start();
include ("config.php");
?>

<!DOCTYPE html>
<html lang = "en-US">
 <head>
  <title>Create RSO</title>
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
  <form action='createRSO.php' method='post'>
  <p>Event Name:</p>
   <textarea name='name'>Type the name of the student organization here</textarea>
    <p>The student organization's description</p>
    <textarea name='description'>type description here...</textarea>
    </br>
    <p>Organization's email account</p>
    <textarea name='email'>email</textarea>
    </br>
    <button name='submit' type='submit'>Create Student Organization</button>
    </form>
    </br>
  </div>
  </section>
 </body>
</html>
