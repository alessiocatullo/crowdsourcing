<?php
	$done = false;
	$msg = '';

	if(isset($_POST['name'])){
		$msg = "OK";
		$done = false;
	}

    $response = array(
        'msg' => $msg,
        'done' => $done,
     );
    echo json_encode($response);
?>



