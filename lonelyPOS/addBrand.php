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
<title>Add Brand , Color and Size</title>

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
												<div class="card-header">Add Brand , Color and Size</div>
												<div class="card-body">
													<form action="system/add_brand.php" method="post">
														<div class="col-12 col-md-6">
															<br> <input type="text" id="bname" name="bname"
																placeholder="Brand Name" class="form-control"
																required=""> <br> 
																
														</div>
														<button type="submit"
															class="btn btn-primary float-right offset-1 ">Confirm</button>
													</form>
													<br><br>
													<form action="system/add_color.php" method="post">
														<div class="col-12 col-md-6">
															<br> <input type="text" id="cname" name="cname"
																placeholder="Color Name" class="form-control"
																required=""> <br> 
																<input type="text" id="hexcode"
																name="hexcode" placeholder="Hexcode"
																class="form-control" required=""> 
														</div>
														<button type="submit"
															class="btn btn-primary float-right offset-1 ">Confirm</button>
													</form><br><br>
													<form action="system/add_size.php" method="post">
														<div class="col-12 col-md-6">
															<br> <input type="text" id="sname" name="sname"
																placeholder="Size Name" class="form-control"
																required=""> <br> 
																<input type="text" id="scode"
																name="scode" placeholder="Size code(S,M,..)"
																class="form-control" required=""> 
														</div>
														<button type="submit"
															class="btn btn-primary float-right offset-1 ">Confirm</button>
													</form>
													
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

</body>

</html>
<!-- end document-->
