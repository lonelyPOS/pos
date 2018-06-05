<aside class="menu-sidebar d-none d-lg-block">
	<div class="logo">
		<a href="#"> <img src="images/icon/logo.png" alt="Cool Admin" />
		</a>
	</div>
	<div class="menu-sidebar__content js-scrollbar1">
		<nav class="navbar-sidebar">
			<ul class="list-unstyled navbar__list">
				<li class="<?php if($page === 'index') { echo 'active';}?>">
					<a class="js-arrow" href="index.php"> <i class="fas fa-desktop"></i>Dashboard</a>
				<li>
				<li class="<?php if($page === 'pos') { echo 'active';}?>">
					<a href="pos.php"> <i class="fas fa-rocket"></i>POS</a>
				</li>
				<li class="<?php if($page === 'product') { echo 'active ';}?>has-sub">
    				<a class="js-arrow" href="#"> 
    					<i class="fas fa-rocket"></i>Product
    				</a>
					<ul class="list-unstyled navbar__sub-list js-sub-list">
						<li><a href="#">List Product</a></li>
						<li><a href="#">Add Product</a></li>
						<li><a href="#">Print Barcode</a></li>
					</ul>
				</li>
			</ul>
		</nav>
	</div>
</aside>