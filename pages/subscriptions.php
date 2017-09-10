<?php checkLoggedIn(); ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- CORE CSS -->
	<link href="assets/plugins/switchery/switchery.min.css" rel="stylesheet">
	<link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="assets/css/style.css" rel="stylesheet" type="text/css">

	<title>Subscriptions - <?php echo $name; ?></title>
</head>

<body>
	<header id="topnav">
		<div class="topbar-main">
			<div class="container">
				<div class="topbar-left">
					<a href="/?page=dashboard" class="logo">
						<i class="fa fa-soccer-ball-o"></i>
						<span><?php echo $name; ?></span>
					</a>
				</div>

				<div class="menu-extras">
					<ul class="nav navbar-nav pull-right">
						<li class="nav-item">
							<a class="navbar-toggle">
								<div class="lines">
									<span></span>
									<span></span>
									<span></span>
								</div>
							</a>
						</li>

						<li class="nav-item dropdown notification-list">
							<a class="nav-link dropdown-toggle arrow-none waves-effect waves-light nav-user" data-toggle="dropdown" href="#" role="button"
							   aria-haspopup="false" aria-expanded="false">
								<img src="assets/images/users/avatar-1.png" alt="user" class="img-circle">
							</a>
							
							<div class="dropdown-menu dropdown-menu-right dropdown-arrow profile-dropdown " aria-labelledby="Preview">
								<div class="dropdown-item noti-title">
									<h5 class="text-overflow"><small>My Account</small> </h5>
								</div>

								<a href="/?page=settings" class="dropdown-item notify-item">
									<i class="zmdi zmdi-settings"></i> <span>Settings</span>
								</a>

								<a href="/?page=logout" class="dropdown-item notify-item">
									<i class="zmdi zmdi-power"></i> <span>Logout</span>
								</a>
							</div>
						</li>
					</ul>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>

		<div class="navbar-custom">
			<div class="container">
				<div id="navigation">
					<ul class="navigation-menu">
						<li>
							<a href="/?page=dashboard"><i class="zmdi zmdi-view-dashboard"></i><span> Dashboard</span></a>
						</li>

						<li class="has-submenu">
							<a href="#"><i class="fa fa-soccer-ball-o"></i><span> Predictions</span></a>
							<ul class="submenu">
								<li><a href="/?page=football">Football</a></li>
								<li><a href="/?page=basketball">Basketball</a></li>
								<li><a href="/?page=ufc">UFC</a></li>
							</ul>
						</li>
						
						<li>
							<a href="/?page=score"><i class="zmdi zmdi-star-outline"></i><span> Live score</span></a>
						</li>
						
						<li>
							<a href="/?page=subscriptions"><i class="zmdi zmdi-money-box"></i><span> Subscriptions</span></a>
						</li>
						
						<li>
							<a href="/?page=support"><i class="zmdi zmdi-help-outline"></i><span> Support</span></a>
						</li>
						
						<?php AdminPanelAccess(); ?>
					</ul>
				</div>
			</div>
		</div>
	</header>

	<div class="wrapper">
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<h4 class="page-title">Subscriptions</h4>
				</div>
			</div>

			<div class="row">
				<div class="col-10 offset-1">
					<div class="text-center">
						<h3 class="m-b-30 m-t-20">Choose your perfect plan</h3>
						<p class="text-muted">
							Gain full access to all of our awesome features by purchasing a subscription plan.<br>
							You have access to all the features no matter what package you decide to<br>
							purchase, and you can renew or upgrade your plan at any time!
						</p>
					</div>

					<div class="m-t-30 m-b-30">
						<div class="row">
							<div class="col-sm-12 col-xs-12 col-md-4 col-lg-4">
								<div class="price_card text-center">
									<div class="pricing-header bg-primary">
										<span class="price">$<?php GetPlanPrice(1); ?></span>
										<span class="name">Package duration: <?php GetPlanDays(1); ?> Days</span>
									</div>
									
									<ul class="price-features">
										<li>Access to football predictions</li>
										<li>Access to basketball predictions</li>
										<li>Access to the shoutbox</li>
										<li>Live score board</li>
									</ul>
									
									<button class="btn btn-primary waves-effect waves-light w-md"><i class="fa fa-paypal"></i> Purchase with PayPal</button><br>
									<button class="btn btn-primary waves-effect waves-light w-md"><i class="fa fa-btc"></i> Purchase with Bitcoins</button>
								</div>
							</div>

							<div class="col-sm-12 col-xs-12 col-md-4 col-lg-4">
								<div class="price_card active text-center">
									<div class="pricing-header bg-warning">
										<span class="price">$<?php GetPlanPrice(3); ?></span>
										<span class="name">Package duration: <?php GetPlanDays(3); ?> Days</span>
									</div>
									
									<ul class="price-features">
										<li>Access to football predictions</li>
										<li>Access to basketball predictions</li>
										<li>Access to the shoutbox</li>
										<li>Live score board</li>
									</ul>
									
									<button class="btn btn-warning w-md waves-effect waves-light"><i class="fa fa-paypal"></i> Purchase with PayPal</button><br>
									<button class="btn btn-warning w-md waves-effect waves-light"><i class="fa fa-btc"></i> Purchase with Bitcoins</button>
								</div>
							</div>

							<div class="col-sm-12 col-xs-12 col-md-4 col-lg-4">
								<div class="price_card text-center">
									<div class="pricing-header bg-purple">
										<span class="price">$<?php GetPlanPrice(2); ?></span>
										<span class="name">Package duration: <?php GetPlanDays(2); ?> Days</span>
									</div>
									
									<ul class="price-features">
										<li>Access to football predictions</li>
										<li>Access to basketball predictions</li>
										<li>Access to the shoutbox</li>
										<li>Live score board</li>
									</ul>
									
									<button class="btn btn-purple w-md waves-effect waves-light"><i class="fa fa-paypal"></i> Purchase with PayPal</button><br>
									<button class="btn btn-purple w-md waves-effect waves-light"><i class="fa fa-btc"></i> Purchase with Bitcoins</button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- FOOTER -->
		<footer class="footer text-right">
			<div class="container">
				<div class="row">
					<div class="col-xs-12">
						2017 &copy; <?php echo $name; ?> - All rights reserved. Design and coding by <?php echo $dev; ?>.
					</div>
				</div>
			</div>
		</footer>
	</div>

	<!-- JAVASCRIPT -->
	<script src="assets/js/jquery.min.js"></script>
	<script src="assets/js/tether.min.js"></script><!-- Tether for Bootstrap -->
	<script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/waves.js"></script>
	<script src="assets/js/jquery.nicescroll.js"></script>
	<script src="assets/plugins/switchery/switchery.min.js"></script>
	<script src="assets/js/modernizr.min.js"></script>
	<script src="assets/js/jquery.core.js"></script>
	<script src="assets/js/jquery.app.js"></script>
	
	<script>
		var resizefunc = [];
	</script>

</body>
</html>