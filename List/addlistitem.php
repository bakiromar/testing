<?php
	require_once('authlist.php');
	if (!isset($_SESSION)) { 	
		session_start();
	}
	
	$list_id = $_GET['list_id'];
	
	//Connect to server and select database.
	$link = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE) or die('Cannot connect to server');
	
	//Retrieve categories
	$getCat = "SELECT * FROM categories WHERE list_id =".$list_id;
	$catresult = mysqli_query($link, $getCat);
	
	//Put all category names in an array
	$categories = array();
	while($cats = mysqli_fetch_array($catresult)) {
		$categories[] = $cats['catname'];
	}
	
	//Create session variable for category array
	$_SESSION['categories'] = $categories;
	
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

        <script type = "text/javascript" src = "../Scripts/script.js"></script>

        <title><?php echo $listName; ?> - Add Item</title>
    </head>
   
   <body>
       <header>
			
            <ul class = "accheader">
				<li id = "hlogo"><a href="../Account/accounthome.html"><img src="../images/header_logo.png" alt="Logo"/></a></li>
				<li class = "right"><a href = "../index.html">Log Out</a></li>
				<li class = "right"><a href = "../Account/accountsettings.html">Account Settings</a></li>
			</ul>
			
        </header>
        
        <div class = "outermain">
			
			<ul class = "listheader">
                <li><a href = "addmember.html">Add Member</a></li>
                <li><a href = "changelog.html">Changelog</a></li>
                <li><a href = "listsettings.html">List Settings</a></li>
            </ul>
			
			<div class = "innermain">

			<h1><a href = "list.html"><?php echo $listName; ?></a></h1>
			<h2>Add Item</h2>
					<h3>Category:</h3>
					
					<form action="createitem.php" method = "POST" id = "formId" name = "category" onsubmit = "formValidate(0, 0, 0, 1, 'formId', 'formError', event)">
						<select id="category" name = "catId">
							<?php
								$x = 0;
								foreach ($categories as $option) {
									echo '<option value = "'.$x.'">'.$option.'</option>';
								}
							?>
						</select>
						
			        

					<h3 id="picture">Item Name:</h3>

						        <input type ="text" name="itemName" id="listItem" placeholder = "Item Name" onblur="listNameValidate('listItem', 'errorItemName')" maxlength="50">
                                <p id ="errorItemName" class ="label"></p>
 
					<h3>Add Picture</h3>			
					<div id = "addimage" ><a href="#"><img src="../images/add_small.png" alt="Plus Sign"></a></div>
					
					<input type = "hidden" name = "list_id" value = "<?php echo $list_id; ?>">
					<input id="acctSelect" type = "submit" value = "Add Item" name = "additem">
					</form>
					<p class = "error" id = "formError"></p>
			</div>

		</div>
    </body>
</html>