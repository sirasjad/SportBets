<?php checkLoggedIn(); ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- CORE CSS -->
	<link href="assets/plugins/morris/morris.css" rel="stylesheet">
	<link href="assets/plugins/switchery/switchery.min.css" rel="stylesheet">
	<link href="assets/css/style.css" rel="stylesheet" type="text/css">

	<title>Dashboard - <?php echo $name; ?></title>
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
					<h4 class="page-title">Dashboard</h4>
				</div>
			</div>

			<div class="row">
				<div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
					<div class="card-box tilebox-one">
						<i class="icon-layers pull-xs-right text-muted"></i>
						<h6 class="text-muted text-uppercase m-b-20">Football Predictions</h6>
						<h2 class="m-b-20" data-plugin="counterup"><?php GetStats(1); ?></h2>
					</div>
				</div>

				<div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
					<div class="card-box tilebox-one">
						<i class="icon-book-open pull-xs-right text-muted"></i>
						<h6 class="text-muted text-uppercase m-b-20">Basketball Predictions</h6>
						<h2 class="m-b-20" data-plugin="counterup">0</h2>
					</div>
				</div>
				
				<div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
					<div class="card-box tilebox-one">
						<i class="icon-people pull-xs-right text-muted"></i>
						<h6 class="text-muted text-uppercase m-b-20">Subscription Days Left</h6>
						<h2 class="m-b-20" data-plugin="counterup">99</h2>
					</div>
				</div>

				<div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
					<div class="card-box tilebox-one">
						<i class="icon-chart pull-xs-right text-muted"></i>
						<h6 class="text-muted text-uppercase m-b-20">Members Referred</h6>
						<h2 class="m-b-20" data-plugin="counterup">0</h2>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-xs-12 col-lg-12 col-xl-12">
					<div class="row">
						<div class="col-xs-12 col-md-12">
							<div class="card-box">
								<h4 class="header-title m-t-0 m-b-20">SHOUTBOX</h4>
								<div name="shoutbox" id="shoutbox" class="inbox-widget nicescroll" style="height: 320px;">
									<?php readShoutBox(); ?>
								</div>
								
								<hr>
								<div id="ajax"></div>
								<div class="input-group">
									<input type='text' class='form-control' name='message' id='message' placeholder='Type your message here...'>
									
									<span class="input-group-btn">
										<button type='submit' class='btn btn-primary-outline waves-effect waves-light' onclick='return sendShoutBox()'>Send</button>
									</span>
								</div>
								
								<small class="text-muted">Important: This is an open chat room for subscribed members. <strong>Never</strong> share your password or any other personal credentials in the shoutbox.</small>
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
	
	<!-- AJAX -->
	<script src="assets/ajax/shoutbox.js" type="text/javascript"></script>

</body>
</html>