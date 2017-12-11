<?php session_start(); ?>

<?php
if(!isset($_SESSION['valid'])) {
	header('Location: login.php');
}
?>

<html>
<head>
	<title>New post</title>
</head>

<body>
<?php
//including the database connection file
include_once("connection.php");

if(isset($_POST['Submit'])) {	
	$title = $_POST['title'];
	$ingress = $_POST['ingress'];
	$content = $_POST['content'];
	$tags = $_POST['tags'];
	$published = $_POST['published'];
	$author = $_POST['author'];
	$status = $_POST['status'];
	$loginId = $_SESSION['id'];
		
	// checking empty fields
	if(empty($title) || empty($ingress) || empty($content) || empty($tags) || empty($published)
	|| empty($author) || empty($status)) {
				
		if(empty($title)) {
			echo "<font color='red'>Title field is empty.</font><br/>";
		}
		
		if(empty($ingress)) {
			echo "<font color='red'>Ingress field is empty.</font><br/>";
		}
		
		if(empty($content)) {
			echo "<font color='red'>Content field is empty.</font><br/>";
		}

		if(empty($tags)) {
			echo "<font color='red'>Tags field is empty.</font><br/>";
		}

		if(empty($published)) {
			echo "<font color='red'>Published field is empty.</font><br/>";
		}

		if(empty($author)) {
			echo "<font color='red'>Author field is empty.</font><br/>";
		}

		if(empty($status)) {
			echo "<font color='red'>Status field is empty.</font><br/>";
		}
		
		//link to the previous page
		echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
	} else { 
		// if all the fields are filled (not empty) 
			
		//insert data to database	
		$result = mysqli_query($mysqli, "INSERT INTO posts(title, ingress, content, tags,
		published, author, status, login_id) VALUES('$title','$ingress','$content',
		'$tags', '$published', '$author', '$status', '$loginId')");
		
		//display success message
		echo "<font color='green'>New post added successfully.";
		echo "<br/><a href='view.php'>View Blog</a>";
	}
}
?>
</body>
</html>
