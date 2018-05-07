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
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
		<script type = "text/javascript" src = "../Scripts/script.js"></script>

        <title>Share List</title>
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
			<h2>Current Members</h2>

				<div id="tablemember">
					<table class = "members">
						<thead>
							<tr>
								<th>Name</th>
								<th>Mail</th>							
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>Geoff McLennan</td>
								<td>geoffmclennan@mail.com</td>
							</tr>
							<tr>
								<td>Jesse Goertz</td>
								<td>jessegoertz@mail.com</td>
							</tr>
							<tr>
								<td>Jhonny Vasquez</td>
								<td>jhonnyvasquez@mail.com</td>
							</tr>
							<tr>
								<td>Bakr Al-Humaimidi</td>
								<td>bakralhumaimidi@mail.com</td>
							</tr>
							<tr>
								<td>Kuanysh Boranbayev</td>
								<td>kuanyshboranbayev@mail.com</td>
							</tr>
						</tbody>
					</table>
				</div>
				
				<h2>Add New Member</h2>	
				<form action="http://webdevfoundations.net/scripts/formdemo.asp" method = "POST" id = "addMemb" onsubmit = "formValidate(0, 1, 0, 0, 'addMemb', 'submitErr', event)">
					<h3>Email Address: </h3>											
						
					<p><input type="email" name="email" id = "email" placeholder = "Email Address" onblur = "emailValidate('email','errorEmail')" required><span class = "error" id = "errorEmail"></span></p>
					
					<input type="submit">
					<p id = "submitErr" class = "submitError"></p>
				</form>	
            </div>

		</div>
    </body>
</html>