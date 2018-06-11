<?php require 'autoload.php';?>
<table class="table table-top-campaign" id="total">
	<tbody>
		<tr>
			<td>Total Items</td>
			<td><?php echo $cart->getCount(); ?></td>
		</tr>
		<tr>
			<td>Total</td>
			<td><?php 
			   echo number_format($cart->getTotalPrice(),2).' Baht';															     
		?></td>
		</tr>
	</tbody>
</table>