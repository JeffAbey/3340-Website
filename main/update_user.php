<?php
	session_start();//starts session

    include("connection.php");//connecting to the database
    include("functions.php");//checking to see if user is logged in 

    $user_data = check_login($conn);//checks if user logged in
?>

<!DOCTYPE html>
<html lang="en">
<head><!-- here we are creating the meta points for ease of search-->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  	<meta name="author" content="Jeff Abeygunawardana, Reuben Balfour, & Elias Tokola">
  	<link rel="icon" href="pictures/icon.png">
    <link rel="stylesheet" href="css/style.css">
    <title>User</title><!-- here we are creating the title of the page-->
</head>
<body>
    <?php 
  		//gets users info from form
  		$new_fname = $_POST['newfname'];
      	$new_lname = $_POST['newlname'];
      	$new_email = $_POST['newemail'];
  		$new_username = $_POST['newusername'];
      	$new_password = $_POST['newpassword'];
  		$current_user = $user_data['username'];
        
  		//checks if all variables are empty and returns to profile page with fail message
  		if(empty($_POST['newfname']) && empty($_POST['newlname']) && empty($_POST['newemail']) && empty($_POST['newusername']) && empty($_POST['newpassword'])){
 		 	$_SESSION['update_message'] = '<script>alert("Enter at least one input to change!")</script>';
        	header("Location: profile_page.php");
        }
        else {
          	//if variable is not empty then it updates value within the users row in the users table
            if(!empty($_POST['newfname'])){
                $sql = "UPDATE `users` SET `first_name`='$new_fname' WHERE `username`='$current_user'";
                mysqli_query($conn, $sql);
            }
          
            if(!empty($_POST['newlname'])){
                $sql = "UPDATE `users` SET `last_name`='$new_lname' WHERE `username`='$current_user'";
                mysqli_query($conn, $sql);
            }  
          
            if(!empty($_POST['newemail'])){
                $sql = "UPDATE `users` SET `email`='$new_email' WHERE `username`='$current_user'";
                mysqli_query($conn, $sql);
            }
          
            if(!empty($_POST['newusername'])){
                $sql = "UPDATE `users` SET `username`='$new_username' WHERE `username`='$current_user'";
                mysqli_query($conn, $sql);
            }
          
            if(!empty($_POST['newpassword'])){
                $sql = "UPDATE `users` SET `password`='$new_password' WHERE `username`='$current_user'";
                mysqli_query($conn, $sql);
            }
          	//returns to profile page with success message
          	$_SESSION['update_message'] = '<script>alert("Updated successfully!")</script>';
            header("Location: profile_page.php");
        }
    ?>
</body>
</html>