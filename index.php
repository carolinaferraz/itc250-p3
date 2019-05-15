<?php
// Start session management
session_start();

// Create a cart array if needed
if (empty($_SESSION['shoppingcart'])) { $_SESSION['shoppingcart'] = array(); }

// menu items
$items = array();
$items['MMS-1754'] = array('name' => 'taco', 'description' => 'our tacos are awesome!', 'price' => '4.95');
$items['MMS-6289'] = array('name' => 'sundae', 'description' => 'our sundaes are awesome!', 'price' => '3.95');
$items['MMS-3408'] = array('name' => 'salad', 'description' => 'our salads are awesome!', 'price' => '5.95');


// Include cart functions
require_once('cart.php');

// Get the sort key
$sort_key = filter_input(INPUT_POST, 'sortkey');
if ($sort_key === NULL) { $sort_key = 'name'; }

// Get the action to perform
$action = filter_input(INPUT_POST, 'action');
if ($action === NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action === NULL) {
        $action = 'show_add_item';
    }
}

// Add or update cart as needed
switch($action) {
    case 'add':
        $key = filter_input(INPUT_POST, 'productkey');
        $quantity  = filter_input(INPUT_POST, 'itemqty');
        cart\add_item($key, $quantity);
        include('cart_view.php');
        break;
    case 'update':
        $new_qty_list = filter_input(INPUT_POST, 'newqty', 
                FILTER_DEFAULT, FILTER_REQUIRE_ARRAY);
        foreach($new_qty_list as $key => $qty) {
            if ($_SESSION['shoppingcart'][$key]['qty'] != $qty) {
                cart\update_item($key, $qty);
            }
        }
    case 'show_add_item':
        include('add_item_view.php');
        break;
    case 'empty_cart':
        unset($_SESSION['shoppingcart']);
        include('cart_view.php');
        break;
}
?>