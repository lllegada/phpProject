<?php
	include 'connect.php';
	session_start();


?>


<!DOCTYPE html>
<html>
<link rel="stylesheet" href="../css/login.css">
<link rel="stylesheet" href="../css/main.css">
<link rel="stylesheet" type="text/css" href="../vendor/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<body>
	<?php  
		$id = $_GET["id"];

		$query = "SELECT * FROM posts WHERE $id = post_id";
		$result = mysqli_query($db_conn, $query);
	
		$row = mysqli_fetch_assoc($result);
	


		if (isset($_POST["submit"])) {
			$title = $_POST["title"];
			$content = $_POST["content"];


			$query = "UPDATE posts SET title = '$title' AND content = '$content' WHERE post_id = $id";

			mysqli_query($db_conn, $query);
		}
	?>

	<form class="login100-form validate-form container" action="homepage.php" method="POST">
					<div name="title" class="wrap-input100 validate-input m-b-26" >
						<label for="title">Title</label>
						<input class="input100" type="text" name="title" id="username" value="<?php echo $row['title'] ?>" autofocus required>
						
					</div>

					<div name="content" class="wrap-input100 validate-input m-b-18">
						<label for="content">Content</label>
						
					</div>
					<textarea rows="4" id="content-field" cols="50" name="content" class="entry"><?php echo $row['content'] ?></textarea>

					<input type="submit" name="submit" value="Update" class="btn btn-primary" id="update-post">
	</form>


</body>
</html>
