<?php
	function check_login($conn){//function to check the login
    	if(isset($_SESSION['user_id'])){//if there is a user_id enter the if statment 
        	$id = $_SESSION['user_id']; //creating variable id to connect to the user_id
          	$query = "SELECT * FROM users WHERE username = '$id' LIMIT 1";//query to select the user where it matches the id
          	
          	$result = mysqli_query($conn, $query);//connection of the query 
          	if($result && mysqli_num_rows($result) > 0){//if results and rows greater than 0 enter if statement
            	$user_data = mysqli_fetch_assoc($result);//fetch the user data
              	return $user_data;//return the user data
            }
        }
      	
		header("Location: login.php");//location of header is login.php
      	die;//end function
    }
?>