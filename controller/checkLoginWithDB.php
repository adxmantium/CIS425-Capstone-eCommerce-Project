<?php

	// setup our db cnnection
	include('../controller/dbconnection-server.php');
	
	// get the user-entered login information
	$username = $_POST['username'];
	$password = $_POST['password'];
	
	// build our username query
	$query = "SELECT Username FROM customers WHERE Username = '$username'";
	
	// run the username query
	$result = mysqli_query($connection, $query) or die("Read error - username");
	
	// check to see if we got a row; if the username actually exists in db
	if(mysqli_num_rows($result) == 0)
	{
		header('Location: ../index.php?invalidlogin=1');
		exit; 
	}
	
	//if we get to here, we have validated username!
	
	// check the username and password combo
	$query = "SELECT * FROM customers WHERE Username = '$username' AND 
	password = '$password'";
	
	// run the username and password query
	$result = mysqli_query($connection, $query) or die("Read error - password!");
	
	// check to see if we got a row
	if(mysqli_num_rows($result) == 0)
	{
		header('Location: ../index.php?invalidlogin=2');
		exit; 
	}
	
	// if we get to here, we have verified a username and password combo
	
	//close the db connection
	mysqli_close($connection);
	
	//start a php session
	session_start("user");
	
	// get and store our session variables
	$row = mysqli_fetch_array($result);
	$_SESSION['authenticated'] = $row['FirstName'];
	$_SESSION['userEmail'] = $row['Email'];
	header('Location: ../confirmation/welcome.php');

//pass a '3' back to customerLogin.php page for testing (keep this code at the bottom!)
header('Location: ../index.php?logerror=3');
exit;
?>