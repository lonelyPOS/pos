<?php
require 'autoload.php';
if (isset($_POST['amount'])) {
    $amount = $_POST['amount'];
    $cart->setTotalPaying($amount);
    ?>
    <table class="table table-top-campaign" id="total_full">
    	<thead>
    		<tr>
    			<th colspan="2" class="text-center">Total</th>
    		</tr>
    	</thead>
    	<tbody>
    		<tr>
    			<td>Total Items</td>
    			<td><?php echo $cart->getCount(); ?> items</td>
    		</tr>
    		<tr>
    			<td>Total</td>
    			<td><?php
                    echo number_format($cart->getTotalPrice(), 2) . ' Baht';
            ?></td>
    		</tr>
    		<tr>
    			<td>Total Paying</td>
    			<td><?php echo number_format($cart->getTotalPaying(),2); ?> Baht</td>
    		</tr>
    		<tr>
    			<td>Balance</td>
    			<td><?php echo number_format($cart->getTotalPaying()-$cart->getTotalPrice(),2); ?> Baht</td>
    		</tr>
    	</tbody>
    </table>
<?php     
}else{ 
    $cart->setTotalPaying(0);
    ?>
	<table class="table table-top-campaign" id="total_full">
    	<thead>
    		<tr>
    			<th colspan="2" class="text-center">Total</th>
    		</tr>
    	</thead>
    	<tbody>
    		<tr>
    			<td>Total Items</td>
    			<td><?php echo $cart->getCount(); ?> items</td>
    		</tr>
    		<tr>
    			<td>Total</td>
    			<td><?php
                    echo number_format($cart->getTotalPrice(), 2) . ' Baht';
            ?></td>
    		</tr>
    		<tr>
    			<td>Total Paying</td>
    			<td><?php echo number_format($cart->getTotalPaying(),2); ?> Baht</td>
    		</tr>
    		<tr>
    			<td>Balance</td>
    			<td><?php echo number_format($cart->getTotalPaying()-$cart->getTotalPrice(),2); ?> Baht</td>
    		</tr>
    	</tbody>
    </table>
<?php  
}
?>	
