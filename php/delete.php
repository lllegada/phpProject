<?php
	include 'connect.php';
	session_start();

	$post_id = $_GET["id"];
	$user_id = $_SESSION["user_id"];

	$query = "DELETE FROM posts WHERE $user_id = posts.user_id AND $post_id = posts.post_id";

	$result = mysqli_query($db_conn, $query);

	header("location: homepage.php");	


?>