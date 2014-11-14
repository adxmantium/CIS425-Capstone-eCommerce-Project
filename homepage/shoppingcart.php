<!-- unofficial 2 shoppingcart.php -->
<!DOCTYPE html>

<?php 
	//import necesary globals and functions
	include('../controller/dbconnection-server.php');
	include('../controller/productFunctions.php');
	
	session_start($_SESSION['cart']);
	session_start($_SESSION['authenticated']);

	/*
	This statement checks th onsubmit="" command passed from the js and processes the 
	necessary command:
		- Clear cart
		- Update item quantity
	NOTE: the quantity update must fall between 1 and 1000
	*/
	if($_REQUEST['command'] == 'delete' && $_REQUEST['productid'] > 0)
	{
		remove_product($_REQUEST['productid']);
	}
	elseif($_REQUEST['command'] == 'clear')
	{
		unset($_SESSION['cart']);
	}
	elseif($_REQUEST['command'] == 'update')
	{
		$max = count($_SESSION['cart']);

		for($i = 0; $i < $max; $i++)
		{
			$product_id = $_SESSION['cart'][$i]['productid'];
			$quantity = intval($_REQUEST['product'.$product_id]);

			if($quantity > 0 && $quantity <= 1000)
			{
				$_SESSION['cart'][$i]['quantity'] = $quantity;
			}
			else
			{
				$message = 'Some products were not updated! Item
							quantity must be between 1 and 1000';
			}
		}
	}
	elseif($_REQUEST['command'] == 'complete')
	{
		header("Location: ../confirmation/thankyouforpurchase.php");
	}
?>

<html>

<head>
	<!-- Meta tag -->
	<meta name="robots" content="noindex,nofollow" />
    <meta charset="utf-8" />

	<title>Shopping Cart</title>
	
	<link rel="stylesheet" type="text/css" href="../stylesheets/cssForShoppingCart.css">
	<link href='http://fonts.googleapis.com/css?family=Lato:300' rel='stylesheet' type='text/css'>
	<link rel="icon" href="../images/icon3.png" />
    
	<script type="text/javascript">
		// The following js are all necessary to determine which button 
		//on the form the user clicked.
		function del(productid)
		{
			if(confirm('Are you sure you want to delete this item?'))
			{
				document.cartform.productid.value = productid;
				document.cartform.command.value = 'delete';
				document.cartform.submit();
			}
		}

		function clear_cart()
		{
			if(confirm('Are you sure you wish to empty your cart?'))
			{
				document.cartform.command.value = 'clear';
				document.cartform.submit();
			}
		}

		function update_cart()
		{
			document.cartform.command.value = 'update';
			document.cartform.submit();
		}

		function complete_order()
		{
			document.cartform.command.value = 'complete';
			document.cartform.submit();
		}
	</script>
    
</head>

<body class="cartbanner">
	<!-- navbar  -->
	<div class="cartnavbar">
		<a href="index.php" id="logo">FutbolClub</a>
		<ul class="cartnavlist" >
			<li class="navitems"><a href="index.php" >Home</a></li>
			<li class="navitems"><a href="products.php" >Products</a></li>
				<?php 
					if(count($_SESSION['cart']) > 0)
					{
						echo '<li class="navitems" id="full"><a href="shoppingcart.php" >
						Shopping Cart('.count($_SESSION['cart']).')';
					}
					else
					{
						echo '<li class="navitems" id="empty"><a href="shoppingcart.php" >Shopping Cart'; 
					}
				?></a></li>
			<li class="navitems"><a href="contactUs.php" >Contact Us</a></li>
			<li class="navitems"><a href="aboutUs.php" >About Us</a></li>
			<li class="navitems" id="logout"><a href="../controller/logoutFunction.php" >Log Out</a></li>
		</ul>
	</div><!--end of navbar-->

	<div >
		<form name="cartform" method="post" action="" id="cartform">
			<input type="hidden" name="productid" />
			<input type="hidden" name="command" />
			
			<div id="errormsg">
				<?php
					echo $message;
				?>
			</div>

			<div id="welcomeheader">
				<?php
					echo '
						<h1 id="cartwelcome">' .$_SESSION['authenticated'].'\'s FutbolCart</h1>
						<p id="cartpromo">Complete your purchase to finally realize your dreams of becoming a Champion!</p>
						<span>
							<input id="continuebtn" type="button" value="&larr; Continue Shopping" onclick="window.location.href=\'products.php\'" />
						</span>
					';
				?>
			</div>
			<table id="cartTable">
				<?php
					
					if(count($_SESSION['cart']))
					{
						
						echo '<tr>
						<th class="header">Name</th>
						<th class="header">Price</th>
						<th class="header">Qty</th>
						<th class="header">Amount</th>
						<th class="header">Options</th>
						</tr>';

						$max = count($_SESSION['cart']);
						for($i = 0; $i < $max; $i++)
						{
							$product_id = $_SESSION['cart'][$i]['productid'];
							$quantity = $_SESSION['cart'][$i]['quantity'];
							$product_name = get_product_name($connection, $product_id);
							$product_price = get_price($connection, $product_id);

							if($quantity == 0)
							{
								continue;
							}

							echo '<tr>
							<td class="td">' . $product_name . '</td>
							<td class="td">&#36; ' . $product_price . '</td>
							<td class="td"><input type="text" name="product' . $product_id . '" value="' . 
								$quantity . '" maxlength="4" size="2" /></td>
							<td class="td">&#36; ' . $product_price*$quantity . '</td>
							<td class="td"><a href="javascript:del(' . $product_id . ')" id="remove">Remove Item</a></td>
							</tr>';
						}

						echo '<tr>
						<td colspan="2" id="ordertotal" class="header"><strong>Order Total: &#36;' . get_order_total($connection) . 
						'</strong></td>
						<td class="actionbtn" id="clear">
							<div class="overlap" id="clearbtn" >
								<input type="submit" value="Clear Cart" onclick="clear_cart()" class="cartbtn" />
							</div>
						</td>
						<td class="actionbtn" id="update">
							<div class="overlap" id="updatebtn">
								<input type="submit" value="Update Cart" onclick="update_cart()" class="cartbtn"  />
							</div>
						</td>
						<td class="actionbtn" id="checkout">
							<div class="overlap" id="checkoutbtn">
								<input type="submit" value="Complete Order" onclick="complete_order()" class="cartbtn"  />
							</div>
						</td>
						</tr>';

					}
					else
					{
						echo '<tr><td id="continuemsg">Your shopping cart is empty, '.$_SESSION['authenticated'].' :(</td></tr>
							  <tr><td id="cont">Real Champions don\'t leave empty handed...</td></tr>';
					}
				?>
			</table>
		</form>
	</div>

	<div class="cartfooter">
		<p>
			<img class="footerimg" src="../images/html5.png" alt="Valid HTML5 Icon"/>
			<img class="footerimg" src="../images/css3.png" alt="Valid CSS3 Icon"/>
			<br />
			&copy;2014, Adam Adams
		</p>
	</div>

	<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
	<script src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
	<script type="text/javascript" src="../js/jquery.js"></script>
	<script type="text/javascript" src="../js/hover.js"></script>
</body>

</html>