<!DOCTYPE html>
<!-- unofficial 2 aboutUs.php -->
<?php 
	//start a php session
	session_start($_SESSION['cart']);
	session_start($_SESSION['authenticated']);
	
	// check to see if user is logged in
	//creating a session variable and checking if there is a session
	//already set. if set, send to welcome page.
	if(!isset($_SESSION["authenticated"])){
		header('Location: ../index.php');
		exit;
	}
?>

<html>

<head>
	<!-- Meta tag -->
	<meta name="robots" content="noindex,nofollow" />
    <meta charset="utf-8" />

	<title>About Us</title>

	<link rel="stylesheet" type="text/css" href="../stylesheets/cssForAboutUs.css">
	<link href='http://fonts.googleapis.com/css?family=Lato:300' rel='stylesheet' type='text/css'>
	<link rel="icon" href="../images/icon3.png" />
</head>

<body class="homebanner">
<!--navbar-->

	
<!-- *************the body/banner between navbar and footer**************** -->

	<!-- Intro banner  -->
	<div class="introbox" id="row1">
		<div class="aboutnavbar">
			<a href="index.php" id="logo">FutbolClub</a>
			<ul class="navlist" id="aboutnavlist">
				<li class="navitems"><a href="index.php" >Home</a></li>
				<li class="navitems"><a href="products.php" >Products</a></li>
					<?php 
						if(count($_SESSION['cart']) > 0)
						{
							echo '<li class="navitems" id="full"><a href="shoppingcart.php" >
							Shopping Cart('.count($_SESSION['cart']).')';
						}
						else
						{
							echo '<li class="navitems" id="empty"><a href="shoppingcart.php" >Shopping Cart'; 
						}
					?></a></li>
				<li class="navitems"><a href="contactUs.php" >Contact Us</a></li>
				<li class="navitems" id="currentpage"><a href="aboutUs.php" >About Us</a></li>
				<li class="navitems" id="logout"><a href="../controller/logoutFunction.php" >Log Out</a></li>
			</ul>
		</div>
		<p class="introhead">FutbolClub</p>
		<h3 class="subhead">Who we are is more than a business. Why follow a company when you can join a Club.</h3>
		<p></p>
		<form action="contactUs.php" method="get">
			<input type="submit" name="shop" value="Email Us" id="emailusbtn" />
		</form>
	</div>

	<!-- Club motto and founding principles -->
	<div class="quotebox" id="row2">
		<h1>The kind of players we support and sponsor...</h1>
		<table class="allquotes">
			<tr>
				<td>
					<div class="quote">
						<img src="../images/peleheadshot.png" alt="pele headshot">
						<p class="para"><em>"Success is no accident. It is hard work, perserverence, learning, studying, sacrifice and most of all, love of what you are doing, or learning to do."</em><br/> -Pele</p>
					</div>
				</td>
				<td>
					<div class="quote">
						<img src="../images/ronaldinhoheadshot.png" alt="ronaldinho head shot">
						<p class="para"><em>"I learned all about life with a ball at my feet."</em><br/> -Ronaldinho</p>
					</div>
				</td>
				<td>
					<div class="quote">
						<img src="../images/messiheadshot.png" alt="messi head shot">
						<p class="para"><em>"I start early, and I stay late, day after day, year after year, it took me 17 years and 114 days to become an overnight success." </em><br/> -Lionel Messi</p>
					</div>
				</td>
			</tr>
		</table>
	</div>
		
<!-- row 3 - company goal -->
	<div class="goalbox" id="row3">
		<img src="../images/icon10.png" alt="flag icon">
		<h1>Club Mission</h1>
		<h3>To be a complete source of football gear for those who are dedicated, motivated, and inspired<br/> to becoming a Champion one day.</h3>
		<p>Just like professional football players, we strive to work hard for our fans. Our aim is to provide our customers with top quality football jerseys- the same kind of quality<br/> that our fans' favorite players wear every game. We not only sell football jerseys, but we try to sell an experience as well. <br/>True football fans are our top customers because they understand the experience of being a loyal fan<br/> to the beautiful game and the ambition and excitement that comes with it.</p>
	</div>

<!-- information / maybe select three jersey's on sale -->

	<div class="resume" id="row4">
		<img src="../images/me3.jpg" alt="Profile pic of Founder">
		<h1>Adam Adams</h1>
		<h3>CEO & Founder</h3>
		<p>I am currently a student at Arizona State University and am set to graduate this May of 2014 with a 
			Bachelor of Science degree in Computer Information Systems. <br/>I just started learning HTML, CSS, 
			Javascript, PHP, and MySQL just this semester really and I love every bit of it! Web Development is <br/>one of my 
			favorite topics, so I do a lot of learning on my own outside of the class ciriculum.</p>
	</div>

	<!-- youtube video -->

	<div class="vidbox" id="row5">
		
	</div>

	<!-- reviews from "users" -->
	<div class="reviewsbox" id="row6">
		<p class="tablehead"></p>
	</div>

	<!-- footer -->

	<div class="aboutfooter">
		<p>
			<img class="footerimg" src="../images/html5.png" alt="Valid HTML5 Icon"/>
			<img class="footerimg" src="../images/css3.png" alt="Valid CSS3 Icon"/>
			<br />
			&copy;2014, Adam Adams
		</p>
	</div>

</body>

</html>