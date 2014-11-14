<?php

// jCart v1.3
// http://conceptlogic.com/jcart/

// Do NOT store any sensitive info in this file!!!
// It's loaded into the browser as plain text via Ajax


////////////////////////////////////////////////////////////////////////////////
// REQUIRED SETTINGS

// Path to your jcart files
$config['jcartPath']              = 'jcart-1.3/jcart/';

// Path to your checkout page
$config['checkoutPath']           = 'shoppingcart.php';

// The HTML name attributes used in your item forms
$config['item']['id']             = 'item-id';    // Item id
$config['item']['name']           = 'item-name';    // Item name
$config['item']['price']          = 'item-price';    // Item price
$config['item']['qty']            = 'item-qty';    // Item quantity
//$config['item']['url']            = 'item-url';    // Item URL (optional)
$config['item']['add']            = 'add-button';    // Add to cart button

// Your PayPal secure merchant ID
// Found here: https://www.paypal.com/webapps/customerprofile/summary.view
$config['paypal']['id']           = 'seller_1282188508_biz@conceptlogic.com';

////////////////////////////////////////////////////////////////////////////////
// OPTIONAL SETTINGS

// Three-letter currency code, defaults to USD if empty
// See available options here: http://j.mp/agNsTx
$config['currencyCode']           = '';

// Add a unique token to form posts to prevent CSRF exploits
// Learn more: http://conceptlogic.com/jcart/security.php
$config['csrfToken']              = false;

// Override default cart text
$config['text']['cartTitle']      = 'Club Cart';    // Shopping Cart
$config['text']['singleItem']     = 'Single Jersey';    // Item
$config['text']['multipleItems']  = '';    // Items
$config['text']['subtotal']       = 'Subtotal';    // Subtotal
$config['text']['update']         = 'Update';    // update
$config['text']['checkout']       = 'Checkout';    // checkout
$config['text']['checkoutPaypal'] = '';    // Checkout with PayPal
$config['text']['removeLink']     = 'Remove';    // remove
$config['text']['emptyButton']    = 'Empty';    // empty
$config['text']['emptyMessage']   = 'Your Cart is Empty';    // Your cart is empty!
$config['text']['itemAdded']      = 'Item Added!';    // Item added!
$config['text']['priceError']     = 'Invalid Price';    // Invalid price format!
$config['text']['quantityError']  = '';    // Item quantities must be whole numbers!
$config['text']['checkoutError']  = 'Your order could not be processed';    // Your order could not be processed!

// Override the default buttons by entering paths to your button images
$config['button']['checkout']     = '';
$config['button']['paypal']       = '';
$config['button']['update']       = '';
$config['button']['empty']        = '';


////////////////////////////////////////////////////////////////////////////////
// ADVANCED SETTINGS

// Display tooltip after the visitor adds an item to their cart?
$config['tooltip']                = true;

// Allow decimals in item quantities?
$config['decimalQtys']            = false;

// How many decimal places are allowed?
$config['decimalPlaces']          = 1;

// Number format for prices, see: http://php.net/manual/en/function.number-format.php
$config['priceFormat']            = array('decimals' => 2, 'dec_point' => '.', 'thousands_sep' => ',');

// Send visitor to PayPal via HTTPS?
$config['paypal']['https']        = true;

// Use PayPal sandbox?
$config['paypal']['sandbox']      = false;

// The URL a visitor is returned to after completing their PayPal transaction
$config['paypal']['returnUrl']    = '';

// The URL of your PayPal IPN script
$config['paypal']['notifyUrl']    = '';

?>