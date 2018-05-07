<?php
	require_once('authlist.php');
	if (!isset($_SESSION)) { 	
		session_start();
	}
	
	$link = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE) or die('Cannot connect to server');
	
	$list_id = $_GET['list_id'];
	$itemname = $_GET['itemname'];
	$user_id = $_SESSION['SESS_MEMBER_ID'];
	date_default_timezone_set ('America/Vancouver');
	$time = date("Y-m-d H:i:s");
	
	$qry = "UPDATE listitems SET user_id_del='".$user_id."', datedelete='".$time."' WHERE parentlist_id='".$list_id."' AND itemname='".$itemname."'";
	$result = mysqli_query($link, $qry);
	
	header('location: event.php?list_id='.$list_id);
?>