<?php
	session_start();
	
	$delIndex = $_GET['del'];
	
	array_splice($_SESSION['members'], $delIndex, 1);
	
	if (strcmp($_GET['type'], 'list') == 0){
		header('location: addlist.php');
	} else {
		header('location: addevent.php');
	}
?>