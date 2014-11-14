<!DOCTYPE html>
<!-- home page index.php -->
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

	<title>Home Page</title>

	<link rel="stylesheet" type="text/css" href="../stylesheets/cssForIndex.css">
	<link href='http://fonts.googleapis.com/css?family=Lato:300' rel='stylesheet' type='text/css'>
	<link rel="icon" href="../images/icon3.png" />

	
</head>

<body class="homebanner">
<!--navbar-->

	
<!-- *************the body/banner between navbar and footer**************** -->

	<!-- Intro banner  -->
	<div class="introbox" id="row1">
		<div class="homenavbar">
			<a href="index.php" id="logo">FutbolClub</a>
			<ul class="navlist" id="homenavlist">
				<li class="navitems" id="currentpage"><a href="index.php" >Home</a></li>
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
				<li class="navitems"><a href="aboutUs.php" >About Us</a></li>
				<li class="navitems" id="logout"><a href="../controller/logoutFunction.php" >Log Out</a></li>
			</ul>
		</div>
		<p class="introhead">
			<?php 
					$user = $_SESSION['authenticated'];
					//"H" = hour; 
					$time = date("H");
					//will only need this line of code if our time is off on the class server
					$time = $time - 7;
					
					if($time < "12") //goodmorning; earlier than 12pm
					{
						echo "Good Morning, " . $user . ".";
					}
					elseif($time < "17") //sometime before 5pm
					{
						echo "Good Afternoon, " . $user . ".";
					}
					else
					{
						echo "Good Evening, " . $user . ".";
					}
			?>
		</p>
		<h3 class="subhead">Start Exploring. Buy a Jersey. Go Pro. Thank us. Buy more jerseys.</h3>
		<p></p>
		<form action="products.php" method="get">
			<input type="submit" name="shop" value="Start Shopping" id="shopbtn" />
		</form>
	</div>

	<!-- "brand new jerseys" ADD ZOOM FEATURE -->
	<!-- used a jquery effect to zoom in on the images 
	 and this is where I got it from: http://jquery.malsup.com/hoverpulse/ -->
	<div class="newjerseysbox" id="row2">
		<h1 class="newhead">Brand new jersey's that just arrived.</h1>
		<table class="newjerseytable">
			<tr>
				<td>
					<div class="new" id="jersey1">
						<img src="../images/dortmund.jpg" alt="new jersey1" />
						<a href="products.php" class="newbuy">Add to Cart</a>
					</div>
				</td>
				<td>
					<div class="new" id="jersey2">
						<img src="../images/real.jpg" alt="new jersey2" />
						<a href="products.php" class="newbuy">Add to Cart</a>
					</div>
				</td>
				<td>
					<div class="new" id="jersey3">
						<img src="../images/barca3.png" alt="new jersey3" />
						<a href="products.php" class="newbuy">Add to Cart</a>
					</div>
				</td>
				<td>
					<div class="new" id="jersey4">
						<img src="../images/bayern.jpg" alt="new jersey4" />
						<a href="products.php" class="newbuy">Add to Cart</a>
					</div>
				</td>
				<td>
					<div class="new" id="jersey5">
						<img src="../images/juve.jpg" alt="new jersey5" />
						<a href="products.php" class="newbuy">Add to Cart</a>
					</div>
				</td>
			</tr>
		</table>
	</div>
		
<!-- slide show -->
<!-- References used for my slideshow: 
	 https://www.youtube.com/watch?v=QtYP_eSVKfs
	 https://www.youtube.com/watch?v=z277ZUHNnnE
	 https://www.youtube.com/watch?v=XlYsjMPCgfI
	-->
	<div class="slideshowbox" id="row3">
		<table class="slideshow">
			<tr>
				<td>
					<div class="slides">
						<img id="1" class="slide" src="../images/slide3.jpg" alt="slide1" />
						<img id="2" class="slide" src="../images/barcateam.jpg" alt="slide2" />
						<img id="3" class="slide" src="../images/realteam.jpg" alt="slide3" />
						<img id="4" class="slide" src="../images/soccerfan.jpg" alt="slide4" />
						<img id="5" class="slide" src="../images/rooneybike.jpg" alt="slide5" />
					</div>
				</td>
			</tr>
		</table>
	</div>

<!-- information / maybe select a few jersey's on sale -->
<!-- used a jquery effect to zoom in on the images 
	 and this is where I got it from: http://jquery.malsup.com/hoverpulse/ -->
	<div class="salebox" id="row4">
		<h1>Jersey's that are currently on SALE!</h1>
		<table class="sale">
			<tr>
				<td>
					<div class="saleprod">
						<img class="jersey" src="../images/greece.jpg" alt="City jersey" />
						<h2>SALE!</h2>
					</div>
				</td>
				<td>
					<div class="saleprod" id="middleprod">
						<img class="jersey" src="../images/marseille.jpg" alt="Liverpool jersey" />
						<h2>SALE!</h2>
					</div>
				</td>
				<td>
					<div class="saleprod">
						<img class="jersey" src="../images/porto.jpg" alt="United jersey" />
						<h2>SALE!</h2>
					</div>
				</td>
				<td>
					<div class="saleprod">
						<img class="jersey" src="../images/usa2.jpg" alt="City jersey" />
						<h2>SALE!</h2>
					</div>
				</td>
				<td>
					<div class="saleprod">
						<img class="jersey" src="../images/croatia.jpg" alt="City jersey" />
						<h2>SALE!</h2>
					</div>
				</td>
				<td>
					<div class="saleprod">
						<img class="jersey" src="../images/celtic.jpg" alt="City jersey" />
						<h2>SALE!</h2>
					</div>
				</td>
			</tr>
		</table>
	</div>

	<!-- youtube video -->

	<div class="vidbox" id="row5">
		<table class="vid">
			<tr>
				<td>
					<div class="youtubevid">
						<iframe width="560" height="315" 
							src="//www.youtube.com/embed/fFHl7ph8WNQ" 
							allowfullscreen id="youtube">
						</iframe>
					</div>
				</td>
				<td>
					<h1 class="vidDescrip">"<em>Everytime I step onto the pitch, all my troubles goes away, 
						and the only thing that matters on the field, is the beautiful game.</em>"
						-Every Footballer Ever.</h1>
				</td>
			</tr>
		</table>
	</div>


	<!-- proven science promo -->
	<div class="sciencebox">
		<div id="scienceImgBox"><img src="../images/jerseybundle.png" alt="picture of jerseys"></div>
		<div id="scienceText">
			<h1>It's a Proven Science.</h1>
			<p>It's a proven science that wearing the right gear leads to increased performance. If you look
			very carefully during proper football matches, you will notice that every player is wearing a jersey
			and not just any jersey... our jersey's. Our jersey's don't only provide players with a very inventive
			stylish look, but also increase a players speed and agility. Our jersey's are specially designed to cut
			through wind, allowing players to run 200% faster than if they were to not wear our jerseys. It's
			been scientifically proven.</p>
		</div>
	</div>

	<hr>

	<!-- footer -->

	<div class="homefooter">
		<p>
			<img class="footerimg" src="../images/html5.png" alt="Valid HTML5 Icon"/>
			<img class="footerimg" src="../images/css3.png" alt="Valid CSS3 Icon"/>
			<br />
			&copy;2014, Adam Adams
		</p>
	</div>

	<!--<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
	<script src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
	<script type="text/javascript" src="../js/jquery.js"></script>-->
	
	
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
	<script type="text/javascript" src="jquery.hoverpulse.js"></script>
	<script type="text/javascript" src="../js/hoverzoom.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {
		    $('.new img').hoverpulse({
		        size: 60,  // number of pixels to pulse element (in each direction)
		        speed: 400 // speed of the animation 
		    });

		    $('.saleprod img').hoverpulse({
		        size: 60,  // number of pixels to pulse element (in each direction)
		        speed: 400 // speed of the animation 
		    });
		});  
	</script>
	<script type="text/javascript" src="../js/slideshow.js"></script>
</body>

</html>