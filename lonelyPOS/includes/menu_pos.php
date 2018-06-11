<aside class="menu-sidebar-pos d-none d-lg-block">
	<div class="logo">
		<a href="#"> <img src="images/icon/logo.png" alt="Cool Admin" />
		</a>
	</div>
	<div class="menu-sidebar__content js-scrollbar1">
		<nav class="navbar-sidebar">
			<ul class="list-unstyled navbar__list">
				<li class="<?php if($page === 'index') { echo 'active';}?>"><a
					class="js-arrow" href="index.php" title="Dashboard"><i class="fas fa-laptop"></i></a>			
				<li>		
				<li class="<?php if($page === 'pos') { echo 'active';}?>"><a
					href="pos.php" title="POS"><i class="fas fa-shopping-cart"></i></a></li>
				<li
					class="<?php if($page === 'product') { echo 'active ';}?>has-sub">
					<a class="js-arrow" href="#" title="Product"> <i class="fas fa-tags"></i>
				</a>
					<ul class="list-unstyled navbar__sub-list js-sub-list">

						<li><a href="listproduct.php" title="List Product"><i class="fas fa-search-plus"></i></a></li>
						<li><a href="addproduct.php" title="Add Product"><i class="fas fa-plus"></i></a></li>
						<li><a href="#"><i class="fas fa-search-plus"></i></a></li>
					</ul>
				</li>
				<li
					class="<?php if($page === 'member') { echo 'active ';}?>has-sub">
					<a class="js-arrow" href="#"> <i class="fas fa-users"></i>
				</a>
					<ul class="list-unstyled navbar__sub-list js-sub-list">
						<li><a href="listmember.php" title="List Member"><i class="fas fa-list"></i></a></li>
						<li><a href="addmember.php" title="Add Member"><i class="fas  fa-plus"></i></a></li>
					</ul>
				</li>
				<li
					class="<?php if($page === 'report') { echo 'active ';}?>has-sub">
					<a class="js-arrow" href="#" title="Report"> <i class="fas fa-bar-chart-o"></i></a>
					<ul class="list-unstyled navbar__sub-list js-sub-list">
						<li><a href="sale_report.php" title="Sale Report"><i class="fas fa-bar-chart-o"></i></a></li>
					</ul>
				</li>
			</ul>
		</nav>
	</div>
</aside>