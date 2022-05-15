<?php
	session_start();

    include("connection1.php");
    include("functions1.php");

    $admin_data = check_login($con);
?>

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
  	<div class="container">
        <nav class="nav">
            <a class="logo" href="admin_page.php">Admin</a>
        </nav>
      
      	<div class="homebody">
          	<div id="topbar">
              	<h3><?php echo $admin_data['username']; ?></h3>
        		<a href="logout1.php"><img src="../pictures/logout.png" alt="logout icon"></a>
          	</div>
      	</div>
    </div>
</body>
</html>

