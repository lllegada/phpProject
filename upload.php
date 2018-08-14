<?php
	include 'connect.php';
	session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta http-equiv="x-ua-compatible" content="ie=edge">
		<title>Material Design Bootstrap</title>
		<!-- Font Awesome -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.0/css/font-awesome.min.css">
		<!-- Bootstrap core CSS -->
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<!-- Material Design Bootstrap -->
		<link href="css/mdb.min.css" rel="stylesheet">
		<!-- Your custom styles (optional) -->
		<link href="css/style.css" rel="stylesheet">
		<link href="css/login.css" rel="stylesheet">
		<style type="text/css">
		body{
			color : black;
			background : url("https://mdbootstrap.com/img/Photos/Horizontal/Nature/full page/img(11).jpg") no-repeat center center fixed ;
			background-size: cover;
			font : 90% Helvetica, sans-serif, Arial;
	}
			.view {
		background: url("https://mdbootstrap.com/img/Photos/Others/img (51).jpg")no-repeat center center;
		background-size: cover;
}
@media (min-width: 768px) {
		.view {
				overflow: visible;
				margin-top: -56px;
		}
}
.navbar {
		z-index: 1;
}
header {
	position:absolute; 
	top:0px; 
	left:0px; 
	height:200px; 
	right:0px;
	overflow:hidden;
}

.content {
	position:absolute; 
	top:200px; 
	bottom:200px; 
	left:0px; 
	right:0px; 
	overflow:auto;
}

footer {
	position:relative; 
	bottom:0px; 
	height:200px; 
	left:0px; 
	right:0px;

}

.wrapper {
	padding: 30px;
	text-align: center;
}

.md-form {
	align-content: left !important;
}
.image--cover {
	width: 250px;
	height: 250px;
	border-radius: 50%;
	margin: 5px;
	object-fit: cover;
	object-position: center ;
}
		</style>
</head>

<body>
	<div class="bg"></div>
	<html lang="en" class="full-height">
		<nav class="navbar navbar-expand-lg navbar-dark black">
				<div class="container">
						<a class="navbar-brand" href="#"><strong>Jeanne</strong></a>
						<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
								<span class="navbar-toggler-icon"></span>
						</button>
						<div class="collapse navbar-collapse" id="navbarSupportedContent">
								<ul class="navbar-nav mr-auto" >
										<li class="nav-item ">
												<a class="nav-link" href="newsfeed.html">Home </a>
										</li>
										<li class="nav-item" active>
												<a class="nav-link" href="upload.html">Upload <span class="sr-only">(current)</span></a>
										</li>
										<li class="nav-item">
												<a class="nav-link" href="#">Profile</a>
										</li>
										<li class="nav-item pull-right">
												<a class="nav-link" href="#">Logout</a>
										</li>
								</ul>
						</div>
				</div>
		</nav>

<?php 
		if (isset($_SESSION["username"])) {
			if (isset($_POST["submit"])) {
				$title = $_POST["subject"];
				$content = $_POST["message"];
				
				if (empty($content) && empty($title)) {
					// echo "Please fill both fields";
				}
				else{
	// =========== check if both fields are empty =====
					$id = $_SESSION["user_id"];
					$time = time();

					$query = "INSERT INTO posts (user_id, title, content) VALUES ('$id', '$title', '$content')";

					$result = mysqli_query($db_conn, $query);


				}
			}




 ?>
		
	<!-- Card -->
<div class="card card-cascade reverse" style="padding: 50px">
<div class="card-body card-body-cascade text-center" style="padding-left: 200px; padding-right: 200px">
<div class="card">

		<h3 class="card-header primary-color white-text">Upload</h3>
		<div class="card-body">
						<img src="img/profile.jpg" style="height: 150px; width: 150px; align-content: center;" class="rounded-circle  avatar-pic">
				
				<div class="d-flex justify-content-center">
						<div class="btn btn-mdb-color btn-rounded float-left">
								<span>Add photo</span>
								<input type="file">
						</div>
				</div>
				<form class="add" action="" method="POST">
					<h4 class="card-title"><label for="subject" class="">Subject</label><input type="text" id="subject" name="subject" class="form-control" required>
															</h4>
					<p class="card-text"><label for="message">Your message</label><textarea type="text" id="message" name="message" rows="2" class="form-control md-textarea" required></textarea>
															</p>
					<input type="submit" name="submit" value="Submit" class="btn" id="add-post">
					<a href="homepage.php" class="btn btn-danger" name="cancel" >Cancel</a>
				</form>
		</div>
</div>
<section class="section">
<form id="contact-form" name="contact-form" action="mail.php" method="POST">
								
								<!--Grid row-->

						</form>
		<!--Section heading-->
	 

</section>

	</div>

</div>

<?php

	} else{ ?>
		<div class="row">
			<div class="container">
				<dir id="msg">
						
					<h4>Please login first</h4>
					<a href="login.php" class="btn btn-primary btn-lg" role="button ">Login</a>
				</dir>

			</div>
		</div>
<?php	
	}

?>





<!-- Card -->
<footer class="page-footer font-small mdb-color lighten-3 pt-4">

	<!-- Footer Elements -->
	<div class="container">

		<!--Grid row-->
		<div class="row">

			<!--Grid column-->
			<div class="col-lg-2 col-md-12 mb-4">

				<!--Image-->
				<div class="view overlay z-depth-1-half">
					<img src="https://mdbootstrap.com/img/Photos/Horizontal/Nature/4-col/img%20(73).jpg" class="img-fluid" alt="">
					<a href="">
						<div class="mask rgba-white-light"></div>
					</a>
				</div>

			</div>
			<!--Grid column-->

			<!--Grid column-->
			<div class="col-lg-2 col-md-6 mb-4">

				<!--Image-->
				<div class="view overlay z-depth-1-half">
					<img src="https://mdbootstrap.com/img/Photos/Horizontal/Nature/4-col/img%20(78).jpg" class="img-fluid" alt="">
					<a href="">
						<div class="mask rgba-white-light"></div>
					</a>
				</div>

			</div>
			<!--Grid column-->

			<!--Grid column-->
			<div class="col-lg-2 col-md-6 mb-4">

				<!--Image-->
				<div class="view overlay z-depth-1-half">
					<img src="https://mdbootstrap.com/img/Photos/Horizontal/Nature/4-col/img%20(79).jpg" class="img-fluid" alt="">
					<a href="">
						<div class="mask rgba-white-light"></div>
					</a>
				</div>

			</div>
			<!--Grid column-->

			<!--Grid column-->
			<div class="col-lg-2 col-md-12 mb-4">

				<!--Image-->
				<div class="view overlay z-depth-1-half">
					<img src="https://mdbootstrap.com/img/Photos/Horizontal/Nature/4-col/img%20(81).jpg" class="img-fluid" alt="">
					<a href="">
						<div class="mask rgba-white-light"></div>
					</a>
				</div>

			</div>
			<!--Grid column-->

			<!--Grid column-->
			<div class="col-lg-2 col-md-6 mb-4">

				<!--Image-->
				<div class="view overlay z-depth-1-half">
					<img src="https://mdbootstrap.com/img/Photos/Horizontal/Nature/4-col/img%20(82).jpg" class="img-fluid" alt="">
					<a href="">
						<div class="mask rgba-white-light"></div>
					</a>
				</div>

			</div>
			<!--Grid column-->

			<!--Grid column-->
			<div class="col-lg-2 col-md-6 mb-4">

				<!--Image-->
				<div class="view overlay z-depth-1-half">
					<img src="https://mdbootstrap.com/img/Photos/Horizontal/Nature/4-col/img%20(84).jpg" class="img-fluid" alt="">
					<a href="">
						<div class="mask rgba-white-light"></div>
					</a>
				</div>

			</div>
			<!--Grid column-->

		</div>
		<!--Grid row-->

	</div>
	<!-- Footer Elements -->

	<!-- Copyright -->
	<div class="footer-copyright text-center py-3">© 2018 Copyright
	</div>
	<!-- Copyright -->

</footer>
		<script type="text/javascript" src="js/jquery-3.1.1.min.js"></script>
		<!-- Bootstrap tooltips -->
		<script type="text/javascript" src="js/popper.min.js"></script>
		<!-- Bootstrap core JavaScript -->
		<script type="text/javascript" src="js/bootstrap.min.js"></script>
		<!-- MDB core JavaScript -->
		<script type="text/javascript" src="js/mdb.min.js"></script>
</body>

</html>