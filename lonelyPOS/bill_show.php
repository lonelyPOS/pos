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
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Invoice No <?php echo $bill->getBill_id(); ?></title>
<meta http-equiv="cache-control" content="max-age=0" />
<meta http-equiv="cache-control" content="no-cache" />
<meta http-equiv="expires" content="0" />
<meta http-equiv="pragma" content="no-cache" />
<link href="vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet"
	media="all">
<style type="text/css" media="all">
body {
	color: #000;
}

#wrapper {
	max-width: 520px;
	margin: 0 auto;
	padding-top: 20px;
}

.btn {
	margin-bottom: 5px;
}

.table {
	border-radius: 3px;
}

.table th {
	background: #f5f5f5;
}

.table th, .table td {
	vertical-align: middle !important;
}

h3 {
	margin: 5px 0;
}

@media print {
	.no-print {
		display: none;
	}
	#wrapper {
		max-width: 480px;
		width: 100%;
		min-width: 250px;
		margin: 0 auto;
	}
}
</style>
</head>
<body>
	<div id="wrapper">
		<div id="receiptData"
			style="width: auto; max-width: 580px; min-width: 250px; margin: 0 auto;">
			<div class="no-print"></div>
			<div id="receipt-data">
				<div>
					<div style="text-align: center;">
						<img src="images/icon/logo.png" alt="Lonely">
						<p></p>
					</div>
					<p>
						Date: <?php echo $bill->getDate(); ?><br> 
						Sale No/Ref: <?php echo $bill->getBill_id(); ?><br> 
						Customer: <?php echo $member->getFname(); ?>  <?php echo $member->getLname(); ?><br> 
						Sales Person: <?php echo $employee->getFNAME().' '.$employee->getLNAME(); ?> <br>
					</p>
					<div style="clear: both;"></div>
					<table class="table table-striped table-condensed">
						<thead>
							<tr>
								<th
									style="text-align: center; width: 50%; border-bottom: 2px solid #ddd;">Description</th>
								<th
									style="text-align: center; width: 12%; border-bottom: 2px solid #ddd;">Quantity</th>
								<th
									style="text-align: center; width: 24%; border-bottom: 2px solid #ddd;">Price</th>
								<th
									style="text-align: center; width: 26%; border-bottom: 2px solid #ddd;">Subtotal</th>
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
                					<td style="text-align: left;"><?php echo $product->getName() . ' ' . $product->getColor() . ' ' . $product->getSize(); ?></td>
                					<td style="text-align: center;"><?php echo $product->getPrice();?></td>
                					<td style="text-align: right;"><?php echo $quantity;?></td>
                					<td style="text-align: right;"><?php echo $product->getPrice()*$quantity;?></td>
                				</tr>
                                 <?php
                                }
                            }
                            ?>   
						</tbody>
						<tfoot>
							<tr>
								<th colspan="2" style="text-align: left;">Total</th>
								<th colspan="2" style="text-align: right;"><?php echo $bill->getTotal(); ?> Baht</th>
							</tr>
						</tfoot>
					</table>
					<table class="table table-striped table-condensed"
						style="margin-top: 10px;">
						<tbody>
							<tr>
								<td style="padding-left: 15px;">Paid by: Cash</td>
								<td style="padding-left: 15px;">Amount: <?php echo $bill->getPayAmount(); ?> Baht</td>
								<td style="padding-left: 15px;">Balance: <?php echo $bill->getPayAmount()-$bill->getTotal(); ?> Baht</td>
							</tr>
						</tbody>
					</table>
				</div>
				<div style="clear: both;"></div>
			</div>

			<!-- start -->
			<div id="buttons"
				style="padding-top: 10px; text-transform: uppercase;"
				class="no-print">
				<hr>
				<span class="pull-right col-xs-12">
					<button onclick="window.print();" class="btn btn-block btn-primary">Print</button>
				</span> <span class="col-xs-12"> <a
					class="btn btn-block btn-warning" href="pos.php">Back to POS</a>
				</span>
				<div style="clear: both;"></div>
			</div>
			<!-- end -->
		</div>
	</div>
	<!-- start -->
	<script src="vendor/jquery-3.2.1.min.js"></script>
	<script type="text/javascript">
                    $(document).ready(function () {
                        $('#print').click(function (e) {
                            e.preventDefault();
                            var link = $(this).attr('href');
                            $.get(link);
                            return false;
                        });
                    });
                </script>

	<!-- end -->
</body>
</html>