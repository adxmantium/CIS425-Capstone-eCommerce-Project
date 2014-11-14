<?php

	//empty cart
	//session_name('cart');
	session_start($_SESSION['cart']);
	session_unset($_SESSION['cart']);
	//session_destroy('cart');
	header('Location: ../homePage/index.php');
	exit;

?>