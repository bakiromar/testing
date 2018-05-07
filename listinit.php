<?php
	//Start session
	session_start();
	
	//Include database connection details
	require_once('config.php');
	$link = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);
	
	//Get login info
	$email = $_GET['email'];
	$password = $_GET['password'];
	
	//Retrieve new account ID
	$accqry = "SELECT * FROM members WHERE email='".$email."'";
	$accresult = mysqli_query($link, $accqry);
	$login = mysqli_fetch_array($accresult);
	
	$user_id = $login['member_id'];
	
	//Initialize default lists
	$qry = "INSERT INTO listmembers(member_id, list_id) VALUES ('".$user_id."', '1'), ('".$user_id."', '2')";
	$result = mysqli_query($link, $qry);
	
	header('location: login.php?email='.$email.'&password='.$password);
	
?>