<?php 
	session_start();//start session

	include("connection.php");//connection to database
	include("functions.php");//checking if user is logged in 

  	if($_SERVER['REQUEST_METHOD'] == "POST"){//checking to see if server request method is post if so enter if statment
      	$fname = $_POST['fname'];//setting variables to the user inputted data
        $lname = $_POST['lname'];
        $email = $_POST['email'];
        $user_name = $_POST['username']; 
        $password = $_POST['password']; 

        if(!empty($fname) && !empty($lname) && !empty($email) && !empty($user_name) && !empty($password)){
            $query = "SELECT * FROM `users` WHERE `username`='$user_name' LIMIT 1";
            $result = mysqli_query($conn, $query);

            //check if username exists
            if($result && mysqli_num_rows($result) > 0){
                echo '<script>alert("Username already exists!")</script>';
            } else {
                $query1 = "SELECT * FROM `users` WHERE `email`='$email' LIMIT 1";
                $result1 = mysqli_query($conn, $query1);
				//check if email exists
                if($result1 && mysqli_num_rows($result1) > 0){
                    echo '<script>alert("Email already exists!")</script>';
                } else {
                    //save user to database
                    $user_id = $user_name;
                    $query2 = "INSERT INTO `users`(`username`, `password`, `first_name`, `last_name`, `email`) VALUES ('$user_name','$password','$fname','$lname','$email')";
                    mysqli_query($conn, $query2);//query to insert data entered to the table users and to check to see if connection is working 

                    $sql = "INSERT INTO `student#`(`username`) VALUES ('$user_name')";//query to insert student into the student# table with the value user_name
                    mysqli_query($conn, $sql);//connection to query 

                    header("Location: login.php");//redirects to login.php
                    die;
                }
            }
        } else {
            echo '<script>alert("All input fields must be filled to register user!")</script>';//alerts user that inputs need to be filled
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"><!-- here we are creating the meta points for ease of search-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  	<meta name="author" content="Jeff Abeygunawardana, Reuben Balfour, & Elias Tokola">
  	<link rel="icon" href="pictures/icon.png">
    <link rel="stylesheet" href="css/style.css">
    <title>User</title><!-- here we are creating the title for the page-->
</head>
<body>
	<form id="f2" class="model-content" method="post"><!-- here we are creating the form for the user to enter their information-->
		<div class="container">
        	<h1>Sign Up User</h1><br><br>
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
            <input class="signupbtn" type="submit" name="submit"  value="Sign up">
            <br>
            <a href="login.php">Login</a><br><br><!-- link to student login -->
        	<a href="admin/admin_signup.php">Admin</a><!-- link to admin login -->
    	</div>
	</form>
</body>
</html>