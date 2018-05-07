<?php

	session_start();
	
	//Unserialize the array
	$catArray = unserialize($_POST['catArray']);
	
	$catArray[] = $_POST['newCat'];
	
	$_SESSION['catArray'] = $catArray;
	
	header('location: addlist.php');

?>