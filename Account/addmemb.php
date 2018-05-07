<?php
	if (!isset($_SESSION)) { 	
		session_start();
	}
	
	$_SESSION['members'][] = $_POST['addmemb'];
	
	echo $_GET['type'];
	
	if (strcmp($_GET['type'], 'list') == 0){
		header('location: addlist.php');
	} else {
		header('location: addevent.php');
	}
?>