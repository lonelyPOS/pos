<link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
<aside class="menu-sidebar d-none d-lg-block">
	<div class="logo">
		<a href="#"> <img src="images/icon/logo.png" alt="Cool Admin" />
		</a>
	</div>
	<div class="menu-sidebar__content js-scrollbar1">
		<nav class="navbar-sidebar">
			<ul class="list-unstyled navbar__list">
				<li class="<?php if($page === 'index') { echo 'active';}?>">
					<a class="js-arrow" href="index.php"> <i class="material-icons">home</i>Dashboard</a>
				<li>
				<li class="<?php if($page === 'pos') { echo 'active';}?>">
					<a href="pos.php"><i class="material-icons">shopping_cart</i>POS</a>
				</li>
				<li class="<?php if($page === 'product') { echo 'active ';}?>has-sub">
    				<a class="js-arrow" href="#"> 
<!--     					<i class="fas fa-rocket"></i>Product -->
    					<i class="material-icons">add_shopping_cart</i>Product
    				</a>
					<ul class="list-unstyled navbar__sub-list js-sub-list">
						<li><a href="#"><i class="material-icons">add_circle</i>List Product</a></li>
						<li><a href="#"><i class="material-icons">add_circle</i>Add Product</a></li>
						<li><a href="#"><i class="material-icons">add_circle</i>Print Barcode</a></li>
					</ul>
				</li>
			</ul>
		</nav>
	</div>
</aside>