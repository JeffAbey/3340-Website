<?php
	session_start();//start session

	include("connection.php");//connection to database
	include("functions.php");//checking if user is logged in 

  	if($_SERVER['REQUEST_METHOD'] == "POST"){//checking to see if server request method is post if so enter if statment
    	$user_name = $_POST['username']; //setting variables to the user inputted data
      	$password = $_POST['password']; 
      
      	if(!empty($user_name) && !empty($password)){
        	//save user to database
          	$query = "SELECT * FROM users WHERE username='$user_name' LIMIT 1";         
          	$result = mysqli_query($conn, $query);
          
          	if($result){
          		if($result && mysqli_num_rows($result) > 0){
            		$user_data = mysqli_fetch_assoc($result);

                	if($user_data['password'] === $password){
                      	$_SESSION['user_id'] = $user_data['username'];
                    	header("Location: index.php");
          				die;  
                    }
                } 
            }
          	echo '<script>alert("Wrong username or password!")</script>';
        }
    }
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
    <title>User</title><!-- here we are creating the title of page-->
</head>
<body>
  <form class="model-content" method="post"><!-- creating form for user login-->
    <div class="container">
      <h1>User Login</h1><br><br><!-- creating head for user log-->
      <hr><br>
      <label for="username"><b>Username</b></label><br>
      <input type="text"  name="username" placeholder="Enter username" maxlength="40" required>
      <br>
      <label for="password"><b>Password</b></label><br>
      <input type="password"  name="password"  placeholder="Enter password" maxlength="40" required>
      <br>
      <input class="loginbtn" type="submit" name="submit"  value="login"><br>
      <a href="signup.php">Sign Up</a><br><br>
      <a href="admin/admin_login.php">Admin</a>
      <br>
    </div>
  </form>
</body>
</html>