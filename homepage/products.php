 <!-- products.php -->
<!DOCTYPE html>

<?php 
	//import necesary globals and functions
	include('../controller/dbconnection-server.php');
	include('../controller/productFunctions.php');

	//start a php session
	session_start($_SESSION['cart']);
	session_start($_SESSION['authenticated']);
	
	// check to see if user is logged in
	//creating a session variable and checking if there is a session
	//already set. if set, send to welcome page.
	if(!isset($_SESSION["authenticated"])){
		header('Location: ../index.php');
		exit;
	}

	/*
	This statement checks the onsubmit="" value from th form and adds the product, based on the
	productid value from the form, to the 'cart' session array.

	Once complete, thescript rdirects the browser to the cart page.
	*/
	if($_REQUEST['command'] == 'add' & $_REQUEST['productid'] > 0)
	{
		$product_id = $_REQUEST['productid'];
		add_to_cart($product_id, 1);
		header("Location: products.php");
		exit();
	}

	if($_REQUEST['command'] == 'clear')
	{
		unset($_SESSION['cart']);
	}

?>

<html>

<head>
	<!-- Meta tag -->
	<meta name="robots" content="noindex,nofollow" />
    <meta charset="utf-8" />

	<title>Products Page</title>
	
	<link rel="stylesheet" type="text/css" href="../stylesheets/cssForProducts.css">
	<link href='http://fonts.googleapis.com/css?family=Lato:300' rel='stylesheet' type='text/css'>
	<link rel="icon" href="../images/icon3.png" />

	<script type="text/javascript">
		//This js is necessary to determine which button on the form the user clicked.
		function addtocart(prod_id)
		{
			document.productform.productid.value = prod_id;
			document.productform.command.value = 'add';
			document.productform.submit();
		}

		function clear_cart()
		{
			if(confirm('Are you sure you wish to empty your cart?'))
			{
				document.cartform.command.value = 'clear';
				document.cartform.submit();
			}
		}

	</script>

</head>

<body class="prodbanner">
<!--navbar-->
	<!-- Intro banner  -->
	<div class="prodnavbar">
		<a href="index.php" id="logo">FutbolClub</a>
		<ul class="prodnavlist" >
			<li class="navitems"><a href="index.php" >Home</a></li>
			<li class="navitems" id="currentpage"><a href="products.php" >Products</a></li>
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

<!-- Each of the table data implements a jquery functionality and this is where
     I got my jquery code from: 
     http://www.freshdesignweb.com/beautiful-image-hover-effects-with-jquery-css3.html-->
<!-- List of products/jerseys -->
	<div class="productline" id="row2">
		<form name="productform" action="">
			<input type="hidden" name="productid" />
			<input type="hidden" name="command"/>
			<table class="productlist">
				<?php
					$query = "SELECT * FROM products";
					$result = mysqli_query($connection, $query) or die("Error querying DB");

					while($row = mysqli_fetch_array($result))
					{
						echo '<tr>
						<td>
							<div class="prodbox" id="jersey'.$row['ProductID'].'">
								<div class="overlap">
									<h4>'. $row['ProductName'] .'</h4>
									<input type="button" value="Add To Cart" class="addToCart"
									onclick="addtocart(' . $row['ProductID'] . ')" />
									<p class="price">'. $row['Price'] .'</p>
									<p class="sale">Sale Item</p>
								</div>
							</div>
						</td>
						</tr>';
					}
				?>
			</table>
		</form>
	</div>

<!-- Each of the table data implements a jquery functionality and this is where
     I got my jquery code from: 
     http://www.freshdesignweb.com/beautiful-image-hover-effects-with-jquery-css3.html-->
	<div class="cartpreview">
		<table id="cartTable">
			<?php
				echo '<tr>
					<td >
						<div id="home">
							<div class="overlap" id="homeover"><h5><a href="index.php">Home</a></h5></div>
						</div>
					</td>
					<td>
						<div id="clear">
							<div class="overlap" id="clearover"><h5><a href="#" onclick="clear_cart()">Clear</a></h5></div>
						</div>
					</td>
					<td>
						<div id="cartredirect">
							<div class="overlap" id="cartover"><h5><a href="shoppingcart.php">Checkout</a></h5></div>
						</div>
					</td>
					</tr>';
				echo '<tr>
					<td id="total" colspan="4"><strong>Order Total: &#36;' . get_order_total($connection) . 
					'</strong></td>
					</tr>';

				echo '<tr>
					<th class="carthead">Name</th>
					<th class="carthead">Price</th>
					<th class="carthead">Qty</th>
					<th class="carthead">Option</th>';
				if(count($_SESSION['cart']))
				{
					echo '
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
						<td class="carttd">' . $product_name . '</td>
						<td class="carttd">&#36; ' . $product_price . '</td>
						<td class="carttd"><input type="text" name="product' . $product_id . '" value="' . 
							$quantity . '" maxlength="4" size="2" /></td>
						<td class="carttd"><a href="javascript:del(' . $product_id . ')">Remove Item</a></td>
						</tr>';
					}
				}
				else
				{
					echo '<tr><td>There are no items in your shopping cart.</td></tr>';
				}
			?>
		</table>
	</div>

<!-- footer -->

	<div class="prodfooter">
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