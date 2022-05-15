<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  	<meta name="author" content="Jeff Abeygunawardana, Reuben Balfour, & Elias Tokola">
  	<link rel="icon" href="../pictures/icon.png">
    <link rel="stylesheet" href="../css/adminstyle.css">
    <title>Admin</title>
</head>
<body>
	<div class="monitor">
        <?php
            //connection to database
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

      		function isSiteAvailable($url){
            	if(!filter_var($url, FILTER_VALIDATE_URL)){
                	return false;  
                }
              
              	$curlInit = curl_init($url);
              
              	curl_setopt($curlInit, CURLOPT_CONNECTTIMEOUT, 10);
                curl_setopt($curlInit, CURLOPT_HEADER, true);
                curl_setopt($curlInit, CURLOPT_NOBODY, true);
                curl_setopt($curlInit, CURLOPT_RETURNTRANSFER, true);

                $response = curl_exec($curlInit);

                curl_close($curlInit);

                return $response ? true : false;
            }
      
      		$URL = 'https://tokola.myweb.cs.uwindsor.ca/COMP-3340/Project/public_site/pindex.html';
            $query = "SELECT * FROM `users` WHERE `username`='dummy'";
            $result = mysqli_query($conn, $query);

            if($result){
                echo '<h2>Database Status: </h2><img src="../pictures/green.png" alt="green check mark"><br><br>';
              
              	if(isSiteAvailable($URL)){
                	echo '<h2>Site Status: </h2><img src="../pictures/green.png" alt="green check mark">';
                } else {
                	echo '<h2>Site Status: </h2><img src="../pictures/red.png" alt="red check mark">';  
                }
            } else {
                echo '<h2>Database Status: </h2><img src="../pictures/red.png" alt="red x mark">'; 
              	
              	if(isSiteAvailable($URL)){
                	echo '<h2>Site Status: </h2><img src="../pictures/green.png" alt="green check mark">';
                } else {
                	echo '<h2>Site Status: </h2><img src="../pictures/red.png" alt="red check mark">';  
                }
            }
        ?>
	</div>
</body>
</html>