<header class="header-desktop">
	<div class="section__content section__content--p30">
		<div class="container-fluid">
			<div class="header-wrap">
				<form class="form-header" action="search.php" method="POST">
					<input class="au-input au-input--xl" type="text" name="search" id="search"
						placeholder="Search items..." />
					<button class="au-btn--submit" type="submit">
						<i class="zmdi zmdi-search"></i>
					</button>
				</form>
				<div class="header-button">
					<div class="noti-wrap">
						<div class="noti__item js-item-menu">
    						<div id="clockbox"></div>
						 	</div> 
						<div class="noti__item js-item-menu">
							<i class="zmdi zmdi-notifications"></i> <span class="quantity">3</span>
							<div class="notifi-dropdown js-dropdown">
								<div class="notifi__title">
									<p>You have 3 Notifications</p>
								</div>
								<div class="notifi__item">
									<div class="bg-c1 img-cir img-40">
										<i class="zmdi zmdi-email-open"></i>
									</div>
									<div class="content">
										<p>You got a email notification</p>
										<span class="date">April 12, 2018 06:50</span>
									</div>
								</div>
								<div class="notifi__item">
									<div class="bg-c2 img-cir img-40">
										<i class="zmdi zmdi-account-box"></i>
									</div>
									<div class="content">
										<p>Your account has been blocked</p>
										<span class="date">April 12, 2018 06:50</span>
									</div>
								</div>
								<div class="notifi__item">
									<div class="bg-c3 img-cir img-40">
										<i class="zmdi zmdi-file-text"></i>
									</div>
									<div class="content">
										<p>You got a new file</p>
										<span class="date">April 12, 2018 06:50</span>
									</div>
								</div>
								<div class="notifi__footer">
									<a href="#">All notifications</a>
								</div>
							</div>
						</div>
					</div>
					<div class="account-wrap">
						<div class="account-item clearfix js-item-menu">
							<div class="image">
								<img src="images/icon/avatar-01.jpg"
									alt="<?php echo $user->getFNAME().' '.$user->getLNAME(); ?>" />
							</div>
							<div class="content">
								<a class="js-acc-btn" href="#"><?php echo $user->getFNAME().' '.$user->getLNAME(); ?></a>
							</div>
							<div class="account-dropdown js-dropdown">
								<div class="info clearfix">
									<div class="image">
										<a href="#"> <img src="images/icon/avatar-01.jpg"
											alt="John Doe" />
										</a>
									</div>
									<div class="content">
										<h5 class="name">
											<a href="#"><?php echo $user->getFNAME().' '.$user->getLNAME(); ?></a>
										</h5>
										<span class="email"><?php echo $user->getEMAIL(); ?></span>
									</div>
								</div>
								<div class="account-dropdown__body">
									<div class="account-dropdown__item">
										<a href="#"> <i class="zmdi zmdi-account"></i>Account
										</a>
									</div>
									<div class="account-dropdown__item">
										<a href="#"> <i class="zmdi zmdi-settings"></i>Setting
										</a>
									</div>
									<div class="account-dropdown__item">
										<a href="#"> <i class="zmdi zmdi-money-box"></i>Billing
										</a>
									</div>
								</div>
								<div class="account-dropdown__footer">
									<a href="logout.php"> <i class="zmdi zmdi-power"></i>Logout
									</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</header>

    <script type="text/javascript">
        var tday=new Array("Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday");
        var tmonth=new Array("January","February","March","April","May","June","July","August","September","October","November","December");
        
        function GetClock(){
            var d=new Date();
            var nday=d.getDay(),nmonth=d.getMonth(),ndate=d.getDate();
            var nhour=d.getHours(),nmin=d.getMinutes();
            if(nmin<=9) nmin="0"+nmin
            
            document.getElementById('clockbox').innerHTML=""+tday[nday]+", "+tmonth[nmonth]+" "+ndate+" "+nhour+":"+nmin+"";
        }
        
        window.onload=function(){
            GetClock();
            setInterval(GetClock,1000);
        }
	</script>