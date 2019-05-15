<!DOCTYPE html>
<html>
<head>
    <title>Food Truck</title>
    <link rel="stylesheet" type="text/css" href="mini.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
</head>
<body>
    <header>
        <h1><a href="index.php"><i class="fas fa-truck"></i> Food Truck</a></h1>
    </header>
    <main>
        <h1>Your Cart</h1>
        <?php if (empty($_SESSION['shoppingcart']) || 
                  count($_SESSION['shoppingcart']) == 0) : ?>
            <p>There are no items in your cart.</p>
        <?php else: ?>
            <form action="." method="post">
                <input type="hidden" name="action" value="update">
                <table>
                    <tr id="cart_header">
                        <th class="left">
                            Item </th>
                        <th class="right" >
                            Description</th>
                            <th class="right">
                            Item price</th>
                        <th class="right" >
                            Quantity</th>
                        <th class="right">
                        Item Total</th>
                    </tr>
                    <?php foreach( $_SESSION['shoppingcart'] as $key => $item ) :
                        $price  = number_format($item['price'],  2);
                        $total = number_format($item['total'], 2);
                    ?>
                    <tr>
                        <td>
                            <?php echo $item['name']; ?>
                        </td>
                        <td class="right">
                            <?php echo $description; ?>
                        </td>
                        <td class="right">
                            $<?php echo $price; ?>
                        </td>
                        <td class="right">
                            <input type="text" class="cart_qty"
                                name="newqty[<?php echo $key; ?>]"
                                value="<?php echo $item['qty']; ?>">
                        </td>
                        <td class="right">
                            $<?php echo $total; ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                    <tr id="cart_footer">
                        <td colspan="4"><b>Subtotal</b></td>
                        <td>$<?php echo cart\get_subtotal(); ?></td>
                    </tr>
                    <tr>
                        <td colspan="5" class="right">
                            <input type="submit" value="Update Cart">
                        </td>
                    </tr>
                </table>
                <p>Click "Update Cart" to update quantities.<br> 
                   Enter a quantity of 0 to remove an item.
                </p>
            </form>
        <?php endif; ?>
        <p><a href=".?action=show_add_item">Add Item</a></p>
        <p><a href=".?action=empty_cart">Empty Cart</a></p>
    </main>
</body>
</html>