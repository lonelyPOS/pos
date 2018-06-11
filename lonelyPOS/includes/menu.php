<aside class="menu-sidebar d-none d-lg-block">
	<div class="logo">
		<a href="index.php"> <img src="images/icon/logo.png" alt="Cool Admin" />
		</a>
	</div>
	<div class="menu-sidebar__content js-scrollbar1">
		<nav class="navbar-sidebar">
			<ul class="list-unstyled navbar__list">
				<li class="<?php if($page === 'index') { echo 'active';}?>"><a
					class="js-arrow" href="index.php"><i class="fas fa-laptop"></i>Dashboard</a>			
				<li>		
				<li class="<?php if($page === 'pos') { echo 'active';}?>"><a
					href="pos.php"><i class="fas fa-shopping-cart"></i>POS</a></li>
				<li
					class="<?php if($page === 'product') { echo 'active ';}?>has-sub">
					<a class="js-arrow" href="#"> <i class="fas fa-tags"></i>Product
				</a>
					<ul class="list-unstyled navbar__sub-list js-sub-list">

						<li><a href="listproduct.php"><i class="fas fa-search-plus"></i>List Product</a></li>
						<li><a href="addproduct.php"><i class="fas fa-plus"></i>Add Product</a></li>
						<li><a href="addBrand.php"><i class="fas fa-plus"></i>Add Brand,Size,Color</a></li>
						<li><a href="#"><i class="fas fa-search-plus"></i>Print Barcode</a></li>
				

					</ul>
				</li>
				<li
					class="<?php if($page === 'member') { echo 'active ';}?>has-sub">
					<a class="js-arrow" href="#"> <i class="fas fa-users"></i>Member
				</a>
					<ul class="list-unstyled navbar__sub-list js-sub-list">
						<li><a href="listmember.php"><i class="fas fa-list"></i>List Member</a></li>
						<li><a href="addmember.php"><i class="fas  fa-plus"></i>Add Member</a></li>
					</ul>
				</li>
				<li
					class="<?php if($page === 'report') { echo 'active ';}?>has-sub">
					<a class="js-arrow" href="#"> <i class="fas fa-bar-chart-o"></i>Report
				</a>
					<ul class="list-unstyled navbar__sub-list js-sub-list">
						<li><a href="sale_report.php"><i class="fas fa-bar-chart-o"></i>Sale Report</a></li>
					</ul>
				</li>
			</ul>
		</nav>
	</div>
</aside>