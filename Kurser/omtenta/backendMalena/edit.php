<?php session_start(); ?>

<?php
if(!isset($_SESSION['valid'])) {
	header('Location: login.php');
}
?>

<?php
include_once("connection.php");

if(isset($_POST['update']))
{	
	$id = $_POST['id'];
	
	$title = $_POST['title'];
	$ingress = $_POST['ingress'];
	$content = $_POST['content'];
	$tags = $_POST['tags'];
	$published = $_POST['published'];
	$author = $_POST['author'];
	$status = $_POST['status'];	
	
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
		} else {	
		//updating the table
		$result = mysqli_query($mysqli, "UPDATE posts SET title='$title', ingress='$ingress', content='$content',
		tags='$tags', published='$published', author='$author', status='$status' WHERE id=$id");
		
		//redirectig to the display page.
			if(!isset($_SESSION['valid'])) {
				header("Location: view.php");
			}
		}
	}
}
?>
<?php
//getting id from url
$id = $_GET['id'];

//selecting data associated with this particular id
$result = mysqli_query($mysqli, "SELECT * FROM posts WHERE id=$id");

while($res = mysqli_fetch_array($result))
{
	$title = $res['title'];
	$ingress = $res['ingress'];
	$content = $res['content'];
	$tags = $res['tags'];
	$published = $res['published'];
	$author = $res['author'];
	$status = $res['status'];	
}
?>
<html>
<head>	
	<title>Edit Post</title>
</head>

<body>
	<a href="index.php">Home</a> | <a href="view.php">View Posts</a> | <a href="logout.php">Logout</a>
	<br/><br/>
	
	<form name="form1" method="post" action="edit.php">
		<table border="0">
			<tr> 
				<td>Title</td>
				<td><input type="text" name="title"></td>
			</tr>
			<tr> 
				<td>Ingress</td>
				<td><input type="text" name="ingress"></td>
			</tr>
			<tr> 
				<td>Content</td>
				<td><input type="text" name="content"></td>
			</tr>
			<tr> 
				<td>Tags</td>
				<td><input type="text" name="tags"></td>
			</tr>
			<tr> 
				<td>Published</td>
				<td><input type="text" name="published"></td>
			</tr>
			<tr> 
				<td>Author</td>
				<td><input type="text" name="author"></td>
			</tr>
			<tr> 
				<td>Status</td>
				<td><input type="text" name="status"></td>
			</tr>
			<tr>
				<td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
				<td><input type="submit" name="update" value="Update"></td>
			</tr>
		</table>
	</form>
</body>
</html>
