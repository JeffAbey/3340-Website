<?php
	session_start();

    include("connection.php");//connection to database
    include("functions.php");//checks to see if user is logged in 

    $user_data = check_login($conn);
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
    <title>Online Study</title><!-- here we are creating the title for the page-->
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
    <div class="content">
        <img class="pic" src="pictures/learn.jpg" alt="pic of learn in blocks"><!-- here we are displaying a picture of LEARN-->
        <br>
      	<br>
      	<h1>Interact with the organ that learns and stores all your knowledge</h1><br><!-- here we are displaying a live webpage on our homepage-->
      	<iframe scrolling="no" src="https://www.brainfacts.org/3d-brain#intro=true" title="Interactive Brain" class="brain"></iframe>
      	<br>
      	<br>     	
    </div>
    <br>
    <br>
    <br>
    <div id="footer"><!-- here we are creating the footer-->
        <a href="about_page.html"><h3>About</h3></a><br>
      	<a href="FAQ.html"><h3>FAQ</h3></a><br>
        <p>Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved</p>
    </div>
</body>
</html>