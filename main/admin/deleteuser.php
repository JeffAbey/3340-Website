<?php

	session_start();

	include("connection.php");
	include("functions.php");

	if($_SERVER['REQUEST_METHOD'] == "POST"){
    	$fname = $_POST['fname'];
      	$lname = $_POST['lname'];
      	$email = $_POST['email'];
    	$user_name = $_POST['user_name'];
        
      
      	if(!empty($fname) && !empty($lname) && !empty($email) && !empty($user_name)){
        	$query = "DELETE FROM `user` WHERE `user_name`= '$user_name'";
          	//          	$query = "DELETE FROM `user` WHERE `username`= '$user_name' AND `email` = '$email' AND `first_name` = '$first_name' AND `last_name` = '$last_name' "
            mysqli_query($conn, $query);
        }
     	
      echo '<script>alert("Target profile has been DELETED!")</script>';
    }
  
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  	<meta name="author" content="Jeff Abeygunawardana, Reuben Balfour, & Elias Tokola">
  	<link rel="icon" href="pictures/icon.png">
    <link rel="stylesheet" href="css/style.css">
    <title>User</title>
</head>
<body>
	<form id="f2" class="model-content" method="post">
		<div class="container">
        	<h1>Delete User</h1><br><br>
            <hr><br>
            <label for="fname"><b>First Name</b></label><br>
            <input type="text" placeholder="Enter first name" name="fname"  maxlength="40" required>
            <br>
            <label for="lname"><b>Last Name</b></label><br>
            <input type="text" placeholder="Enter last name" name="lname"  maxlength="40" required>
            <br>
            <label for="email"><b>Email</b></label><br>
            <input type="text" placeholder="Enter email" name="email"  maxlength="40" required>
            <br>
            <label for="username"><b>Username</b></label><br>
            <input type="text" placeholder="Enter username" name="user_name"  maxlength="40" required>
            <br>
            <input class="deletebtn" type="submit" name="submit"  value="Delete">
    	</div>
	</form>
</body>
</html>
