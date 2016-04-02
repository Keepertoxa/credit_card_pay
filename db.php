<?php
	error_reporting(0);
	$db_host = 'localhost';
	$db_user = 'u0074366_card';
	$db_password = 'crcard9911@';
	$db_name = 'u0074366_card';
	
	$link = mysqli_connect($db_host, $db_user, $db_password, $db_name);
	if (!$link) {
    	die('<p style="color:red">'.mysqli_connect_errno().' - '.mysqli_connect_error().'</p>');
	}