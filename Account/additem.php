<?php
	if (!isset($_SESSION)) { 	
		session_start();
	}
	
	$_SESSION['eventitems'][] = $_POST['newitem'];
	
	header('location: addevent.php');
?>