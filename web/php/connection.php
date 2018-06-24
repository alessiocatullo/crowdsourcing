<?php

$host = "localhost";
$user = "root";
$password = "root";
$database = "crowd_sourcing";

$con = @mysqli_connect($host, $user, $password, $database) or die(mysqli_connect_error());
?>