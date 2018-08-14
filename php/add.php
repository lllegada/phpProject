<?php
	include 'connect.php';
	session_start();
?>

<!DOCTYPE html>
<html>
<link rel="stylesheet" href="../css/login.css">
<link rel="stylesheet" href="../css/main.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script type="text/javascript" src="../js/add.js"></script>
<link rel="stylesheet" type="text/css" href="../vendor/bootstrap/css/bootstrap.css">


<head>
	<title>Online Web Journal</title>
</head>
<body>
<?php
	if (isset($_SESSION["username"])) {
		if (isset($_POST["submit"])) {
			$title = $_POST["title"];
			$content = $_POST["content"];
			
			echo empty($content);
			echo empty($title);
			if (empty($content) && empty($title)) {
				echo "Please fill both fields";
			}
			else{
// =========== check if both fields are empty =====
				$id = $_SESSION["user_id"];
				$time = time();
				// $date = date("Y-m-d",$t);


				echo $time;

				$query = "INSERT INTO posts (user_id, title, content) VALUES ('$id', '$title', '$content')";

				$result = mysqli_query($db_conn, $query);
				echo "results: ";
				if (!$result) {
					echo "error";
				} else{
					echo "success";
				}

			}
		}
	?>
		<div class="header">
			<h1>Welcome <?php $id ?> </h1>
		</div>
		<div class="row">
			<div class="card">
		  		<img src="img/profile.jpg" alt="avatar" class="avatar">
				  <h1>Jeanne Linsy</h1>
				  <p class="title">Student, UnderGraduate</p>
				  <p>Saint Louis University</p> 
				  <a href="#"><i class="fa fa-twitter"></i></a> 
				  <a href="#"><i class="fa fa-linkedin"></i></a> 
				  <a href="#"><i class="fa fa-facebook"></i></a> 
				  <a href="#"><p><button>Profile</button></p></a>
			</div>
			<div class="column_journal">
				<div class="navbar">
					<a href="homepage.php"><i class="fa fa-fw fa-home"></i> Home</a>
					<a href="add.php"><i class="fa fa-fw fa-plus"></i> Add</a>

					<a href="logout.php" style="float: right;"><i class="fa fa-fw fa-close"></i> Logout</a>
				</div>
<!-- ====================== FORM ============================== -->
				<form class="add" action="" method="POST">
					<div>
						
					<input id="title-field" type="text" name="title" placeholder="Journal entry title" class="en">
					</div>
					<div>
<!-- ===== if title field is left empty display message ====== -->
				<?php
					if (isset($_POST["submit"])) {
						$title = $_POST["title"];
						if (empty($title)) {
					?> 		<p style="color: red;">Please enter title</p>

					<?php
			
						}
					}
					?>

					<textarea rows="4" id="content-field" cols="50" name="content" placeholder="Enter entry here..." class="entry"></textarea>
<!-- ===== if content is left empty display message ===== -->
					<?php
						if (isset($_POST["submit"])) {
							$content = $_POST["content"];
							if (empty($content)) {

					?>
								<p style="color: red;">Please enter content</p>
					<?php	
							}

						}	
					

				?>
		  			</div>
		  			<div>
		  				
		  			<a href="homepage.php" class="btn btn-danger" name="cancel" >Cancel</a>
		  			<input type="submit" name="submit" value="Submit" class="btn" id="add-post">
		  			</div>
				</form>
			</div>
		</div>
<?php
	}

	else{
		?> 
		<div class="row">
			<div class="container">
				<dir id="msg">
						
					<h4>Please login first</h4>
					<a href="login.php" class="btn btn-primary btn-lg" role="button ">Login</a>
				</dir>

			</div>
		</div>

<?php	}
?>



	<div class="footer">
		<p> &copy; Copyright</p>
	</div>	
</body>
</html>