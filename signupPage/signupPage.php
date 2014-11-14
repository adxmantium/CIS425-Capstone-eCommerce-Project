<!-- sign up page to allow new users to create an account -->
<!DOCTYPE html>
<html>

<head>
	<title>Sign Up Page</title>
	<link rel="stylesheet" type="text/css" href="../stylesheets/cssForSignupPage.css">
	<link href='http://fonts.googleapis.com/css?family=Lato:300' rel='stylesheet' type='text/css'>
	<link rel="icon" href="../images/icon3.png" />
</head>

<body class="signupbanner">
<!--navbar-->
	<div class="navbar">
			<ul class="navlist">
				<li class="navitems"><a href="#" >Home</a></li>
				<li class="navitems"><a href="#" >Jerseys</a></li>
				<li class="navitems"><a href="#" >Shopping Cart</a></li>
				<li class="navitems"><a href="#" >Contact Us</a></li>
				<li class="navitems"><a href="#" >About Us</a></li>
				<li class="navitems" id="logout"><a href="#" >Log Out</a></li>
			</ul>
	</div>
<!-- the body/banner between navbar and footer -->
	<div class="sub_body">
		
		<div class="signupcenterpiece">
			<p class="signupheader">Please Enter Your Account Info</p>
			<form class="signupform" action="../confirmation/signupConfirm.php" method="post">
				
				<div class="input1">
					<input type="text" name="fname" id="signup_fname" 
					placeholder="First Name" required autofocus 
					title="First Name: 4-30 char; u/l case, - and ' only!" 
					pattern="[a-zA-Z-' ]{4,30}">
				</div>

				<div class="input2">
					<input id="signup_lname" name="lname" type="text" 
					placeholder="Last Name" required 
					title="Last Name: 4-30 char; u/l case, - and ' only!" 
					pattern="[a-zA-Z-' ]{4,30}" >
				</div>

				<div class="input3">
					<input type="text" id="username" name="username"
					required placeholder="Username"
					title="Username: 4-15 char, lower case, 0-9, and . - _ ! $ only!"
					pattern="[a-z0-9.-_!$]{4,15}"/>
					<br />
				</div>

				<div class="input4">
					<input id="signup_email" type="email" name="email" value="" 
					placeholder="Email@domain.com" required 
					title="Email: 6-50 chars, l/c, 0-9, - _ . $ only!" 
					pattern="[a-z0-9-_.$]+@[a-z0-9-_]+\.[a-z]{2,6}">
				</div>
				
				<div class="input5">
					<input id="signup_password" type="password" name="password" 
					value="" placeholder="Password" required 
					title="Password: 5-15 chars, 0-9, and . - _ ! $ only!" 
					pattern="[a-zA-Z0-9.-_!$]{5,15}" onchange="form.reenter.pattern=this.value;" >
				</div>
				
				<div class="input6">
					<input id="signup_reenter" type="password" name="reenter" 
					value="" placeholder="Re-enter Password" title="Passwords Must Match!" 
					required>
				</div>

				<div class="input7">
					<select name="favTeam" id="signup_favTeam" required 
					title="What is your favorite team?">
						<option value="">Select your favorite team...</option>
						<option value="Barcelona">FC Barcelona</option>
						<option value="Madrid">Real Madrid</option>
						<option value="Liverpool">Liverpool</option>
						<option value="Chelsea">Chelsea</option>
						<option value="Arsenal">Arsenal</option>
						<option value="ManchesterUnited">Manchester United</option>
						<option value="MancesterCity">Manchester City</option>
						<option value="Munich">Bayern Munich</option>
						<option value="Dortmund">Dortmund</option>
						<option value="Schalke">Shalke</option>
						<option value="Milan">AC Milan</option>
						<option value="Juventus">Juventus</option>
						<option value="Porto">Porto</option>
						<option value="PSG">PSG</option>
					</select>
				</div>
				
				<div class="input8">
					<input id="submitButton" type="submit" name="Submit" value="Finish">
				</div>
				
			</form>
		</div>	
	</div>

	<div class="footer">
		<p>
			<img class="footerimg" src="../images/html5.png" alt="Valid HTML5 Icon"/>
			<img class="footerimg" src="../images/css3.png" alt="Valid CSS3 Icon"/>
			<br />
			&copy;2014, Adam Adams
		</p>
	</div>

</body>

</html>