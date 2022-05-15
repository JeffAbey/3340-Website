<!DOCTYPE html>
<html lang="en">
<head><!-- here we are creating the meta points for ease of search-->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  	<meta name="author" content="Jeff Abeygunawardana, Reuben Balfour, & Elias Tokola">
  	<link rel="icon" href="../pictures/icon.png">
    <link rel="stylesheet" href="../css/style.css">
    <title>Online Study</title><!-- here we are creating the title of the page-->
</head>
<body>
    <nav id="nav"><!-- here we are creating the navbar-->
        <a href="pindex.html"><img class="logoimg" src="../pictures/icon.png" alt="study icon"></a>
        <a class="logo" href="pindex.html">Online Study</a>
        <ul>
          	<li><a href="pstudy.html">Music</a></li>
            <li><a href="pcourses_page.php">Courses</a></li>
          	<li><button class="loginbn"><a href="../login.php">Login</a></button></li>
          	<li><button class="signupbn"><a href="../signup.php">Sign Up</a></button></li>
        </ul>
    </nav>
    <br>
    <br>
    <br>
    <br>
    <h1>Courses</h1><br>
    <div id="courses">
    	<?php
        	include("connection.php"); 

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
        <a href="pabout_page.html"><h3>About</h3></a><br>
      	<a href="pFAQ.html"><h3>FAQ</h3></a><br>
        <p>Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved</p>
    </div>
</body>
</html>