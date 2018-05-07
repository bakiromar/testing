<?php
	if (!isset($_SESSION)) { 	
		session_start();
	}
	
	require_once('authacc.php');
	
	$user_id = $_SESSION['SESS_MEMBER_ID'];
	$firstname = $_SESSION['SESS_FIRST_NAME'];
	$lastname = $_SESSION['SESS_LAST_NAME'];
	
	//Connect to mysql server
	$link = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);
	if (!$link) {
		die('Failed to connect to server: '.mysql_error());
	}
	
	//Retrieve users list id's
	$idqry = "SELECT * FROM listmembers WHERE member_id='".$user_id."'";
	$idresult = mysqli_query($link, $idqry);
	
	$idarray = array();
	while ($ids = mysqli_fetch_array($idresult)) {
		$idarray[] = $ids['list_id'];
	}
	
	//Collect users lists
	$listnames = array();
	$eventnames = array();
	foreach ($idarray as $id) {
		$listqry = "SELECT * FROM lists WHERE list_id='".$id."'";
		$listresult = mysqli_query($link, $listqry);
		$list = mysqli_fetch_array($listresult);
		
		$listtype = $list['listtype'];
		
		if (strcmp($listtype, 'list') == 0) {
			$listnames[$list['list_id']] = $list['listname'];
		} else {
			$eventnames[$list['list_id']] = $list['listname'];
		}
	}
?>

<!DOCTYPE html>

<html lang="en">
    <head>
        <meta charset="utf-8" />
        
        <!-- Added prototype 'link' attribute -->
        <link rel="stylesheet" type="text/css" href="../Style/base.css">

        <title>Home</title>
    </head>
    <body>
        <header>
		
            <ul class = "accheader">
				<li id = "hlogo"><a href="accounthome.php"><img src="../images/header_logo.png" alt="Logo"/></a></li>
				<li class = "right"><a href = "logout.php">Log Out</a></li>
				<li class = "right"><a href = "accountsettings.php">Account Settings</a></li>
				<li class = "right" id = "name"><a href = "accounthome.php">Welcome <?php echo $firstname; ?></a></li>
			</ul>
			
        </header>

        <div class = "outermain">
			<div class = "innermain">
				<div class = "lists">
				<h1>Your Lists</h1>
				
					<ul class = "indent">
					<?php
						foreach ($listnames as $list_id => $list_name) {
							echo '<li><a href = "../List/list.php?list_id='.$list_id.'" class = "lists">'.$list_name.'</a></li>';
						}
					?>
					</ul>
					
					<ul class = "addlist">
						<li><a href = "addlist.php">Create New List</a></li>
					</ul>
				</div>

				<div class = "events">
				<h1>Your Events</h1>
					<ul class = "indent">
					<?php
						foreach ($eventnames as $list_id => $list_name) {
							echo '<li><a href = "../List/event.php?list_id='.$list_id.'" class = "lists">'.$list_name.'</a></li>';
						}
					?>
					</ul>
					<ul class = "addlist">
						<li><a href = "addevent.php">Create New Event</a></li>
					</ul>
				</div>
			
			</div>
		</div>
    </body>
</html>