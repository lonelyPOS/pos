<?php
require 'autoload.php';
if (isset($_POST['b_code'])) {
    $code = $_POST['b_code'];
    $cart->removeItemsByBCode($code);
    ?>
    <table class="table table-borderless table-data3">
    	<thead>
    		<tr>
    			<th>Product</th>
    			<th>Price</th>
    			<th>Qty</th>
    			<th>Sub total</th>
    			<th>
    				<div class="table-data-feature">
    					<button class="item" data-toggle="tooltip" data-placement="top"
    						title="Delete" disabled>
    						<i class="zmdi zmdi-delete"></i>
    					</button>
    				</div>
    			</th>
    		</tr>
    	</thead>
    	<tbody>
       		<?php include 'cart_items.php'; ?>
        </tbody>
    </table>
<?php
}
?>	