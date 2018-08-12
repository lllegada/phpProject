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
<head>
	<title>Online Web Journal</title>
</head>
<body>
<?php 
	if (isset($_SESSION["username"])) {

	?>
		<div class="header">
			<h1>Welcome <?php $_SESSION["username"] ?> </h1>
		</div>
		<div class="row">
			<div class="card">
		  		<img src="../images/profile.png">
				  <h1>Jeanne</h1>
				  <p class="title">September 30, 1998</p>
				  <p>Studied BSIT at Saint Louis University, Baguio City</p>  
				  <a href="#"><i class="fa fa-twitter"></i></a> 
				  <a href="#"><i class="fa fa-instagram"></i></a> 
				  <a href="#"><i class="fa fa-facebook"></i></a> 
				  <a href="#"><p><button>Profile</button></p></a>
			</div>
			<div class="column_journal">
				<div class="navbar">
					<a href="homepage.php"><i class="fa fa-fw fa-home"></i> Home</a>
					<a href="add.php"><i class="fa fa-fw fa-plus"></i> Add</a>
					<a href="#"><i class="fa fa-fw fa-image"></i> Pictures</a>
					<a href="login.php" style="float: right;"><i class="fa fa-fw fa-close"></i> Logout</a>
				</div>
				<!-- <p>content here...</p> -->
				<div class="container">
					<div class="post">
						
					</div>
				</div>
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