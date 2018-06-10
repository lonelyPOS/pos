<?php
require 'autoload.php';
require 'classes/config/config.php';
if (isset($_POST['b_code'])) {
    $code = $_POST['b_code'];
    $product = ProductMgnt::getProduct($code);
    if ($product != null) {
        echo '<script type="text/javascript">clearBCODE();</script>';
        $same = false;
        foreach ($cart->getItems() as $pro) {
            if ($pro->getId() === $product->getId()) {
                $pro->setQty($pro->getQty() + 1);
                $same = true;
                break;
            }
        }
        if (!$same) {
            $cart->addItems($product);
        }
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
        	<?php
        if ($cart->getItems() != null) {
            foreach ($cart->getItems() as $pro) {
                echo '<tr>';
                echo '<td>' . $pro->getName() . '</td>';
                echo '<td>' . $pro->getPrice() . '</td>';
                echo '<td> 
                          <input id="b_code" name="b_code" type="text" class="input-sm form-control-sm form-control" size="1" value="' . $pro->getQty() . '"/>
                      </td>';
                echo '<td>100</td>';
                echo '<td>
                        <div class="table-data-feature">
    						<button class="item" data-toggle="tooltip"
    							data-placement="top" title="Delete">
    							<i class="zmdi zmdi-delete"></i>
    						</button>
    					</div>
                    </td>';
                echo '</tr>';
            }
        } else {
            echo '<tr>';
            echo '<td colspan="5" class="text-center">Empty Cart</td>';
            echo '</tr>';
        }
        ?>
            </tbody>
    </table>
<?php
}
?>	