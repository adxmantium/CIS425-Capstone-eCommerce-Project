<?php 

	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$username = $_POST['username'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$favTeam = $_POST['favTeam'];

	if(!$_POST['Submit']){
		header("Location: ../homePage/index.php");
	}
	else{
		mysql_query("INSERT INTO Customers (`CustomerID`,`FirstName`,`LastName`,`Email`,
			`Password`, `FavoriteTeam`)
		VALUES(NULL,'$fname','$lname','$email','$password','$favTeam')") or die(mysql_error());
		session_start();
		$_SESSION['authenticated'] = $username;
		header('Location: ../confirmation/signupConfirm.php');
		exit;
	}

?>