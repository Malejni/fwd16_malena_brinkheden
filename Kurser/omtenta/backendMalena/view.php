<?php session_start(); ?>

<?php
if(!isset($_SESSION['valid'])) {
	header('Location: login.php');
}
?>

<?php
//including the database connection file
include_once("connection.php");

//fetching data in descending order (lastest entry first)
$result = mysqli_query($mysqli, "SELECT * FROM products WHERE login_id=".$_SESSION['id']." ORDER BY id DESC");
?>

<html>
<head>
	<title>MalenaBackend</title>
</head>

<body>
	<a href="index.php">Home</a> | <a href="add.html">Add New Post</a> | <a href="logout.php">Logout</a>
	<br/><br/>
	
	<table width='80%' border=0>
		<tr bgcolor='#CCCCCC'>
			<td>Title</td>
			<td>Ingress</td>
			<td>Content</td>
			<td>Tags</td>
			<td>Published</td>
			<td>Author</td>
			<td>Status</td>
		</tr>
		<?php
		while($res = mysqli_fetch_array($result)) {		
			echo "<tr>";
			echo "<td>".$res['title']."</td>";
			echo "<td>".$res['ingress']."</td>";
			echo "<td>".$res['content']."</td>";
			echo "<td>".$res['tags']."</td>";
			echo "<td>".$res['published']."</td>";
			echo "<td>".$res['author']."</td>";
			echo "<td>".$res['status']."</td>";
			echo "<td><a href=\"edit.php?id=$res[id]\">Edit</a> | <a href=\"delete.php?id=$res[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";		
		}
		?>
	</table>	
</body>
</html>
