<?php

include("connection.php");
session_start();

$mail= $_POST['inputMail'];

// definisco la query di inserimento dati
$sql = "SELECT COUNT(0) AS register_check
		FROM user
        WHERE mail = '$mail'";

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
		$_SESSION['login_value_mail'] = $row['mail'];
		session_commit();
		$sql = "INSERT INTO user (mail, password, firstname, lastname, role)
				VALUES ($mail, $passw, $nome, $cognome, $radio)";
		$result = mysqli_query($con, $sql) or die ("'$radio'");
		header ("location: ../html/login.html");
	} else {
		header ("location: ../html/register_alt.html");
	}
}else{
	header ("location: ../html/login_err.html");
}
@mysqli_free_result($result);
@mysqli_close($con);
?>