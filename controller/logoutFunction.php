<?php

	//logout for a6
	session_start('user');
	session_unset('user');
	session_destroy('user');
	session_start($_SESSION['cart']);
	session_unset($_SESSION['cart']);
	session_destroy($_SESSION['cart']);
	session_start($_SESSION['authenticated']);
	session_unset($_SESSION['authenticated']);
	session_destroy($_SESSION['authenticated']);
	header('Location: ../index.php');
	exit;

?>