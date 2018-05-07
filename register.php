<?php
	//Start session
	session_start();
	
	//Include database connection details
	require_once('config.php');
	
	//Array that stores validation errors
	$errmsg_arr = array();
	
	//Validation error flag
	$errflag = false;
	
	//Connect to mysql server
	
	//MySQLi
	$link = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);
	
	//MySql
	//$link = mysql_connect(DB_HOST, DB_USER, DB_PASSWORD);
	
	if (!$link) {
		die('Failed to connect to server: ' . mysqli_error());
	}
	
	//Select the database (for MySql)
	/* $db = mysqli_select_db($link, DB_DATABASE);
	if (!$db) {
		die("Unable to select database");
	} */
	
	//Function to sanitize the values received from the form (prevents SQL injection)
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
		$str = trim($str);
		if (get_magic_quotes_gpc()) {
			$str = stripslashes($str);
		}
		return mysqli_real_escape_string($str);	
	} */
	
	//Sanitize the POST values (MySQLi)
	$fName = clean($_POST['firstname'], $link);
	$lName = clean($_POST['lastname'], $link);
	$email = clean($_POST['email'], $link);
	$pass1 = clean($_POST['password1'], $link);
	$pass2 = clean($_POST['password2'], $link);
	
	//MySql
	/* $fName = clean($_POST['firstname']);
	$lName = clean($_POST['lastname']);
	$email = clean($_POST['email']);
	$pass1 = clean($_POST['password1']);
	$pass2 = clean($_POST['password2']); */
	
	//Input Validations
	if ($fName == '') {
		$errmsg_arr[] = 'First name is missing';
		$errflag = true;
	}
	
	if ($lName == '') {
		$errmsg_arr[] = 'Last name is missing';
		$errmsg_arr[] = $lName;
		$errflag = true;
	}
	
	if ($email == '') {
		$errmsg_arr[] = 'Email is missing';
		$errmsg_arr[] = $email;
		$errflag = true;
	}
	
	if ($pass1 == '') {
		$errmsg_arr[] = 'Password is missing';
		$errmsg_arr[] = $pass1;
		$errflag = true;
	}
	
	if ($pass2 == '') {
		$errmsg_arr[] = 'Password is missing';
		$errmsg_arr[] = $pass2;
		$errflag = true;
	}
	
	if (strcmp($pass1, $pass2) != 0) {
		$errmsg_arr[] = 'Passwords do not match';
	}
	
	//Check for duplicate email
	
	if ($email != '') {
		$qry = "SELECT * FROM members WHERE email='$email'";
		$result = mysqli_query($link, $qry);
		if ($result) {
			if (mysqli_num_rows($result) > 0) {
				$errmsg_arr[] = 'Email already in use';
				$errflag = true;
			}
			@mysqli_free_result($result);
		} else {
			die('Email compare failure');
		}
	}
	
	//If there are input validation errors, redirect back to the registration form
	if ($errflag) {
		$_SESSION['ERRMSG_ARR'] = $errmsg_arr;
		session_write_close();
		header('Location: signup.php');
		exit();
	}
	
	//INSERT new information into database
	$qry = "INSERT INTO members(firstname, lastname, email, passwd) VALUES('$fName','$lName','$email','".md5($_POST['password1'])."')";
	//For MySql the line below should be uncommented
	//$result = mysql_query($qry);
	
	//For MySQLi the line below should be uncommented
	$result = mysqli_query($link, $qry);
	
	//Check whether the query was successful or not
	if ($result) {
		header("location: listinit.php?email=".$email."&password=".$pass1);
		exit();
	} else {
		die("Row creation failure");
	}