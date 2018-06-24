<?php

include_once("connection.php");
session_start();

$mail= $_POST['inputMail'];

// definisco la query di inserimento dati
$sql = "SELECT COUNT(*) AS check
		FROM user
        WHERE mail = '$mail'";

//Eseguo la query
$result = mysqli_query($con, $sql) or die ("Errore");

$row = mysqli_fetch_array($result);

if($row['check'] == 0){
	header ("location: ../html/login_alt.html");
} else {
	$password= $_POST['inputNewPassword'];
	$passwordConf= $_POST['inputNewPasswordConf'];
	@mysqli_free_result($result); 
	$_SESSION['login_value_mail'] = $row['mail'];
	session_commit();
	if(strcmp($password,$passwordConf)!=0){
		header ("location: ../html/lostPassword_passw.html");
	} else {
		$sql = "UPDATE user SET password=$password
        WHERE mail = '$mail'";
        $result = mysqli_query($con, $sql) or die ("Errore query last_login");
		header ("location: ../html/login.html");
	}
}

@mysqli_free_result($result);
@mysqli_close($con);

?>