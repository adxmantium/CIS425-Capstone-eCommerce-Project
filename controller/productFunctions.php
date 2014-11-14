<?php
	
	//start_session($_SESSION['cart']);
	/*This function queries the database and returns the name of the product id the user selected
	to place in their shopping cart.

	Returns: String 
	Arguments: $connection = the $connection glocal variable from db.php file
				$product_id - the value of the unique id of the product based on the db entry */


	function get_product_name($db, $product_id)
	{
		$query = "SELECT ProductName FROM products WHERE ProductID = $product_id";
		$result = mysqli_query($db, $query);
		$row = mysqli_fetch_array($result);
		return $row['ProductName'];
	}

	/*
	This function queries the db and returns the price of the product id the user selected to place 
	in their shopping cart.

	Returns: float
	Arguments: $db- the $dbc global variable 
				$product_id
	*/


	function get_price($db, $product_id)
	{
		$query = "SELECT Price FROM products WHERE ProductID = $product_id";
		$result = mysqli_query($db, $query);
		$row = mysqli_fetch_array($result);
		return $row['Price'];
	}


	/*
	This function steps through the shopping cart, set in our session array 'cart', and looks for a 
	specific product, based on the unique id, and removes the product from the array. If the product
	is not found, the function is terminated. 

	Returns: nothing
	Arguments: $product_id
	*/

	function remove_product($product_id)
	{
		$product_id = intval($product_id);
		$max = count($_SESSION['cart']);

		for($i = 0; $i<$max; $i++)
		{
			if($product_id == $_SESSION['cart']['$i']['productid'])
			{
				unset($_SESSION['cart']['$i']);
				break;
			}
		}
		$_SESSION['cart'] = array_values($_SESSION['cart']);
	}

	/*
	This function steps through the shopping cart, set in our session array 'cart', and computes the 
	total price for all of the items contained in the array, based on the price of the item in the
	db and the quantity in the array.

	Returns: int
	Arguments: $db
	*/

	function get_order_total($db)
	{
		$max = count($_SESSION['cart']);
		$sum = 0;

		for($i = 0; $i < $max; $i++)
		{
			$product_id = $_SESSION['cart'][$i]['productid'];
			$quantity = $_SESSION['cart'][$i]['quantity'];
			$price = get_price($db, $product_id);
			$sum += $price * $quantity;
		}
		return $sum;
	}

	/*
	This function first ensures that neither the product id or the quantity in the form submission
	are not zero. It then proceeds to check if the 'cart' session has been established. If so, the 
	function calls product_exists(args) to determine if the product already exists in the cart. If
	it does, the quantity is updated. If it does not exist, then the product is added
	to the cart in addition to the products already present. 

	If the cart session has not been established, the 'cart' is established and the product is added.

	Returns: nothing
	Arguments: $product_id
				$quantity
				References: product_exists(args)
	*/

	function add_to_cart($product_id, $quantity)
	{
		if($product_id < 1 || $quantity < 1)
		{
			return;
		}

		if(is_array($_SESSION['cart']))
		{
			$exists_results = product_exists($product_id);
			$exists = $exists_results[0];
			$position = $exists_results[1];

			if($exists)
			{
				$new_quantity = intval($_SESSION['cart'][$position]['quantity']);
				$new_quantity++;
				$_SESSION['cart'][$position]['quantity'] = $new_quantity;
			}
			else
			{
				$max = count($_SESSION['cart']);
				$_SESSION['cart'][$max]['productid'] = $product_id;
				$_SESSION['cart'][$max]['quantity'] = $quantity;
			}
		}
		else
		{
			$_SESSION['cart'] = array();
			$_SESSION['cart'][0]['productid'] = $product_id;
			$_SESSION['cart'][0]['quantity'] = $quantity;
		}
	}

	/*
	This function steps through the shopping cart, set in our session array 'cart', to determine
	if the product has previously been added to the cart. If so, the function sets the
	flag to true and returns the position in the 'cart' array.

	Returns: array
	Arguments: $product_id
	*/

	function product_exists($product_id)
	{
		$product_id = intval($product_id);
		$max - count($_SESSION['cart']);
		$flag = 0;

		for($i = 0; $i < $max; $i++)
		{
			if($product_id == $_SESSION['cart'][$i]['productid'])
			{
				$flag = 1;
				break;
			}
		}
		return array($flag, $i);
	}
	


?>