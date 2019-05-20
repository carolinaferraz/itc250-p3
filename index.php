<?php
    //item order page

    include 'model.php';

    $Items[]=new Item("taco", 4.95, "our tacos are awesome!");
    // $myItem->addExtra("Sour Cream");
    // $myItem->addExtra("Cheese");
    // $myItem->addExtra("Guacamole");

    $Items[]=new Item("sundae", 3.95, "our sundaes are awesome!");
    // $myItem->addExtra("Sprinkles");
    // $myItem->addExtra("Chocolate Sauce");
    // $myItem->addExtra("Nuts");

    $Items[]=new Item("salad", 5.95, "our salads are awesome!");
    // $myItem->addExtra("Croutons");
    // $myItem->addExtra("Bacon");
    // $myItem->addExtra("Lemon Wedges");
    

    //item class & constructor
    
class Item {
    public $name='';
    public $description='';
    public $price=0.00;
    public $quantity=0;
    public $Extras = array();
    
    public function Item($iname, $iprice, $idesc) {
        $this->name = $iname;
        $this->description = $idesc;
        $this->price = $iprice;
    
    } #end Item constructor
        
    public function addExtra($extra) {
        $this->Extras[] = $extra;
            
    }#end addExtra()
}#end Item class

?>
	<html>
    <head>
    <title>Food Truck</title>
    <link rel="stylesheet" type="text/css" href="mini.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
</head>
<body>
    <header>
        <h1><a href="index.php"><i class="fas fa-truck"></i> Food Truck Menu</a></h1>
    </header>
    <main>
	<?php
       
    if (!isset($_POST['selectedItems'])) {  
        echo '
            <form action = "' . $_SERVER['PHP_SELF'] . '"  method = "POST"> 
            <table>';
        echo'<tr>
        <td> <b>Item<b> </td> 
        <td> <b>Description</b> </td> 
        <td> <b>Price</b>     </td>
        <td> <b>Quantity</b> </td>
        </tr>';

        foreach($Items as $item) { 
                Menu($item); 
        }
               
		echo '
	    <tr><td><input type = "submit" name = "selectedItems" value ="Submit"></td> </tr>
	   	</table>
    	</form>   ';
        } else {   
            Total($_POST, $Items);
            echo'<br>';      
        }