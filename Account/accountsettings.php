<?php
	if (!isset($_SESSION)) { 	
		session_start();
	}
	
	require_once('authacc.php');
	
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
        <title>Settings</title>
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
			<h1>Account Settings</h1>	
			
			<form action="http://webdevfoundations.net/scripts/formdemo.asp" method = "POST"id = "formId" onsubmit = "formValidate(0, 0, 1, 0, 'submit', 'errorSubmit', event); deleteValidate(event, 'account');">
			<fieldset>
			
			<p>Enter current password to make changes: <br>
			<p class = "accountsettings">
			<input type="password" name="password" id= "pass" placeholder = "Password" onblur = "passValidate ('pass', 'oldPass')"required><span id = "oldPass" class = "error"></span></p>
            
			<h2>Change Password</h2>
				<p><input type="password" name="newpass1" id = "pass1" placeholder = "New Password" onblur = "passValidate('pass1', 'newPass1');"><span id = "newPass1" class = "error"></span><br>
				
				<input type="password" name="newpass1" id = "pass2" placeholder = "Re-enter New Password" onblur = "passValidate('pass2', 'newPass2'); passCompare('pass1', 'pass2', 'errorPass');"><span id = "newPass2" class = "error"></span></p>
				
               <p class = "error" id = "errorPass"></p>
			   
			   <p class = "accountsettings">
			<h2>Change Email</h2>				
				<input type = "email" name = "email" id = "email" placeholder = "Email Address" onblur = "emailValidate('email', 'errorEmail')"><span id = "errorEmail" class = "error"></span></p>
					
			<h2>Delete Account</h2>	
			
            <p>Yes&nbsp;<input type="radio" name = "delete" value = "0" id = "deleteRad0" onclick = "radioValidate('deleteRad0')">&nbsp;
			No&nbsp;<input type = "radio" name = "delete" value = "1" id = "deleteRad1" onclick = "radioValidate('deleteRad1')" checked></p>

            <p><input type="submit" value="Submit" id = "submit"></p>
		     <p id = "errorSubmit" class = "submitError"></p>
			</fieldset>
			</form>
        
		</div>
        </div>
    </body>
</html>