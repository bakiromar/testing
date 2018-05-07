<?php
	require_once('authlist.php');
	if (!isset($_SESSION)) { 	
		session_start();
	}
	
	$list_id = $_GET['list_id'];
	
	$user_id = $_SESSION['SESS_MEMBER_ID'];
	$firstname = $_SESSION['SESS_FIRST_NAME'];
	$lastname = $_SESSION['SESS_LAST_NAME'];
?>

<!DOCTYPE html>

<html lang="en">
    <head>
        <meta charset="utf-8" />
        
        <!-- Added prototype 'link' attribute -->
        <link rel="stylesheet" type="text/css" href="../Style/base.css">
        <link href='https://fonts.googleapis.com/css?family=Roboto:400,100italic' rel='stylesheet' type='text/css'>
		<script src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.12.0.min.js"></script>
		<script type = "text/javascript" src = "../Scripts/script.js"></script>
        <title>List Settings</title>
		
    </head>
    <body>
	
	
        <header>
		
            <ul class = "accheader">
				<li id = "hlogo"><a href="../Account/accounthome.php"><img src="../images/header_logo.png" alt="Logo"/></a></li>
				<li class = "right"><a href = "logout.php">Log Out</a></li>
				<li class = "right"><a href = "../Account/accountsettings.php">Account Settings</a></li>
				<li class = "right" id = "name"><a href = "../Account/accounthome.php">Welcome <?php echo $firstname; ?></a></li>
			</ul>
			
	        			
        </header>

        <div class = "outermain">
			
			<ul class = "listheader">
                <li><a href = "addmember.php?list_id=<?php echo $list_id; ?>">Add Member</a></li>
                <li><a href = "changelog.php?list_id=<?php echo $list_id; ?>">Changelog</a></li>
                <li><a href = "listsettings.php?list_id=<?php echo $list_id; ?>">List Settings</a></li>
            </ul>
			
			<div class = "innermain">
            
            <h1><a href = "list.html">My Groceries</a></h1>
			
			<h2>List Settings</h2>
              		
            <form action="http://webdevfoundations.net/scripts/formdemo.asp" method = "POST" id = "formId" onsubmit = "formValidate(0, 0, 1, 0, 'formId', 'errorSubmit', event); deleteValidate(event, 'list');">
			<p>Enter current password to make changes: <br>
			<p class = "listsettings">
			<input type="password" name="password" id= "pass" placeholder = "Password" onblur = "passValidate ('pass', 'errorPass')" required><span id = "errorPass" class = "error"></span></p>
			
			<h3>Categories</h3>
			<div class = "list settings">
			<ul>
				<li>Produce <span class = "right"><a href = "#"><img src = "../images/cancel_small.png" alt = "Remove Category" class = "listbutton"></a></span></li>
				<li>Meat/Dairy <span class = "right"><a href = "#"><img src = "../images/cancel_small.png" alt = "Remove Category" class = "listbutton"></a></span></li>
				<li>Baked Goods <span class = "right"><a href = "#"><img src = "../images/cancel_small.png" alt = "Remove Category" class = "listbutton"></a></span></li>
				<li>Dry/Canned Goods <span class = "right"><a href = "#"><img src = "../images/cancel_small.png" alt = "Remove Category" class = "listbutton"></a></span></li>
				<li>Household Items <span class = "right"><a href = "#"><img src = "../images/cancel_small.png" alt = "Remove Category" class = "listbutton"></a></span></li>
			</ul>
			</div>
							
		    <p class = "listsettings">
			<input type="text" name="newuser" id= "newCat" placeholder = "New Category" onblur = "listNameValidate('newCat', 'errorCat')">
			<input type = "button" value= "Add" class = "add" onclick = "addCategory()">
			<span class = "error" id = "errorCat"></span></p>
				
			<h3>Remove Members</h3>	
			
			<div class = "list settings">
			<ul>
				<li>Geoff McLennan <span class = "right"><a href = "#"><img src = "../images/cancel_small.png" alt = "Remove Category" class = "listbutton"></a></span></li>
				<li>Jesse Goertz <span class = "right"><a href = "#"><img src = "../images/cancel_small.png" alt = "Remove Category" class = "listbutton"></a></span></li>
				<li>Jhonny Vasquez <span class = "right"><a href = "#"><img src = "../images/cancel_small.png" alt = "Remove Category" class = "listbutton"></a></span></li>
				<li>Bakr Al-Humaimidi <span class = "right"><a href = "#"><img src = "../images/cancel_small.png" alt = "Remove Category" class = "listbutton"></a></span></li>
				<li>Kuanysh Boranbayev <span class = "right"><a href = "#"><img src = "../images/cancel_small.png" alt = "Remove Category" class = "listbutton"></a></span></li>
			</ul>
			</div>
			
			<h3>Delete List</h3>	
			
            <p>Yes&nbsp;<input type="radio" name = "delete" value = "0" id = "deleteRad0" onclick = "radioValidate('deleteRad0')">&nbsp;
			No&nbsp;<input type = "radio" name = "delete" value = "1" id = "deleteRad1" onclick = "radioValidate('deleteRad1')" checked></p>
			
			<input type="submit" value = "Submit" name = "submit" >
			<p id = "errorSubmit" class = "error"></p>

			</form>
			</div>
        </div>
    </body>
</html>