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

     .form-dark .font-small {
font-size: 0.8rem; }

.form-dark [type="radio"] + label,
.form-dark [type="checkbox"] + label {
font-size: 0.8rem; }

.form-dark [type="checkbox"] + label:before {
top: 2px;
width: 15px;
height: 15px; }

.form-dark .md-form label {
color: #fff; }

.form-dark input[type=text]:focus:not([readonly]) {
border-bottom: 1px solid #00C851;
-webkit-box-shadow: 0 1px 0 0 #00C851;
box-shadow: 0 1px 0 0 #00C851; }

.form-dark input[type=text]:focus:not([readonly]) + label {
color: #fff; }

.form-dark input[type=password]:focus:not([readonly]) {
border-bottom: 1px solid #00C851;
-webkit-box-shadow: 0 1px 0 0 #00C851;
box-shadow: 0 1px 0 0 #00C851; }

.form-dark input[type=password]:focus:not([readonly]) + label {
color: #fff; }

.form-dark input[type="checkbox"] + label:before {
content: '';
position: absolute;
top: 0;
left: 0;
width: 17px;
height: 17px;
z-index: 0;
border: 1.5px solid #fff;
border-radius: 1px;
margin-top: 2px;
-webkit-transition: 0.2s;
transition: 0.2s; }

.form-dark input[type="checkbox"]:checked + label:before {
top: -4px;
left: -3px;
width: 12px;
height: 22px;
border-style: solid;
border-width: 2px;
border-color: transparent #00c851 #00c851 transparent;
-webkit-transform: rotate(40deg);
-ms-transform: rotate(40deg);
transform: rotate(40deg);
-webkit-backface-visibility: hidden;
-webkit-transform-origin: 100% 100%;
-ms-transform-origin: 100% 100%;
transform-origin: 100% 100%; }

    </style>
</head>

<body>
	<!--Section: Live preview-->
<section class="form-dark" style="position: relative; padding: 90px">

<!--Form without header-->
<div class="card card-image" style="background-image: url('https://mdbootstrap.com/img/Photos/Others/pricing-table7.jpg'); width: 28rem; position: absolute; left: 35%;">
    <div class="text-white rgba-stylish-strong py-5 px-5 z-depth-4">

        <!--Header-->
        <div class="text-center">
            <h3 class="white-text mb-5 mt-4 font-weight-bold"><strong>SIGN</strong> <a class="green-text font-weight-bold"><strong> UP</strong></a></h3>
        </div>

        <!--Body-->
        <div class="md-form">
            <input type="text" id="Form-email5" name="username" class="form-control white-text" required autofocus >
            <label for="Form-email5">Your Username</label>
        </div>

        <div class="md-form pb-3">
            <input type="password" name="pass" id="Form-pass5" class="form-control white-text" required>
            <label for="Form-pass5">Your password</label>
    
        </div>

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

								header("location: newsfeed.php");
							}
							else{
						?>		
								<p style="color: red;">Wrong username/password</p>
						<?php 	}
					
						}	
				
					?>
					</div>




        <!--Grid column-->
        <div class="col-md-12">
            <p class="font-small white-text d-flex justify-content-end">Have an account? </p>
            <input type="submit" name="submit" id="submit" value="Log-in" class="login100-form-btn">
		</div>

        <!--Grid column-->

    </div>
</div>
<!--/Form without header-->

</section>
<!--Section: Live preview-->
	
</body>

</html>