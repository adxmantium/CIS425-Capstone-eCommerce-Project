<?php

	$dbhost = "localhost";
	$dbuser = "ajadam11";
	$dbpass = "cis425";
	$db = "ajadam11";

	$connection = mysqli_connect($dbhost, $dbuser, $dbpass, $db) 
	or die('Unable to connect to CIS425 SERVER');

?>