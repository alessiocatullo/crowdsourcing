<?php
	$error=''; // Variable To Store Error Message
	$hidden= 'hidden';

/*
	if(isset($_POST['name'])){
		$sql = "SELECT COUNT(0) AS register_check
		FROM campaign
		WHERE name = '$_POST['name']' AND user = $_SESSION['login_user']";
		$result = mysqli_query($con, $sql) or die ("Errore");
		$row = mysqli_fetch_array($result);
		if($row['name'] == 0){
			$hidden='';
			$error = "Campagna già esistente";
		}
	}
	*/
?>