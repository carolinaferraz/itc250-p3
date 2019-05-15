<?php
namespace cart {
    // Add an item to the cart
    function add_item($key, $quantity) {
        global $items;
        if ($quantity < 1) return;

        // If item already exists in cart, update quantity
        if (isset($_SESSION['shoppingcart'][$key])) {
            $quantity += $_SESSION['shoppingcart'][$key]['qty'];
            update_item($key, $quantity);
            return;
        }

        // Add item
        $price = $items[$key]['price'];
        $total = $price * $quantity;
        $item = array(
            'name' => $items[$key]['name'],
            'description' => $description, 
            'price' => $price,
            'qty'  => $quantity,
            'total' => $total
        );
        $_SESSION['shoppingcart'][$key] = $item;
    }

    // Update an item in the cart
    function update_item($key, $quantity) {
        $quantity = (int) $quantity;
        if (isset($_SESSION['shoppingcart'][$key])) {
            if ($quantity <= 0) {
                unset($_SESSION['shoppingcart'][$key]);
            } else {
                $_SESSION['shoppingcart'][$key]['qty'] = $quantity;
                $total = $_SESSION['shoppingcart'][$key]['price'] *
                         $_SESSION['shoppingcart'][$key]['qty'];
                $_SESSION['shoppingcart'][$key]['total'] = $total;
            }
        }
    }

    // Get cart subtotal
    function get_subtotal() {
        $subtotal = 0;
        foreach ($_SESSION['shoppingcart'] as $item) {
            $subtotal += $item['total'];
        }
        $subtotal_f = number_format($subtotal, 2);
        return $subtotal_f;
    }
}
?>