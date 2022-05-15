<?php
	session_start();//start session

	if(isset($_SESSION['user_id'])){//if there is a variable set to user_id if so enter if statement
    	unset($_SESSION['user_id']); //unset the variable
    }

	header("Location: public_site/pindex.html");//location of head is public_site/pindex.php
	die;//end 
?>