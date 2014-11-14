<?php

	include 'dbconnection-server.php';

	$email = $_POST['email'];
	$pass = $_POST['password'];

	$query = "SELECT * FROM Customers";
	$result = mysql_query($query);
	

	while ( $userFound = mysql_fetch_assoc($result) ) {
		
		if($userFound['Email'] == $email && $userFound['Password'] == $pass){
			header('Location: ../homePage/index.php');
		}
		else{
			if ($userFound['Email'] != $email) {
				header('Location: ../index.php?invalidlogin=1');
			}
			elseif($userFound['Password'] != $pass) {
				header('Location: ../index.php?invalidlogin=2');
			}
			else{
				header('Location: ../index.php?invalidlogin=3');
			}
		}
	}
	
?>