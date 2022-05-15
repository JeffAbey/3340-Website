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
    <title>Course</title><!-- here we are creating title of the page-->
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
    <h1><?php $course_name = $_POST['course_name']; echo $course_name; ?></h1><br><!-- setting page head title to name of course -->
    <div id="course_page">
    	<?php
      		$course_id = $_POST['course_id'];
            $prof_name = $_POST['prof_name'];
            $school = $_POST['school'];
            $price = $_POST['price'];
            $info = $_POST['info'];
			
            echo '<div class="coursepage">      	
                    <h3>Professor: '.$prof_name.'</h3>
                    <h3>Institution: '.$school.'</h3>
                    <h4>Price: $'.$price.'</h4>
                    <form method="post" name="redirect" class="redirect" action="addtocart.php">
                    	<input type="hidden" class="post" name="course_id" value="'.$course_id.'">
                        <button>Add to Cart</button>
                    </form>
                    <p><u>Description</u><br><br> '.$info.'</p>
                  </div>';//displaying course information
    	?>
    </div>
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


  
