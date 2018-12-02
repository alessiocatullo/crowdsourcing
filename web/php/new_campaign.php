<?php
	$error=''; // Variable To Store Error Message
	$hidden= 'hidden';

	if(isset($_POST['name'])){
		header("location: ../pages/requester.php#new_campaign#response"); 
		$name = $_POST['name'];

		echo $name;

		$user = $_SESSION['login_user'];

		$sql = "SELECT COUNT(0) AS register_check
		FROM campaign
		WHERE name = '$name' AND user = '$user'";
		$result = mysqli_query($con, $sql) or die ("Errore");
		$row = mysqli_fetch_array($result);
		if($row['name'] == 0){
			$hidden='';
			$error = "Campagna già esistente";
			header("location: ../pages/requester.php#new_campaign#response"); 
		}
	}
?>