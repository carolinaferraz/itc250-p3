<!DOCTYPE html>
<html>
<head>
    <title>Taco Truck</title>
    <link rel="stylesheet" type="text/css" href="mini.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
</head>
<body>
    <header>
    <h1><a href="index.php"><i class="fas fa-truck"></i> Taco Truck</a></h1>
    </header>
    <main>
        <h1>Add Item</h1>
        <form action="." method="post">
            <input type="hidden" name="action" value="add">

            <label>Name:</label>
            <select name="productkey">
            <?php foreach($items as $key => $item) :
                $price = number_format($item['price'], 2);
                $name = $item['name'];
                $item = $name . ' ($' . $price . ')';
            ?>
                <option value="<?php echo $key; ?>">
                    <?php echo $item; ?>
                </option>
            <?php endforeach; ?>
            </select><br>

            <label>Quantity:</label>
            <select name="itemqty">
            <?php for($i = 1; $i <= 10; $i++) : ?>
                <option value="<?php echo $i; ?>">
                    <?php echo $i; ?>
                </option>
            <?php endfor; ?>
            </select><br>

            <label>&nbsp;</label>
            <input type="submit" value="Add Item">
        </form>
        <p><a href=".?action=show_cart">View Cart</a></p>    
    </main>
</body>
</html>