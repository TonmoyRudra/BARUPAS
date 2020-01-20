<?php 
	if (!isset($_SESSION["user"])) {
		header("Location:./login.php");
		// header('Refresh: 2; URL = index.php');
	} else {
		$user= $_SESSION['user'];
	}
?>