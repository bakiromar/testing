<?php
	session_start();
?>

<!DOCTYPE html>

<html lang="en">
    <head>
        <meta charset="utf-8" />

        <!-- Added prototype 'link' attribute -->
        <link rel="stylesheet" type="text/css" href="Style/base.css">

        <link href='https://fonts.googleapis.com/css?family=Roboto:400,100italic' rel='stylesheet' type='text/css'>
			<script type = "text/javascript" src = "Scripts/script.js"></script>

        <title>mutualist - Login</title>
    </head>

    <body id="loginpage">
        <div id = "top">
        <div id="center">
        <div id="background">
            <img src ="images/login_background.gif" alt ="background" />
        </div>
        </div>

        <div title ="logo" id="logo">
            <img src ="images/mutualist_logoV2.png" alt ="logo" />
        </div>

        <div title ="tagline" id="tagline">
            <p>Share lists with friends!</p>
        </div>
		
		<div class = "error signup">
		<?php
			
			if (isset($_SESSION['ERRMSG_ARR']) && is_array($_SESSION['ERRMSG_ARR']) && count($_SESSION['ERRMSG_ARR']) > 0) {
				echo '<ul>';
				foreach ($_SESSION['ERRMSG_ARR'] as $msg) {
					echo '<li>',$msg,'</li>';
				}
				echo '</ul>';
				unset($_SESSION['ERRMSG_ARR']);
			}
		?>
		</div>

        <div id ="login">
            <form action = "login.php" method = "POST" id = "formId" onsubmit = "formValidate(0, 1, 1, 0, 'formId', 'submitErr', event)">
                <fieldset>
                    <legend>Existing Users</legend>

										<p class = "signup">
                    <input type = "email" name = "email" id = "email" placeholder = "Email Address" onblur = "emailValidate('email','errorEmail')" required></p>
										<p class = "error signup" id = "errorEmail"></p>

										<p class = "signup">
					<input type = "password" name = "password" id = "pass" placeholder = "Password" onblur = "passValidate('pass', 'errorPass')" required></p>
										<p class = "error signup" id = "errorPass"></p>
                    
                    <p class = "signup"><input type = "submit" value = "Log in"></p>
					<p id = "submitErr" class = "error signup"></p>
                </fieldset>
            </form>
			
            <p>New User? <a href="signup.php">Sign up Here!</a></p>
			
        </div>
        </div>

        <div id ="about">
            <h1>About Us</h1>
            <p>Mutualist provides quick and easy list-sharing, tailored towards grocery lists for households where multiple people are responsible for shopping.
			It is perfect for roommates and busy families. To take full advantage of our site, each person needs a device (preferably mobile) with an internet 
			connection, and to create an account on our site. Then one person can create a list and share it with the others. Once the list is shared, each 
			person can add any items they notice are running out and those items will be visible to all other members, that way everyone will know what groceries 
			are needed. This way, if somebody is at the grocery store, they can quickly and easily see what items the others need and choose whether or not to 
			purchase them. If they purchase it, they can press a button and the item will be removed from the list and everyone will see that they purchased it.
			If somebody puts something on the list that isn't usually shared by the household, or other people don't want to buy, they can also remove that item 
			from the list. Each list keeps track of who has added and bought/removed items in a changelog, so you can easily check to see who has bought your
			items and figure out payment.</p>
			<p>We have also added the ability to create lists for events and parties! As the host you can create a list and add all of the items (food, drinks, 
			cups, plates) that you would like your guests to bring. After you invite your guests to the list, they can start claiming items on your list that 
			they would like to bring. Once they claim an item, everyone can see that they will be bringing that it, and won't be able to claim it themselves. 
			Great for pot-lucks and get-togethers!</p>
			
        
        </div>

    </body>
</html>