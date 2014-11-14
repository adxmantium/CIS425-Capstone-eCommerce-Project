<!-- unofficial 2 landing page index.php -->
<!DOCTYPE html>

<?php 
	//start a php session
	session_start();
	
	// check to see if user is logged in
	//creating a session variable and checking if there is a session
	//already set. if set, send to welcome page.
	if(isset($_SESSION["authenticated"])){
		header('Location: confirmation/welcome.php');
		exit;
	}
?>

<html lang="en">

<head>
	<!-- Meta tag -->
	<meta name="robots" content="noindex,nofollow" />
    <meta charset="utf-8" />

	<title>Landing Page</title>
	
	<link rel="stylesheet" type="text/css" href="stylesheets/cssForIndex.css">
	<link href='http://fonts.googleapis.com/css?family=Lato:300' rel='stylesheet' type='text/css'>
	<link rel="icon" href="images/icon3.png" />
</head>

<body class="banner">
<!--navbar-->
	<!--<div class="navbar">
			<ul class="navlist" id="indexnavlist" >
				<li class="navitems"><a href="#" >Home</a></li>
				<li class="navitems"><a href="#" >Jerseys</a></li>
				<li class="navitems"><a href="#" >Shopping Cart</a></li>
				<li class="navitems"><a href="#" >Contact Us</a></li>
				<li class="navitems"><a href="#" >About Us</a></li>
				<li class="navitems" id="logout"><a href="#" >Log Out</a></li>
			</ul>
	</div>-->
<!-- the body/banner between navbar and footer -->
	<div >
		<p class="header"></p>

		<!-- the div box that encapsulates the login/signup forms-->
		<div class="centerpiece">

			<!-- login -->
			<div class="loginHalf">

				<!--login directions-->
				<div class="head">
					<p class="logdirections">Please Log In:</p>
				</div>
				<!--login form-->
				<div class="inputbox">
					<form class="loginform" action="controller/checkLoginWithDB.php" method="post">
						<div>
							<input id="username" type="text" name="username" value="" 
							placeholder="Username" required 
							title="Not a Valid Username"
							pattern="[a-z0-9.-_!$]{4,15}" autofocus>
						</div>
						<div>
							<input id="password" type="password" name="password" 
							value="" placeholder="Password" required 
							title="Incorrect Password"
							pattern="[a-zA-Z0-9.-_!$]{5,15}" >
						</div>
						<div>
							<input type="submit" name="Submit" id="loginsubmit" value="Log In">
						</div>

						<?php
							//check the return codes passed back from checkLogin.php
							if($_GET["invalidlogin"] == 1){
								echo '<p class="invalidlogin">Invalid Username</p>';
							}
							if($_GET["invalidlogin"] == 2){
								echo '<p class="invalidlogin">Invalid Password</p>';
							}
							if($_GET["invalidlogin"] == 3){
								echo '<p class="invalidlogin">Returned from loginsubmit...</p>';
							}
						?>

					</form>
				</div>

			</div>

			<!--signup div box-->
			<div class="signupHalf">
				<!--sign up directions-->
				<p class="signupDirections">New user? Sign Up!</p>
				<p class="signupStory">Join the exclusive club for Football fans.</p>
				<p class="signupStory">Wear the gear. Be a Champion.</p>
				<!--signup form-->
				<div class="signupForm">
					<form action="signupPage/signupPage.php" method="post">
						<input type="submit" name="signup" id="signupsubmit" value="Sign Up">
			 		</form>
				</div>
			</div>
		</div><!-- end of .centerpiece2 -->

	</div><!-- end of .banner div-->

	<div class="footer">
		<p>
			<img class="footerimg" src="images/html5.png" alt="Valid HTML5 Icon"/>
			<img class="footerimg" src="images/css3.png" alt="Valid CSS3 Icon"/>
			<br />
			&copy;2014, Adam Adams
		</p>
	</div>

</body>

</html>