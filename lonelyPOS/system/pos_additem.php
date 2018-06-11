<?php
require 'autoload.php';
if (isset($_POST['b_code'])) {
    $code = $_POST['b_code'];
    $product = ProductMgnt::getProduct($code);
    if ($product != null) {
        echo '<script type="text/javascript">clearBCODE();</script>';
        $same = false;
        foreach ($cart->getItems() as $cart_item) {
            $pro = $cart_item->getProduct();
            if ($pro->getId() === $product->getId()) {
                $cart_item->setQty($cart_item->getQty() + 1);
                $same = true;
                break;
            }
        }
        if (!$same) {
            $cart->addItems(new CartItem($product, 1));
        }
        echo '<script type="text/javascript">', 'showItemAdd();', '</script>';
    }else{
        echo '<script type="text/javascript">', 'showItemNot();', '</script>';
    }
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