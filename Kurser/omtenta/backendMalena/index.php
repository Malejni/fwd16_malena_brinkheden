<?php session_start(); ?>
<html>
<head>
	<title>MalenaBackend</title>
	<link href="style.css" rel="stylesheet" type="text/css">
</head>

<body>
	<div id="header">
		Welcome to my blog!
	</div>
	<?php
	if(isset($_SESSION['valid'])) {			
		include("connection.php");					
		$result = mysqli_query($mysqli, "SELECT * FROM login");
	?>
				
		Welcome <?php echo $_SESSION['name'] ?>! <a href='logout.php'>Logout</a><br/>
		<br/>
		<a href='view.php'>View and Add Blog Posts</a>
		<br/><br/>
	<?php	
	} else {
		echo "You must be logged in to view this page.<br/><br/>";
		echo "<a href='login.php'>Login</a> | <a href='register.php'>Register</a>";
	}
	?>
	<div id="footer">
		Created by Malena Brinkheden
	</div>
</body>
</html>