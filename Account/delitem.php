<?php
	session_start();
	
	$delIndex = $_GET['del'];
	
	array_splice($_SESSION['eventitems'], $delIndex, 1);
	
	header('location: addevent.php');
?>