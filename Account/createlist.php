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
	
	//Retreive data from form
	$listname = $_POST['listName'];
	$admin_id = $_SESSION['SESS_MEMBER_ID'];
	$listtype = 'list';
	
	//Create listname session variable for catinit.php
	$_SESSION['listname'] = $listname;
	
	//Insert new row
	$sql = "INSERT INTO $tbl_name(admin_id, listname, listtype) VALUES ('$admin_id', '$listname', '$listtype')";
	$result = mysqli_query($link, $sql);
	
	
	if ($result) {
		header("location: catinit.php");
	} else {
		die("Could not create list");
	}
	
	//mysql_close();
?>