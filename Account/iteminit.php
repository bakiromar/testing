<?php
	session_start();

	if (!defined(__DIR__)) {
		define(__DIR__, dirname(__FILE__));
	}
	
	require_once(__DIR__.'/../config.php');
	
	//Connect to server and select database.
	$link = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE) or die('Cannot connect to server');
	//mysql_select_db(DB_DATABASE) or die('Cannot select database');
	$tbl_name = 'lists'; //Table name
	
	//Retreive created list
	$eventname = $_SESSION['eventname'];
	$admin_id = $_SESSION['SESS_MEMBER_ID'];
	
	$qry = "SELECT * FROM lists WHERE listname='$eventname' AND admin_id='$admin_id'";
	$result = mysqli_query($link, $qry);
	
	//Check if query was successful
	if (!$result) {
		die("Could not retrieve list");
	}
	
	$event = mysqli_fetch_array($result);
	$event_id = $event['list_id'];
	
	//Retrieve items
	$items = $_SESSION['eventitems'];
	
	//Create item row entries for each item in array
	$qryvalue = array();
	foreach ($items as $item) {
		$qryvalue[] = "('".$event_id."', '".mysqli_real_escape_string($link, $item)."', 'Event')";
	}
	
	//Insert items into table
	$qry = "INSERT INTO listitems(parentlist_id, itemname, category) VALUES ".implode(',', $qryvalue);
	mysqli_query($link, $qry);
	
	$membarray = array();
	$membarray[] = "('".$admin_id."', '".$event_id."')";
	
	foreach ($_SESSION['members'] as $memb) {
		$membqry = "SELECT * FROM members WHERE email='".$memb."'";
		$membresult = mysqli_query($link, $membqry);
		$memb_id = mysqli_fetch_array($membresult);
		$membarray[] = "('".$memb_id['member_id']."', '".$event_id."')";
	}
	
	$addmemb = "INSERT INTO listmembers(member_id, list_id) VALUES ".implode(',', $membarray);
	mysqli_query($link, $addmemb);
	
	unset($_SESSION['eventname'], $_SESSION['eventitems'], $_SESSION['members']);
	
	header("location: ".DOMAIN."/List/event.php?list_id=".$event_id);
?>