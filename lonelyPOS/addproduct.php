<?php
require 'includes/autoload.php';
if (! $session_set) {
    echo "<script> document.location.href=\"login.php\";</script>";
}
$_SESSION['PAGE'] = 'product';
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
							<!-- workspace -->
							<div class="col-lg-12">
								<div class="card">
									<div class="row">
										<!-- workspace -->
										<div class="col-lg-12">
											<!--panel-->
											<br>

											<div class="card">
												<div class="card-header">Add Product</div>
												<div class="card-body">
													<div class="col-12 col-md-6">
														<input type="Product ID" id="input2-group3"
															name="input2-group3" placeholder="Product ID"
															class="form-control"> <br>
														<div class="input-group">
															<input type="brand" id="input2-group3"
																name="input2-group3" placeholder="Brand"
																class="form-control">
															<div class="input-group-btn">
																<div class="btn-group">
																	<button type="button" data-toggle="dropdown"
																		aria-haspopup="true" aria-expanded="false"
																		class="dropdown-toggle btn btn-primary"></button>
																	<div tabindex="-1" aria-hidden="true" role="menu"
																		class="dropdown-menu">
																		<button type="button" tabindex="0"
																			class="dropdown-item">Action</button>
																		<button type="button" tabindex="0"
																			class="dropdown-item">Another Action</button>
																		<button type="button" tabindex="0"
																			class="dropdown-item">Something else here</button>

																	</div>
																</div>
															</div>
														</div>
														<br> <select name="select" id="select size"
															class="form-control">
															<option value="0">Select size</option>
															<option value="3">XS</option>
															<option value="1">S</option>
															<option value="2">M</option>
															<option value="3">L</option>
															<option value="4">XL</option>
															<option value="5">XXL</option>
														</select> <br>
														<div class="input-group">
															<input type="colors" id="input2-group3"
																name="input2-group3" placeholder="Colors"
																class="form-control">
															<div class="input-group-btn">
																<div class="btn-group">
																	<button type="button" data-toggle="dropdown"
																		aria-haspopup="true" aria-expanded="false"
																		class="dropdown-toggle btn btn-primary"></button>
																	<div tabindex="-1" aria-hidden="true" role="menu"
																		class="dropdown-menu">
																		<button type="button" tabindex="0"
																			class="dropdown-item">Action</button>
																		<button type="button" tabindex="0"
																			class="dropdown-item">Another Action</button>
																		<button type="button" tabindex="0"
																			class="dropdown-item">Something else here</button>

																	</div>
																</div>
															</div>
														</div>
														<br>
														<div class="row">
															<div class="col-lg-10">
																<input type="Price" id="input2-group3"
																	name="input2-group3" placeholder="Price "
																	class="form-control">
															</div>
															<div class="col-lg-2">BATH</div>

														</div>
														<br>
													</div>

													<div class="col-lg-12">
														<textarea name="textarea-input" id="textarea-input" rows=6
															" placeholder="Description" class="form-control"></textarea>
													</div>
													<br>


													<button type="button"
														class="btn btn-primary float-right offset-1 "
														data-toggle="modal" data-target="#makesure">Confirm</button>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
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
			<script
				src="vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
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
			<div class="modal fade" id="makesure" tabindex="-1" role="dialog"
				aria-labelledby="staticModalLabel" aria-hidden="true"
				data-backdrop="static">
				<div class="modal-dialog modal-sm" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="staticModalLabel">Confirm to Add?</h5>
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
 
</body>

</html>
<!-- end document-->
