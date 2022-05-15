<?php
	session_start();//session start to connect to the approrpiate php pages

    include("connection.php");//Connecting to the database server 
    include("functions.php");//checks if user is logged in

    $user_data = check_login($conn);//checks login
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  	<meta name="author" content="Jeff Abeygunawardana, Reuben Balfour, & Elias Tokola">
  	<link rel="icon" href="pictures/icon.png">
    <link rel="stylesheet" href="css/style.css">
    <title>User</title>
</head>
<body>
    <?php			
        $courseid = $_POST['course_id'];//creating variable courseid to connect to the POST of course_id

  		$sql = "SELECT * FROM `cart` WHERE `course_id`='$courseid'";//select all from the table cart where course id is equal to $courseid
  		$result = $conn->query($sql);//creating the connection to the query 
  
  		if ($result->num_rows == 0) {//enter the if statment if item is not present in the cart
			$usercart = "INSERT INTO `cart`( `course_id`) VALUES ('$courseid')";//creating variable user cart to insert into cart the course which matches the $courseid
        	mysqli_query($conn, $usercart);
        	$_SESSION['message'] = '<script>alert("Course has been added to cart!")</script>';//print out success of adding the course to the cart
            header("Location: courses_page.php");//signaling the response to courses_page.php
        } else {//enter here if item is already in cart
            $_SESSION['message'] = '<script>alert("Course already in your cart!")</script>';//print out the message course already in your cart!
            header("Location: courses_page.php");//signaling the reponse to course_page.php
        }
    ?>;
</body>
</html>