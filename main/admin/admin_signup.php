<?php 
	session_start();

	include("connection1.php");
	include("functions1.php");

  	if($_SERVER['REQUEST_METHOD'] == "POST"){
      	$fname = $_POST['fname'];
      	$lname = $_POST['lname'];
      	$email = $_POST['email'];
    	$user_name = $_POST['username']; 
      	$password = $_POST['password']; 
      	$dob = $_POST['dob'];
   
        if(!empty($fname) && !empty($lname) && !empty($email) && !empty($user_name) && !empty($password) && !empty($dob)){
            $query = "SELECT * FROM `users` WHERE `username`='$user_name' LIMIT 1";
            $result = mysqli_query($con, $query);

            //check if username exists
            if($result && mysqli_num_rows($result) > 0){
                echo '<script>alert("Username in use!")</script>';
            } else {
                $query1 = "SELECT * FROM `users` WHERE `email`='$email' LIMIT 1";
                $result1 = mysqli_query($con, $query1);
				//check if email exists
                if($result1 && mysqli_num_rows($result1) > 0){
                    echo '<script>alert("Email in use!")</script>';
                } else {
                    //save user to database
                    $admin_id = $user_name;
                    $query = "INSERT INTO `users`(`username`, `password`, `first_name`, `last_name`, `email`, `dob`) VALUES ('$user_name','$password','$fname','$lname','$email', '$dob')";
                    mysqli_query($con, $query);//query to insert data entered to the table users and to check to see if connection is working 

                    $sql = "INSERT INTO `adviser`(`username`) VALUES ('$user_name')";//query to insert student into the student# table with the value user_name
                    mysqli_query($con, $sql);//connection to query 

                    header("Location: admin_login.php");//redirects to login.php
                    die;
                }
            }
        } else {
            echo '<script>alert("All input fields must be filled to register admin!")</script>';//alerts user that inputs need to be filled
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  	<meta name="author" content="Jeff Abeygunawardana, Reuben Balfour, & Elias Tokola">
  	<link rel="icon" href="../pictures/icon.png">
    <link rel="stylesheet" href="../css/adminstyle.css">
    <title>Admin</title>
</head>
<body>
	<form class="model-content" method="post">
    	<div class="container">
            <h1>Sign Up Admin</h1><br><br>
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
            <input type="text" placeholder="Enter username" name="username"  maxlength="40" required>
            <br>
            <label for="password"><b>Password</b></label><br>
            <input type="password" placeholder="Enter password" name="password"  maxlength="40" required>
            <br>
            <label for="dob"><b>Date of Birth</b></label><br>
            <input type="date" name="dob" required>
            <br>
            <input type="submit" name="submit"  value="Sign up">
            <br>
            <a href="admin_login.php">Login</a><br><br>
        	<a href="../signup.php">User</a>
    	</div>
	</form>
</body>
</html>