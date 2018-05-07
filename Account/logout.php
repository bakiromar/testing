<?php

	if (!defined(__DIR__)) {
		define(__DIR__, dirname(__FILE__));
	}
	
	require_once(__DIR__.'/../config.php');
	
	$_SESSION = array();
	
	if (ini_get("session.use_cookies")) {
		$params = session_get_cookie_params();
		setcookie(session_name(), '', time() - 42000,
			$params["path"], $params["domain"],
			$params["secure"], $params["httponly"]
		);
	}	
	
	session_destroy();
	
	header('location: '.LOGINPAGE);
	
?>