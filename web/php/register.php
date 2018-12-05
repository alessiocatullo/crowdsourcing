<?php
	include_once("connection.php");
	session_start(); // Starting Session
	$error=''; // Variable To Store Error Message
	$hidden= 'hidden';

	if(isset($_POST['inputMail'])){
		$mail= $_POST['inputMail'];

		// definisco la query di inserimento dati
		$sql = "SELECT COUNT(0) AS register_check
				FROM user
		        WHERE user = '$mail'";

		//Eseguo la query
		$result = mysqli_query($con, $sql) or die ("Errore");

		$row = mysqli_fetch_array($result);

		if($row['register_check'] == 0){
			$nome= $_POST['inputNome'];
			$cognome= $_POST['inputCognome'];
			$mail= $_POST['inputMail'];
			$passw= $_POST['inputPassword'];
			$passwConf= $_POST['inputPasswordConf'];
			$radio= $_POST['radio'];

			if(strcmp($passw, $passwConf)==0){
			// liberazione della memoria dal risultato della query
				@mysqli_free_result($result); 
				$sql = "INSERT INTO user (user, password, first_name, last_name, role)
						VALUES ('$mail', '$passw', '$nome', '$cognome', '$radio')";
				$result = mysqli_query($con, $sql) or die ("'$mail', '$passw', '$nome', '$cognome', '$radio'");
				$_SESSION['response']='Utente registrato! Effettua il login';
				header ("location: login.php");
			} else {
				$hidden='';
				$error = 'Dati Errati! I dati inseriti non sono validi';
			}
		}else{
			$hidden='';
			$error = 'Utente registrato! Effettua il login';
		}
		@mysqli_free_result($result);
		@mysqli_close($con);
	}
?>