<?php
	require_once('authlist.php');
	if (!isset($_SESSION)) { 	
		session_start();
	}
	
	$list_id = $_GET['list_id'];
	
	$user_id = $_SESSION['SESS_MEMBER_ID'];
	$firstname = $_SESSION['SESS_FIRST_NAME'];
	$lastname = $_SESSION['SESS_LAST_NAME'];
	
	//Connect to server and select database.
	$link = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE) or die('Cannot connect to server');
	
	//Retrieve list name
	$getList = "SELECT * FROM lists WHERE list_id = ".$list_id;
	$listresult = mysqli_query($link, $getList);
	$list = mysqli_fetch_array($listresult);
	$listName = $list['listname'];
?>

<!DOCTYPE html>

<html lang="en">
    <head>
        <meta charset="utf-8" />

        <link rel="stylesheet" type="text/css" href="../Style/base.css">

        <title><?php echo $listName; ?></title>
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
			<h1><?php echo $listName; ?></h1>
			
				<div class = "list">
					<?php
						$getItems = "SELECT * FROM listitems WHERE parentlist_id='".$list_id."'";
						$itemresult = mysqli_query($link, $getItems);
						
						echo '<ul>';
						while ($item = mysqli_fetch_array($itemresult)) {
							if ($item['user_id_del'] == NULL) {
								echo '<li>'.$item['itemname'].'<span class = "right"><a href="claimitem.php?list_id='.$list_id.'&itemname='.$item['itemname'].'">'.
									'<img src="../images/checkmark_small.png" alt="Checkmark" class = "listbutton"></a></span></li>';
							} else {
								$userqry = "SELECT * FROM members WHERE member_id='".$item['user_id_del']."'";
								$userresult = mysqli_query($link, $userqry);
								$userinfo = mysqli_fetch_array($userresult);
								echo '<li>'.$item['itemname'].'<span class = "right">'.$userinfo['firstname'].' '.$userinfo['lastname'].'</span></li>';
							}
						}
						echo '</ul>';
					?>
				</div>

			</div>

		</div>
    </body>
</html>
