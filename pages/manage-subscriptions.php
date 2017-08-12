<?php checkLoggedIn(); ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- CORE CSS -->
	<link rel="stylesheet" href="assets/plugins/morris/morris.css">
	<link href="assets/plugins/switchery/switchery.min.css" rel="stylesheet">
	<link href="assets/css/style.css" rel="stylesheet" type="text/css">

	<title>Manage subscriptions - <?php echo $name; ?></title>
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
					<h4 class="page-title">Manage subscriptions</h4>
				</div>
			</div>
			
			<div class="row">
				<div class="col-md-12 col-sm-6 col-xs-12 col-xl-4">
					<div class="card-box">
						<?php if(isset($_POST['package1'])) { UpdatePlan(1); } ?>
						
						<h4 class="header-title m-t-0">Package 1</h4>
						<p class="text-muted font-13 m-b-30">Please make sure the information is correct before you submit.</p>

						<div class="row text-xs-center m-t-30">
							<div class="col-xs-12">
								<form action='' method='POST'>
									<label>Price (USD):</label>
									<input name='price1' id='price1' class="form-control form-control-lg m-b-20" type='text' value='<?php GetPlanPrice(1); ?>'>
									
									<label>Subscription days:</label>
									<input name='days1' id='days1' class="form-control form-control-lg m-b-20" type='text' value='<?php GetPlanDays(1); ?>'>
									
									<button type='submit' name='package1' class="btn btn-primary waves-effect waves-light btn-lg">Update Package</button>
								</form>
							</div>
						</div>
					</div>
				</div>

				<div class="col-md-12 col-sm-6 col-xs-12 col-xl-4">
					<div class="card-box">
						<?php if(isset($_POST['package2'])) { UpdatePlan(2); } ?>
						
						<h4 class="header-title m-t-0">Package 2</h4>
						<p class="text-muted font-13 m-b-30">Please make sure the information is correct before you submit.</p>

						<div class="row text-xs-center m-t-30">
							<div class="col-xs-12">
								<form action='' method='POST'>
									<label>Price (USD):</label>
									<input name='price2' id='price2' class="form-control form-control-lg m-b-20" type='text' value='<?php GetPlanPrice(2); ?>'>
									
									<label>Subscription days:</label>
									<input name='days2' id='days2' class="form-control form-control-lg m-b-20" type='text' value='<?php GetPlanDays(2); ?>'>
									
									<button type='submit' name='package2' class="btn btn-purple waves-effect waves-light btn-lg">Update Package</button>
								</form>
							</div>
						</div>
					</div>
				</div>
				
				<div class="col-md-12 col-sm-6 col-xs-12 col-xl-4">
					<div class="card-box">
						<?php if(isset($_POST['package3'])) { UpdatePlan(3); } ?>
						
						<h4 class="header-title m-t-0">Package 3</h4>
						<p class="text-muted font-13 m-b-30">Please make sure the information is correct before you submit.</p>

						<div class="row text-xs-center m-t-30">
							<div class="col-xs-12">
								<form action='' method='POST'>
									<label>Price (USD):</label>
									<input name='price3' id='price3' class="form-control form-control-lg m-b-20" type='text' value='<?php GetPlanPrice(3); ?>'>
									
									<label>Subscription days:</label>
									<input name='days3' id='days3' class="form-control form-control-lg m-b-20" type='text' value='<?php GetPlanDays(3); ?>'>
									
									<button type='submit' name='package3' class="btn btn-warning waves-effect waves-light btn-lg">Update Package</button>
								</form>
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
	</div>

	<!-- JAVASCRIPT -->
	<script src="assets/js/jquery.min.js"></script>
	<script src="assets/js/tether.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/waves.js"></script>
	<script src="assets/js/jquery.nicescroll.js"></script>
	<script src="assets/plugins/switchery/switchery.min.js"></script>
	<script src="assets/js/modernizr.min.js"></script>
	<script src="assets/plugins/morris/morris.min.js"></script>
	<script src="assets/plugins/raphael/raphael-min.js"></script>
	<script src="assets/plugins/waypoints/lib/jquery.waypoints.js"></script>
	<script src="assets/plugins/counterup/jquery.counterup.min.js"></script>
	<script src="assets/js/jquery.core.js"></script>
	<script src="assets/js/jquery.app.js"></script>
	<script src="assets/pages/jquery.dashboard.js"></script>
	
	<script>
		var resizefunc = [];
	</script>
	
	<script type="text/javascript">
	$(document).ready(function()
	{
		setInterval(function(){
			$("#message").slideUp("slow");
		}, 6000);
	});
	</script>

</body>
</html>