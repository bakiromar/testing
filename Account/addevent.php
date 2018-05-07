<?php
	require_once('authacc.php');
	if (!isset($_SESSION)) { 	
		session_start();
	}
	
	$user_id = $_SESSION['SESS_MEMBER_ID'];
	$firstname = $_SESSION['SESS_FIRST_NAME'];
	$lastname = $_SESSION['SESS_LAST_NAME'];
?>

<!DOCTYPE html>

<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>New Event</title>
        <link rel="stylesheet" type="text/css" href="../Style/base.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
		<script type = "text/javascript" src = "../Scripts/script.js"></script>
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
            <h1>Create a New Event</h1>
            
            <form action = "createevent.php" method = "POST" id = "formId" onsubmit = "formValidate(0, 0, 0, 1, 'formId', 'submitError', event)">    
            <p>Event Name:
            <input type = "text" id = "eventName" name = "eventname" placeholder = "New Event" onblur = "listNameValidate('eventName','errorName1')" required><span class = "error" id = "errorName1"></span></p>
			</form>
			
            <h2>Items Needed</h2>
            <ul>
			<table>
                <?php
					if (!isset($_SESSION['eventitems'])) {	
						$_SESSION['eventitems'] = array();
					}
					$items = $_SESSION['eventitems'];
					
					foreach ($items as $item) {
						$index = array_search($item, $items);
						echo '<tr><td><li>'.$item.'</li></td><td id = "remove">&nbsp;&nbsp;&nbsp;<a href = "delitem.php?del='.$index.'">Remove</a></td></tr>';
					}
				?>
			</table>
            </ul> 

			<form action = "additem.php" method = "POST" id = "additem">
				New Item:<br>
				<input type = "text" id = "newItem" name = "newitem" placeholder = "Item Name" onblur = "listNameValidate('newItem','errorName2')">
				<input type = "submit" value = "Add" class = "add"><span class = "error" id = "errorName2"></span>
			</form>
            
		
			
            <h2>Invite Members</h2>
            <ul>
			<table>
				<?php
					if (!isset($_SESSION['members'])) {	
						$_SESSION['members'] = array();
					}
					$members = $_SESSION['members'];
					
					foreach ($members as $memb) {
						$index = array_search($memb, $members);
						echo '<tr><td><li>'.$memb.'</li></td><td id = "remove">&nbsp;&nbsp;&nbsp;<a href = "delmemb.php?del='.$index.'&type=event">Remove</a></td></tr>';
					}
				?>
			</table>
			</ul>
			
			<form action = "addmemb.php?type=event" method = "POST" id = "addmemb">

				Add a new Member: <br>
				<input type = "email" id = "email" name = "addmemb" placeholder = "Email Address" onblur = "emailValidate('email', 'errorEmail')">
				<input type = "submit" value = "Add" class = "add" ><span class = "error" id = "errorEmail"></span>
			</form>
			
			<p><input type = "submit" form = "formId" value = "Create"></p>
			<p class = "submitError" id = "submitError"></p>
			
        </div>
		</div>
    </body>
</html>
