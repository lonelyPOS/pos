<?php
if ($cart->getItems() != null) {
    foreach ($cart->getItems() as $cart_item) {
        $pro = $cart_item->getProduct();
        echo '<tr>';
        echo '<td>' . $pro->getBrand() . ' ' . $pro->getName() . ' ' . $pro->getColor() . ' ' . $pro->getSize() . '</td>';
        echo '<td>' . $pro->getPrice() . '</td>';
        echo '<td>
                <div class="row">
                    <div class="col-6">
                         <input id="b_code" name="b_code" type="text" class="input-sm form-control-sm form-control" size="1" value="' . $cart_item->getQty() . '"/>
                    </div>
                    <div class="col-6">
                        <button type="button" class="btn btn-success btn-sm update-item">
							<i class="fa fa-refresh"></i>
						</button>
                    </div>
                </div>
              </td>';
        echo '<td>'.$cart_item->getTotalPrice().'</td>';
        echo '<td>
                  <div class="table-data-feature">
                       <a href="#" class="item remove-item" data-code="' . $pro->getBcode() . '"><i class="zmdi zmdi-delete"></i></a>
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