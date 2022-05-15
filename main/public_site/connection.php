<?php
	$servername = "localhost";
	$username = "abeygunj_users";
	$password = "projectteam10";
	$dbname = "abeygunj_users";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if (!$conn) {
         die("Connection failed: " . mysqli_connect_error());
    }
?>