<?php
   session_start();
   include("config.php");

   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      $myusername = mysqli_real_escape_string($db,$_POST['loginEmail']);
      $mypassword = mysqli_real_escape_string($db,$_POST['loginPW']); 
   	//echo $_POST['loginEmail'];   
      $sql = "SELECT userid FROM login WHERE email = '$myusername' and password = '$mypassword'";
    //  $result = mysqli_query($db,$sql);
      // $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $result = $db->query($sql);
//      $row2 = $result->fetch_assoc();  
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($result->num_rows == 1) {
	   $row2 = $result->fetch_assoc();  
	    //    session_register("myusername");
	      //  changed login_user to username to match event page variable
         $_SESSION['login_user'] = $myusername;    
	 if(!isset($SESSION['login']))
	 {
		 	$_SESSION['option-button'] = 1;
			// echo "Is This working??";
			$_SESSION['userid'] = $row2['userid'];
			$sql2 = "SELECT username, userlevel, university FROM  personalInfo WHERE userid = {$_SESSION['userid']}";
			$result2 = $db->query($sql2);
			$row3 = $result2->fetch_assoc();
			$_SESSION['university'] = $row3["university"];
			$_SESSION['username'] = $row3["username"];
			$_SESSION['userlevel'] = $row3["userlevel"];
	  header("Location:http://157.245.128.154/eventpage.php");
	}
      }else {
         $error = "Your Login Name or Password is invalid";
   }
   }
?>
