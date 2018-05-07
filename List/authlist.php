<?php
	//Start session
	if (!isset($_SESSION)) { 	
		session_start();
	}
	
	if (!defined(__DIR__)) {
		define(__DIR__, dirname(__FILE__));
	}
	
	require_once(__DIR__.'/../config.php');
	
	//Check if SESS_MEMBER_ID is set for this session
	if (!isset($_SESSION['SESS_MEMBER_ID']) || (trim($_SESSION['SESS_MEMBER_ID']) == '')) {
		header("location: ".LOGINPAGE);
		exit();
	}
?>