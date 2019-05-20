<?php
//functions

function Menu(Item $item) {
echo '
<tr>
    <td>  '. $item->name .'</td>
    <td>  '. $item->description .'
    </td>
    <td>   $'.$item->price.'
    </td>
    
    <td> <form action = "' . $_SERVER['PHP_SELF'] .'"  method = "GET">     
    	<select name="'. $item->name . 'Quantity">
        	<option value="0">0</option>
        	<option value="1">1</option>
        	<option value="2">2</option>
        	<option value="3">3</option>
        	<option value="4">4</option>
        	<option value="5">5</option>
        	</select> 
    	<br/>
    </td>
</tr>
';
}  
 
function Total($selectedItems, $items) {
    $total=0;
    
    foreach($items as $item) {
        if ($selectedItems[$item->name.'Quantity'] > 0) {
        $total = $total + ($selectedItems[$item->name.'Quantity']*$item->price);
    }
    $total_f = number_format($total, 2);

}   echo '<p>Order total: $' . $total_f . '.</p>';
    echo '<p>Thank you! &#9786;</p>';
}