<?php
	session_start();//start session

	include("connection1.php");//connection to database
	include("functions1.php");//checking if user is logged in 

  	if($_SERVER['REQUEST_METHOD'] == "POST"){//checking to see if server request method is post if so enter if statment
    	$user_name = $_POST['username']; //setting variables to the user inputted data
      	$password = $_POST['password']; 
      
      	if(!empty($user_name) && !empty($password)){
        	//save user to database
          	$query = "SELECT * FROM users WHERE username='$user_name' LIMIT 1";         
          	$result = mysqli_query($con, $query);
          
          	if($result){
          		if($result && mysqli_num_rows($result) > 0){
            		$admin_data = mysqli_fetch_assoc($result);

                	if($admin_data['password'] === $password && !empty($admin_data['dob'])){
                      	$_SESSION['admin_id'] = $admin_data['username'];
                    	header("Location: admin_page.php");
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
  	<link rel="icon" href="../pictures/icon.png">
    <link rel="stylesheet" href="../css/adminstyle.css">
    <title>Admin</title><!-- here we are creating the title of page-->
</head>
<body>
  <form class="model-content" method="post"><!-- creating form for admin login-->
    <div class="container">
      <h1>Admin Login</h1><br><br><!-- creating head for admin log-->
      <hr><br>
      <label for="username"><b>Username</b></label><br>
      <input type="text"  name="username" placeholder="Enter username" maxlength="40" required>
      <br>
      <label for="password"><b>Password</b></label><br>
      <input type="password"  name="password"  placeholder="Enter password" maxlength="40" required>
      <br>
      <input type="submit" name="submit"  value="login"><br>
      <a href="admin_signup.php">Sign Up</a><br><br>
      <a href="../login.php">User</a>
      <br>
    </div>
  </form>
</body>
</html>