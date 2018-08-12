<?php
	include 'connect.php';
	session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login V15</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="../images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="../vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../vendor/animsition/css/animsition.min.css">
	<link rel="stylesheet" type="text/css" href="../vendor/select2/select2.min.css">	
	<link rel="stylesheet" type="text/css" href="../vendor/daterangepicker/daterangepicker.css">
	<link rel="stylesheet" type="text/css" href="../css/util.css">
	<link rel="stylesheet" type="text/css" href="../css/login.css">
	<style type="text/css">
		* {
		    box-sizing: border-box;
		}


		.fullscreen-video-wrap{
			position: absolute;
			margin-right: 0px;
			margin-left: 0px;
			overflow: hidden;
		}

	</style>
</head>
<body>
		<div class="fullscreen-video-wrap">
			<video src="../images/background.mp4" autoplay="true" loop="true" height="100%" width="100%"></video>
		</div>
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-form-title" style="background-image: url(../images/cute.jpg);">
					<span class="login100-form-title-1">
						Welcome to Jinsy  
					</span>
				</div>

				<form class="login100-form validate-form container" action="" method="POST">
					<div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
						<label for="username">Username</label>
						<input class="input100" type="text" name="username" id="username" placeholder="Enter username" autofocus required>
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-18" data-validate = "Password is required">
						<label for="pass">Password</span>
						<input class="input100" type="password" name="pass" id="pass" placeholder="Enter password" required>
						<span class="focus-input100"></span>
					</div>

			<!-- 		<div class="flex-sb-m w-full p-b-30">
						<div class="contact100-form-checkbox">
							<input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
							<label class="label-checkbox100" for="ckb1">
								Remember me
							</label>
						</div>
					</div> -->

					<div class="container">
					<?php

						if (isset($_POST["submit"])) {
							$username = $_POST["username"];
							$password = md5($_POST["pass"]);

							$query = "SELECT * FROM users WHERE username = '$username' AND password = '$password' ";
							$result = mysqli_query($db_conn, $query);

							$count = mysqli_num_rows($result);


							if ($count == 1) {
								$_SESSION["username"] = $username;
								// $_SESSION["password"] = $password;
								$row = mysqli_fetch_array($result);

								// echo $row[0];
								$_SESSION["user_id"] = $row[0];

								header("location: homepage.php");
							}
							else{
						?>		
								<p style="color: red;">Wrong username/password</p>
						<?php 	}
					
						}	
				
					?>
					</div>

					<div class="container" id="login-btn">
						<input type="submit" name="submit" id="submit" value="Log-in" class="login100-form-btn">
					</div>
				</form>
			</div>
		</div>
	</div>
	
<!--===============================================================================================-->
	<script src="../vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="../vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="../vendor/bootstrap/js/popper.js"></script>
	<script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="../vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="../vendor/daterangepicker/moment.min.js"></script>
	<script src="../vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="../vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="../js/main.js"></script>

</body>
</html>