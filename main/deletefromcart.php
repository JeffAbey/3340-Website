<?php
	session_start();

    include("connection.php");//connects to the database 
    include("functions.php");//checks to see if the user is logged in 

    $user_data = check_login($conn);//checks to see if the user is logged in 
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
    <?php 
  		$courseid = $_POST['course_id'];//creating var $courseid to connect to POST of course_id
  
		$sql = "DELETE FROM `cart` WHERE `course_id`= '$courseid'";//creating the query to delete from cart where the courseid matches
  
  		if(mysqli_query($conn, $sql)){//if the connection was successful enter this if statement
        	$_SESSION['message2'] = '<script>alert("Course successfully removed!")</script>';//create a session of a message of successful removal
          	header("Location: viewcart.php");//location for the message is viewcart
        }
  		else{
        	 $_SESSION['message2'] = '<script>alert("Error removing course!")</script>';//create an error message
        	 header("Location: viewcart.php");//location for the message is viewcart
        }
    ?>
</body>
</html>