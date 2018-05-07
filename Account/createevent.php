<?php
	if (!isset($_SESSION)) { 	
		session_start();
	}
	
	if (!defined(__DIR__)) {
		define(__DIR__, dirname(__FILE__));
	}	

	require_once(__DIR__.'/../config.php');
	
	//Connect to server and select database.
	$link = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE) or die('Cannot connect to server');
	//mysql_select_db(DB_DATABASE) or die('Cannot select database');
	$tbl_name = 'lists'; //Table name
	
	$eventname = $_POST['eventname'];
	$user_id = $_SESSION['SESS_MEMBER_ID'];
	
	$_SESSION['eventname'] = $eventname;
	
	$listqry = "INSERT INTO lists(admin_id, listname, listtype) VALUES ('$user_id', '$eventname', 'event')";
	$listresult = mysqli_query($link, $listqry);
	
	if ($listresult) {
		header('location: iteminit.php');
	} else {
		die('Could not create list');
	}
	
?>