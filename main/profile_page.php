<?php
	session_start();//starts session

    include("connection.php");//connecting to the database
    include("functions.php");//checking to see if user is logged in 

    $user_data = check_login($conn);//checks if user logged in

	echo $_SESSION['update_message'];//message to display result of adding course to cart
	$_SESSION['update_message'] = null;//sets message to null to avoid unneccessary popup
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
    <title>Profile</title><!-- here we are creating the title of the page-->
</head>
<body>
    <nav id="nav"><!-- here we are creating the navbar-->
        <a href="index.php"><img class="logoimg" src="pictures/icon.png" alt="study icon"></a>
        <a class="logo" href="index.php">Online Study</a>
        <ul>
          	<li><a href="study.html">Music</a></li>
          	<li><a href="facts.php">Studying</a></li>
            <li><a href="courses_page.php">Courses</a></li>
          	<li><a href="viewcart.php"><img src="pictures/cart.png" alt="cart icon"></a></li>
            <li><a href="profile_page.php"><img src="pictures/profile-icon.png" alt="profile icon"></a></li>
          	<li><a href="logout.php"><img src="pictures/logout.png" alt="logout icon"></a></li>
        </ul>
    </nav>
    <br>
    <br>
    <br>
    <br>
    <h1></h1><br>
    <div id="profile">
    	<form class="updateform"  action="update_user.php" method="post"><!-- form to allow user to input value to change within their user row -->
        	<h2>Update <?php echo $user_data['username']."'s"; ?> Info</h2><br><br><!-- displays the users username as the page head title -->
            <hr><br>
            <label for="newfname"><b>First Name</b></label><br>
            <input type="text" placeholder="Enter new first name" name="newfname"  maxlength="40">
            <br>
            <label for="newlname"><b>Last Name</b></label><br>
            <input type="text" placeholder="Enter new last name" name="newlname"  maxlength="40">
            <br>
            <label for="newemail"><b>Email</b></label><br>
            <input type="text" placeholder="Enter new email" name="newemail"  maxlength="40">
            <br>
            <label for="newpassword"><b>Password</b></label><br>
            <input type="password" placeholder="Enter new password" name="newpassword"  maxlength="40">
            <br>
            <input class="signupbtn" type="submit" name="submit"  value="Update">
        </form>
    </div>
    <br>
    <br>
    <br>
  	<br>
    <br>
    <div id="footer2"><!-- here we are creating the footer-->
        <a href="about_page.html"><h3>About</h3></a><br>
      	<a href="FAQ.html"><h3>FAQ</h3></a><br>
        <p>Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved</p>
    </div>
</body>
</html>