<!-- unofficial welcome.php after the user has successfully logged in -->
<!DOCTYPE html>

<?php 
	//start a php session
	session_start();
	
	// check to see if user is logged in
	//creating a session variable and checking if there is a session
	//already set. if set, send to welcome page.
	if(!isset($_SESSION["authenticated"])){
		header('Location: ../index.php');
		exit;
	}
?>

<html lang="en">

<head>
	<!-- Meta tag -->
	<meta name="robots" content="noindex,nofollow" />
    <meta charset="utf-8" />

	<title>Welcome Page</title>
	
	<link rel="stylesheet" type="text/css" href="../stylesheets/cssForIndex.css">
	<link rel="icon" href="../images/icon3.png" />
</head>

<body class="welcomebanner">

<!-- the buttons to direct user to homepage or logout between navbar and footer -->
	<div class="msgbox">
		<p class="loginmsg"><?php echo "You have Successfully logged in, ".$_SESSION["authenticated"]."!"?></p>
		<h1 class="promomsg">This is where Champions are made...</h1>

		<form action="../homePage/index.php" method="get" >
			<input type="submit" value="Go to Home Page" id="homebtn" autofocus>
		</form>

		<form action="../controller/logoutFunction.php" method="post">
			<input type="submit" value="Log Out" id="logoutbtn" >
		</form>
	</div>

	<div class="footer" id="welcomefooter">
		<p>
			<img class="footerimg" src="../images/html5.png" alt="Valid HTML5 Icon"/>
			<img class="footerimg" src="../images/css3.png" alt="Valid CSS3 Icon"/>
			<br />
			&copy;2014, Adam Adams
		</p>
	</div>

</body>

</html>