<?php 

	session_start();

	if (!$_SESSION['login']) {
		header('Location: ../index.php');
		exit();
	}

	header('Location: paso_1.php');

 ?>