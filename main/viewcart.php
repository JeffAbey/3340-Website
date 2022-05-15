<?php
	session_start();//session start to connect to the appropriate php pages

    include("connection.php");//connecting to the database server
    include("functions.php");

    $user_data = check_login($conn);

	echo $_SESSION['message2'];
	$_SESSION['message2'] = null;
?>

<!DOCTYPE html>
<html lang="en">
<head><!-- here we are creating the meta points for ease of search-->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  	<meta name="author" content="Jeff Abeygunawardana, Reuben Balfour, & Elias Tokola">
  	<link rel="icon" href="pictures/icon.png"><!-- here we are creating the icon for webpage-->
    <link rel="stylesheet" href="css/style.css"><!-- here we are connecting to the stylesheet-->
    <title>Online Study</title> <!-- here we are creating the title of the page-->
</head>
<body>
    <nav id="nav"><!--Creation of the nav bar including different dropdowns for Studying, Courses, cart, profile page, logout -->
        <a href="index.php"><img class="logoimg" src="pictures/icon.png" alt="study icon"></a>
        <a class="logo" href="index.php">Online Study</a>
        <ul>
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
  	<h1>Cart</h1><br><!--Headline of the page represented by Cart-->
    <div id="cart">
    	<?php
            $sql = "SELECT * FROM `cart`"; //query to select all information from the cart table
            $result = $conn->query($sql); //connection to the query 
            $sum = 0;//producing the variable sum for the price feature

            if (!$result) {//connection to see if the result feature works 
                echo "result";
            	exit;
            } 
      
            if ($result->num_rows > 0) {//if there are greater than 0 rows enter this if statement
              echo '<table>
                  	<tr>
                    	<th>Course</th>
                        <th>Price</th>
                        <th></th>
                    </tr>';//creating a table with Course and Price as the main sub headings
              
    			while($row = $result->fetch_assoc()) {//looking through the data to fetch results
              		$course_id = $row["course_id"];//setting $course_id to the row equal to course_id
                      
                    $sql2 = "SELECT * FROM `course` WHERE course_id='$course_id'";//Selecting all data from the course table where it meets the course_id requirments
                    $result2 = $conn->query($sql2);//connection to the quqery
                    
                  	$row2 = $result2->fetch_assoc();//setting row2 equal to the fetched results of the query
                  
                  	echo '<tr>
                             <td>' .$row2["course_name"]. '</td> 
                             <td>$' .$row2["price"]. '</td>
                             <td><form method="post" name="redirect" class="redirect" action="deletefromcart.php">
                                  <input type="hidden" class="post" name="course_id" value="'.$row2["course_id"].'">
                                  <button>Remove</button>
                              </form></td>
                         </tr>';//continuation of the table to include course_name and price
                  
                    $sum = $sum+$row2['price'];//adding up the totals of the price                      
				}
              	echo '<tr>
                      	 <td> Total </td> 
                         <td>$' . $sum . '</td>
                         <td></td>
                      </tr>';
              	echo '</table>';//continuation of the table to output the total sum
            } else {
            	echo '<p>Head to the Courses page to view our course catalog for selection.</p>';
            }         
		?>
    </div>
    <br>
    <br>
    <br>
    <div id="footer2"><!--Creation of the footer-->
        <a href="about_page.html"><h3>About</h3></a><br>
      	<a href="FAQ.html"><h3>FAQ</h3></a><br>
        <p>Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved</p>
    </div>
</body>
</html>