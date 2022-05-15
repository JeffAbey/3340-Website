<?php
	session_start();

    include("connection.php");//connecting to the database
    include("functions.php");//checks to see if user is logged in 

    $username = check_login($conn);//checks if user is logged in
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
    <title>Should you Study?</title><!-- here we are creating the title for the page-->
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
    <div id="facts">
    	<?php
            $servername = "localhost";//connection to the database for outside sourced open data
            $username = "tokola_3340";
            $password = "tokola135";
            $dbname = "tokola_3340";

            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);
            // Check connection
            if (!$conn) {
                 die("Connection failed: " . mysqli_connect_error());
            } 
  
            $sql = "SELECT * FROM `student_prediction`";//selecting all from the student_prediction table
            $result = $conn->query($sql);
            
            if (!$result) {//if no results enter here
                echo "result";
                exit;
            } 

    		echo '<h2>Should you study?</h2><br><br>';//entering headers and table of contents 
  			echo '<h3>Here we can see that there is a direct correlation between how much you study and your GPA.</h3><br>';
  			echo '<h4><b>Study Hours Legend:</b> 1 = none, 2 = <5 hours, 3 = 6-10 hours, 4 = 11-20 hours, 5 = more than 20 hours</h4><br>';
  			echo '<h4><b>Cumulative GPA Legend:</b> 1 = <2.00, 2 = 2.00-2.49, 3 = 2.50-2.99, 4 = 3.00-3.49, 5 = above 3.29</h4><br><br>';
      	
      		echo '<table>
                          <tr>
                            <th>GPA</th>
                            <th>Hours Studied</th>
                          </tr>';//creating table
			if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {

                    echo '<tr>
                             <td>'. $row["COL 18"] .'</td> 
                             <td>'. $row["COL 30"]. '</td>
                         </tr>';//entering data from COL 18 and COL 30 
                }
              	echo '</table>';
			} else {
   				echo "0 results";
			}
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