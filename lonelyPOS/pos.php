<?php
require 'includes/autoload.php';
if (! $session_set) {
    echo "<script> document.location.href=\"login.php\";</script>";
}
$_SESSION['PAGE'] = 'pos';
session_write_close();
$page = $_SESSION['PAGE'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
<!-- Required meta tags-->
<meta charset="UTF-8">
<meta name="viewport"
	content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="au theme template">
<meta name="author" content="Hau Nguyen">
<meta name="keywords" content="au theme template">

<!-- Title Page-->
<title>POS</title>

<!-- Fontfaces CSS-->
<link href="css/font-face.css" rel="stylesheet" media="all">
<link href="vendor/font-awesome-4.7/css/font-awesome.min.css"
	rel="stylesheet" media="all">
<link href="vendor/font-awesome-5/css/fontawesome-all.min.css"
	rel="stylesheet" media="all">
<link href="vendor/mdi-font/css/material-design-iconic-font.min.css"
	rel="stylesheet" media="all">

<!-- Bootstrap CSS-->
<link href="vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet"
	media="all">

<!-- Vendor CSS-->
<link href="vendor/animsition/animsition.min.css" rel="stylesheet"
	media="all">
<link
	href="vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css"
	rel="stylesheet" media="all">
<link href="vendor/wow/animate.css" rel="stylesheet" media="all">
<link href="vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet"
	media="all">
<link href="vendor/slick/slick.css" rel="stylesheet" media="all">
<link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
<link href="vendor/perfect-scrollbar/perfect-scrollbar.css"
	rel="stylesheet" media="all">

<!-- Main CSS-->
<link href="css/theme.css" rel="stylesheet" media="all">

</head>

<body class="animsition">
	<div class="page-wrapper">
		<!-- HEADER MOBILE-->
        	<?php require 'includes/header_m.php';?>
			<!-- END HEADER MOBILE-->

		<!-- MENU SIDEBAR-->
			<?php require 'includes/menu_pos.php';?>
		<!-- END MENU SIDEBAR-->

		<!-- PAGE CONTAINER-->
		<div class="page-container-pos">
			<?php require 'includes/header_pos.php';?>
			<!-- MAIN CONTENT-->
			<div class="main-content-pos">
				<div class="section__content section__content--p30">
					<div class="container-fluid">
						<div class="row" id="pos">
							<!-- workspace -->
							<div class="col-lg-4">
								<!--panel-->
								<div class="card">
									<div class="card-header">Panel</div>
									<div class="card-body">
										<form action="#" method="post">
											<div class="form-group">
												<div class="input-group">
												<?php
                                                    if ($cart->getMember() != null) {
                                                        $member = $cart->getMember();
                                                        $name = $member->getFname() . ' ' . $member->getLname();
                                                        ?>
														<input id="member_code" name="member_code" type="text"
														class="form-control" aria-required="true"
														aria-invalid="false" placeholder="Member Code"
														value="<?php echo $name; ?>" disabled>
											<?php	}else{ ?>
														<input id="member_code" name="member_code" type="text"
														class="form-control" aria-required="true"
														aria-invalid="false" placeholder="Member Code">
											<?php
            
                                                    }
                                                                ?>
													<div class="input-group-btn">														
														<button type="button" class="btn btn-primary"
															id="clear_member" title="Delete">
															<i class="fa fa-eraser"></i>
														</button>
														<button type="button" class="btn btn-info"
															id="guest_select">
															<i class="fa fa-user" title="Guest"></i>
														</button>
														<button type="button" class="btn btn-warning"
															data-toggle="modal" data-target="#member_add">
															<i class="fa fa-plus"></i>
														</button>
													</div>
												</div>
											</div>
											<div id="nonti_member_corr" hidden>
												<div
													class="sufee-alert alert with-close alert-success alert-dismissible fade show">
													Member correct!!
													<button type="button" class="close" data-dismiss="alert"
														aria-label="Close">
														<span aria-hidden="true">&times;</span>
													</button>
												</div>
											</div>
											<div id="nonti_member_not" hidden>
												<div
													class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
													Not found!!
													<button type="button" class="close" data-dismiss="alert"
														aria-label="Close">
														<span aria-hidden="true">&times;</span>
													</button>
												</div>
											</div>

											<div class="form-group">
												<div class="input-group">
													<input id="b_code" name="b_code" type="text"
														class="form-control" aria-required="true"
														aria-invalid="false" placeholder="Please scan barcode">
													<div class="input-group-btn">
														<button type="button" class="btn btn-primary"
															id="clear_code">
															<i class="fa fa-eraser"></i>
														</button>
													</div>
												</div>
											</div>
											<div id="nonti_barcode_succ" hidden>
												<div
													class="sufee-alert alert with-close alert-success alert-dismissible fade show">
													Add Success!!
													<button type="button" class="close" data-dismiss="alert"
														aria-label="Close">
														<span aria-hidden="true">&times;</span>
													</button>
												</div>
											</div>
											<div id="nonti_barcode_not" hidden>
												<div
													class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
													Not found!!
													<button type="button" class="close" data-dismiss="alert"
														aria-label="Close">
														<span aria-hidden="true">&times;</span>
													</button>
												</div>
											</div>
											<div class="row mt-4"></div>
											<div class="row mt-4"></div>
											<div class="row mt-4"></div>
											<div class="row mt-4"></div>
											<div class="row mt-4"></div>
											<div class="row mt-4"></div>
											<div class="row mt-4"></div>
											<div class="row mt-4"></div>
											<div class="row mt-4"></div>
											<div class="row mt-4"></div>
											<div class="row mt-4"></div>
											<div class="row mt-3"></div>
											<div class="table-responsive">
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
											</div>
											<div class="row">
												<div class="col-lg-6">
													<button type="button"
														class="btn btn-danger btn-lg btn-block"
														data-toggle="modal" data-target="#cancel_cart">Cancel</button>
												</div>
												<div class="col-lg-6">
													<button type="button"
														class="btn btn-success btn-lg btn-block" data-toggle="modal" data-target="#payment" id="payment_btn">Payment</button>
												</div>
											</div>
										</form>
									</div>
								</div>
							</div>
							<div class="col-lg-8">
								<!--items-->
								<div class="table-responsive m-b-40">
									<div id="cart">
										<table class="table table-borderless table-data3">
											<thead>
												<tr>
													<th>Product</th>
													<th>Price</th>
													<th>Qty</th>
													<th>Sub total</th>
													<th>
														<div class="table-data-feature">
															<button class="item" data-toggle="tooltip"
																data-placement="top" title="Delete" disabled>
																<i class="zmdi zmdi-delete"></i>
															</button>
														</div>
													</th>
												</tr>
											</thead>
											<tbody>
												<?php include 'system/cart_items.php'; ?>
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- modal small -->
				<div class="modal fade" id="cancel_cart" tabindex="-1" role="dialog"
					aria-labelledby="smallmodalLabel" aria-hidden="true">
					<div class="modal-dialog modal-sm" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="smallmodalLabel">Warning</h5>
								<button type="button" class="close" data-dismiss="modal"
									aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<p>Please confirm to delete.</p>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary"
									data-dismiss="modal">Cancel</button>
								<button type="button" class="btn btn-danger" id="clear_cart_con">Confirm</button>
							</div>
						</div>
					</div>
				</div>
				<!-- end modal small -->

				<!-- modal member_add -->
				<div class="modal fade" id="member_add" tabindex="-1" role="dialog"
					aria-labelledby="staticModalLabel" aria-hidden="true"
					data-backdrop="static">
					<div class="modal-dialog modal-lg" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="staticModalLabel">Add Member</h5>
								<button type="button" class="close" data-dismiss="modal"
									aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<form action="system/add_member.php" method="post">
								<div class="modal-body">
									<div class="row">
										<div class="col-6">
											<div class="form-group">
												<label for="m_fname" class="control-label mb-1">Firstname</label>
												<input id="m_fname" name="m_fname" type="text"
													class="form-control" placeholder="Firstname" required="" />
											</div>
										</div>
										<div class="col-6">
											<label for="m_lname" class="control-label mb-1">Lastname</label>
											<div class="input-group">
												<input id="m_lname" name="m_lname" type="text"
													class="form-control" placeholder="lasrname" required="" />
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-6">
											<div class="form-group">
												<label for="m_email" class="control-label mb-1">Email</label>
												<div class="input-group">
													<input id="m_email" name="m_email" type="text"
														class="form-control" placeholder="Email" required="" />
												</div>
											</div>
										</div>
										<div class="col-6">
											<div class="form-group">
												<label for="m_b_date" class="control-label mb-1">Birthday</label>
												<div class="input-group">
													<input id="m_b_date" name="m_b_date" type="text"
														class="form-control" placeholder="dd-mm-yyyy" required="" />
												</div>
											</div>
										</div>
									</div>
									<div class="form-group">
										<label for="m_adds" class="control-label mb-1">Address</label>
										<div class="input-group">
											<input id="m_adds" name="m_adds" type="text"
												class="form-control" placeholder="Address" required="" />
										</div>
									</div>
									<div class="row">
										<div class="col-6">
											<div class="form-group">
												<label for="m_tel" class="control-label mb-1">Tel</label> <input
													id="m_tel" name="m_tel" type="text" class="form-control"
													placeholder="Tel" required="" />
											</div>
										</div>
										<div class="col-6">
											<div class="form-group">
												<label for="m_gender" class="control-label mb-1">Gender</label>
												<select name="m_gender" id="m_gender" class="form-control">
													<option value="M">Male</option>
													<option value="F">Female</option>
												</select>
											</div>
										</div>
									</div>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-danger btn-sm"
										data-dismiss="modal">
										<i class="fa fa-ban"></i> Cancel
									</button>
									<button type="submit" class="btn btn-primary btn-sm">
										<i class="fa fa-dot-circle-o"></i> Confirm
									</button>
								</div>
							</form>
						</div>
					</div>
				</div>
				
				<div class="modal fade" id="payment" tabindex="-1" role="dialog"
					aria-labelledby="staticModalLabel" aria-hidden="true"
					data-backdrop="static">
					<div class="modal-dialog modal-lg" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="staticModalLabel">Payment</h5>
								<button type="button" class="close" data-dismiss="modal"
									aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<form action="system/payment.php" method="post">
								<div class="modal-body">
									<div class="row">
										<div class="col-12">			
											<table class="table table-top-campaign" id="info_payment">
    											<tbody>
    												<tr>
    													<td>Member</td>
    													<td><?php 
        													if($cart->getMember() != null){
        													    $member = $cart->getMember();
        													    echo $member->getFname().' '.$member->getLname();
        													}else{
        													    echo 'Guest';
        													}
    													?></td>
    												</tr>
    											</tbody>
											</table>
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
    															echo number_format($cart->getTotalPrice(),2).' Baht';															     
    												    ?></td>
    												</tr>
    												<tr>
    													<td>Total Paying</td>
    													<td><?php echo  number_format($cart->getTotalPaying(),2); ?> Baht</td>
    												</tr>
    												<tr>
    													<td>Balance</td>
    													<td><?php echo number_format($cart->getTotalPaying() - $cart->getTotalPrice(),2); ?> Baht</td>
    												</tr>
    											</tbody>
											</table>
										</div>
									</div>		
									<hr>
									<div class="row">
										<div class="col-6">
											<div class="form-group">
												<label for="pay_mode" class="control-label mb-1">Paymeny By</label>
												<select name="pay_mode" id="pay_mode" class="form-control">
													<option value="1">Cash</option>
													<option value="2">Credit Card</option>
												</select>
											</div>
										</div>
										<div class="col-6">
											<label for="amount" class="control-label mb-1">Amount</label>
											<div class="input-group">
												<input id="amount" name="amount" type="text"
													class="form-control" required="" />
											</div>
										</div>
									</div>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-danger btn-sm"
										data-dismiss="modal">
										<i class="fa fa-ban"></i> Cancel
									</button>
									<input id="mode" name="mode" type="hidden" value="payment"/>
									<button type="submit" class="btn btn-primary btn-sm">
										<i class="fa fa-dot-circle-o"></i> Confirm
									</button>
								</div>
							</form>
						</div>
					</div>
				</div>
				<!-- end modal static -->

			</div>
			<!-- END MAIN CONTENT-->
			<!-- END PAGE CONTAINER-->
		</div>

	</div>

	<!-- Jquery JS-->
	<script src="vendor/jquery-3.2.1.min.js"></script>
	<!-- Bootstrap JS-->
	<script src="vendor/bootstrap-4.1/popper.min.js"></script>
	<script src="vendor/bootstrap-4.1/bootstrap.min.js"></script>
	<!-- Vendor JS       -->
	<script src="vendor/slick/slick.min.js">
    </script>
	<script src="vendor/wow/wow.min.js"></script>
	<script src="vendor/animsition/animsition.min.js"></script>
	<script src="vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
	<script src="vendor/counter-up/jquery.waypoints.min.js"></script>
	<script src="vendor/counter-up/jquery.counterup.min.js">
    </script>
	<script src="vendor/circle-progress/circle-progress.min.js"></script>
	<script src="vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
	<script src="vendor/chartjs/Chart.bundle.min.js"></script>
	<script src="vendor/select2/select2.min.js">
    </script>

	<!-- Main JS-->
	<script src="js/main.js"></script>
	<script src="js/pos.js"></script>

</body>

</html>
<!-- end document-->
