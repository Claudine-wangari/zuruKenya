<?php
	
	session_start();
	require 'connect.php';
	$query = mysqli_close($db);

	session_unset($_SESSION['Name']);
	session_destroy();

	echo("<script>window.location = 'login.php';</script>");

?>