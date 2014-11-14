<?php

//validating user login

//build single-dimensional arrays for usernames, passwords, and fullnames
$usernames = array("deande", "annak", "nico", "admin");
$passwords = array("redbull", "tennis", "bacon", "admin");
$fullnames = array("Denis A.", "Dennis' girl", "Nico the Dog", "Mr. Adams");

//this variable will be a '1' when we get a match
$matchedFound = 0; //0 off, 1 on

//this variable will tell us were we are in the array
$index = 0;

//for loop to step through the array
for($i=0; $i<count($usernames); $i++){
	if($usernames[$i] == $_POST["username"]){
		$matched = 1;
		$index = $i;
	}
}

//check to see if we found a username
//if no match found, return back to index to display error message
if($matched == 0){
	header('Location: ../index.php?invalidlogin=1');
	exit;
}

//check to seee if the password entered is in the correct position in the array
if($passwords[$index] == $_POST["password"]){
	session_start();
	$_SESSION["authenticated"] = $fullnames[$index]; //storing the username in the SESSION global variable as an id to keep the session open and unique to "this" username
	header('Location: homePage/index.php');
}
else{
	header('Location: ../index.php?logerror=2');
	exit;
}


//pass a '3' back to customerLogin.php page for testing (keep this code at the bottom!)
header('Location: ../index.php?logerror=3');
exit;
?>