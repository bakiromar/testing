<?php
	//Start Session
	session_start();
	
	//Include database connection details
	require_once('config.php');
	
	//Array to store validation errors
	$errmsg_arr = array();
	
	//Validation error flag
	$errflag = false;
	
	//Connect to mysql server
	$link = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);
	if (!$link) {
		die('Failed to connect to server: '.mysql_error());
	}
	
	//Select database
	/* $db = mysql_select_db(DB_DATABASE);
	if (!$db) {
		die('Unable to select database');
	} */
	
	//Function to sanitize values received from form (prevents SQL injection)
	//MySQLi
	function clean($str, $link) {
		$str = trim($str);
		if (get_magic_quotes_gpc()) {
			$str = stripslashes($str);
		}
		return mysqli_real_escape_string($link, $str);	
	}
	
	//MySql
	/* function clean($str) {
		$str = @trim($str);
		if (get_magic_quotes_gpc()) {
			$str = stripslashes($str);
		}
		return mysql_real_escape_string($str);
	} */
	
	//Sanitize the REQUEST values
	$email = clean($_REQUEST['email'], $link);
	$password = clean($_REQUEST['password'], $link);
	
	//Input Validations
	if ($email == '') {
		$errmsg_arr[] = 'Email missing';
		$errflag = true;
	}
	
	if ($password == '') {
		$errmsg_arr[] = 'Password missing';
		$errflag = true;
	}
	
	//If there are input validations, redirect back to the login form
	if ($errflag) {
		$_SESSION['ERRMSG_ARR'] = $errmsg_arr;
		session_write_close();
		header("location: index.php");
		exit();
	}
	
	//Create query
	$qry = "SELECT * FROM members WHERE email='$email' AND passwd='".md5($_REQUEST['password'])."'";
	$result = mysqli_query($link, $qry);
	
	//Check whether the query was successful or not
	if ($result) {
		if (mysqli_num_rows($result) == 1) {
			//Login Successful
			session_regenerate_id();
			$member = mysqli_fetch_assoc($result);
			$_SESSION['SESS_MEMBER_ID'] = $member['member_id'];
			$_SESSION['SESS_FIRST_NAME'] = $member['firstname'];
			$_SESSION['SESS_LAST_NAME'] = $member['lastname'];
			session_write_close();
			header("location: ".HOMEURL);
			exit();
		} else {
			//Login failed
			$errmsg_arr[] = 'Login failed';
			$_SESSION['ERRMSG_ARR'] = $errmsg_arr;
			header("location: index.php");
			exit();
		}
	} else {
		die("Query failed");
	}