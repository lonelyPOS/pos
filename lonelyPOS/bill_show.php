<?php
require 'includes/autoload.php';
if (! $session_set) {
    echo "<script> document.location.href=\"login.php\";</script>";
    exit();
}
$bill_id = $_GET['bill_id'];
$bill = BillMgnt::getBillByBillID($bill_id);
if ($bill === null) {
    echo "<script> document.location.href=\"index.php\";</script>";
    exit();
}
$member = $bill->getMember();
$employee = $bill->getEmployee();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>LONELY BILL #<?php echo $bill->getBill_id(); ?></title>
<link rel="stylesheet" href="css/order.css">
</head>
<body>
    <html>
    <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="order.css">
    <link rel="license"
    	href="https://www.opensource.org/licenses/mit-license/">
    </head>
    <body>
    	<header>
    		<h1>LONELY BILL #<?php echo $bill->getBill_id(); ?></h1>
    		<address>
    			<p><?php echo $member->getFname(); ?>  <?php echo $member->getLname(); ?></p>
    			<p><?php echo $member->getAddress(); ?></p>
    			<p><?php echo $member->getTel(); ?></p>
    		</address>
    		<span><img alt="Lonely" src="images/icon/logo.png"></span>
    	</header>
    	<article>
    		<h1>Recipient</h1>
    		<address>
    			<p><?php echo $member->getFname(); ?>  <?php echo $member->getLname(); ?></p>
    		</address>
    		<table class="meta">
    			<tr>
    				<th><span>Bill No #</span></th>
    				<td><span><?php echo $bill->getBill_id(); ?></span></td>
    			</tr>
    			<tr>
    				<th><span>Date</span></th>
    				<td><span><?php echo $bill->getDate(); ?></span></td>
    			</tr>
    
    		</table>
    		<table class="inventory">
    			<thead>
    				<tr>
    					<th><span>Product</span></th>
    
    					<th><span>Price</span></th>
    					<th><span>Quantity</span></th>
    					<th><span>Subtotal</span></th>
    				</tr>
    			</thead>
    			<tbody>
    			<?php
                $billItems = $bill->getBillItems();
                if ($billItems != NULL) {
                    foreach ($billItems as $item) {
                        $product = $item->getProduct();
                        $quantity = $item->getQty();
                        ?>
    					<tr>
    					<td><span><?php echo $product->getName();?></span></td>
    
    					<td><span><?php echo $product->getPrice();?></span><span data-postfix> Baht</span></td>
    					<td><span><?php echo $quantity;?></span><span data-postfix> item</span></td>
    					<td><span><?php echo $product->getPrice()*$quantity;?></span><span data-postfix> Baht</span></td>
    				</tr>
                              <?php
                    }
                }
                ?>   
    			</tbody>
    		</table>
    		<table class="balance">
    			<tr>
    				<th><span>Total</span></th>
    				<td><span><?php echo $bill->getTotal(); ?></span><span data-postfix> Baht</span></td>
    			</tr>
    			<tr>
    				<th><span>Pay Amount</span></th>
    				<td><span><?php echo $bill->getPayAmount(); ?></span><span data-postfix> Baht</span></td>
    			</tr>
    			<tr>
    				<th><span>Balance</span></th>
    				<td><span><?php echo $bill->getPayAmount()-$bill->getTotal(); ?></span><span data-postfix> Baht</span></td>
    			</tr>
    		</table>
    	</article>
    	<aside>
    		<h1>
    			<span>Additional Notes</span>
    		</h1>
    		<div>
    			<p>.......................................................................................................................................................</p>
    		</div>
    	</aside>
    </body>
    </html>
</body>
</html>