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
        <select name="'. $item->name . 'Quantity">';
        for($i=0; $i<=5; $i++)
        {
        echo '<option value="' . $i . '">' . $i .'</option>"';
        }
        echo '
        	</select> 
    	<br/>
    </td>
</tr>
';
}  

function Total($selected, $items) {
    $total=0;
    
    
    foreach($items as $item) {
        if ($selected[$item->name.'Quantity'] > 0) {
        $total = $total + ($selected[$item->name.'Quantity']*$item->price);
    }

    //tax calculation and output formatting 
    $tax= $total * .101;
    $total_f = number_format($total, 2);
    $tax_f = number_format($tax, 2);
    $gtotal = $total_f + $tax_f;
    $gtotal_f = number_format($gtotal, 2);

    } 
      echo '<p>Subtotal: $' . $total_f . '</p>';
      echo '<p>Taxes: $' . $tax_f . '</p>';
      echo '<p>Order total: $' . $gtotal_f . '</p>';
      echo '<p>Thank you! &#9786;</p>';
}