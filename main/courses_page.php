<?php
	session_start();//starts session

    include("connection.php");//connecting to the database
    include("functions.php");//checking to see if user is logged in 

    $user_data = check_login($conn);//checks if user logged in

	echo $_SESSION['message'];//message to display result of adding course to cart
	$_SESSION['message'] = null;//sets message to null to avoid unneccessary popup
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
    <title>Online Study</title><!-- here we are creating the title of the page-->
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
    <h1>Courses</h1><br>
    <div id="courses">
    	<?php
            $sql = "SELECT * FROM course";//creating a query to select all information from course table
            $result = $conn->query($sql);//checking connection

            if (!$result) {//if no results enter
            	echo "result";//echo result
                exit;
            } 

            if ($result->num_rows > 0) {//enter if statement if rows is greater than 0
            	// output data of each row
                while($row = $result->fetch_assoc()) {//while in the look row is equal to the fetch results
                	echo'<div class="course"> 
                    		<div class="coursedetails">
                              <h2>'.$row["course_name"] . '</h2>
                              <h3>'.$row["prof_name"].'</h3>
                              <h3>'.$row["school"].'</h3>
                              <h4>$'.$row["price"].'</h4>
                              <p>'.$row["info"].'</p>
                              </div>';//displaye course information

                    echo '<form method="post" name="redirect" class="redirect" action="course.php">
                              <input type="hidden" class="post" name="course_id" value="'.$row["course_id"].'">
                              <input type="hidden" class="post" name="course_name" value="'.$row["course_name"].'">
                              <input type="hidden" class="post" name="prof_name" value="'.$row["prof_name"].'">
                              <input type="hidden" class="post" name="school" value="'.$row["school"].'">
                              <input type="hidden" class="post" name="price" value="'.$row["price"].'">
                              <input type="hidden" class="post" name="info" value="'.$row["info"].'">
                              <input type="submit" value="Course details" class="courseredirect"/>
                              </div>
                              </form> <br>';//echo a hidden form with course information to be posted to other pages
                }
            } else {
        		echo "<h2>No courses available</h2>";//if no results echo no courses available 
        	}

        	echo "</div>";
    	?>
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