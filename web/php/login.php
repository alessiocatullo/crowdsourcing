<?php

include("connection.php");
session_start();

//intercetto le variabili passate dal form
$mail= $_POST['inputMail'];
$password= $_POST['inputPassword'];

// definisco la query di inserimento dati
$sql = "SELECT COUNT(mail) AS login_check, mail 
		FROM user
        WHERE mail = '$mail' 
        AND password = '$password'";

//Eseguo la query
$result = mysqli_query($con, $sql) or die ("Errore");

$row = mysqli_fetch_array($result);



if($row['login_check'] == 0)
{
	header ("location: ../html/login_err.html");
} 
else 
{
	// liberazione della memoria dal risultato della query
	@mysqli_free_result($result); 
	$_SESSION['login_value_mail'] = $row['mail'];
	session_commit();
	$sql = "UPDATE user SET last_login = NOW() WHERE mail = '$mail'";
	$result = mysqli_query($con, $sql) or die ("Errore query last_login");
	header ("location: ../html/home.html");
}

@mysqli_free_result($result);
@mysqli_close($con);

?>