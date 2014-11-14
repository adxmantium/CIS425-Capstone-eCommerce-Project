<!-- survey confirmation page to thank user for survey submission -->
<!DOCTYPE html>

<?php 
	//start a php session
	//session_start($_SESSION["authenticated"]);
	
	// check to see if user is logged in
	//creating a session variable and checking if there is a session
	//already set. 
	/*if(!isset($_SESSION["authenticated"])){
		header('Location: ../index.php');
		exit;
	}*/
?>

<html>

<head>
	<!-- Meta tag -->
	<meta name="robots" content="noindex,nofollow" />
    <meta charset="utf-8" />

	<title>Survey Confirmation Page</title>
	
	<link rel="stylesheet" type="text/css" href="../stylesheets/cssForIndex.css">
	<link href='http://fonts.googleapis.com/css?family=Lato:300' rel='stylesheet' type='text/css'>
	<link rel="icon" href="../images/icon3.png" />
</head>

<body class="welcomebanner">

<!-- the buttons to direct user to homepage or logout between navbar and footer -->
	<div class="msgbox" id="message">
		<p class="loginmsg">Thank you for submitting your survey, </p>
		<h1 class="promomsg">This will help us move the Club forward. Your inputs are very important to us. </h1>

		<form action="../homepage/contactUs.php" method="get" >
			<input type="submit" value="Return to Email Page" id="homebtn" autofocus>
		</form>

		<form action="../controller/logoutFunction.php" method="post">
			<input type="submit" value="Log Out" id="logoutbtn" >
		</form>
	</div>

	<div class="footer" id="surveyfooter">
		<p>
			<img class="footerimg" src="../images/html5.png" alt="Valid HTML5 Icon"/>
			<img class="footerimg" src="../images/css3.png" alt="Valid CSS3 Icon"/>
			<br />
			&copy;2014, Adam Adams
		</p>
	</div>

</body>

</html>