<?php
	include_once("connection.php");
	session_start(); // Starting Session
	$error=''; // Variable To Store Error Message
	$hidden= 'hidden';
	$color='';
	$bgcolor='';

	if(isset($_SESSION['response'])){
		$hidden='';
		$error = $_SESSION['response'];
		$color= '#427d30';
		$bgcolor= '#48a94273';
	} else {
		$color= '#a94442';
		$bgcolor= '#a9444273';
	}

	if (isset($_POST['login'])) {
		if (empty($_POST['inputMail']) || empty($_POST['inputPassword'])) {
			$hidden='';
			$error = "Alcuni campi sono vuoti";
		} else {
			// Define $mail and $password
			$mail=$_POST['inputMail'];
			$password=$_POST['inputPassword'];

			// definisco la query di inserimento dati
			$sql = "SELECT COUNT(user) AS login_check, user 
					FROM user
			        WHERE user = '$mail' 
			        AND password = '$password'";
			//Eseguo la query
			$result = mysqli_query($con, $sql) or die ("Errore 1");
			$row = mysqli_fetch_array($result);

		
			if ($row['login_check'] == 1) {
				$_SESSION['user']=$mail;

				$sql = "SELECT * FROM user
				        WHERE user = '$mail' 
				        AND password = '$password'";
				//Eseguo la query
				$result = mysqli_query($con, $sql) or die ("Errore 2");
				$row = mysqli_fetch_array($result);
				$_SESSION['role']= $row['role'];
				$_SESSION['first_name']= $row['first_name'];
				$_SESSION['last_name']= $row['last_name'];
				session_commit();
				
				$sql = "UPDATE user SET last_login = NOW() WHERE user = '$mail'";
				$result = mysqli_query($con, $sql) or die ("Errore query last_login");
				if(strcmp($row['role'], "REQUESTER") == 0){
					header("location: ../pages/requester.php");
				}else if(strcmp($row['role'], "WORKER") == 0){
					header("location: ../pages/worker.php");
				}
				$hidden='';
				$error = "Errore";
			} else {
				$hidden='';
				$error = 'Email o Password errati';
			}
		@mysqli_free_result($result);
		@mysqli_close($con);
		}
	}
	$_SESSION['response']=null;
	session_commit();
?>