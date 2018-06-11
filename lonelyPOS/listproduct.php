<?php
require 'includes/autoload.php';
if (! $session_set) {
    echo "<script> document.location.href=\"login.php\";</script>";
}
$_SESSION['PAGE'] = 'product';
session_write_close();
$page = $_SESSION['PAGE'];
$productArr = ProductMgnt::getAllProduct();
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
			<?php require 'includes/menu.php';?>
			<!-- END MENU SIDEBAR-->

		<!-- PAGE CONTAINER-->
		<div class="page-container">
			<?php require 'includes/header.php';?>
			<!-- MAIN CONTENT-->
			<div class="main-content">
				<div class="section__content section__content--p30">
					<div class="container-fluid">

						<div class="row">
							<div class="col-lg-12">
								<h2 class="title-1 m-b-25">List Product</h2>
								<div class="table-responsive table--no-card m-b-40">
									<table
										class="table table-borderless table-striped table-earning">
										<thead>
											<tr>
												<th>brand</th>
												<th>name</th>
												<th>size</th>
												<th>color</th>
												<th class="text-right">price</th>
												<th class="text-right">quantity</th>
												<th></th>
											</tr>
										</thead>
										<tbody>
										<?php foreach ($productArr as $product) {?>
											<tr>
												<td><?php echo $product->getBrand();?></td>
												<td><?php echo $product->getName();?></td>
												<td><?php echo $product->getSize();?></td>
												<td><?php echo $product->getColor();?></td>
												<td class="text-right"><?php echo $product->getPrice()?></td>
												<td class="text-right"><input type="text" id="xx" name="xx"
													value=<?php echo $product->getQty()?> size="1" /></td>


												<td class="text-right">
													<div class="table-data-feature">
														<button type="button" class="btn btn-secondary mb-1"
															data-toggle="modal" data-target="#staticModal2"
															data-placement="top" title="Edit">
															<i class="zmdi zmdi-edit"></i>
														</button>
														&nbsp;
														<button type="button" class="btn btn-secondary mb-1"
															data-toggle="modal" data-target="#staticModal"
															data-placement="top" title="Delete">
															<i class="zmdi zmdi-delete"></i>
														</button>
														&nbsp;
														<button type="button" class="btn btn-secondary mb-1"
															data-toggle="modal" data-target="#largeModal"
															data-placement="top" title="Detail">
															<i class="zmdi zmdi-more"></i>

														</button>
													</div>
												</td>
											</tr>
											<?php }?>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- END MAIN CONTENT-->
	</div>
	<!-- END PAGE CONTAINER-->

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
	<div class="modal fade" id="staticModal" tabindex="-1" role="dialog"
		aria-labelledby="staticModalLabel" aria-hidden="true"
		data-backdrop="static">
		<div class="modal-dialog modal-sm" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="staticModalLabel">Confirm to delete?</h5>
					<button type="button" class="close" data-dismiss="modal"
						aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>

				<div class="modal-footer">
					<button type="button" class="btn btn-secondary"
						data-dismiss="modal">Cancel</button>
					<button type="button" class="btn btn-primary">Confirm</button>
					<?php ProductMgnt::deleteProduct($product->getBcode());?>
				</div>
			</div>
		</div>
	</div>
	<div class="modal fade" id="staticModal2" tabindex="-1" role="dialog"
		aria-labelledby="staticModalLabel" aria-hidden="true"
		data-backdrop="static">
		<div class="modal-dialog modal-sm" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="staticModalLabel">Confirm to edit?</h5>
					<button type="button" class="close" data-dismiss="modal"
						aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>

				<div class="modal-footer">
					<button type="button" class="btn btn-secondary"
						data-dismiss="modal">Cancel</button>
					<button type="button" class="btn btn-primary">Confirm</button>
				</div>
			</div>
		</div>
	</div>

	<!-- Main JS-->
	<script src="js/main.js"></script>
	<div class="modal fade" id="largeModal" tabindex="-1" role="dialog"
		aria-labelledby="largeModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="largeModalLabel">Product Detail</h5>
					<button type="button" class="close" data-dismiss="modal"
						aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="col-lg-4">
							<?php $prodetail = ProductMgnt::getProduct($product->getBcode());?>
							<img src=<?php $prodetail->getImage();?> alt="img"
								class="img-responsive" />
						</div>

						<div class="col-lg-8">
							<div class="table-responsive table--no-card m-b-40">
								<table
									class="table table-borderless table-striped table-earning">
									<tbody>
										<tr>
											<th>Product ID</th>
											<td><?php echo $prodetail->getId();?></td>
										</tr>
										<tr>
											<th>Brand</th>
											<td><?php echo $prodetail->getBrand();?></td>
										</tr>
										<tr>
											<th>Name</th>
											<td><?php echo $prodetail->getName();?></td>
										</tr>
										<tr>
											<th>Size</th>
											<td><?php echo $prodetail->getSize();?></td>
										</tr>
										<tr>
											<th>Color</th>
											<td><?php echo $prodetail->getColor();?></td>
										</tr>
										<tr>
											<th>Price</th>
											<td><?php echo $prodetail->getPrice();?></td>
										</tr>
										<tr>
											<th>Description</th>
											<td><?php echo $prodetail->getDescription();?></td>
										</tr>

									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

</body>

</html>
<!-- end document-->
