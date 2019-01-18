<?php
	session_start();
	if(session_destroy()){
		header("Location: ../pages/login/login.php"); // Redirecting To Home Page
	}
?>