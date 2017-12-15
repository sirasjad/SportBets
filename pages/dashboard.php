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

	<title>Dashboard - <?php echo $siteName; ?></title>
</head>

<body>
	<?php getHeader(); ?>

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
						<h6 class="text-muted text-uppercase m-b-20">Available Predictions</h6>
						<h2 class="m-b-20" data-plugin="counterup"><?php GetStats(1); ?></h2>
					</div>
				</div>

				<div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
					<div class="card-box tilebox-one">
						<i class="icon-book-open pull-xs-right text-muted"></i>
						<h6 class="text-muted text-uppercase m-b-20">Total Predictions</h6>
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
							2017 &copy; <?php echo $siteName; ?> - All rights reserved. Design and coding by <?php echo $devName; ?>.
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
