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
		<title>Jeanne</title>
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
												<a class="nav-link" href="newsfeed.php">Home </a>
										</li>
										<li class="nav-item" active>
												<a class="nav-link" href="upload.php">Upload <span class="sr-only">(current)</span></a>
										</li>
										<li class="nav-item">
												<a class="nav-link" href="#">Profile</a>
										</li>
										<li class="nav-item pull-right">
												<a class="nav-link" href="logout.php">Logout</a>
										</li>
								</ul>
						</div>
				</div>
		</nav>


<?php 
		if (isset($_SESSION["username"])) {
?>
<div class="content2" style="padding-left: 200px; padding-right: 200px;">
			<div class="wrapper">
							<img src="img/profile.jpg" class="image--cover" alt="selfie" id="profile" width="95" height="90" align="center">
						</div>
						<br><hr>
						<!-- Card -->

						
<div class="card card-cascade wider reverse">

	<?php
		$user_id = $_SESSION["user_id"];
		$query = "SELECT * FROM posts WHERE user_id = $user_id ORDER BY date_posted DESC";

		$result = mysqli_query($db_conn, $query);

		while ($row = mysqli_fetch_assoc($result)):

	?>
	<!-- start of post -->
	<div class="row">
		<!-- <div class="view view-cascade overlay">
			<img class="card-img-top" src="img/travel5.jpg" alt="Card image cap" width="500" height="400">
			<a href="#!">
				<div class="mask rgba-white-slight"></div>
			</a>
		</div> -->

		<!-- Card content -->
		<div class="card-body card-body-cascade text-center">

			<!-- Title -->
			<h4 class="card-title"><strong> <?php echo $row['title'] ?> </strong></h4>
			<h5><?php 
									$date = $row['date_posted'];
									$split = explode(" ", $date);

								echo $split[0] ?> </h5>
			<p class="card-text"> <?php echo $row['content'] ?>			</p>

			<div class="btn-group btn-group-justified" >
									

			<a href="update.php?id=<?php echo $row["post_id"] ?>" class="btn btn-primary"><span class="glyphicon glyphicon-edit"></span> Edit </a>

			<!-- Trigger the modal with a button -->
			<button id="delBtn" type="button" class="btn btn-danger " data-toggle="modal" data-target="#deleteModal">Open Modal</button>

			</div>
			<!-- Modal -->
			<div id="deleteModal" class="modal fade" role="dialog">
			  <div class="modal-dialog">

			    <!-- Modal content-->
			    <div class="modal-content">
			      
			      <div class="modal-body">
			        <p>Are you sure you want to delete this post?</p>
			      </div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			     
			        <a href="delete.php?id=<?php echo $row["post_id"] ?>"  class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Delete </a>

			      </div>
			    </div>

			  </div>
			</div>

		</div>
	</div>
<!-- end of post -->

	<?php endwhile; ?>

</div>

		<!-- Linkedin -->
		<a class="px-2 fa-lg li-ic"><i class="fa fa-linkedin"></i></a>
		<!-- Twitter -->
		<a class="px-2 fa-lg tw-ic"><i class="fa fa-twitter"></i></a>
		<!-- Dribbble -->
		<a class="px-2 fa-lg fb-ic"><i class="fa fa-facebook"></i></a>

	</div>

</div>
<!-- Card -->
						<br><br>
				</div>
	
<?php

	} else{

?>
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