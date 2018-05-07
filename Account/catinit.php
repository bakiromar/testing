<?php
	session_start();

	if (!defined(__DIR__)) {
		define(__DIR__, dirname(__FILE__));
	}
	
	require_once(__DIR__.'/../config.php');
	
	//Connect to database
	$link = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD);
	if(!$link) {
		die('Cannot connect to server');
	}
	mysqli_select_db($link, DB_DATABASE) or die('Cannot select database');
	
	//Retreive created list
	$listname = $_SESSION['listname'];
	$admin_id = $_SESSION['SESS_MEMBER_ID'];
	
	$qry = "SELECT * FROM lists WHERE listname='$listname' AND admin_id='$admin_id'";
	$result = mysqli_query($link, $qry);
	
	//Check if query was successful
	if (!$result) {
		die("Could not retrieve list");
	}
	
	//Retrieve list id
	//For mySQLi
	$list = mysqli_fetch_assoc($result);
	
	//For Mysql
	//$list = mysql_fetch_assoc($result);
	$list_id = $list['list_id'];
	
	//Retrieve categories
	$catarray = $_SESSION['catArray'];
	
	//Create category row entries for each category in array
	$qryvalue = array();
	foreach ($catarray as $cat) {
		$qryvalue[] = "('".$list_id."', '".mysqli_real_escape_string($link, $cat)."')";
	}
	
	//Insert categories into table
	$qry = "INSERT INTO categories(list_id, catname) VALUES ".implode(',', $qryvalue);
	mysqli_query($link, $qry);
	echo $qry;
	
	//Initialize list members
	
	$membarray = array();
	$membarray[] = "('".$admin_id."', '".$list_id."')";
	
	foreach ($_SESSION['members'] as $memb) {
		$membqry = "SELECT * FROM members WHERE email='".$memb."'";
		$membresult = mysqli_query($link, $membqry);
		$memb_id = mysqli_fetch_array($membresult);
		$membarray[] = "('".$memb_id['member_id']."', '".$list_id."')";
	}
	
	$addmemb = "INSERT INTO listmembers(member_id, list_id) VALUES ".implode(',', $membarray);
	mysqli_query($link, $addmemb);
	
	unset($_SESSION['listname'], $_SESSION['catArray'], $_SESSION['members']);
	
	header("location: ".DOMAIN."/List/list.php?list_id=".$list_id);

?>	