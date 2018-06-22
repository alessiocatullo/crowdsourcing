<?php
session_start();
include("session_check.php");
include("exit.php");
if(!isLogged())
	exit_session();
?>