<?php
	if (!isset($_SESSION)) { 	
		session_start();
	}
	
	require_once(__DIR__.'/../config.php');
	
	//Connect to server and select database.
	$link = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE) or die('Cannot connect to server');
	
	//Retrieve form data
	$list_id = $_POST['list_id'];
	$user_id = $_SESSION['SESS_MEMBER_ID'];
	$itemname = $_POST['itemName'];
	$catId = $_POST['catId'];
	$categories = $_SESSION['categories'];
	$time = date("Y-m-d H:i:s");
	
	//Select proper category
	$category = $categories[$catId];
	
	echo $list_id.'  '.$user_id.' '.$itemname.' '.$category.' '.$time;
	
	$qry = "INSERT INTO listitems(parentlist_id, user_id_add, itemname, category, datecreate) VALUES ('$list_id', '$user_id', '$itemname', '$category', '$time')";
	
	$result = mysqli_query($link, $qry);
	
	if (!$result) {
		die('he ded');
	}
	
	header('location: list.php?list_id='.$list_id);
	
?>