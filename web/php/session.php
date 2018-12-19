<?php
	include("connection.php");
	session_start();
	if(isset($_SESSION['user'])){
		$mail_check=$_SESSION['user'];
		$sql = "SELECT first_name FROM user WHERE user ='$mail_check'";
		$result = mysqli_query($con, $sql) or die ("Errore");
		$row = mysqli_fetch_array($result);
		$login_session =$row['first_name'];
		@mysqli_free_result($result);
		@mysqli_close($con);		
	} else {
		@mysqli_free_result($result);
		@mysqli_close($con);
		header('Location: ../login/login.php');
	}
?>