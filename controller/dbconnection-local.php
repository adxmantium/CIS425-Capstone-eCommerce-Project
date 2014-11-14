<?php

	$dbhost = "localhost";
	$dbuser = "root";
	$dbpass = "";
	$db = "futbolclub_test";

	$connection = mysqli_connect($dbhost, $dbuser, $dbpass, $db) 
	or die('Unable to connect to local SERVER');

	/*
	<tr>
					<td>
						<div class="prodbox">
							<div class="overlap">
								<h4>'. $row['ProductName'] .'</h4>
								<input type="button" value="Add To Cart" class="addToCart"
								onclick="addtocart(' . $row['ProductID'] . ')" />
								<p class="price">'. $row['Price'] .'</p>
							</div>
						</div>
					</td>
					</tr>
	*/

?>

