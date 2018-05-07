<?php
	if (!isset($_SESSION)) { 	
		session_start();
	}
	require_once(__DIR__.'/../config.php');
	
	//Fetch input variables
	$list_id = $_GET['list_id'];
	$category = $_GET['category'];
	$itemname = $_GET['itemname'];
	$type = $_GET['type'];
	$user_id = $_SESSION['SESS_MEMBER_ID'];
	date_default_timezone_set ('America/Vancouver');
	$time = date("Y-m-d H:i:s");
	
	//Select new category
	if (strcmp($type, 'buy') == 0) {
		$newcat = 'bought';
	} elseif (strcmp($type, 'del') == 0) {
		$newcat = 'delete';
	}
	
	//Connect to server and select database.
	$link = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE) or die('Cannot connect to server');
	
	//Apply new category
	$qry = 'UPDATE listitems SET category="'.$newcat.'", user_id_del="'.$user_id.'", datedelete="'.$time.'" WHERE parentlist_id="'.$list_id.'" AND category="'.$category.'" AND itemname="'.$itemname.'"';
	$result = mysqli_query($link, $qry);
	
	echo $list_id.$category.$itemname.$type.$user_id.$newcat;
	
	if (!$result) {
		die('Query failed');
	}
	
	header('location: list.php?list_id='.$list_id);
?>