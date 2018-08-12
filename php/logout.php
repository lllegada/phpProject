<?php
	include 'connect.php';
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<?php

		if (isset($username)) {
			session_unset();
			session_destroy();

			header("Location: login.php");

		} else{
			echo "Login first";
		}


	?>
</head>
<body>

</body>
</html>