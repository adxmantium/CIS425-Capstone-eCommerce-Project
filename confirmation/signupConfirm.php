<!-- confirmation page for when a user has successfully created an account -->
<!DOCTYPE html>

<?php 
	
	//start a php session
	//session_start();
	
	// check to see if user is logged in
	//creating a session variable and checking if there is a session
	//already set. if set, send to welcome page.
	/*if(!isset($_SESSION["authenticated"])){
		header('Location: ../index.php');
		exit;
	}*/


	//passing user entered data to db

	//including another php file that contains db connection variables
	include ('../controller/dbconnection-server.php');

	//using real_escape_string to prevent sql injection
	$fname = mysqli_real_escape_string($connection, $_POST['fname']);
	$lname = mysqli_real_escape_string($connection, $_POST['lname']);
	$username = mysqli_real_escape_string($connection, $_POST['username']);
	$email = mysqli_real_escape_string($connection, $_POST['email']);
	$password = mysqli_real_escape_string($connection, $_POST['password']);
	$favTeam = mysqli_real_escape_string($connection, $_POST['favTeam']);

	//preparing query with appropriate table fields and values to be stored
	$query = "INSERT INTO customers(CustomerID, FirstName, LastName, Username, Email, Password, 
		FavoriteTeam)" . 
	"VALUES(NULL,'$fname', '$lname', '$username', '$email', '$password', '$favTeam')";

	//running the query to post user input into customers table
	$result = mysqli_query($connection, $query) or die("Could not write to the DB");

	//clost the db connection
	mysqli_close($connection);

?>

<html>

<head>
	<!-- Meta tag -->
	<meta name="robots" content="noindex,nofollow" />
    <meta charset="utf-8" />
    <meta http-equiv="refresh" content="5; url=../homepage/index.php" />

	<title>Sign Up Confirmation</title>
	
	<link rel="stylesheet" type="text/css" href="../stylesheets/cssForSignupPage.css">
	<link href='http://fonts.googleapis.com/css?family=Lato:300' rel='stylesheet' type='text/css'>
	<link rel="icon" href="../images/icon3.png" />
</head>

<body class="signupbanner">

<!-- the body/banner between navbar and footer -->
	<div class="main">
		<p class="p1">You have successfully created an account!</p>
		<h1 class="p2">Welcome to the FutbolClub!</h1>
		<form action="../index.php" method="get" >
			<input type="submit" value="Proceed to Log In" id="homebtn" autofocus>
		</form>
		<p>
			You will be redirected to the Log In page in 5 seconds...
		</p>
	</div>
	
	<div class="signupConfooter">
		<p>
			<img class="footerimg" src="../images/html5.png" alt="Valid HTML5 Icon"/>
			<img class="footerimg" src="../images/css3.png" alt="Valid CSS3 Icon"/>
			<br />
			&copy;2014, Adam Adams
		</p>
	</div>

</body>

</html>