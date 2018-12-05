<?php
	include_once("connection.php");
	session_start(); // Starting Session
	$error=''; // Variable To Store Error Message
	$hidden= 'hidden';

	if(isset($_POST['inputMail'])) {
		$mail= $_POST['inputMail'];
		// definisco la query di inserimento dati
		$sql = "SELECT COUNT(*) AS test
				FROM user
		        WHERE user = '$mail'";

		//Eseguo la query
		$result = mysqli_query($con, $sql) or die ("Errore");

		$row = mysqli_fetch_array($result);

		if($row['test'] == 0){
			$hidden='';
			$error = "Utente non trovato!";
		} else {
			$password= $_POST['inputNewPassword'];
			$passwordConf= $_POST['inputNewPasswordConf'];
			@mysqli_free_result($result);
			if(strcmp($password,$passwordConf)!=0){
				$hidden='';
				$error = "Password diverse!";
			} else {
				$sql = "UPDATE user SET password='$password'
		        WHERE user = '$mail'";
		        $result = mysqli_query($con, $sql) or die ("Errore modifica password");
		        $_SESSION['response']='Password modificata! Effettua il login'; // Initializing Session
				header("location: login.php");
			}
		}
	}
	@mysqli_free_result($result);
	@mysqli_close($con);
?>