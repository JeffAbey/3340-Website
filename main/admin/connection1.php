<?php
    //connection to database
    $servername = "localhost";
    $username = "abeygunj_users";
    $password = "projectteam10";
    $dbname = "abeygunj_users";

    // Create connection
    $con = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if (!$con) {
         die("Connection failed: " . mysqli_connect_error());
    }
?>
