<!DOCTYPE html>
<!-- unofficial 2 contactUs.php -->
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

	<title>Contact Us</title>

	<link rel="stylesheet" type="text/css" href="../stylesheets/cssForAboutUs.css">
	<link href='http://fonts.googleapis.com/css?family=Lato:300' rel='stylesheet' type='text/css'>
	<link rel="icon" href="../images/icon3.png" />

	<script type="text/javascript">
		function emailFocus(){
			document.getElementById("commentbox").focus();
		}

		function emailthankyou(){
		    alert("Your email was successfully sent! Thank you for your email submission!");
		}
	</script>

<body class="homebanner">
<!--navbar-->

	
<!-- *************the navbar and banner**************** -->

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
				<li class="navitems" id="currentpage"><a href="contactUs.php" >Contact Us</a></li>
				<li class="navitems"><a href="aboutUs.php" >About Us</a></li>
				<li class="navitems" id="logout"><a href="../controller/logoutFunction.php" >Log Out</a></li>
			</ul>
		</div>
		<p class="introhead">Email: dennis.anderson@asu.edu</p>
		<h3 class="subhead">
		  <img src="../images/twittericon.png" alt="Twitter icon">Twitter: @FutbolClubDoesNotQuiteExistYet<br/>
		    <img src="../images/facebookicon2.png" alt="Facebook icon">Facebook: FutbolClubIsntOnFb<br/>
		    <img src="../images/phoneicon.png" alt="phone icon">Phone: 123.456.7890<br/> 
		</h3>
		<p></p>
		<input type="submit" name="sendemailbtn" value="Send an Email" id="sendemailbtn" onclick="emailFocus()" />
	</div>

	<!-- social media brick -->
	<!-- Each of the table data implements a jquery functionality and this is where
	     I got my jquery code from: 
	     http://www.freshdesignweb.com/beautiful-image-hover-effects-with-jquery-css3.html-->
	<div class="followusbox" id="row2">
		<div class="bricktable">
			<table class="table">
				<tr class="socialmedia">
					<td class="socialicon" id="twitter">
						<div class="overlap">
							<h2>Follow us on Twitter!</h2>
							<a href="#">Follow</a>
						</div>
					</td>
					<td class="socialicon" id="fb">
						<div class="overlap">
							<h2>Like us on Facebook!</h2>
							<a href="#">Like</a>
						</div>
					</td>
					<td class="socialicon" id="github">
						<div class="overlap">
							<h2>Follow Us on Github!</h2>
							<a href="#">Follow</a>
						</div>
					</td>
				</tr>
			</table>
			<!-- email us brick -->
			<table class="table">
				<tr class="emailus">
					<td class="emailbrick" id="td2">
						<div id="emailbox">
							<p id="to"><strong>To:</strong> dennis.anderson@asu.edu <strong id="from">From: </strong><?php echo $_SESSION['userEmail'] ?></p>
							<form name="emailform" onsubmit="emailthankyou()" class="emailform" action="https://webapp4.asu.edu/pubtools/Mail" method="post">
								<input type="hidden" name="sendto" value="dennis.anderson@asu.edu" />
								<input type="hidden" name="subject" value="Website Comments Test" />
								<input type="hidden" name="location" value="http://cis425.wpcarey.asu.edu/ajadam11/project/homePage/contactUs.php" />
								<!--<h3 id="bodylabel">Body:</h3>-->
								<textarea name="commentbox" id="commentbox" rows="9" cols="70" required
										title="We would love to hear what you have to say!" 
										placeholder="Write us something then press Send Email button!"></textarea>
								<input type="submit" name="sendemailbtn2" value="Send Email" 
								id="sendbtn" onclick="history.go(0)">
							</form>
						</div>
					</td>
					<td class="label">
						<div >
							<div>
								<h1>We'd Love to hear from you!</h1>
								<img src="../images/leftpointer.png" alt="left arrow">
							</div>
						</div>
					</td>
				</tr>
			</table>
			<!-- slide show brick -->
			<!-- Sources used for my slideshow: 
			 https://www.youtube.com/watch?v=QtYP_eSVKfs
			 https://www.youtube.com/watch?v=z277ZUHNnnE
			 https://www.youtube.com/watch?v=XlYsjMPCgfI
			-->
			<div class="table" id="slideshow">
				<div class="slides">
					<img id="1" class="slide" src="../images/slide3.jpg" alt="slide1" />
					<img id="2" class="slide" src="../images/barcateam.jpg" alt="slide2" />
					<img id="3" class="slide" src="../images/realteam.jpg" alt="slide3" />
					<img id="4" class="slide" src="../images/soccerfan.jpg" alt="slide4" />
					<img id="5" class="slide" src="../images/rooneybike.jpg" alt="slide5" />
				</div>
			</div>
			<!-- fill out survey brick -->
			<table class="table">
				<tr id="surv">
					<td class="label" id="surveylabel">
						<h1>Fill out our Survey!</h1>
						<img src="../images/right.png" alt="right arrow">
					</td>
					<td class="td2" id="surveybox">
						<div id="surveyform">
							<form action="../confirmation/surveyConfirmation.php" method="post">
								Is the site user friendly?
								<input type="radio" name="userfriendly" value="yes" required />Yes
								<input type="radio" name="userfriendly" value="no" />No
								<br/>

								What do you like or dislike about this site?<br/>
								<textarea name="likeordislike" rows="3" cols="64"
								required title="Tell us your thoughts on the site!"
								placeholder="Tell us what you think!"></textarea>
								<br/>
								What other jerseys/products would you like to see?<br/>
								<textarea name="jerseychoices" rows="3" cols="64"
								required title="New jersey selection?"
								placeholder="Tell us what you think!"></textarea>
								<br/>
								Are you now pro because of our jerseys?<br/>
								<select>
									<option value="">Select an option..</option>
									<option value="">Of course! I had no doubt in the jerseys</option>
									<option value="negotiating">Currently negotiating contract</option>
									<option value="notyet">Not yet...</option>
								</select>
								<br/>
								<input type="submit" name="submitsurvey" value="Submit Survey" id="surveybtn" />
							</form>
						</div>
					</td>
				</tr>
			</table>
			<table class="table">
				<tr class="otherInfo">
					<td class="label">
						<h1>Location:</h1>
						<p>WP Carey School of Business,<br/> BAC 209</p>
					</td>
					<td class="label">
						<h1>FutbolClub App</h1>
						<p>coming soon...</p>
					</td>
					<td class="label">
						<h1>Complaints:</h1>
						<p>Please direct all complaints <br/>to our complaint department-<br/> Noh Juan Kares.</p>
					</td>
				</tr>
			</table>
		</div>
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


	<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
	<script src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
	<script type="text/javascript" src="../js/jquery.js"></script>
	<script type="text/javascript" src="../js/hover.js"></script>
	<script type="text/javascript" src="../js/slideshow.js"></script>

</body>

</html>