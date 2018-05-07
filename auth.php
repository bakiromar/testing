<?php
	//Start session
	if (!isset($_SESSION)) { 	
		session_start();
	}
	
	//Check if SESS_MEMBER_ID is set for this session
	if (!isset($_SESSION['SESS_MEMBER_ID']) || (trim($_SESSION['SESS_MEMBER_ID']) == '')) {
		header("location: index.php");
		exit();
	}
?>