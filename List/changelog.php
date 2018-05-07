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

        <link rel="stylesheet" type="text/css" href="../Style/base.css">

        <title>Changelog</title>
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
			<h2>Changelog</h2>

			<table class = "changelog">
				<thead>
				<tr>
				<td>Description of Changes</td>
				<td>Time and Date</td>
				</tr>
				</thead>					
								
				<tbody>
				<tr>
					<td>Geoff added Carrots</td>
					<td>10:31am 23/01/2016</td>
  
				</tr>
				<tr>
					<td>Geoff added Cucumber</td>
					<td>10:31am 23/01/2016</td>
				</tr>
				<tr>
					<td>Geoff added Chicken Breast</td>
					<td>10:32am 23/01/2016</td>
				</tr>
				<tr>
					<td>Jesse added Milk</td>
					<td>1:56pm 23/01/2016</td>
				</tr>
				<tr>
					<td>Jesse added Whole Wheat Bread</td>
					<td>1:56pm 23/01/2016</td>
				</tr>
				<tr>
					<td>Jhonny bought Orange Juice</td>
					<td>5:45pm 23/01/2016</td>
				</tr><tr>
					<td>Geoff bought Potatoes</td>
					<td>5:45pm 23/01/2016</td>
				</tr>
				<tr>
					<td>Geoff removed Beer</td>
					<td>5:47pm 23/01/2016</td>
				</tr>
				</tbody>
			</table>
			
			</div>
			
		</div>		
		
    </body>
</html>