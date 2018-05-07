<?php

	session_start();
	
	$delIndex = $_GET['del'];
	$catArray = $_SESSION['catArray'];
	
	array_splice($_SESSION['catArray'], $delIndex, 1);
	
	//Remove selected index from array
	//array_splice($catArray, $delIndex, 1);
	
	//Put modified array back into Session variable
	//$_SESSION['catArray'] = $catArray;
	
	header('location: addlist.php');
	
?>	