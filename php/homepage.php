<?php
	include 'connect.php';
	session_start();
?>

<!DOCTYPE html>
<html>
<link rel="stylesheet" href="../css/login.css">
<link rel="stylesheet" href="../css/main.css">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<head>
	<title>Online Web Journal</title>
</head>
<body>
<?php 
	if (isset($_SESSION["username"])) {

	?>
		<div class="header">
			
		</div>
		<div class="row">
			<div class="card">
		  		<img src="img/profile.jpg" class="avatar">
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
					
					<a href="logout.php" style="float: right;"><i class="fa fa-fw fa-close"></i> Logout</a>
				</div>
				<!-- <p>content here...</p> -->
				<div class="container">

		<?php

				$user_id = $_SESSION["user_id"];
				$query = "SELECT * FROM posts WHERE user_id = $user_id ORDER BY date_posted DESC";

				$result = mysqli_query($db_conn, $query);
				
				while ($row = mysqli_fetch_assoc($result)):  ?>
						<br>
						<div class="row" style="background-color: #F6F6F6;">
							<div class="col-md-4">
								<h3> <?php echo $row['title'] ?></h3>
								<h5><?php 
									$date = $row['date_posted'];
									$split = explode(" ", $date);

								echo $split[0] ?></h5>
								<p><?php echo $row['content'] ?></p>
								
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

							<div>
							
							<!-- Trigger the modal with a button -->
							<button id="delBtn" type="button" class="btn btn-danger btn-lg" data-toggle="modal" data-target="#deleteModal">Delete</button>

							<a role="button" href="update.php?id=<?php echo $row["post_id"] ?>" class="btn btn-primary btn-lg"> Edit </a>


						</div>
						</div>

				

			<?php

				endwhile;

		?>

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